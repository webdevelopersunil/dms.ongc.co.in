@extends('layouts.app')

@section('content')
    
<div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">

            <h3 class="mx-4 mt-2 mb-4"> Unlock Category </h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->cm_name }} </td>
                            <td> {{ $category->cm_IsInUse ? 'LOCKED' : '' }} </td>
                            <td>
                                <form action="/category/unlock" method="post">
                                    @csrf 
                                    <input type="hidden" name="category" value="{{ $category->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Unlock</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

</div>
    

@endsection