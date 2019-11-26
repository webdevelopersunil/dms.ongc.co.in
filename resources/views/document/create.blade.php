@extends('layouts.app')

@section('content')

{{-- @if($errors->isNotEmpty())
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
@endif --}}

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">
            <form action="/document/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card p-2" >
                    <div class="row">
                        
                        <div class="col-2">
                            <label><b>Category</b></label>
                        </div>
                        <div class="col-4">
                            <select readonly class="form-control" name="category_id" >
                                <option value="{{ $category->id }}"> {{ $category->cm_name }} </option>
                            </select>
                        </div>

                        @if($subcategory)
                            <div class="col-2">
                                <label><b>Sub Category</b></label>
                            </div>
                            <div class="col-4">
                                <select readonly class="form-control" name="subcategory_id" >
                                    <option value="{{ $subcategory->id }}"> {{ $subcategory->scm_head }} </option>
                                </select>
                            </div>
                        @endif

                    </div>
                </div>
                {{-- END OF HEADING --}}

                <div class="card p-2 pt-4 my-2 bg-aliceblue">
                    <div class="row">

                        @if($category->id != 2)
                            
                            <div class="col-2 form-group text-right">
                                <label for="D_diaryNo">Diary No</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_diaryNo" name="D_diaryNo" value="{{ $diary }}" class="form-control form-control-sm @error('D_diaryNo') is-invalid @enderror">
                                <div class="invalid-feedback"> @error('D_diaryNo') {{ $errors->first('D_diaryNo') }} @enderror </div>
                            </div>

                            <div class="col-2 form-group text-right">
                                <label for="D_DateIN" >Date In</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="date" id="D_DateIN" name="D_DateIN" value={{ $today }} class="form-control form-control-sm @error('date_in') is-invalid @enderror">
                                <div class="invalid-feedback"> @error('D_DateIN') {{ $errors->first('D_DateIN') }} @enderror </div>
                            </div>
                        
                        @endif


                        <div class="col-2 form-group text-right">
                            <label for="D_LetterNo" >Letter/File No.</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_LetterNo" name="D_LetterNo" class="form-control form-control-sm @error('D_LetterNo') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_LetterNo') {{ $errors->first('D_LetterNo') }} @enderror </div>
                        </div>


                        <div class="col-2 form-group text-right">
                            <label for="D_DATE">Letter/File Date</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="D_DATE" name="D_DATE" value="{{ $category->id == 2 ? $today : null }}" class="form-control form-control-sm @error('D_DATE') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_DATE') {{ $errors->first('D_DATE') }} @enderror </div>
                        </div>


                        @if($category->id != 2)

                            <div class="col-2 form-group text-right">
                                <label for="D_SendersName">Received From</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_SendersName" name="D_SendersName" class="form-control form-control-sm @error('D_SendersName') is-invalid @enderror">
                                <div class="invalid-feedback"> @error('D_SendersName') {{ $errors->first('D_SendersName') }} @enderror </div>
                            </div>


                            <div class="col-2 form-group text-right">
                                <label for="D_SenderDYNo">Sender Dy No</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_SenderDYNo" name="D_SenderDYNo" class="form-control form-control-sm">
                            </div>

                        @else 

                            <div class="col-2 form-group text-right">
                                <label for="D_LetteraddressedTo">Letter Addressed To</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_LetteraddressedTo" name="D_LetteraddressedTo" class="form-control form-control-sm">
                            </div>


                            <div class="col-2 form-group text-right">
                                <label for="D_LetterSignedBy">Letter Signed By</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_LetterSignedBy" name="D_LetterSignedBy" class="form-control form-control-sm">
                            </div>

                        @endif


                        <div class="col-12 form-group">
                            <label for="D_Subject">Subject</label>
                            <textarea name="D_Subject" id="D_Subject" rows="3" class="form-control @error('D_Subject') is-invalid @enderror"></textarea>
                            <div class="invalid-feedback"> @error('D_Subject') {{ $errors->first('D_Subject') }} @enderror </div>
                        </div>

                        
                        <div class="col-6 form-group">
                            <label for="dealing_officer">Dealing Officer</label>
                            <select type="text" name="dealing_officer" id="dealing_officer" class="form-control form-control-sm" >
                                <option value="" hidden>-</option>
                                @foreach ( \App\User::all() as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- END OF DOCUMENT IN CARD --}}

                <div class="card p-2 pt-4 mt-2 bg-aliceblue" >
                    <div class="row">

                        <div class="col-2 form-group text-right">
                            <label for="D_MarkedTo">Marked To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_MarkedTo" name="D_MarkedTo" class="form-control form-control-sm">
                        </div>


                        <div class="col-2 form-group text-right">
                            <label for="D_CopyTO" >Copy To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_CopyTO" name="D_CopyTO" class="form-control form-control-sm">
                        </div>


                        <div class="col-2 form-group text-right">
                            <label for="D_DateOut" >Date Out</label>
                        </div>
                        <div class="col-4 form-group ">
                            <input type="date" id="D_DateOut" name="D_DateOut" class="form-control form-control-sm">
                        </div>


                        <div class="col-2 form-group text-right">
                            <label for="D_MarkedBy">Marked By</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_MarkedBy" name="D_MarkedBy" class="form-control form-control-sm">
                        </div>


                        <div class="offset-6 col-2 form-group text-right">
                            <label for="D_fileno">Scanned File</h5>
                        </div>
                        <div class="col-4 form-group">
                            {{-- <input type="file" name="file_url" id="file_url" class="form-control form-control-sm"> --}}
                            <input type="text" name="D_fileno" id="D_fileno" class="form-control form-control-sm">
                        </div>


                        <div class="col-12 form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="D_Remarks" id="D_Remarks" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                {{-- END OF DOCUMENT OUT CARD --}}
        
                <div class="px-4 py-3">
                    <a href="/document/search?category={{ $category->id }}" class="btn dms-btn-primary mx-1 px-4">Search</a>
                    <button type="submit" formaction="/document/create" class="btn dms-btn-primary mx-1 px-4">Save</button>
                    <a href="/"  class="btn dms-btn-primary mx-1 px-4">Cancel</a>
                    <a href="/"  class="btn dms-btn-primary mx-1 px-4">Exit</a>
                </div>
            </form>
        </div>
    </div>


@endsection