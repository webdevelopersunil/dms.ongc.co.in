@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> View Total Documents </h5>
            <form action="/reports/total" method="post">
            @csrf
                
                <div class="d-flex mb-2">
                    <div class="col-3 form-group text-right">
                        <label for="date_from">From</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="date_from" class="form-control form-control-sm @error('date_from') is-invalid @enderror">
                        <div class="invalid-feedback"> @error('date_from') {{ $errors->first('date_from') }} @enderror </div>
                    </div>
                    <div class="form-group text-right">
                        <label for="date_to">To</label>
                    </div>
                    <div>
                        <input type="date" name="date_to" class="form-control form-control-sm mx-4 @error('date_to') is-invalid @enderror">
                        <div class="invalid-feedback mx-4"> @error('date_to') {{ $errors->first('date_to') }} @enderror </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn dms-btn-primary mx-1" href="/reports/total">Reset</a>
                    <button class="btn dms-btn-primary mx-1">View</button>
                    <a class="btn dms-btn-primary mx-1" href="/">Exit</a>
                </div>
            
            </form>

        </div>

    </div>

@endsection