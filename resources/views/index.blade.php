@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>QrCode for Card Business!</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success mt-2 mb-2" href="{{ route('qrcode.create') }}"> Create New Card</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Linkedin URL</th>
                <th>Github URL</th>
                <th>QrCode</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($qrcodes as $qrcode)
            <tr>
                <td>{{ $qrcode->id }}</td>
                <td>{{ $qrcode->name }}</td>
                <td><a href="{{ $qrcode->linkedin_url }}" target="_blank">{{ $qrcode->linkedin_url }}</a></td>
                <td><a href="{{ $qrcode->github_url }}" target="_blank">{{ $qrcode->github_url }}</a></td>
                <td>{!! QrCode::size(50)->generate(route('qrcode.show', $qrcode->slug)) !!}</td>
                <td>
                    <form action="{{ route('qrcode.destroy',$qrcode->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('qrcode.showDetails',$qrcode->slug) }}">Show</a>
                        <a class="btn btn-warning" href="{{ route('qrcode.edit',$qrcode->slug) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection