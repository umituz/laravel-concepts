@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @include('backend.partials.card-header')

                    <div class="card-body">

                        <form action="{{ route('posts.store') }}" method="POST">

                            @csrf

                            @include('backend.posts.form')

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="toggle('#datetime', this)"
                                            id="publish_now" checked
                                           name="publish_now">
                                    <label class="form-check-label" for="publish_now">
                                        {{ __('Publish Now') }}
                                    </label>
                                </div>
                            </div>

                            <div style="display: none" id="datetime" class="form-group">
                                <label>{{ __('Scheduled DateTime') }}:</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">{{ __('Create') }}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        toggle();
        function toggle(className, obj) {
            var $input = $(obj);
            if ($input.prop('checked')) $(className).hide();
            else $(className).show();
        }
    </script>
@endpush
