<div class="row-fluid ff-container">
    <div class="span12">
{{--        @if( ($ftp && !$ftp->isDir($config['ftp_base_folder'] . $config['upload_dir'] . $rfm_subfolder . $subdir)) ||--}}
{{--             (!$ftp && @opendir($config['current_path'] . $rfm_subfolder . $subdir) === FALSE)--}}
{{--           )--}}
{{--            <br/>--}}
{{--            <div class="alert alert-error">--}}
{{--                {{ __("There is an error! The upload folder there isn't. Check your config file") }}--}}
{{--            </div>--}}
{{--        @else--}}
            <h4 id="help">{{ __('Help') }}</h4>

            @if(isset($config['folder_message']))
                <div class="alert alert-block">{{ $config['folder_message'] }}</div>
            @endif

            @if($config['show_sorting_bar'])
                <div class="sorter-container {{ "list-view" . $view }}">

                    <div class="file-name">
                        <a class="sorter sort-name {{ $sort_by == 'name' ? (isset($descending) ? "descending" : "ascending") : null  }}"
                           href="javascript:void('')" data-sort="name">
                            {{ __('File Name') }}
                        </a>
                    </div>

                    <div class="file-date">
                        <a class="sorter sort-date {{ $sort_by == 'date' ? (isset($descending) ? "descending" : "ascending") : null }}"
                           href="javascript:void('')" data-sort="date">
                            {{ __('Date') }}
                        </a>
                    </div>

                    <div class="file-size">
                        <a class="sorter sort-size {{ $sort_by == 'size' ? (isset($descending) ? "descending" : "ascending") : null }}"
                           href="javascript:void('')" data-sort="size">
                            {{ __('Size') }}
                        </a>
                    </div>

                    <div class='img-dimension'>
                        {{ __('Dimension') }}
                    </div>

                    <div class='file-extension'>
                        <a class="sorter sort-extension {{ $sort_by == 'extension' ? (isset($descending) ? "descending" : "ascending") : null }}"
                           href="javascript:void('')" data-sort="extension">
                            {{ __('Type') }}
                        </a>
                    </div>

                    <div class='file-operations'>
                        {{ __('Operations') }}
                    </div>

                </div>
            @endif

            <input type="hidden" id="file_number" value="{{ $n_files }}"/>

            @include('laravel-gallery::body-ul')
    </div>
{{--    @endif--}}
</div>
