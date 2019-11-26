@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> All Users </h5>
            
            <div class="mx-4">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="width:50%">NAME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr> 
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <form action="/user/{{ $user->id }}" method="post" class="form-inline">
                                    @csrf 
                                    @method('DELETE')
                                        <a href="/user/{{ $user->id }}" class="btn btn-sm btn-primary ml-4" > Show </a> 
                                        <button class="ml-2 btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="/user/create" class="btn btn-primary">Create User</a>

            </div>

        </div>

    </div>

@endsection