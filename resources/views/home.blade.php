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
                <button class="btn dms-btn-primary btn-block" data-toggle="modal" data-target="#createModal"> CREATE </button>
                <button class="btn dms-btn-primary btn-block"> DISHA </button>
                <button class="btn dms-btn-primary btn-block"> SEARCH </button>
                <button class="btn dms-btn-primary btn-block"> REPORTS </button>
                <button class="btn dms-btn-primary btn-block"> EXIT </button>
            </div>
            <div style="flex:3">
                <h1 class="dms-heading" >DMS <sup>+</sup> </h1>
            </div>

        </div>

    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-4">
                    <div class="row form-group">
                        <label for="category" class="col-sm-3"> Select Category</label>
                        <div class="col-sm-9">
                            <select v-model="category" v-on:change="onSelectionChange" class="form-control form-control-sm">
                                <option v-for="category in categories" v-bind:value="category"> @{{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="category" class="col-sm-3"> Select SubCategory</label>
                        <div class="col-sm-9">
                            <select v-model="option" class="form-control form-control-sm">
                                <option v-for="option in category.subcategories">@{{ option }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
            </div>
        </div>
    </div>

@endsection
