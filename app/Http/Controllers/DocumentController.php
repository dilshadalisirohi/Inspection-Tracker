<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function index() {
        return view('Documents');
    }

    function addDocumentView() {
        return view('addDocument');
    }

    function editDocumentView($id) {
        $document = Document::find($id);
        return view('editDocument', [
            'document' => $document
        ]);
    }

    function getDocuments() {
        $documents = Document::all();
        $documentArray = [];

        foreach ($documents as $value) {
            $documentData = array(
                'id' => $value->id,
                'name' => $value->name,
                'file_name' => $value->file
            );

            array_push($documentArray, $documentData);
        }

        if(Auth::user()->role_id == 2) {
            return DataTables::of($documentArray)
                ->addColumn('action', function($documentArray) {
                    return '<a class="btn btn-warning hd-table-btn editCompany mr-1" href="'.url('/admin/edit-document').'/'.$documentArray['id'].'" data-id="'.$documentArray['id'].'">Edit</a>
                    <a class="btn btn-danger hd-table-btn deleteCompany mr-1" href="'.url('delete-document').'/'.$documentArray['id'].'" data-id="'.$documentArray['id'].'">Delete</a>';
                })
                ->addColumn('file', function ($documentArray) {
                    return "<a href='".url("public/storage/uploads".$documentArray['file_name'])."' target='_blank'>".$documentArray['file_name']."</a>";
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
        } else {
            return DataTables::of($documentArray)
                ->addColumn('action', function($documentArray) {
                    return "<a href='".url("public/storage/uploads".$documentArray['file_name'])."' target='_blank'><i class='fas fa-eye'></i></a>";
                })
                ->addColumn('file', function ($documentArray) {
                    return "<a href='".url("public/storage/uploads".$documentArray['file_name'])."' target='_blank'>".$documentArray['file_name']."</a>";
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
        }

    }

    function createDocument(Request $request) {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:jpeg,png'
        ]);

        $fileName =  $request->file->storeAs('public/uploads', $request->file->getClientOriginalName());
        $file = str_replace('public/uploads/', '', $fileName);

        $result = Document::create([
            'name' => $request->input('name'),
            'file' => $file
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/document');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/document');
        }
    }

    function updateDocument(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $document = Document::find($request->input('id'));
        if($request->hasFile('file')) {
            unlink($document->file);
            $fileName =  $request->file->storeAs('public/uploads', $request->file->getClientOriginalName());
            $file = str_replace('public/uploads/', '', $fileName);
        } else {
            $file = $document->file;
        }

        $result = Document::where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'file' => $file
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/document');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/document');
        }
    }

    function deleteDocument($id) {
        $document = Document::find($id);
        unlink('public/storage/uploads'.'/'.$document->file);
        $result = Document::where("id", $id)->delete();
        if($result) {
            session()->flash('message', 'deleted');
            return redirect('admin/document');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/document');
        }
    }
}
