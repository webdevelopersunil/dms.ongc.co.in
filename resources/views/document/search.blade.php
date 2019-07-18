@extends('layouts.app')

@section('content')
    
<div class="container mt-fit px-0 shadow" >

    @include('templates.alert')

    <div class="p-2 mb-4 bg-lightblue">

        <form action="/document/search" method="post">
        @csrf
            <div class="row pt-3">

                <div class="col-2 text-right px-0">
                    <label for="category">Category</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="category" name="category" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="subcategory">Sub Category</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="subcategory" name="subcategory" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="diary_no">Diary No</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="diary_no" name="diary_no" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="letter_from_govt">Letter From Govt.</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="letter_from_govt" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_from">Date From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_from" name="date_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_to">Date To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_to" name="date_to" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="letter_no">Letter No</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="file_no" name="file_no" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="received_from">Received From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="received_from" name="received_from" class="form-control form-control-sm">
                </div>
    
                <div class="col-2 text-right px-0">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-10 form-group ">
                    <input type="text" id="subject" name="subject" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_from">Date In (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_from" name="date_in_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date In (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_to" name="date_in_to" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_out_from">Date Out (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_from" name="date_out_from" class="form-control form-control-sm">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date out (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_to" name="date_out_to" class="form-control form-control-sm">
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
                    <h5> Total Documents: {{ $documents->count() }} </h5>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th> View </th>
                                <th> Edit </th>
                                <th> Print </th>
                                <th> Diary No </th>
                                <th> Letter No </th>
                                <th> Date In </th>
                                <th> Date Out </th>
                            </tr>    
                        </thead>

                        <tbody>
                            @foreach ($documents as $document )
                                <tr class="{{ $document->date_out ? '' : 'highlighted' }}" >
                                    <td> <a href="/document/view/{{ $document->id }}"> View </a> </td>
                                    <td> <a href="/document/view/{{ $document->id }}"> Edit </a> </td>
                                    <td> <a href="#">Print </a> </td>
                                    <td> 
                                        <span> {{ $document->diary_no }} </span>
                                        @if( $document->reference_of == -1 )
                                            <span class="badge badge-success"> Main </span>
                                        @else 
                                            <span class="badge badge-info"> Ref. </span>
                                        @endif
                                    </td>
                                    <td> {{ $document->file_no }}</td>
                                    <td> {{ $document->date_in }}</td>
                                    <td> {{ $document->date_out }}</td>
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