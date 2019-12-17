@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">
            <form action="/document/view/{{ $document->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card p-2" >
                    <div class="row">
                        <div class="col-2">
                            <label><b>Category</b></label>
                        </div>
                        <div class="col-4">
                            <input readonly name="category_id" class="form-control" value="{{$document->category->cm_name}}">
                        </div>
                        <div class="col-2">
                            <label><b>Sub Category</b></label>
                        </div>
                        <div class="col-4">
                            @if($document->subcategory)
                            <input readonly name="subcategory_id" class="form-control" value="{{$document->subcategory->scm_head}}">
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END OF HEADING --}}
                
                {{-- <div class="mt-2">
                    <app-accordion :documents="{{ $references }}"></app-accordion>
                </div> --}}

                {{-- REFERENCE LIST --}}
                {{-- <div class="mt-2">
                    <div class="accordion" id="accordionReference">
                        @foreach ($references as $index=>$reference )

                        <div class="card mb-2">
                            <div class="card-header" id="header-{{ $reference->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $reference->id }}">
                                    Reference {{ $index + 1 }}
                                </button>
                            </h2>
                            </div>
                        
                            <div id="collapse-{{ $reference->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionReference">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 form-group text-right">
                                        <label for="diary_no">Diary No</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="text" id="diary_no" name="diary_no" value="{{ $reference->diary_no }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-2 form-group text-right">
                                        <label for="date_in" >Date In</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="date" id="date_in" name="date_in" value="{{ $reference->date_in }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-2 form-group text-right">
                                        <label for="file_no" >Letter/File No.</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="text" id="file_no" name="file_no" value="{{ $reference->file_no }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-2 form-group text-right">
                                        <label for="file_date">Letter/File Date</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="date" id="file_date" name="file_date" value="{{ $reference->file_date }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-2 form-group text-right">
                                        <label for="received_from">Received From</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="text" id="received_from" name="received_from" value="{{ $reference->received_from }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-2 form-group text-right">
                                        <label for="sender_diary_no">Sender's Dy No</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input type="text" id="sender_diary_no" name="sender_diary_no" value="{{ $reference->sender_diary_no }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="subject">Subject</label>
                                        <textarea name="subject" id="subject" rows="3" value="{{ $reference->subject }}" class="form-control">{{ $reference->subject }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}

                {{-- END OF REFERENCE LIST  --}}

                <div class="card p-2 pt-4 my-2 bg-aliceblue">
                    <div class="row">

                        @if( $document->category->id != 2 )

                        <div class="col-2 form-group text-right">
                            <label for="D_diaryNo">Diary No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="D_diaryNo" name="D_diaryNo" value="{{ $document->D_diaryNo }}" class="form-control form-control-sm @error('D_diaryNo') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_diaryNo') {{ $errors->first('D_diaryNo') }} @enderror </div>
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="D_DateIN" >Date In</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="D_DateIN" name="D_DateIN" value="{{ date('Y-m-d', strtotime($document->D_DateIN )) }}" class="form-control form-control-sm @error('D_DateIN') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_DateIN') {{ $errors->first('D_DateIN') }} @enderror </div>
                        </div>

                        @endif

                        <div class="col-2 form-group text-right">
                            <label for="D_LetterNo" >Letter/File No.</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_LetterNo" name="D_LetterNo" value="{{ $document->D_LetterNo }}" class="form-control form-control-sm @error('D_LetterNo') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_LetterNo') {{ $errors->first('D_LetterNo') }} @enderror </div>
                        </div>


                        <div class="col-2 form-group text-right">
                            <label for="D_DATE">Letter/File Date</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="D_DATE" name="D_DATE" value="{{ date('Y-m-d', strtotime($document->D_DATE )) }}" class="form-control form-control-sm @error('file_date') is-invalid @enderror">
                            <div class="invalid-feedback"> @error('D_DATE') {{ $errors->first('D_DATE') }} @enderror </div>
                        </div>
                        
                        @if($document->category->id == 2)

                            <div class="col-2 form-group text-right">
                                <label for="D_LetteraddressedTo">Letter Addressed To</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_LetteraddressedTo" name="D_LetteraddressedTo" value="{{ $document->D_LetteraddressedTo }}" class="form-control form-control-sm">
                            </div>


                            <div class="col-2 form-group text-right">
                                <label for="D_LetterSignedBy">Letter Signed By</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_LetterSignedBy" name="D_LetterSignedBy" value="{{ $document->D_LetterSignedBy }}"  class="form-control form-control-sm">
                            </div>

                        @else
                        
                            <div class="col-2 form-group text-right">
                                <label for="D_SendersName">Received From</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_SendersName" name="D_SendersName" value="{{ $document->D_SendersName }}" class="form-control form-control-sm @error('D_SendersName') is-invalid @enderror">
                                <div class="invalid-feedback"> @error('D_SendersName') {{ $errors->first('D_SendersName') }} @enderror </div>
                            </div>
                            
                            
                            <div class="col-2 form-group text-right">
                                <label for="D_SenderDYNo">Sender's Dy No</label>
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" id="D_SenderDYNo" name="D_SenderDYNo" value="{{ $document->D_SenderDYNo }}" class="form-control form-control-sm">
                            </div>

                        @endif
                        
                        
                        <div class="col-2 form-group text-right">
                            <label for="D_Subject">Subject</label>
                        </div>
                        <div class="col-10 form-group">
                            <textarea name="D_Subject" id="D_Subject" rows="3" value="{{ $document->D_Subject }}" class="form-control @error('D_Subject') is-invalid @enderror">{{ $document->D_Subject }}</textarea>
                            <div class="invalid-feedback"> @error('D_Subject') {{ $errors->first('D_Subject') }} @enderror </div>
                        </div>
                        
                        <div class="col-2 form-group text-right">
                            <label for="dealing_officer">Dealing Officer</label>
                        </div>
                        <div class="col-4 form-group">
                            <select type="text" name="dealing_officer" id="dealing_officer" class="form-control form-control-sm" >
                                <option value="" hidden>-</option>
                                @foreach ( \App\User::where('isDealingOfficer', true)->get() as $user)
                                    <option value="{{ $user->id }}" @if( $user->id == $document->dealing_officer ) selected="selected" @endif > {{ $user->name }} </option>
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
                            <input type="text" id="D_MarkedTo" name="D_MarkedTo" value="{{ $document->D_MarkedTo }}" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="D_CopyTO" >Copy To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="D_CopyTO" name="D_CopyTO" value="{{ $document->D_CopyTO }}" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="D_DateOut" >Date Out</label>
                        </div>
                        <div class="col-4 form-group ">
                            <input type="date" id="D_DateOut" name="D_DateOut" value="{{ $document->D_DateOut ? date('Y-m-d', strtotime($document->D_DateOut )) : null }}" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="D_MarkedBy">Marked By</label>
                        </div>
                        <div class="col-4 form-group">
                            {{-- <input type="text" id="marked_by" name="marked_by" value="{{ $document->marked_by }}" class="form-control form-control-sm"> --}}
                            <select name="D_MarkedBy" id="D_MarkedBy" class="form-control form-control-sm">
                                <option @if($document->D_MarkedBy == 'CMD') selected @endif>CMD</option>
                                <option @if($document->D_MarkedBy == 'EO') selected @endif>EO</option>
                                <option @if($document->D_MarkedBy == 'AKB') selected @endif>AKB</option>
                                <option @if($document->D_MarkedBy == 'RK') selected @endif>RK</option>
                                <option @if($document->D_MarkedBy == 'PKM') selected @endif>PKM</option>
                                <option @if($document->D_MarkedBy == 'DKA') selected @endif>DKA</option>
                                <option @if($document->D_MarkedBy == 'AKK') selected @endif>AKK</option>
                            </select>
                        </div>
                        <div class="offset-6 col-2 form-group text-right">
                            <label for="D_fileno">Scanned File</label>
                        </div>
                        <div class="col-4 form-group">
                            {{-- @if($document->file_url)
                                <a href="/storage/{{ $document->file_url }}">View File</a>
                            @else  --}}
                                <input type="text" value="{{ $document->D_fileno }}" name="D_fileno" id="D_fileno" placeholder="Enter scanned file name here" class="form-control form-control-sm">
                                {{-- <input type="file" name="file_url" id="file_url" class="form-control form-control-sm"> --}}
                            {{-- @endif --}}
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="D_Remarks">Remarks</label>
                        </div>
                        <div class="col-10 form-group">
                            <textarea name="D_Remarks" id="D_Remarks" value="{{ $document->D_Remarks }}" rows="3" class="form-control">{{ $document->D_Remarks }}</textarea>
                        </div>
                    </div>
                </div>
                <a href="#" id="scan" onclick="window.open('{{ $url }}','_blank','width=720,height=1280')"></a>
                {{-- END OF DOCUMENT OUR CARD --}}
        
                <div class="px-4 py-4">
                    <a href="/document/search?category={{ $document->category->id }}" class="btn dms-btn-primary mx-1 px-4">Search</a>
                    <button type="submit" formaction="/document/view/{{ $document->id }}" class="btn dms-btn-primary mx-1 px-4">Save</button>
                    <a href="/" class="btn dms-btn-primary mx-1 px-4">Cancel</a>
                    <a href="/" class="btn dms-btn-primary mx-1 px-4">Exit</a>
                    {{-- <a href="/reference/create/{{ $document->id }}" class="btn dms-btn-primary px-4 float-right">Add Reference</a> --}}
                </div>
            </form>
        </div>
    </div>

@endsection