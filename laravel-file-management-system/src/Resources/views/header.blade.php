<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="brand">{{ __('Toolbar') }}</div>
            <div class="nav-collapse collapse">
                <div class="filters">
                    <div class="row-fluid">
                        <div class="span4 half">

                            @if($config['upload_files'])
                                @include('laravel-gallery::partials.upload-file')
                            @endif

                            @if($config['create_text_files'])
                                @include('laravel-gallery::partials.create-file')
                            @endif

                            @if($config['create_folders'])
                                @include('laravel-gallery::partials.create-folder')
                            @endif

                            @if($config['copy_cut_files'] || $config['copy_cut_dirs'])

                                @include('laravel-gallery::partials.paste-clipboard')

                                @include('laravel-gallery::partials.clear-clipboard')

                            @endif

                            <div id="multiple-selection" style="display:none;">

                                @if($config['multiple_selection'])

                                    @if($config['delete_files'])

                                        @include('laravel-gallery::partials.delete-multiple-files')
                                    @endif

                                    <button class="tip btn multiple-select-btn" title="{{ __('Select All') }}">
                                        <i class="icon-check"></i>
                                    </button>

                                    <button class="tip btn multiple-deselect-btn" title="{{ __('Deselect_All') }}">
                                        <i class="icon-ban-circle"></i>
                                    </button>

                                    @if($apply_type != "apply_none" && $config['multiple_selection_action_button'])
                                        <button class="btn multiple-action-btn btn-inverse"
                                                data-function="{{ $apply_type ?? null }}">
                                            {{ __('Select') }}
                                        </button>
                                    @endif

                                @endif
                            </div>

                        </div>

                        <div class="span2 half view-controller">

                            @include('laravel-gallery::partials.view-boxes')

                            @include('laravel-gallery::partials.view-list')

                            @include('laravel-gallery::partials.view-columns-list')

                        </div>

                        <div class="span6 entire types">

                            <span>{{ __('Filters') }}:</span>

                            @if(request('type') != 1 && request('type') != 3 && $config['show_filter_buttons'])

                                @include('laravel-gallery::partials.filter-file')

                                @include('laravel-gallery::partials.filter-image')

                                @include('laravel-gallery::partials.filter-archive')

                                @include('laravel-gallery::partials.filter-video')

                                @include('laravel-gallery::partials.filter-music')

                            @endif

                            @include('laravel-gallery::partials.filter-search')

                            @if($n_files > $config['file_number_limit_js'])
                                <label id="filter" class="btn"><i class="icon-play"></i></label>
                            @endif

                            <input id="select-type-all" name="radio-sort" type="radio" data-item="ff-item-type-all"
                                   class="hide"/>

                            <label id="ff-item-type-all" title="{{ __('All') }}"
                                   @if(request('type') == 1 || request('type') == 3)
                                   style="visibility: hidden;"
                                   @endif
                                   data-item="ff-item-type-all" for="select-type-all"
                                   style="margin-rigth:0px;"
                                   class="tip btn btn-inverse ff-label-type-all">{{ __('All') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
