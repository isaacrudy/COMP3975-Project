@extends('layouts.master')
@section('title', 'Show Newsletter')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Newsletter</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('newsletters.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $newsletter->Title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $newsletter->Content }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ImageURL:</strong>
                {{ $newsletter->ImageURL }}
            </div>
        </div>
    </div>
@endsection
