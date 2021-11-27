@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @include('backend.partials.card-header')

                    <div class="card-body">

                        <form action="{{ route('posts.update',$post->id) }}" method="POST">

                            @csrf

                            @method('PUT')

                            @include('backend.posts.form',$post)

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
