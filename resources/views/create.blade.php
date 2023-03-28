@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Card</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mt-2 mb-2" href="{{ route('qrcode.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('qrcode.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bio:</strong>
                        <textarea type="text" name="bio" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Linkedin URL:</strong>
                        <input type="text" name="linkedin_url" class="form-control" placeholder="Linkedin URL">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Github URL:</strong>
                        <input type="text" name="github_url" class="form-control" placeholder="Github URL">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success mt-3 mb-2">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection