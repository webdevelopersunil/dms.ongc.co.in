@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> All Users </h5>
            
            <div class="mx-4">
                
                <ul>
                    @foreach ($users as $user)
                        <li> 
                            <form action="/user/{{ $user->id }}" method="post" class="form-inline">
                            @csrf 
                            @method('DELETE')
                                {{ $user->name }}
                                <a href="/user/{{ $user->id }}" class="ml-4" > Show </a> 
                                <button class="btn btn-link text-danger">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <a href="/user/create" class="btn btn-primary">Create User</a>

            </div>

        </div>

    </div>

@endsection