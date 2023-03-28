@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-body text-center">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Card Generate</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mt-2 mb-2" href="{{ route('qrcode.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <p>Olá, me chamo <b>{{ $qrcode->name }}</b> e esse é meu card business!</p>
        <p>Leia o QrCode a seguir e confira as minhas redes sociais.</p>
        {!! QrCode::size(250)->generate(route('qrcode.show', $qrcode->slug)) !!}
    </div>
</div>

@endsection