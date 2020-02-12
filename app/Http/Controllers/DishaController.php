<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DishaController extends Controller
{
    public function index() {

        $documents = Document::where('category_id', 6)->get();

        return view('disha.index', compact('documents'));
    }

    public function show(Document $document){

        return view('disha.show', compact('document'));
    }

    public function update(Request $request, $id){
        
        $validatedData = $request->validate([
            'category' => 'required',
            'diary_no' => 'required',
            'date_in' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'received_from' => 'required',
            'subject' => 'required',
        ]);

        Document::find($id)->update( $validatedData );

        return redirect()->back()->with('success', 'Document updated succesfully' );
    }
}
