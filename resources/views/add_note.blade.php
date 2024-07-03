@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Create Notes!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>  

        <div class="card">
            <div class="card-header">
                <h4>Create notes</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store_notes') }}" method="post">
                    @csrf
                    <div class="col-6">
                        <label for="">Title</label>
                        <input type="text" required name="title" id="" cols="30" rows="10" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Notes</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection