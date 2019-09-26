@extends('layouts.app')

@section('content')

    <div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> Total Logged In Users: {{ $users->count() }} </h5>
            
            <table class="table bg-light">
                <thead class="thead-light">
                    <tr>
                        <th>User Name</th>
                        <th>Working On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td> <app-online page="{{ $user->working_on }}" :mode="{{ $user->is_online }}" ></app-online> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection