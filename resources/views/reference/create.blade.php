@extends('layouts.app')

@section('content')

@if($errors->isNotEmpty())
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
@endif

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h3 class="m-3"> Add Reference </h3>

            <form action="/reference/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card p-2" >
                    <div class="row">
                        <div class="col-2">
                            <label><b>Category</b></label>
                        </div>
                        <div class="col-4">
                            {{-- <input readonly class="form-control" name="category" value="{{$document->category}}"> --}}
                            <select name="category" id="category" class="form-control">
                                <option value="govt_letters" {{ $document->category == 'govt_letters' ? 'selected' : '' }} >Govt. Letters</option>
                                <option value="cmd_office_correspondence" {{ $document->category == 'cmd_office_correspondence' ? 'selected' : '' }} >CMD's Office Correspondence</option>
                                <option value="general" {{ $document->category == 'general' ? 'selected' : '' }} >General | DDN Letters</option>
                                <option value="files" {{ $document->category == 'files' ? 'selected' : '' }} >Files</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label><b>Sub Category</b></label>
                        </div>
                        <div class="col-4">
                            <select name="subcategory" id="subcategory" class="form-control">
                                <option value=""> Nil </option>
                                <option value="secret_letter" {{ $document->subcategory == 'secret_letter' ? 'selected' : '' }} >CMD|01 Secret Letters</option>
                                <option value="special_reply" {{ $document->subcategory == 'special_reply' ? 'selected' : '' }} >CMD|02 Special Reply of Misc</option>
                                <option value="ministry_correspondence" {{ $document->subcategory == 'ministry_correspondence' ? 'selected' : '' }} >CMD|03 Ministry's Correspondence</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- END OF HEADING --}}

                <div class="card p-2 pt-4 my-2 bg-aliceblue">
                    <div class="row">
                        <div class="col-2 form-group text-right">
                            <label for="diary_no">Diary No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="diary_no" name="diary_no" value="{{ $document->diary_no }}" class="form-control form-control-sm @error('diary_no') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('diary_no') {{ $errors->first('diary_no') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="date_in" >Date In</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="date_in" name="date_in" class="form-control form-control-sm @error('date_in') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('date_in') {{ $errors->first('date_in') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_no" >Letter/File No.</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="file_no" name="file_no" class="form-control form-control-sm @error('file_no') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('file_no') {{ $errors->first('file_no') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_date">Letter/File Date</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="file_date" name="file_date" class="form-control form-control-sm @error('file_date') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('file_date') {{ $errors->first('file_date') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="received_from">Received From</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="received_from" name="received_from" class="form-control form-control-sm @error('received_from') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('received_from') {{ $errors->first('received_from') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="sender_diary_no">Sender's Dy No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="sender_diary_no" name="sender_diary_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 form-group">
                            <label for="subject">Subject</label>
                            <textarea name="subject" id="subject" value="{{ $document->subject }}" rows="3" class="form-control @error('subject') is-invalid @enderror">{{ $document->subject }}</textarea>
                            <div class="invalid-feedback"> @error('subject') {{ $errors->first('subject') }} @enderror </div>
                        </div>
                    </div>
                </div>
                {{-- END OF DOCUMENT IN CARD --}}

                <div class="card p-2 pt-4 mt-2 bg-aliceblue" >
                    <div class="row">
                        <div class="col-2 form-group text-right">
                            <label for="marked_to">Marked To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="marked_to" name="marked_to" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="copy_to" >Copy To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="copy_to" name="copy_to" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="" >Date Out</label>
                        </div>
                        <div class="col-4 form-group ">
                            <input type="date" id="date_out" name="date_out" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_date">Marked By</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="marked_by" name="marked_by" class="form-control form-control-sm">
                        </div>
                        <div class="offset-6 col-2 form-group text-right">
                            <label for="file_url">Scanned File</h5>
                        </div>
                        <div class="col-4 form-group">
                            <input type="file" name="file_url" id="file_url" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                {{-- END OF DOCUMENT OUR CARD --}}
        
                <div class="px-4 py-3">
                    <a href="/document/search" class="btn dms-btn-primary mx-1 px-4">Search</a>
                    <button type="submit" formaction="/reference/create" class="btn dms-btn-primary mx-1 px-4">Save</button>
                    <a href="/"  class="btn dms-btn-primary mx-1 px-4">Cancel</a>
                    <a href="/"  class="btn dms-btn-primary mx-1 px-4">Exit</a>
                </div>
            </form>
        </div>
    </div>


@endsection