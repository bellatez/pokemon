@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
            <form action="{{Route('backup')}}" method="get">
                    <button class="btn btn-primary btn-block">Create Backup</button>
                </form>
            </div>
            <div class="col">
                <a href="/search" class="btn btn-success btn-block">Search Backup</a>
            </div>
            <div class="col">
            <form action="{{Route('delete')}}" method="get">
                    <button class="btn btn-danger btn-block">Delete Backup</button>
                </form>
            </div>
        </div>
    </div>
@endsection