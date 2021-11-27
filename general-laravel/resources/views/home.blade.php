@extends('layouts.app')

@section('content')
    <div class="container">
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

                    <div class="card-body">
                        <form action="{{ route('user.profile.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image">
                            <input type="submit" value="upload">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
