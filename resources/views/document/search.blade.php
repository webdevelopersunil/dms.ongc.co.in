@extends('layouts.app')

@section('content')
    
<div class="container mt-fit px-0 shadow" >

    @include('templates.alert')

    <div class="p-2 mb-4 bg-lightblue">

        <form action="/document/search" method="post">
        @csrf
            <div class="row pt-3">

                <div class="col-2 text-right px-0">
                    <label for="category" class="text-bold text-danger">Category</label>
                </div>
                <div class="col-4 form-group ">
                    <select name="category" id="category" class="form-control form-control-sm font-weight-bold">
                        <option value="All">All</option>
                        @foreach (\App\Category::all() as $item)
                            <option value="{{ $item->id }}" @if($item->id == $category) selected @endif > {{ $item->cm_name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="subcategory" class="text-bold text-danger" >Sub Category</label>
                </div>
                <div class="col-4 form-group ">
                    <select name="subcategory" id="subcategory" class="form-control form-control-sm font-weight-bold">
                        <option value="NA">NA</option>
                        @foreach (\App\Subcategory::all() as $item)
                            <option @if($item->id == $subcategory) selected @endif value="{{ $item->id }}"> {{ $item->scm_head }} - {{ $item->scm_desc }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="diary_no">Diary No</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="diary_no" value="{{ $remember->D_diaryNo }}" name="diary_no" class="form-control form-control-sm font-weight-bold">
                </div>

                {{-- Keep col-6 space after Diary No.  --}}
                <div class="col-6"></div>

                <div class="col-2 text-right px-0">
                    <label for="date_from">Date From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_from" value="{{ $remember->D_DATE_from }}" name="date_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_to">Date To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_to" value="{{ $remember->D_DATE_to }}" name="date_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_LetterNo">Letter No</label>
                </div>
                <div class="col-4 form-group">
                    <input type="text" id="D_LetterNo" value="{{ $remember->D_LetterNo }}" name="D_LetterNo" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_SendersName">Received From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_SendersName" value="{{ $remember->D_SendersName }}" name="D_SendersName" class="form-control form-control-sm font-weight-bold">
                </div>
    
                <div class="col-2 text-right px-0">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-10 form-group ">
                    <input type="text" id="subject" value="{{ $remember->D_Subject }}" name="subject" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_from">Date In (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_from" value="{{ $remember->D_DateIN_from }}" name="date_in_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date In (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_to" value="{{ $remember->D_DateIN_to }}" name="date_in_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_out_from">Date Out (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_from" value="{{ $remember->D_DateOut_from }}"  name="date_out_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date out (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_to" value="{{ $remember->D_DateOut_to }}"  name="date_out_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedBy">Marked By</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedBy" value="{{ $remember->D_MarkedBy }}" name="D_MarkedBy" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedTo">Marked To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedTo" value="{{ $remember->D_MarkedTo }}" name="D_MarkedTo" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_Remarks">Remarks</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_Remarks" value="{{ $remember->D_Remarks }}" name="D_Remarks" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="offset-2 col-10 my-0">
                    <button class="btn dms-btn-primary mx-1 px-4">Search</button>
                    <a class="btn dms-btn-primary mx-1 px-4" href="/document/reset">Reset</a>
                    <a href="/" class="btn dms-btn-primary mx-1 px-4">Exit</a>
                    <button type="button" class="btn dms-btn-primary mx-1 px-4" data-toggle="modal" data-target="#createModal">Create Document</button>
                </div>

            </div>
        
        </form>
        @if( !empty($documents) )
            <div class="card mt-2">
                
                <div class="card-header pt-2 pb-1">
                    <h4 style="color: darkred">Search Results <span style="font-size: 1.2rem"> Total Documents: {{ $count }}.  </span> </h4>
                </div>

                <div class="card-body p-0" style="height:250px; overflow:scroll">
                    <div class="dms-wrapper">
                        <div class="dms-scroller">
                            <table class="table table-bordered dms-table" style="border:none">
                                <thead>
                                    <tr>
                                        <th class="dms-sticky-col-1" > View </th>
                                        <th class="dms-sticky-col-2"> Edit </th>
                                        <th class="dms-sticky-col-3"> Print </th>
                                        <th class="dms-sticky-col-4"> 
                                            Diary No
                                            <a href="/document/sort?column=D_diaryNo&order=asc" class="text-success"> <i data-feather="chevrons-up"></i></a>
                                            <a href="/document/sort?column=D_diaryNo&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th class="dms-sticky-col-5"> Letter No </th>
                                        <th style="width:5%"> 
                                            Date In
                                            <a href="/document/sort?column=D_DateIN&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DateIN&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th style="width:5%"> 
                                            DateOut
                                            <a href="/document/sort?column=D_DateOut&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DateOut&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th style="width:5%"> 
                                            Letter Date
                                            <a href="/document/sort?column=D_DATE&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DATE&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th> {{ $category == 2 ? 'Letter Addressed To' : 'Received From' }} </th>
                                        <th> Subject </th>
                                        <th> Marked To </th>
                                        <th> Copy To </th>
                                        <th> Marked By </th>
                                        <th> Remarks </th>
                                    </tr>    
                                </thead>

                                <tbody>
                                    @foreach ($documents as $document )
                                        <tr class="{{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}" >
                                            <td class="dms-sticky-col-1 {{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}"> 
                                                @if($document->D_fileno) <a target="_blank" href="/document/file/{{ $document->id }}" class="view"> View </a> 
                                                @else <a href="#">View</a>
                                                @endif 
                                            </td>
                                            <td class="dms-sticky-col-2 {{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}"> <a href="/document/view/{{ $document->id }}"> Edit </a> </td>
                                            <td class="dms-sticky-col-3 {{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}"> <a href="/document/print/{{ $document->id }}">Print </a> </td>
                                            <td class="dms-sticky-col-4 {{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}" > 
                                                <span> {{ $document->D_diaryNo }} </span>
                                            </td>
                                            <td class="dms-sticky-col-5 {{ $document->D_DateOut || $document->D_fileno ? '' : 'highlighted' }}"> {{ $document->D_LetterNo }} </td>
                                            <td> {{ $document->D_DateIN ? date('d-m-Y', strtotime($document->D_DateIN)) : '' }}</td>
                                            <td> {{ $document->D_DateOut ? date('d-m-Y', strtotime($document->D_DateOut)) : '' }}</td>
                                            <td> {{ $document->D_DATE ? date('d-m-Y', strtotime($document->D_DATE)) : '' }}</td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $document->D_SendersName }}"> {{ $document->category_id == 2 ? $document->D_LetteraddressedTo : $document->D_SendersName }}</td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $document->D_Subject }}"> {{ $document->D_Subject }}</td>
                                            <td> {{ $document->D_MarkedTo }}</td>
                                            <td> {{ $document->D_CopyTO }}</td>
                                            <td> {{ $document->D_MarkedBy }}</td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $document->D_Remarks }}"> {{ $document->D_Remarks }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{ $documents->links() }}

                </div>

            </div>
        @endif
    </div>

</div>

@include('templates.modal');

@endsection