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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($username){

        // ini harus auth bener dia udah login ke akun atau belum
        // soalnya kalo kita langsung ketik /dashboard/{username} otomatis bakal ketampil juga
        // semua document yg dipunya dari username itu

        $getUser = User::where('username', $username)->firstOrFail();
        $documents = $this->getAllDocumentUser($getUser->id);

        return view('dashboard', [
            'docs' => $documents,
            "title" => $getUser->username
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
        ]);

        $documentData = [
            'title' => $validatedData['title_doc'],
            'created_time' => $validatedData['created_time'] = now(),
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
            'document' => $newDocument
        ]);
    }

    public function getPersonal($username, Document $document){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);
        // dd($selectedDocument);

        // $selectedDocument = Document::query()->find($document_id);

        return view('form.test_personal', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function test($username, Document $document){
        // $selectedDocument = $this->getDocumentByID($document_id);
        // dd($selectedDocument);

        // $selectedDocument = Document::query()->find($document_id);

        return view('form.test_personal', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storePersonal(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'personal_name' => 'required',
            'personal_location' => 'required',
            'personal_email' => 'required|email:dns',
            'personal_number' => 'required',
            'personal_linkedin' => 'required|url',
            'personal_portofolio' => 'url|nullable',
            'personal_description' => 'required|max:255',
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
            'document' => $updatedDocument
        ]);
        // return view('form.test_experience', [
        //     'doc' => $updatedDocument,
        //     "title" => $updatedDocument->title
        // ]);
    }

    public function getDetailExperience($username, Document $document){

        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        return view('form.test_experience', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storeExperience(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'experience_company_name' => 'max:50|nullable',
            'experience_company_position' => 'max:50|nullable',
            'experience_company_location' => 'max:50|nullable',
            'experience_company_description' => 'max:255|nullable',
            'experience_company_start_date' => 'date|nullable|before_or_equal:experience_company_end_date',
            'experience_company_end_date' => 'date|nullable|after_or_equal:experience_company_start_date',
            'experience_description_table' => 'max:255|nullable',
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
            'document' => $updatedDocument
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailProject($username, Document $document){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        return view('form.test_project', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storeProject(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'project_name' => 'max:50|nullable',
            'project_year' => 'numeric|regex:/^\d{4}$/|nullable|',
            'project_url' => 'url|nullable',
            'project_detail' => 'max:255|nullable',
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
            'document' => $updatedDocument
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailEducation($username, Document $document){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        return view('form.test_education', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storeEducation(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'education_name' => 'max:50|nullable',
            'education_location' => 'max:50|nullable',
            'education_level' => 'max:50|nullable',
            'education_major' => 'max:50|nullable',
            'current_score' => 'numeric|nullable|lte:max_score',
            'max_score' => 'numeric|nullable',
            'start_date' => 'date|nullable|before_or_equal:end_date',
            'end_date' => 'date|nullable|after_or_equal:start_date',
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
            "document" => $updatedDocument
        ]);

        // return ke dashboard
        // return $this->index($username);
    }

    public function getDetailSkillOther($username, Document $document){
        // ini harus validasi beneran user nya dia bukan,
        // jangan asal ganti document di url, tapi tetap ditampilin

        // $selectedDocument = $this->getDocumentByID($document_id);

        return view('form.test_skillOther', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storeSkillOther(Request $request, $username, Document $document){
        $validatedData = $request->validate([
            'skill_other_title' => 'max:20|nullable',
            'skill_other_description' => 'max:255|nullable',
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

    public function isPersonalNull(Document $document){
        if($document->personal == null){
            return true;
        }
        return false;
    }

    public function isExperienceNull(Document $document){
        if($document->experience == null){
            return true;
        }
        return false;
    }

    public function isExperienceDescriptionNull(Document $document){
        if($document->experience->description == null){
            return true;
        }
        return false;
    }

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



    public function getAllDocumentUser($user_id){
        $documents = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->where('user_id', $user_id)->get();

        return $documents;
    }
}
