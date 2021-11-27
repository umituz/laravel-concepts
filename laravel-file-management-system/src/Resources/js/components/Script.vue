<template>
    <div>
        <h1>Script Vue</h1>
<!--        <script>-->
<!--            csrf_token = "{{ csrf_token() }}";-->
<!--            appLocale = "{{ app()->getLocale() }}";-->
<!--            appUrl = "{{ $config['appUrl'] }}";-->
<!--            prefixRoute = "{{ $config['prefixRoute'] }}";-->
<!--            prefixDirectory = "{{ '' }}";-->
<!--        </script>-->

<!--        <script src="https://code.jquery.com/jquery-1.12.4.min.js"-->
<!--                integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>-->
<!--        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"-->
<!--                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/plugins.js?v=9.14.0') }}"></script>-->
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.min.js"></script>-->

<!--        &lt;!&ndash; The Templates plugin is included to render the upload/download listings &ndash;&gt;-->
<!--        <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>-->
<!--        &lt;!&ndash; The Load Image plugin is included for the preview images and image resizing functionality &ndash;&gt;-->
<!--        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>-->
<!--        &lt;!&ndash; The Canvas to Blob plugin is included for image resizing functionality &ndash;&gt;-->
<!--        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>-->
<!--        &lt;!&ndash; The Iframe Transport is required for browsers without support for XHR file uploads &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.iframe-transport.js') }}"></script>-->
<!--        &lt;!&ndash; The basic File Upload plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload processing plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-process.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload image preview & resize plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-image.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload audio preview plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-audio.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload video preview plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-video.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload validation plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-validate.js') }}"></script>-->
<!--        &lt;!&ndash; The File Upload user interface plugin &ndash;&gt;-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/jquery.fileupload-ui.js') }}"></script>-->


<!--        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.js"></script>-->
<!--        <script type="text/javascript"-->
<!--                src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>-->
<!--        <script type="text/javascript"-->
<!--                src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>-->
<!--        <script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.0/tui-color-picker.js"></script>-->
<!--        <script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>-->
<!--        <script src="{{ asset($config['publicPath'] . '/js/modernizr.custom.js') }}"></script>-->

<!--        &lt;!&ndash; Le HTML5 shim, for IE6-8 support of HTML5 elements &ndash;&gt;-->
<!--        &lt;!&ndash;[if lt IE 9]>-->
<!--        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>-->
<!--        <![endif]&ndash;&gt;-->

<!--        <script type="text/javascript">-->
<!--            var ext_img = new Array("{{ implode("','", $config['ext_img']) }}");-->
<!--            var image_editor = "{{ $config['tui_active'] ? "true" : "false" }}"-->
<!--        </script>-->

<!--        <script src="{{ asset($config['publicPath'] . '/js/include.js?v=9.14.0') }}"></script>-->

<!--        <script>-->
<!--            var files_prevent_duplicate = [];-->
<!--            @isset($files_prevent_duplicate)-->
<!--            @forelse($files_prevent_duplicate as $key => $value)-->
<!--            files_prevent_duplicate["{{ $key }}"] = "{{ $value }}";-->
<!--            @empty-->
<!--            @endforelse-->
<!--            @endisset-->
<!--        </script>-->

<!--        &lt;!&ndash; loading div start &ndash;&gt;-->
<!--        <div id="loading_container" style="display:none;">-->
<!--            <div id="loading"-->
<!--                 style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>-->
<!--            <img id="loading_animation" src="{{ asset($config['publicPath'] . '/img/storing_animation.gif') }}" alt="loading"-->
<!--                 style="z-index:10001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%">-->
<!--        </div>-->
<!--        &lt;!&ndash; loading div end &ndash;&gt;-->

<!--        &lt;!&ndash; player div start &ndash;&gt;-->
<!--        <div class="modal hide" id="previewAV">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<!--                <h3>{{ __('Preview') }}</h3>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="row-fluid body-preview">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        &lt;!&ndash; player div end &ndash;&gt;-->
<!--        @if ( $config['tui_active'] )-->

<!--        <div id="tui-image-editor" style="height: 800px;" class="hide">-->
<!--            <canvas></canvas>-->
<!--        </div>-->

<!--        <script>-->
<!--            var tuiTheme = {-->
<!--            <?php foreach ($config['tui_defaults_config'] as $aopt_key => $aopt_val) {-->
<!--                if (!empty($aopt_val)) {-->
<!--                    echo "'$aopt_key':" . json_encode($aopt_val) . ",";-->
<!--                }-->
<!--            } ?>-->
<!--            };-->
<!--        </script>-->

<!--        <script>-->
<!--            if (image_editor) {-->
<!--                //TUI initial init with a blank image (Needs to be initiated before a dynamic image can be loaded into it)-->
<!--                var imageEditor = new tui.ImageEditor('#tui-image-editor', {-->
<!--                    includeUI: {-->
<!--                        loadImage: {-->
<!--                            path: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',-->
<!--                            name: 'Blank'-->
<!--                        },-->
<!--                        theme: tuiTheme,-->
<!--                        initMenu: 'filter',-->
<!--                        menuBarPosition: '<?php echo $config['tui_position'] ?>'-->
<!--                    },-->
<!--                    cssMaxWidth: 1000, // Component default value: 1000-->
<!--                    cssMaxHeight: 800,  // Component default value: 800-->
<!--                    selectionStyle: {-->
<!--                        cornerSize: 20,-->
<!--                        rotxatingPointOffset: 70-->
<!--                    }-->
<!--                });-->
<!--                //cache loaded image-->
<!--                imageEditor.loadImageFromURL = (function () {-->
<!--                    var cached_function = imageEditor.loadImageFromURL;-->

<!--                    function waitUntilImageEditorIsUnlocked(imageEditor) {-->
<!--                        return new Promise((resolve, reject) => {-->
<!--                            const interval = setInterval(() => {-->
<!--                                if (!imageEditor._invoker._isLocked) {-->
<!--                                    clearInterval(interval);-->
<!--                                    resolve();-->
<!--                                }-->
<!--                            }, 100);-->
<!--                        })-->
<!--                    }-->

<!--                    return function () {-->
<!--                        return waitUntilImageEditorIsUnlocked(imageEditor).then(() => cached_function.apply(this, arguments));-->
<!--                    };-->
<!--                })();-->

<!--                //Replace Load button with exit button-->
<!--                $('.tui-image-editor-header-buttons div').replaceWith('<button class="tui-image-editor-exit-btn" >{{ __('Exit') }}</button>');-->
<!--                $('.tui-image-editor-exit-btn').on('click', function () {-->
<!--                    exitTUI();-->
<!--                });-->
<!--                //Replace download button with save-->
<!--                $('.tui-image-editor-download-btn').replaceWith('<button class="tui-image-editor-save-btn" >{{ __('Save') }}</button>');-->
<!--                $('.tui-image-editor-save-btn').on('click', function () {-->
<!--                    saveTUI();-->
<!--                });-->

<!--                function exitTUI() {-->
<!--                    imageEditor.clearObjects();-->
<!--                    imageEditor.discardSelection();-->
<!--                    $('#tui-image-editor').addClass('hide');-->
<!--                }-->

<!--                function saveTUI() {-->
<!--                    show_animation();-->
<!--                    newURL = imageEditor.toDataURL();-->
<!--                    $.ajax({-->
<!--                        type: "POST",-->
<!--                        url: appUrl + "/admin/gallery/save-image",-->
<!--                        data: {-->
<!--                            url: newURL,-->
<!--                            path: $('#sub_folder').val() + $('#fldr_value').val(),-->
<!--                            name: $('#tui-image-editor').attr('data-name'),-->
<!--                            _token: csrf_token-->
<!--                        }-->
<!--                    }).done(function (msg) {-->
<!--                        exitTUI();-->
<!--                        d = new Date();-->
<!--                        $("figure[data-name='" + $('#tui-image-editor').attr('data-name') + "']").find('.img-container img').each(function () {-->
<!--                            $(this).attr('src', $(this).attr('src') + "?" + d.getTime());-->
<!--                        });-->
<!--                        $("figure[data-name='" + $('#tui-image-editor').attr('data-name') + "']").find('figcaption a.preview').each(function () {-->
<!--                            $(this).attr('data-url', $(this).data('url') + "?" + d.getTime());-->
<!--                        });-->
<!--                        hide_animation();-->
<!--                    });-->
<!--                    return false;-->
<!--                }-->
<!--            }-->
<!--        </script>-->
<!--        @endif-->
<!--        <script>-->
<!--            var ua = navigator.userAgent.toLowerCase();-->
<!--            var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");-->
<!--            if (isAndroid) {-->
<!--                $('li').draggable({disabled: true});-->
<!--            }-->
<!--        </script>-->

    </div>
</template>

<script>
    export default {
        name: "Script"
    }
</script>

<style scoped>

</style>