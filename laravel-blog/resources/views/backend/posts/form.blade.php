@include('backend.partials.flash')

<div class="form-group">
    <label for="title">{{ __('Title') }}</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
           placeholder="{{ __('Title') }}" value="{{ $post->title ?? null }}">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="content">{{ __('Content') }}</label>
    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
              rows="3">{{ $post->content ?? null }}</textarea>
    @error('content')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
