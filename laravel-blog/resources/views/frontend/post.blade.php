@extends('frontend.layouts.app')

@section('bg-img',asset('img/post-bg.jpg'))
@section('title',$post->title)

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @include('frontend.partials.flash')
                    <p class="post-meta">
                        @if(CheckHelper::isNotEmpty($post->user))
                            <i class="fa fa-user"></i>
                            {{ $post->user->name }}
                        @endif
                        <i class="fa fa-clock-o"></i>
                        {{ DateHelper::readableDateForHumans($post->published_at) }}
                        <i class="fa fa-eye"></i>
                        {{ $post->uniqueViewCount() }}
                        <i class="fa fa-"></i>
                    </p>
                    <p class="content">{!! $post->content !!}</p>
                    <p>{{ __('Voting Result') }} : {{ $post->voting_result }}</p>
                    @auth
                        @if(CheckHelper::isNotEmpty($vote))
                            <p>{{ __('Your Vote') }} : {{ $vote->vote }}&nbsp</p>
                            <form id="delete-form-{{ $vote->id }}" method="post"
                                  action="{{ route('removePostVote',$vote->id) }}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a class="btn btn-danger btn-sm" href="" onclick="
                                if(confirm('Are you sure, You want to remove your vote?'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $vote->id }}').submit();
                                }
                                else{
                                event.preventDefault();
                                }">
                                <i class="fa phpdebugbar-fa-close"></i> &nbsp;

                                {{ __('Remove My Vote') }}
                            </a>
                            @endcan
                            </p>
                            @if(!CheckHelper::isNotEmpty($vote))
                                <form action="{{ route('addPostVote',$post->id) }}" class="form-inline"
                                      method="post">
                                    @csrf
                                    <label for="vote">{{ __('Vote') }}: </label>

                                    <input class="form-control form-control-sm  @error('vote') is-invalid @enderror"
                                           type="number" id="vote" name="vote"
                                           min="1" value="3" max="5">

                                    <button type="submit" class="btn btn-success btn-sm">{{ __('Vote Now') }}</button>

                                    @error('vote')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </form>
                            @endif
                        @endauth
                        <ul class="pager">
                            @if(CheckHelper::isNotEmpty($previousPost))
                                <li class="previous">
                                    <a href="{{ $previousPost->slug }}">&larr; {{ __('Previous Post') }} </a>
                                </li>
                            @endif
                            @if(CheckHelper::isNotEmpty($nextPost))
                                <li class="next">
                                    <a href="{{ $nextPost->slug }}"> {{ __('Next Post') }} &rarr;</a>
                                </li>
                            @endif
                        </ul>
                </div>
            </div>
        </div>
    </article>
@endsection
