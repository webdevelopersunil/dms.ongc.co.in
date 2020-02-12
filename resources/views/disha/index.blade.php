@extends('layouts.app')

@section('content')

<div class="container mt-fit px-0 shadow" >

    @include('templates.alert')

    <div class="card p-2 mb-4 bg-lightblue">
        <table class="table table-bordered bg-white">
            <thead class="thead-light">
                <tr>
                    <th>Sl.no</th>
                    <th>File No</th>
                    <th>Subject</th>
                    <th>Date In</th>
                    <th>Date Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $index => $document)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td> <a href="/disha/{{ $document->id }}"> {{ $document->D_LetterNo }} </a> </td>
                        <td> {{ $document->D_Subject }}</td>
                        <td> {{ $document->D_DateIN }}</td>
                        <td> {{ $document->D_DateOut }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
    
@endsection