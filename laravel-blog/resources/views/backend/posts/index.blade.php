@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Posts') }}</div>
                        @can('posts.create')
                            <div class="float-right">
                                <a class="btn btn-success" href="{{ route('posts.create') }}">
                                    {{ __('Create') }}
                                </a>
                            </div>
                        @endcan
                    </div>

                    <div class="card-body">

                        @include('backend.partials.flash')

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Author') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Published At') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>
                                        <a href="{{ route('postDetail',$post->slug) }}" target="_blank">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $post->user->name }}
                                    </td>
                                    <td>
                                        {{ $post->status  }}
                                    </td>
                                    <td>{{ DateHelper::isoFormat($post->published_at) }}</td>
                                    <td>{{ DateHelper::isoFormat($post->created_at) }}</td>
                                    <td>
                                        @can('posts.edit')
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('posts.edit',$post->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                        @if ($post->status == "DRAFT" || $post->status == "SCHEDULED")
                                            @can('posts.publish')
                                                <form method="POST" action="{{ route('posts.publish', $post->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        {{ __('Publish') }}
                                                    </button>
                                                </form>
                                            @endcan
                                        @else
                                            @can('posts.unpublish')
                                                <form method="POST" action="{{ route('posts.unpublish', $post->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        {{ __('Unpublish') }}
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif

                                        @can('posts.destroy')
                                            <form id="delete-form-{{ $post->id }}" method="post"
                                                  action="{{ route('posts.destroy',$post->id) }}" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a class="btn btn-danger btn-sm" href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $post->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }">
                                                {{ __('Delete') }}
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                {{ __('There is no data') }}
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
