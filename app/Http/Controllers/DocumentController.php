<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personal;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getAllDocument(){
        $documents = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->get();

        return $documents;
    }

    public function getDocumentByID($document_id){
        $selectedDocument = Document::with(['education', 'experience', 'personal', 'project', 'skillOther', 'user'])->find($document_id);

        return $selectedDocument;
    }

    public function getDetail($username, $document_id){
        $documentController = new DocumentController();
        $selectedDocument = $documentController->getDocumentByID($document_id);

        // $selectedDocument = Document::query()->find($document_id);

        return view('cv_builder', ['document' => $selectedDocument]);
    }
}
