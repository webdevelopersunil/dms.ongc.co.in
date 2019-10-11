@extends('layouts.app')

@section('content')

<div class="container mt-fit px-0 shadow" >

        @include('templates.alert')

        <div class="p-2 mb-4 bg-lightblue">
            <h5 class="mt-2 mb-4"> Filter Audit Logs </h5>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="audit-date-start">Start Date</label>
                    <input type="date" class="form-control" ref="auditDateStart" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-date-end">End Date</label>
                    <input type="date" class="form-control" ref="auditDateEnd" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-diary">Diary No</label>
                    <input type="text" class="form-control" ref="auditDiary" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-diary">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">All</option>
                        <option value="govt_letter">Govt. Letters</option>
                        <option value="cmd_office_correspondence"> CMD's Office Correspondence</option>
                        <option value="general">General | DDN Letters</option>
                        <option value="files">Files</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" @click="onAuditFilterClicked">Search</button>
        </div>

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="mt-2 mb-4"> {{ $params }} </h5>

            <table class="table bg-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Old</th>
                        <th>New</th>
                        <th>User</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $key=>$log)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $log->event }} </td>
                        <td> 
                            <ul>
                            @foreach($log->old_values as $key => $value)  
                                <li> {{ $key }} : {{ $value }} </li>
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($log->new_values as $key => $value)  
                                    <li> {{ $key }} : {{ $value }}  </li>
                                @endforeach
                            </ul>
                        </td>
                        <td> {{ $log->user->name }} </td>
                        <td> {{ $log->ip_address }} </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

</div>

@endsection