<template>
    <div>
        <h1>BreadCrumb Component</h1>
<!--        <div class="row-fluid">-->
<!--            <ul class="breadcrumb">-->

<!--                <li class="pull-left">-->
<!--                    <a href="{{ $link }}/">-->
<!--                        <i class="icon-home"></i>-->
<!--                    </a>-->
<!--                </li>-->

<!--                <li>-->
<!--                    <span class="divider">/</span>-->
<!--                </li>-->

<!--                @if(!empty($bc))-->

<!--                @forelse($bc as $k => $b)-->

<!--                @php $tmp_path .= $b ?? '' . "/"; @endphp-->

<!--                @if($k == count($bc) - 2)-->

<!--                <li class="active">{{ $b }}</li>-->

<!--                @elseif($b != "")-->

<!--                <li><a href="{{ $link . $tmp_path }}">{{ $b }}</a></li>-->

<!--                <li><span class="divider">{{ "/" }}</span></li>-->

<!--                @endif-->

<!--                @empty-->

<!--                @endforelse-->

<!--                @endif-->

<!--                <li class="pull-right">-->
<!--                    <a class="btn-small" href="javascript:void('')" id="info">-->
<!--                        <i class="icon-question-sign"></i>-->
<!--                    </a>-->
<!--                </li>-->

<!--                <li class="nav-item dropdown pull-right">-->

<!--                    <a class="nav-link" href="#" id="navbarDropdown" role="button"-->
<!--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        @isset($settings)-->
<!--                        <img-->
<!--                                src="{{ $settings['staticFilePath']  . 'img/lang/' . str_replace('_', '-', app()->getLocale()) }}.svg"-->
<!--                                width="15">-->
<!--                        @endisset-->
<!--                        <i class="fas fa-chevron-down ml-2"></i>-->
<!--                    </a>-->

<!--                    @todo BURASI DAHA SONRA YAPILACAK-->
<!--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
<!--                        @forelse($languages as $lang)-->
<!--                        <a class="dropdown-item"-->
<!--                           href="{{ route('changeLocaleForBackend', $lang->code) }}">-->
<!--                            <img src="{{ $settings['staticFilePath'] . 'img/lang/' . $lang->code }}.svg"-->
<!--                                 width="30" class="mr-3">-->
<!--                            {{ $lang->name }}-->
<!--                        </a>-->
<!--                        <br>-->
<!--                        @empty-->
<!--                        @endforelse-->
<!--                    </div>-->

<!--                </li>-->

<!--                <li class="pull-right">-->
<!--                    <a id="refresh" class="btn-small"-->
<!--                       href="{{ route('gallery.index',$get_params . $subdir . "&" . uniqid()) }}">-->
<!--                    <i class="icon-refresh"></i>-->
<!--                    </a>-->
<!--                </li>-->

<!--                <li class="pull-right">-->
<!--                    <div class="btn-group">-->
<!--                        <a class="btn dropdown-toggle sorting-btn" data-toggle="dropdown" href="#">-->
<!--                            <i class="icon-signal"></i>-->
<!--                            <span class="caret"></span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu pull-left sorting">-->
<!--                            <li class="text-center">-->
<!--                                <strong>{{ __('Sorting') }}</strong>-->
<!--                            </li>-->
<!--                            @todo HATALI ÇALIŞIYOR-->
<!--                            @include('laravel-gallery::partials.sorter-filename')-->
<!--                            @include('laravel-gallery::partials.sorter-date')-->
<!--                            @include('laravel-gallery::partials.sorter-size')-->
<!--                            @include('laravel-gallery::partials.sorter-extension')-->

<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->

<!--                <li>-->
<!--                    <small class="hidden-phone">-->
<!--                        {!! '<span id="files_number">' !!}-->
<!--				{!! $current_files_number . "</span> " . __('Files') . " - <span id='folders_number'>" . $current_folders_number . "</span> " . __('Folders') !!}-->
<!--                        )-->
<!--                    </small>-->
<!--                </li>-->

<!--                @todo KALDIRILDI METOD OLARAK-->
<!--                @if($config['show_total_size'])-->
<!--                <li>-->
<!--                    <small class="hidden-phone">-->
<!--		                <span title="{{ __('Total Size') . $config['MaxSizeTotal'] }}">-->
<!--		                    {{ __('Total Size') . ": " . GalleryHelper::makeSize($sizeCurrentFolder) . (($config['MaxSizeTotal'] !== false && is_int($config['MaxSizeTotal'])) ? '/' . $config['MaxSizeTotal'] . ' ' . __('MB') : '') }}-->
<!--		                </span>-->
<!--                    </small>-->
<!--                </li>-->
<!--                @endif-->

<!--            </ul>-->
<!--        </div>-->
    </div>
</template>

<script>
    export default {
        name: "Breadcrumb"
    }
</script>

<style scoped>

</style>