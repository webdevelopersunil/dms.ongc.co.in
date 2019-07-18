@extends('layouts.app')

@section('content')

    <div class="flex flex-col" style="height: 100vh;">

        <div class="h-50 title-image-container">
            <div class="container">
                <img src="/images/ongc.png" class="ongc-logo" alt="ongc.logo">
            </div>
        </div>

        <div class="h-50 content-container d-flex">
            <div class="d-block dms-btn-container" style="flex:1">
                <a class="btn dms-btn-primary btn-block" href="/users/online"> VIEW LOGGED IN USERS </a>
                <a class="btn dms-btn-primary btn-block" href="#"> VIEW PENDING DOCUMENTS </a>
                <a class="btn dms-btn-primary btn-block" href="/reports/total"> VIEW TOTAL DOCUMENTS </a>
                <a class="btn dms-btn-primary btn-block" href="/reports/audit"> VIEW AUDIT LOGS </a>
                <a class="btn dms-btn-primary btn-block" href="/"> EXIT </a>
            </div>
            <div style="flex:3">
                <h1 class="dms-heading" >DMS <sup>+</sup> </h1>
            </div>

        </div>

    </div>

@endsection