@if($config['upload_files'])
	<div class="uploader">
		<div class="flex">
			<div class="text-center">
				<button class="btn btn-inverse close-uploader">
					<i class="icon-backward icon-white"></i> {{ __('Return File List') }}
				</button>
			</div>
			<div class="space10"></div>
			<div class="tabbable upload-tabbable"> <!-- Only required for left/right tabs -->
				<div class="container1">
					<ul class="nav nav-tabs">


							@include('laravel-gallery::partials.upload-from-base')

						{{--                        @todo HATALI ÇALIŞIYOR O YÜZDEN ŞİMDİLİK YORUM YAPILDI--}}
{{--
{{--							@include('laravel-gallery::partials.upload-from-url')--}}

					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="baseUpload">
							<!-- The file upload form used as target for the file upload widget -->

								@include('laravel-gallery::partials.form-base-upload')

							@include('laravel-gallery::x-tmpl')

						</div>

{{--						@if($config['use-laravel-permission'])--}}
{{--							@can('gallery.uploadFromUrl')--}}
{{--								@if($config['url_upload'])--}}
{{--									@include('laravel-gallery::partials.form-url-upload')--}}
{{--								--}}
{{--								@endif--}}
{{--							@endcan--}}
{{--						@else--}}
{{--							@include('laravel-gallery::partials.form-url-upload')--}}
{{--						@endif--}}
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
