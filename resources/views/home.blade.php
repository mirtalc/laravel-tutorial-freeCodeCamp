@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://scontent.fvlc2-1.fna.fbcdn.net/v/t1.0-0/s180x540/12439144_1738400546393339_7527358456954625324_n.png?_nc_cat=105&_nc_ohc=5wa5i2OJxCYAQk4dYL8bqZPxDzS3cfe6wSNTHB97I1PYOYOJ1LpHDXshQ&_nc_ht=scontent.fvlc2-1.fna&oh=31559172a64265af525c43b334678878&oe=5EAAB0B2" alt="">
        </div>

        <div class="col-9 pt-5">
            <div>
                <h1>{{ $user->username }}</h1>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-4">
            <img class="w-100" src="https://instagram.fvlc2-1.fna.fbcdn.net/v/t51.2885-15/e35/c92.0.496.496a/s480x480/76876296_2463502693772064_5406679365456228022_n.jpg?_nc_ht=instagram.fvlc2-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=M4LcvfBvwH8AX-9LNtF&oh=96895ce0c60c2cd8bdab097688d2806d&oe=5E97D017" alt="">
        </div>
        <div class="col-4">
            <img class="w-100" src="https://instagram.fvlc2-1.fna.fbcdn.net/v/t51.2885-15/e35/c92.0.496.496a/s480x480/76876296_2463502693772064_5406679365456228022_n.jpg?_nc_ht=instagram.fvlc2-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=M4LcvfBvwH8AX-9LNtF&oh=96895ce0c60c2cd8bdab097688d2806d&oe=5E97D017" alt="">
        </div>
        <div class="col-4">
            <img class="w-100" src="https://instagram.fvlc2-1.fna.fbcdn.net/v/t51.2885-15/e35/c92.0.496.496a/s480x480/76876296_2463502693772064_5406679365456228022_n.jpg?_nc_ht=instagram.fvlc2-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=M4LcvfBvwH8AX-9LNtF&oh=96895ce0c60c2cd8bdab097688d2806d&oe=5E97D017" alt="">
        </div>
    </div>


    <!-- //ML
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection