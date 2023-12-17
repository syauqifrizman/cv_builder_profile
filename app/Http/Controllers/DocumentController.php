<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personal;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index($user_id){
        // $user_id = Document::with(['user'])->where
        $documents = $this->getAllDocumentUser($user_id);

        // dd($documents);

        return view('dashboard', [
            'docs' => $documents,
            "title" => optional($documents->first()->user)->username
        ]);
    }

    public function goToCvBuilder(){
        return view('form.doc_detail', [
            "title" => "CV Builder"
        ]);
    }

    public function test($username, Document $document){
        // $selectedDocument = $this->getDocumentByID($document_id);
        // dd($selectedDocument);

        // $selectedDocument = Document::query()->find($document_id);

        return view('form.doc_detail', [
            'doc' => $document,
            "title" => $document->title
        ]);
    }

    public function storeTest(Request $request, $username, Document $document){
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

        $personalUserData = [
            'document_id' => 3,
            'fullname' => $validatedData['personal_name'],
            'domicile' => $validatedData['personal_location'],
            'email' => $validatedData['personal_email'],
            'phone_number' => $validatedData['personal_number'],
            'linkedin_url' => $validatedData['personal_linkedin'],
            'portofolio_url' => $validatedData['personal_portofolio'] ?? null,
            'description' => $validatedData['personal_description'],
            'profile_image' => $validatedData['personal_photo'] ?? null,
        ];

        if($this->isPersonalNull($document)){
            Personal::create($personalUserData);
        }
        else{
            Personal::where('id', $document->personal->id)->update($personalUserData);
        }

        $updatedDocument = $this->getDocumentByID($document->id);

        return redirect()->route('storeTest', [
            "username" => $username,
            "document" => $updatedDocument->id
        ]);
    }

    public function isPersonalNull(Document $document){
        if($document->personal == null){
            return true;
        }
        return false;
    }

    public function store_data(Request $request){
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

        $personalUserData = [
            'document_id' => 3,
            'fullname' => $validatedData['personal_name'],
            'domicile' => $validatedData['personal_location'],
            'email' => $validatedData['personal_email'],
            'phone_number' => $validatedData['personal_number'],
            'linkedin_url' => $validatedData['personal_linkedin'],
            'portofolio_url' => $validatedData['personal_portofolio'] ?? null,
            'description' => $validatedData['personal_description'],
            'profile_image' => $validatedData['personal_photo'] ?? null,
        ];

        Personal::create($personalUserData);

        return redirect()->route('dashboard', [
            "user_id" => 17
        ])->with('success', 'Registration Success');
    }

    public function getAllDocument(){
        $documents = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->get();

        return $documents;
    }

    public function getDocumentByID($document_id){
        $selectedDocument = Document::with(['education', 'experience.experienceDescription', 'experience.type', 'personal', 'project.projectDetail', 'skillOther', 'user'])->find($document_id);

        return $selectedDocument;
    }

    public function getDetail($username, $document_id){
        $selectedDocument = $this->getDocumentByID($document_id);
        // dd($selectedDocument);

        // $selectedDocument = Document::query()->find($document_id);

        return view('form.update_doc', [
            'document' => $selectedDocument,
            "title" => $selectedDocument->title
        ]);
    }

    public function getAllDocumentUser($user_id){
        $documents = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->where('user_id', $user_id)->get();

        return $documents;
    }
}
