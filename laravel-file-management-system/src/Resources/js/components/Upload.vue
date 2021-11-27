<template>
    <div>
        <h1>Upload Components</h1>
<!--        @if($config['upload_files'])-->
<!--        <div class="uploader">-->
<!--            <div class="flex">-->
<!--                <div class="text-center">-->
<!--                    <button class="btn btn-inverse close-uploader">-->
<!--                        <i class="icon-backward icon-white"></i> {{ __('Return File List') }}-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="space10"></div>-->
<!--                <div class="tabbable upload-tabbable"> &lt;!&ndash; Only required for left/right tabs &ndash;&gt;-->
<!--                    <div class="container1">-->
<!--                        <ul class="nav nav-tabs">-->


<!--                            @include('laravel-gallery::partials.upload-from-base')-->

<!--                            {{&#45;&#45;                        @todo HATALI ÇALIŞIYOR O YÜZDEN ŞİMDİLİK YORUM YAPILDI&#45;&#45;}}-->
<!--                            {{&#45;&#45;-->
<!--                            {{&#45;&#45;							@include('laravel-gallery::partials.upload-from-url')&#45;&#45;}}-->

<!--                        </ul>-->
<!--                        <div class="tab-content">-->
<!--                            <div class="tab-pane active" id="baseUpload">-->
<!--                                &lt;!&ndash; The file upload form used as target for the file upload widget &ndash;&gt;-->

<!--                                @include('laravel-gallery::partials.form-base-upload')-->

<!--                                @include('laravel-gallery::x-tmpl')-->

<!--                            </div>-->

<!--                            {{&#45;&#45;						@if($config['use-laravel-permission'])&#45;&#45;}}-->
<!--                            {{&#45;&#45;							@can('gallery.uploadFromUrl')&#45;&#45;}}-->
<!--                            {{&#45;&#45;								@if($config['url_upload'])&#45;&#45;}}-->
<!--                            {{&#45;&#45;									@include('laravel-gallery::partials.form-url-upload')&#45;&#45;}}-->
<!--                            {{&#45;&#45;								&#45;&#45;}}-->
<!--                            {{&#45;&#45;								@endif&#45;&#45;}}-->
<!--                            {{&#45;&#45;							@endcan&#45;&#45;}}-->
<!--                            {{&#45;&#45;						@else&#45;&#45;}}-->
<!--                            {{&#45;&#45;							@include('laravel-gallery::partials.form-url-upload')&#45;&#45;}}-->
<!--                            {{&#45;&#45;						@endif&#45;&#45;}}-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        @endif-->

    </div>
</template>

<script>
    export default {
        name: "Upload"
    }
</script>

<style scoped>

</style>
