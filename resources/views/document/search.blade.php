@extends('layouts.app')

@section('content')
    
<div class="container mt-fit px-0 shadow" >

    @include('templates.alert')

    {{-- @if(Auth::user()->email == 'sreenathsdas@gmail.com' )
        @if(isset( $conditions ))
            <div class="alert alert-info">
                {{ json_encode($conditions) }}
            </div>
        @endif
    @endif --}}

    <div class="p-2 mb-4 bg-lightblue">

        <form action="/document/search" method="post">
        @csrf
            <div class="row pt-3">

                <div class="col-2 text-right px-0">
                    <label for="category" class="text-bold text-danger">Category</label>
                </div>
                <div class="col-4 form-group ">
                    <select name="category" id="category" class="form-control form-control-sm">
                        <option value="All">All</option>
                        @foreach (\App\Category::all() as $item)
                            <option value="{{ $item->id }}" @if($item->id == $category) selected @endif > {{ $item->cm_name }} </option>
                        @endforeach
                        {{-- <option value="govt_letter" @if($selected == 'govt_letter') selected @endif>Govt. Letters</option>
                        <option value="cmd_office_correspondence" @if($selected == 'cmd_office_correspondence') selected @endif> CMD's Office Correspondence</option>
                        <option value="general" @if($selected == 'general') selected @endif>General | DDN Letters</option>
                        <option value="files" @if($selected == 'files') selected @endif>Files</option> --}}
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="subcategory" class="text-bold text-danger" >Sub Category</label>
                </div>
                <div class="col-4 form-group ">
                    {{-- <input type="text" id="subcategory" name="subcategory" class="form-control form-control-sm"> --}}
                    <select name="subcategory" id="subcategory" class="form-control form-control-sm">
                        <option value="NA">NA</option>
                        @foreach (\App\Subcategory::all() as $item)
                            <option @if($item->id == $subcategory) selected @endif value="{{ $item->id }}"> {{ $item->scm_head }} </option>
                        @endforeach
                        {{-- <option value="secret_letter">CMD|01 Secret Letters</option>
                        <option value="special_reply"> CMD|02 Special Reply of Misc</option>
                        <option value="ministry_correspondence"> CMD|03 Ministry's Correspondence</option>
                        <option value="internal_correspondence"> CMD|05 Internal Correspondence</option>
                        <option value="acknowledgement"> CMD|09 Acknowledgement</option>
                        <option value="invitations_for_seminar"> CMD|10 Invitations for Seminar</option> --}}
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="diary_no">Diary No</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="diary_no" value="{{ $remember->D_diaryNo }}" name="diary_no" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_LetterFromGovt">Letter From Govt.</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_LetterFromGovt" value="{{ $remember->D_LetterFromGovt }}" name="D_LetterFromGovt" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_from">Date From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_from" value="{{ $remember->D_DATE_from }}" name="date_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_to">Date To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_to" value="{{ $remember->D_DATE_to }}" name="date_to" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_LetterNo">Letter No</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_LetterNo" value="{{ $remember->D_LetterNo }}" name="D_LetterNo" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_SendersName">Received From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_SendersName" value="{{ $remember->D_SendersName }}" name="D_SendersName" class="form-control form-control-sm">
                </div>
    
                <div class="col-2 text-right px-0">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-10 form-group ">
                    <input type="text" id="subject" value="{{ $remember->D_Subject }}" name="subject" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_from">Date In (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_from" value="{{ $remember->D_DateIN_from }}" name="date_in_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date In (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_to" value="{{ $remember->D_DateIN_to }}" name="date_in_to" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_out_from">Date Out (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_from" value="{{ $remember->D_DateOut_from }}"  name="date_out_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date out (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_to" value="{{ $remember->D_DateOut_to }}"  name="date_out_to" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedBy">Marked By</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedBy" value="{{ $remember->D_MarkedBy }}" name="D_MarkedBy" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedTo">Marked To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedTo" value="{{ $remember->D_MarkedTo }}" name="D_MarkedTo" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_Remarks">Remarks</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_Remarks" value="{{ $remember->D_Remarks }}" name="D_Remarks" class="form-control form-control-sm">
                </div>

                <div class="offset-2 col-10 my-2">
                    <button class="btn dms-btn-primary mx-1 px-4">Search</button>
                    <a class="btn dms-btn-primary mx-1 px-4" href="/document/search">Reset</a>
                    <a href="/" class="btn dms-btn-primary mx-1 px-4">Exit</a>
                    <button type="button" class="btn dms-btn-primary mx-1 px-4" data-toggle="modal" data-target="#createModal">Create Document</button>
                </div>

            </div>
        
        </form>
        @if( !empty($documents) )
            <div class="card">
                
                <div class="card-header">
                    <h4>Search Results</h4>
                    <h5> Total Documents: {{ $documents->count() }}. 
                        @if($limitSearch)
                            <span class="text-danger float-right"> Too many results. Search limited to 1000 results </span>
                        @endif
                    </h5>
                </div>

                <div class="card-body" style="overflow-x: scroll; overflow-y: scroll; height: 60vh">
                    
                    <table class="table table-bordered" style="width:200vw">

                        <thead>
                            <tr>
                                <th> View </th>
                                <th> Edit </th>
                                <th> Print </th>
                                <th> Diary No </th>
                                <th> Letter No </th>
                                <th style="width:5%"> Date In </th>
                                <th style="width:5%"> Date Out </th>
                                <th style="width:5%"> File Date </th>
                                <th> Received From </th>
                                <th> Subject </th>
                                <th> Marked To </th>
                                <th> Copy To </th>
                                <th> Marked By </th>
                                <th> Remarks </th>
                            </tr>    
                        </thead>

                        <tbody>
                            @foreach ($documents as $document )
                                <tr class="{{ $document->D_DateOut ? '' : 'highlighted' }}" >
                                    <td> 
                                        @if($document->D_fileno) <a href="/document/file/{{ $document->id }}"> View </a> @endif 
                                    </td>
                                    <td> <a href="/document/view/{{ $document->id }}"> Edit </a> </td>
                                    <td> <a href="/document/print/{{ $document->id }}">Print </a> </td>
                                    <td> 
                                        <span> {{ $document->D_diaryNo }} </span>
                                        {{-- @if( $document->reference_of == -1 )
                                            <span class="badge badge-success"> Main </span>
                                        @else 
                                            <span class="badge badge-info"> Ref. </span>
                                        @endif --}}
                                    </td>
                                    <td> <p class="my-0"> {{ $document->D_LetterNo }} </p>
                                        <span class="badge badge-primary"> {{ $document->category->cm_name }} </span>
                                        <span class="badge badge-danger"> {{ $document->subcategory ? $document->subcategory->scm_head : '' }} </span>
                                    </td>
                                    <td> {{ $document->D_DateIN }}</td>
                                    <td> {{ $document->D_DateOut }}</td>
                                    <td> {{ $document->D_DATE }}</td>
                                    <td> {{ $document->D_SendersName }}</td>
                                    <td> {{ $document->D_Subject }}</td>
                                    <td> {{ $document->D_MarkedTo }}</td>
                                    <td> {{ $document->D_CopyTO }}</td>
                                    <td> {{ $document->D_MarkedBy }}</td>
                                    <td> {{ $document->D_Remarks }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        @endif
    </div>

</div>

@include('templates.modal');

@endsection