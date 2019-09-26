<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Document $document)
    {
        
        return view('reference.create', compact('document'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            // 'subcategory' => 'required',
            'document_id' => 'required',
            'diary_no' => 'required',
            'date_in' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'received_from' => 'required',
            'subject' => 'required'
        ]);
        
        $reference = collect($validatedData)->put('reference_of', $request->document_id )->toArray();

        $document = Document::create($reference);

        return redirect("/document/view/$document->id")->with('success', 'Reference has been created succesfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
