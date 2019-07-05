@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> View Total Documents </h5>
            <form action="/reports/total" method="post">
            @csrf
                
                <div class="d-flex">
                    <div class="col-3 form-group text-right">
                        <label for="date_from">From</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="date_from" value="{{ $date_from }}" class="form-control form-control-sm">
                    </div>
                    <div class="form-group text-right">
                        <label for="date_to">To</label>
                    </div>
                    <div>
                        <input type="date" name="date_to" value="{{ $date_to }}" class="form-control form-control-sm mx-4">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn dms-btn-primary mx-1" href="/reports/total">Reset</a>
                    <button class="btn dms-btn-primary mx-1">View</button>
                    <a class="btn dms-btn-primary mx-1" href="/">Exit</a>
                </div>
            
            </form>

        </div>

        <div class="p-2 mb-4 bg-lightblue">
 
            <h5 class="m-2" > Total Documents: {{ $count }} </h5>

            <form action="/reports/category/files" method="post">
            @csrf

                <table class="table bg-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Action</th>
                            <th>Category</th>
                            <th>Subcategory Code</th>
                            <th>Subcategory</th>
                            <th>Total Documents</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                {{-- <td> <input type="checkbox" name="selected" id="selected" value="{{ $category->category }}">  </td> --}}
                                <td> <button formaction="/reports/category/{{ $category->category }}" type="submit" class="btn btn-link py-0">View</button></td>
                                <td> {{ $category->category }} </td>
                                <td></td>
                                <td></td>
                                <td> {{ $category->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="categories" value="{{ json_encode($categories) }}">
                <input type="hidden" name="count" value="{{ $count }}">
                <input type="hidden" name="date_from" value="{{ $date_from }}">
                <input type="hidden" name="date_to" value="{{ $date_to }}">
                {{-- <button class="btn btn-primary btn-sm"> View Documents </button> --}}
            </form>

        </div>

        @if( $documents->isNotEmpty() )

            <div class="p-2 mb-4 bg-lightblue">
                <div style="overflow-x:auto;">
                <table class="table bg-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Diary No</th>
                            <th>Date In</th>
                            <th>Letter No</th>
                            <th>Sender's Diary No</th>
                            <th>Letter Date</th>
                            <th>Received From</th>
                            <th>Subject</th>
                            <th>Marked To</th>
                            <th>Copy To</th>
                            <th>Date Out</th>
                            <th>Marked By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document )
                            <tr>
                                <td> <input type="checkbox" name="doc" id="doc"> </td>
                                <td> {{ $document->diary_no }} </td>
                                <td> {{ $document->date_in }} </td>
                                <td> {{ $document->file_no }} </td>
                                <td> {{ $document->sender_diary_no }}</td>
                                <td> {{ $document->file_date }}</td>
                                <td> {{ $document->received_from }}</td>
                                <td> {{ $document->subject }}</td>
                                <td> {{ $document->marked_to }}</td>
                                <td> {{ $document->copy_to }}</td>
                                <td> {{ $document->date_out }}</td>
                                <td> {{ $document->marked_by }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <button class="btn btn-primary">Print</button>
            </div>

        @endif

    </div>

@endsection