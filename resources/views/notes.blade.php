@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Notes!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>  

        <div class="col-md-4">
            <div class="tenant-box create-owner">
                <div class="txt">
                    <h4>{{ $notes->count() }} <span>All Notes</span></h4>
                    <a href="{{ route('create_notes') }}" class="black-btn">Create Notes</a>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($notes->count() > 0)
                @foreach ($notes as $note)
                    <div class="col-md-4">
                        <div class="card notes-box">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>{{ $note->title }}</h3>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <ul class="togg-btn">
                                            <li class="first"><i class="fal fa-ellipsis-h"></i></li>
                                            <ul class="togg-drop">
                                                <li class="first"><a href="{{ route('delete_notes', $note->id) }}">Delete</a></li>  
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ $note->content }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                No notes found.
            @endif
        </div>
    </div>
@endsection
