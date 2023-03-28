@extends('layout')

@section('content')
<div class="row" id="app">
    <div class="card mt-5">
        <div class="car-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left text-center mt-5 mb-5">
                        <h1 class="text-center">{{ $qrcode->name }}</h1>
                        <img :src="avatar_url" alt="" v-if="avatar_url != null" class="img-github mt-3">
                    </div>
                </div>
            </div>

            <p>{{ $qrcode->bio }}</p>
            <p class="d-flex align-items-center justify-content-center">
                <a class="d-flex align-items-center m-5" href="{{ $qrcode->linkedin_url }}" target="_blank"><i class="fa fa-linkedin-square mr-2" aria-hidden="true"></i> Linkedin</a>
                <a class="d-flex align-items-center" href="{{ $qrcode->github_url }}" target="_blank"><i class="fa fa-github-square mr-2" aria-hidden="true"></i> Github</a>
            </p>
        </div>
    </div>
</div>
<style>
    a {
        text-decoration: none;
        color: black;
    }

    .mr-2 {
        margin-right: 10px;
    }

    i {
        font-size: 40px;
    }

    .img-github {
        border-radius: 100%;
        max-width: 100px;
    }
</style>
@endsection
@section('script')
<script>
    new Vue({
        el: '#app',
        data: {
            user: "{{ $qrcode->github_url }}",
            avatar_url: null
        },
        methods: {},
        mounted() {
            let github = this.user.split('github.com/')
            let user = encodeURI(github[1])
            axios.get('https://api.github.com/users/' + user)
                .then(res => {
                    return res.data
                })
                .then(res => {
                    this.avatar_url = res.avatar_url
                })
        }
    })
</script>
@endsection