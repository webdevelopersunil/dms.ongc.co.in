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
            'document_id' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'subject' => 'required'
        ]);

        $document = Document::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'D_diaryNo' => $request->D_diaryNo,
            'D_DateIN' => $request->D_DateIN,
            'D_LetterNo' => $request->D_LetterNo,
            'D_DATE' => $request->D_DATE,
            'D_SendersName' => $request->D_SendersName,
            'D_SenderDYNo' => $request->D_SenderDYNo,
            'D_Subject' => $request->D_Subject,
            // 'dealing_officer' => $request->dealing_officer,
            'D_MarkedTo' => $request->D_MarkedTo,
            'D_CopyTO' => $request->D_CopyTO,
            'D_DateOut' => $request->D_DateOut,
            'D_MarkedBy' => $request->D_MarkedBy,
            'D_fileno' => $request->D_fileno,
            'D_Remarks' => $request->D_Remarks,
            'D_LetteraddressedTo' => $request->D_LetteraddressedTo,
            'D_LetterSignedBy' => $request->D_LetterSignedBy,
            'document_id' => $request->document_id
        ]);

        return redirect("/document/view/$document->id")->with('success', 'Reference has been created succesfully');
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
