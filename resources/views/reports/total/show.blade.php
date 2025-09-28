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
                                
                                <td> <button formaction="/reports/category/{{ $category->category_id }}" type="submit" class="btn btn-link py-0">View</button></td>
                                <td> {{ $category->category_id != 0 ? \App\Category::find($category->category_id)->cm_name : '' }} </td>
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
                    <table class="table bg-light" style="width:300vw">
                        <thead class="thead-light">
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Diary No</th>
                                <th>Date In</th>
                                <th>Letter No</th>
                                <th>Sender's Diary No</th>
                                <th>Letter Date</th>
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
                                    {{-- <td> <input type="checkbox" name="doc" id="doc"> </td> --}}
                                    <td> {{ $document->D_diaryNo }} </td>
                                    <td> {{ $document->D_DateIN }} </td>
                                    <td> {{ $document->D_fileno }} </td>
                                    <td> {{ $document->D_SenderDYNo }}</td>
                                    <td> {{ $document->D_DATE }}</td>
                                    <td> {{ $document->D_Subject }}</td>
                                    <td> {{ $document->D_MarkedTo }}</td>
                                    <td> {{ $document->D_CopyTO }}</td>
                                    <td> {{ $document->D_DateOut }}</td>
                                    <td> {{ $document->D_MarkedBy }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $documents->links() }}
                </div>
                <a class="btn btn-primary" href="/reports/total/export">Export to Excel</a>
            </div>

        @endif

    </div>

@endsection