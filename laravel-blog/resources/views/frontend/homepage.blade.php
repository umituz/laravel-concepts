@extends('frontend.layouts.app')

@section('bg-img',asset('img/background.jpg'))
@section('title',ConfigHelper::getAppName())
@section('sub-heading',__("We're a digital product studio, transforming founders’ and product owners’ visions into featured digital products."))

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @forelse($posts as $post)
                    <div class="post-preview">
                        <a href="{{ route('postDetail',$post->slug) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                        </a>
                        <p class="post-subtitle">
                            {!! $post->introduction !!}
                        </p>
                        <p>{{ __('Voting Result') }} : {{ $post->voting_result }}</p>
                        <p class="post-meta">
                            @if(CheckHelper::isNotEmpty($post->user))
                                <i class="fa fa-user"></i>
                                {{ $post->user->name }}
                            @endif
                            <i class="fa fa-clock-o"></i>
                            {{ DateHelper::readableDateForHumans($post->published_at) }}

{{--                            <i class="fa fa-eye"></i>--}}
{{--                            {{ $post->uniqueViewCount() }}--}}

                            <i class="fa fa-"></i>
                        </p>
                    </div>
                @empty
                    {{ __('There is no data') }}
                @endforelse
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
