<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Education;
use App\Models\Experience;
use App\Models\ExperienceDescription;
use App\Models\Personal;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\SkillOther;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
// use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    public function generatePDF($username, Document $document){
        $selectedDocument = $this->getDocumentByID($document->id);

        $data = [
            'document' => $selectedDocument,
        ];

        // dump($data);

        // too slow using laravel-domPDF
        // $pdf = FacadePdf::loadView('pdf.document', $data);
        // return $pdf->download($document->title . '_updated_' . now()->format('F') . '.pdf');

        // using browsershot (error installing composer require brwosershot)
        // $html = view('pdf.document', $data)->render();
        // $pdf = Browsershot::html($html)->pdf();

        // return response($pdf)->header('Content-Type', 'application/pdf');

        return view('pdf.document', [
            'username' => $username,
            'document' => $document
        ]);
    }

    public function dashboardGuard($username){
        $authenticatedUser = Auth::user();

        // Check if the authenticated users username matches the provided username
        if ($authenticatedUser->username !== $username) {
            abort(404);
        }
    }

    public function cekUser($username, Document $document){
        $authenticatedUser = Auth::user();
        $getUser = User::where('username', $username)->firstOrFail();
        $getDocumentUser = $document->user_id;

        if ($getUser->id != $getDocumentUser) {
            abort(404);
        }
        if ($getUser->id != $authenticatedUser->id) {
            abort(404);
        }
    }

    public function index($username){

        // ini harus auth bener dia udah login ke akun atau belum
        // soalnya kalo kita langsung ketik /dashboard/{username} otomatis bakal ketampil juga
        // semua document yg dipunya dari username itu
        $this->dashboardGuard($username);

        $searchName = request('search');
        $sortBy = request('sortBy', 'default'); // Default sort option

        $getUser = User::where('username', $username)->firstOrFail();

        // Determine the appropriate method based on the sort option
        switch ($sortBy) {
            case 'titlea_z':
                $documents = $this->getAllDocumentUserTitleAZ($getUser->id, $searchName);
                break;
            case 'titlez_a':
                $documents = $this->getAllDocumentUserTitleZA($getUser->id, $searchName);
                break;
            case 'time':
                $documents = $this->getAllDocumentUserTime($getUser->id, $searchName);
                break;
            default:
                $documents = $this->getAllDocumentUser($getUser->id, $searchName);
                break;
        }

        $publicDocument = Document::with(['education', 'experience.experienceDescription', 'experience.type', 'personal', 'project.projectDetail', 'skillOther', 'user'])->where('is_public', true)->get();

        return view('dashboard', [
            'publicDocs' => $publicDocument,
            'docs' => $documents,
            "title" => $getUser->username,
            'title' => $getUser->username,
            'selectedSort' => $sortBy, // Pass the selected sort option to the view
            'searchName' => $searchName, // Pass the search name to the view
        ]);
    }

    public function formRedirectCreateDocument($username){
        $getUser = User::where('username', $username)->firstOrFail();

        return view('form.create_doc', [
            "title" => $getUser->username . " New Document",
            "username" => $getUser->username
        ]);
    }

    public function createDocument(Request $request, $username){

        $validatedData = $request->validate([
            'title_doc' => 'required|max:25',
            'is_public_checkbox' => 'sometimes|nullable|boolean',
        ]);

        $documentData = [
            'title' => $validatedData['title_doc'],
            'created_time' => $validatedData['created_time'] = now(),
            'is_public' => $validatedData['is_public_checkbox'] ?? false,
            'user_id' => $validatedData['user_id'] = Auth::user()->id,
        ];

        $newDocument = Document::create($documentData);

        $personalData = [
            'document_id' => $newDocument->id,
            'fullname' => null,
            'domicile' => null,
            'email' => null,
            'phone_number' => null,
            'linkedin_url' => null,
            'portofolio_url' => null,
            'description' => null,
            'profile_image' => null,
        ];
        Personal::create($personalData);

        $experienceData = [
            'company_name' => null,
            'position' => null,
            'company_location' => null,
            'company_description' => null,
            'start_date' => null,
            'end_date' => null,
            'document_id' => $newDocument->id,
            'type_id' => 1,
        ];

        $newExperience = Experience::create($experienceData);

        $experienceDescriptionData = [
            'description' => null,
            'experience_id' => $newExperience->id,
        ];
        ExperienceDescription::create($experienceDescriptionData);

        $projectData = [
            'document_id' => $newDocument->id,
            'project_name' => null,
            'year' => null,
            'project_url' => null,
        ];
        $newProject = Project::create($projectData);

        $projectDetailData = [
            'project_id' => $newProject->id,
            'description' => null,
        ];
        ProjectDetail::create($projectDetailData);

        $educationData  = [
            'document_id' => $newDocument->id,
            'education_name' => null,
            'education_location' => null,
            'education_level' => null,
            'education_major' => null,
            'current_score' => null,
            'max_score' => null,
            'start_date' => null,
            'end_date' => null,
            'related_coursework' => null,
        ];
        Education::create($educationData);

        $skillOtherData = [
            'document_id' => $newDocument->id,
            'title' => null,
            'description' => null,
        ];
        SkillOther::create($skillOtherData);

        return redirect()->route('detail_personal', [
            'username' => $username,
            'document' => $newDocument,
            'type' => 'update'
        ]);
    }

    public function getPersonal($username, Document $document, $type){

        if($type == 'update'){
            $this->cekUser($username, $document);
            return view('form.test_personal', [
                'doc' => $document,
                "title" => $document->title
            ]);
        }
        else if($type == 'read'){
            if($document->is_public == true){
                return view('form.public_doc.read_personal', [
                    'doc' => $document,
                    "title" => $document->title
                ]);
            }
            else{
                abort(404);
            }
        }
    }

    // public function test($username, Document $document){
    //     // $selectedDocument = $this->getDocumentByID($document_id);
    //     // dd($selectedDocument);

    //     // $selectedDocument = Document::query()->find($document_id);

    //     return view('form.test_personal', [
    //         'doc' => $document,
    //         "title" => $document->title
    //     ]);
    // }

    public function storePersonal(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'personal_name' => 'required|max:100',
            'personal_location' => 'required|max:50',
            'personal_email' => 'required|email:dns',
            'personal_number' => 'required|numeric',
            'personal_linkedin' => 'required|url',
            'personal_portofolio' => 'url|nullable',
            'personal_description' => 'required|max:1000',
            'personal_photo' => 'image|mimes:jpg,png|nullable',
        ]);

        $personalData = [
            'document_id' => $document->id,
            'fullname' => $validatedData['personal_name'],
            'domicile' => $validatedData['personal_location'],
            'email' => $validatedData['personal_email'],
            'phone_number' => $validatedData['personal_number'],
            'linkedin_url' => $validatedData['personal_linkedin'],
            'portofolio_url' => $validatedData['personal_portofolio'] ?? null,
            'description' => $validatedData['personal_description'],
            'profile_image' => $validatedData['personal_photo'] ?? null,
        ];

        // if($document->personal == null){
        //     Personal::create($personalData);
        // }
        // else{
            Personal::where('id', $document->personal->id)->update($personalData);
        // }

        $updatedDocument = $this->getDocumentByID($document->id);

        return redirect()->route('detail_experience', [
            'username' => $username,
            'document' => $updatedDocument,
            'type' => 'update'
        ]);
        // return view('form.test_experience', [
        //     'doc' => $updatedDocument,
        //     "title" => $updatedDocument->title
        // ]);
    }

    public function getDetailExperience($username, Document $document, $type){

        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        if($type == 'update'){
            $this->cekUser($username, $document);
            return view('form.test_experience', [
                'doc' => $document,
                "title" => $document->title
            ]);
        }
        else if($type == 'read'){
            if($document->is_public == true){
                return view('form.public_doc.read_experience', [
                    'doc' => $document,
                    "title" => $document->title
                ]);
            }
            else{
                abort(404);
            }
        }
    }

    public function storeExperience(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'experience_company_name' => 'max:50|required',
            'experience_company_position' => 'max:50|required',
            'experience_company_location' => 'max:50|required',
            'experience_company_description' => 'max:255|nullable',
            'experience_company_start_date' => 'date|required|before_or_equal:experience_company_end_date',
            'experience_company_end_date' => 'date|required|after_or_equal:experience_company_start_date',
            'experience_description_table' => 'max:255|required',
        ]);

        $experienceData = [
            'document_id' => $document->id,
            'company_name' => $validatedData['experience_company_name'],
            'position' => $validatedData['experience_company_position'],
            'company_location' => $validatedData['experience_company_location'],
            'company_description' => $validatedData['experience_company_description'],
            'start_date' => $validatedData['experience_company_start_date'],
            'end_date' => $validatedData['experience_company_end_date'],
        ];
        // ini cuma update satu
        // Experience::where('id', $document->experience->first()->id)->update($experienceData);

        // if($this->isExperienceNull($document)){
        //     Experience::create($experienceData);
        // }
        // else{

        // }

        // $newExperience = Experience::find($document->experience->id);

        // ini gatau belum nyari gimana kalo experience description detail nya many
        // nanti update nya belum tau cara ngambil exp_desc_detail id nya gimana
        // $experienceDescriptionData = [
        //     'description' => $validatedData['experience_description_table'],
        //     'experience_id' => $document->experience->id,
        // ];

        // Assuming $document->experience is a collection
        foreach ($document->experience as $experience) {
            // Update each experience
            $experienceId = $experience->id;

            // update
            Experience::where('id', $experienceId)->update($experienceData);

            // update the related experience_description if needed
            $experienceDescriptionData = [
                'description' => $validatedData['experience_description_table'],
            ];

            $experience->experienceDescription()->update($experienceDescriptionData);
        }


        // if($this->isExperienceDescriptionNull($document)){
        //     ExperienceDescription::create($experienceDescriptionData);
        // }
        // else{
        //     ExperienceDescription::where('id', $document->experience->experienceDescription->id);
        // }

        $updatedDocument = $this->getDocumentByID($document->id);

        // nanti harusnya ke detail project, tapi untuk saat ini ke dashboard aja dulu
        return redirect()->route('detail_project', [
            'username' => $username,
            'document' => $updatedDocument,
            'type' => 'update'
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailProject($username, Document $document, $type){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        if($type == 'update'){
            $this->cekUser($username, $document);
            return view('form.test_project', [
                'doc' => $document,
                "title" => $document->title
            ]);
        }
        else if($type == 'read'){
            if($document->is_public == true){
                return view('form.public_doc.read_project', [
                    'doc' => $document,
                    "title" => $document->title
                ]);
            }
            else{
                abort(404);
            }
        }
    }

    public function storeProject(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'project_name' => 'max:50|required',
            'project_year' => 'numeric|regex:/^\d{4}$/|nullable|',
            'project_url' => 'url|nullable',
            'project_detail' => 'max:255|required',
        ]);

        $projectData = [
            'document_id' => $document->id,
            'project_name' => $validatedData['project_name'],
            'year' => $validatedData['project_year'],
            'project_url' => $validatedData['project_url'],
        ];

        foreach ($document->project as $project) {
            // Update each project
            $projectId = $project->id;

            // update
            Project::where('id', $projectId)->update($projectData);

            // update the related project_detail if needed
            $projectDetailData = [
                'description' => $validatedData['project_detail'],
            ];

            $project->projectDetail()->update($projectDetailData);
        }

        // $projectDetailData = [
        //     'description' => $validatedData['experience_description_table'],
        // ];

        // if($this->isExperienceNull($document)){
        //     Experience::create($experienceData);
        // }
        // else{
            // Experience::where('id', $document->personal->id)->update($experienceData);
        // }

        // if($this->isExperienceDescriptionNull($document)){
        //     ExperienceDescription::create($experienceDescriptionData);
        // }
        // else{
        //     ExperienceDescription::where('id', $document->experience->experienceDescription->id);
        // }

        $updatedDocument = $this->getDocumentByID($document->id);

        return redirect()->route('detail_education', [
            'username' => $username,
            'document' => $updatedDocument,
            'type' => 'update'
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailEducation($username, Document $document, $type){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        if($type == 'update'){
            $this->cekUser($username, $document);
            return view('form.test_education', [
                'doc' => $document,
                "title" => $document->title
            ]);
        }
        else if($type == 'read'){
            if($document->is_public == true){
                return view('form.public_doc.read_education', [
                    'doc' => $document,
                    "title" => $document->title
                ]);
            }
            else{
                abort(404);
            }
        }
    }

    public function storeEducation(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'education_name' => 'max:50|required',
            'education_location' => 'max:50|required',
            'education_level' => 'max:50|required',
            'education_major' => 'max:50|required',
            'current_score' => 'numeric|nullable|lte:max_score',
            'max_score' => 'numeric|nullable',
            'start_date' => 'date|required|before_or_equal:end_date',
            'end_date' => 'date|required|after_or_equal:start_date',
            'related_coursework' => 'max:255|nullable',
        ]);

        $educationData = [
            'document_id' => $document->id,
            'education_name' => $validatedData['education_name'],
            'education_location' => $validatedData['education_location'],
            'education_level' => $validatedData['education_level'],
            'education_major' => $validatedData['education_major'],
            'current_score' => $validatedData['current_score'],
            'max_score' => $validatedData['max_score'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'related_coursework' => $validatedData['related_coursework'],
        ];

        foreach ($document->education as $education) {
            // Update each project
            $educationId = $education->id;

            // update
            Education::where('id', $educationId)->update($educationData);
        }

        // if($this->isExperienceNull($document)){
        //     Experience::create($experienceData);
        // }
        // else{
        //     Experience::where('id', $document->personal->id)->update($experienceData);
        // }

        $updatedDocument = $this->getDocumentByID($document->id);

        return redirect()->route('detail_skillOther', [
            "username" => $username,
            "document" => $updatedDocument,
            'type' => 'update'
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailSkillOther($username, Document $document, $type){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        if($type == 'update'){
            $this->cekUser($username, $document);
            return view('form.test_skillOther', [
                'doc' => $document,
                "title" => $document->title
            ]);
        }
        else if($type == 'read'){
            if($document->is_public == true){
                return view('form.public_doc.read_skillOther', [
                    'doc' => $document,
                    "title" => $document->title
                ]);
            }
            else{
                abort(404);
            }
        }
    }

    public function storeSkillOther(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'skill_other_title' => 'max:20|required',
            'skill_other_description' => 'max:255|required',
        ]);

        $skillOtherData = [
            'document_id' => $document->id,
            'title' => $validatedData['skill_other_title'],
            'description' => $validatedData['skill_other_description'],
        ];

        foreach ($document->skillOther as $skillOther) {
            // Update each project
            $skillOtherId = $skillOther->id;

            // update
            SkillOther::where('id', $skillOtherId)->update($skillOtherData);
        }

        // $updatedDocument = $this->getDocumentByID($document->id);

        // return redirect()->route('storeTest', [
        //     "username" => $username,
        //     "document" => $updatedDocument->id
        // ]);

        return $this->index($username);
    }

    // public function isPersonalNull(Document $document){
    //     if($document->personal == null){
    //         return true;
    //     }
    //     return false;
    // }

    // public function isExperienceNull(Document $document){
    //     if($document->experience == null){
    //         return true;
    //     }
    //     return false;
    // }

    // public function isExperienceDescriptionNull(Document $document){
    //     if($document->experience->description == null){
    //         return true;
    //     }
    //     return false;
    // }

    // public function store_data(Request $request){
    //     $validatedData = $request->validate([
    //         'personal_name' => 'required',
    //         'personal_location' => 'required',
    //         'personal_email' => 'required|email:dns',
    //         'personal_number' => 'required',
    //         'personal_linkedin' => 'required|url',
    //         'personal_portofolio' => 'url|nullable',
    //         'personal_description' => 'required|max:255',
    //         'personal_photo' => 'image|mimes:jpg,png|nullable',
    //     ]);

    //     $personalUserData = [
    //         'document_id' => 3,
    //         'fullname' => $validatedData['personal_name'],
    //         'domicile' => $validatedData['personal_location'],
    //         'email' => $validatedData['personal_email'],
    //         'phone_number' => $validatedData['personal_number'],
    //         'linkedin_url' => $validatedData['personal_linkedin'],
    //         'portofolio_url' => $validatedData['personal_portofolio'] ?? null,
    //         'description' => $validatedData['personal_description'],
    //         'profile_image' => $validatedData['personal_photo'] ?? null,
    //     ];

    //     Personal::create($personalUserData);

    //     return redirect()->route('dashboard', [
    //         "user_id" => 17
    //     ])->with('success', 'Registration Success');
    // }

    // public function getAllDocument(){
    //     $documents = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->get();

    //     return $documents;
    // }

    public function getDocumentByID($document_id){
        $selectedDocument = Document::with(['education', 'experience.experienceDescription', 'experience.type', 'personal', 'project.projectDetail', 'skillOther', 'user'])->find($document_id);

        return $selectedDocument;
    }



    public function getAllDocumentUser($user_id, $searchName){
        $query = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])
        ->where('user_id', $user_id);

        // Add search condition if a name is provided
        if ($searchName) {
            $query->where('title', 'LIKE', '%' . $searchName . '%');
        }

        // Order by created_time (you can adjust this based on your needs)
        $documents = $query->get();

        return $documents;
    }
    public function getAllDocumentUserTime($user_id, $searchName){
        $query = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])
        ->where('user_id', $user_id);

        // Add search condition if a name is provided
        if ($searchName) {
            $query->where('title', 'LIKE', '%' . $searchName . '%');
        }

        // Order by created_time (you can adjust this based on your needs)
        $documents = $query->orderBy('created_time', 'desc')->get();

        return $documents;
    }
    public function getAllDocumentUserTitleAZ($user_id, $searchName){
        $query = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])
        ->where('user_id', $user_id);

        // Add search condition if a name is provided
        if ($searchName) {
            $query->where('title', 'LIKE', '%' . $searchName . '%');
        }

        // Order by created_time (you can adjust this based on your needs)
        $documents = $query->orderBy('title', 'asc')->get();

        return $documents;
    }
    public function getAllDocumentUserTitleZA($user_id, $searchName){
        $query = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])
        ->where('user_id', $user_id);

        // Add search condition if a name is provided
        if ($searchName) {
            $query->where('title', 'LIKE', '%' . $searchName . '%');
        }

        // Order by created_time (you can adjust this based on your needs)
        $documents = $query->orderBy('title', 'desc')->get();

        return $documents;
    }
}
