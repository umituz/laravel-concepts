<ul class="grid cs-style-2 {{ "list-view" . $view }}" id="main-item-container">
	@forelse ($directories as $directory_array)
		
		@php
			
			$file = $directory_array['file'] ?? '';

			if ($file == '.' ||
				(substr($file, 0, 1) == '.' && isset($directory_array['extension']) &&
					$directory_array['extension'] == GalleryHelper::fixStrToLower(__('Type_dir'))) ||
				(isset($directory_array['extension']) &&
					$directory_array['extension'] != GalleryHelper::fixStrToLower(__('Type_dir'))) ||
				($file == '..' && $subdir == '') ||
				in_array($file, $config['hidden_folders']) ||
				($filter != '' &&
					$n_files > $config['file_number_limit_js'] &&
					$file != ".." &&
					stripos($file, $filter) === false)) {
				continue;
			}

			$new_name = GalleryHelper::fixFileName($file);

			if ($config['filesystem'] == GalleryEnumeration::FTP && $file != '..' && $file != $new_name) {
				//rename
				GalleryHelper::renameFolder($config['current_path'] . $subdir . $file, $new_name);
				$file = $new_name;
			}

			//add in thumbs folder if not exist
			if ($file != '..') {
				/*if (!$ftp && !file_exists($thumbs_path . $file)) {*/
				if (!$config['filesystem'] == GalleryEnumeration::FTP) {

					GalleryHelper::createFolder(false, $thumbs_path . $file, $ftp, $config);

				}

			}

			$class_ext = 3;

			if ($file == '..' && trim($subdir) != '') {

				$src = explode("/", $subdir);

				unset($src[count($src) - 2]);

				$src = implode("/", $src);

				if ($src == '') $src = "/";

			} elseif ($file != '..') {

				$src = $subdir . $file . "/";

			}
		
		@endphp
		
		<li data-name="{{ $file }}"
		    class="{{ $file == '..' ? 'back' : 'dir'  }}{{ (!$config['multiple_selection']) ? 'no-selector' : null  }}" {{ ($filter != '' && stripos($file, $filter) === false) ? ' style="display:none;"' : null }}>
			
			<figure data-name="{{ $file }}" data-path="{{ $rfm_subfolder . $subdir . $file }}"
			        class="{{ $file == ".." ? 'back-' : null }}directory"
			        data-type="{{ $file != ".." ? 'dir' : null }}">
				
				@if($file == "..")
					<input type="hidden" class="path"
					       value="{{ str_replace('.', '', dirname($rfm_subfolder . $subdir)) }}"/>
					<input type="hidden" class="path_thumb" value="{{ dirname($thumbs_path) . "/" }}"/>
				@endif
				
				<a class="folder-link"
				   href="{{ route('gallery.index',$get_params . rawurlencode($src) . "&" . (isset($callback) ? 'callback=' . $callback . "&" : '') . uniqid()) }}">
					<div class="img-precontainer">
						<div class="img-container directory">
							<span></span>
							<img class="directory-img"
							     @if($file == "..")
							     data-src="{{ asset("{$config['publicPath']}/img/{$config['icon_theme']}/folder_back.png") }}"/>
							@else
								data-src="{{ asset("{$config['publicPath']}/img/{$config['icon_theme']}/folder.png") }}
								"/>
							@endif
						</div>
					</div>
					<div class="img-precontainer-mini directory">
						<div class="img-container-mini">
							<span></span>
							<img class="directory-img"
							     @if($file == "..")
							     data-src="{{ asset("{$config['publicPath']}/img/{$config['icon_theme']}/folder_back.png") }}"/>
							@else
								data-src="{{ asset("{$config['publicPath']}/img/{$config['icon_theme']}/folder.png") }}
								"/>
							@endif
						</div>
					</div>
					@if($file == "..")
						<div class="box no-effect">
							<h4>{{ __('Back') }}</h4>
						</div>
				
				</a>
				
				@else
					
					<div class="box">
						<h4 class="{{ $config['ellipsis_title_after_first_row'] ? 'ellipsis' : null }}">
							<a class="folder-link" data-file="{{ $file }}"
							   href="{{ route('gallery.index',$get_params . rawurlencode($src) . "&" . uniqid()) }}">
								{{ $file }}
							</a>
						</h4>
					</div>
					
					<input type="hidden" class="name" value="{{ $directory_array['file_lcase'] }}"/>
					
					<input type="hidden" class="date" value="{{ $directory_array['date'] }}"/>
					
					<input type="hidden" class="size" value="{{ $directory_array['size'] }}"/>
					
					<input type="hidden" class="extension"
					       value="{{ GalleryHelper::fixStrToLower(trans('Type_dir')) }}"/>
					
					<div class="file-date">{{ date(__('Date Type'), $directory_array['date']) }}</div>
					
					{{--                    @if($config['show_folder_size'])--}}
					
					{{--                        <div class="file-size">{{ GalleryHelper::makeSize($directory_array['size']) }}</div>--}}
					
					{{--                        <input type="hidden" class="nfiles" value="{{ $directory_array['nfiles'] }}"/>--}}
					
					{{--                        <input type="hidden" class="nfolders" value="{{ $directory_array['nfolders'] }}"/>--}}
					
					{{--                    @endif--}}
					
					<div class='file-extension'>{{ GalleryHelper::fixStrToLower(__('Type_dir')) }}</div>
					<figcaption>
						@if($config['rename_folders'])
							@include('laravel-gallery::partials.rename-folder')
						@endif
						@include('laravel-gallery::partials.delete-folder')
					</figcaption>
				@endif
			</figure>
		</li>
	@empty
	@endforelse
	
	<?php
	
	foreach ($files as $nu=>$file_array) {
	
	$file = $file_array['file'];
	
	if ($file == '.' || $file == '..' ||
		$file_array['extension'] == GalleryHelper::fixStrToLower(trans('Type_dir')) ||
		!GalleryHelper::checkExtension($file_array['extension']) || ($filter != '' &&
			$n_files > $config['file_number_limit_js'] &&
			stripos($file, $filter) === false))
		continue;
	foreach ($config['hidden_files'] as $hidden_file) {
		if (fnmatch($hidden_file, $file, FNM_PATHNAME)) {
			continue 2;
		}
	}
	
	$filename = substr($file, 0, '-' . (strlen($file_array['extension']) + 1));
	
	if (strlen($file_array['extension']) === 0) {
		
		$filename = $file;
		
	}
	
	if ($config['filesystem'] != GalleryEnumeration::FTP) {
		
		$file_path = $config['current_path'] . $rfm_subfolder . $subdir . $file;
		//check if file have illegal caracter

//                    if ($file != GalleryHelper::fixFileName($file)) {
//
//                        $file1 = GalleryHelper::fixFileName($file);
//                        $file_path1 = ($config['current_path'] . $rfm_subfolder . $subdir . $file1);
//
//
//        //			if (file_exists($file_path1)) {
//                        $i = 1;
//                        $info = pathinfo($file1);
//        //				while (file_exists($config['current_path'] . $rfm_subfolder . $subdir . $info['filename'] . ".[" . $i . "]." . $info['extension'])) {
//                        while ($config['current_path'] . $rfm_subfolder . $subdir . $info['filename'] . ".[" . $i . "]." . $info['extension']) {
//                            $i++;
//                        }
//                        $file1 = $info['filename'] . ".[" . $i . "]." . $info['extension'];
//                        $file_path1 = ($config['current_path'] . $rfm_subfolder . $subdir . $file1);
//        //			}
//
//                        $filename = substr($file1, 0, '-' . (strlen($file_array['extension']) + 1));
//
//                        if (strlen($file_array['extension']) === 0) {
//
//                            $filename = $file1;
//
//                        }
//
//                        GalleryHelper::renameFile($file_path, GalleryHelper::fixFileName($filename));
//
//                        $file = $file1;
//
//                        $file_array['extension'] = GalleryHelper::fixFileName($file_array['extension']);
//
//                        $file_path = $file_path1;
//
//                    }
	
	} else {
		$file_path = $config['ftp_base_url'] . $config['upload_dir'] . $rfm_subfolder . $subdir . $file;
	}
	
	$is_img = false;
	$is_video = false;
	$is_audio = false;
	$show_original = false;
	$show_original_mini = false;
	$mini_src = "";
	$src_thumb = "";
	
	if (in_array($file_array['extension'], $config['ext_img'])) {
		
		$src = $file_path;
		$is_img = true;
		
		$img_width = $img_height = "";
		
		if ($config['filesystem'] == GalleryEnumeration::FTP) {
			
			$mini_src = $src_thumb = $config['ftp_base_url'] . $config['ftp_thumbs_dir'] . $subdir . $file;
			
			$creation_thumb_path = "/" . $config['ftp_base_folder'] . $config['ftp_thumbs_dir'] . $subdir . $file;
			
		} else {
			
			$creation_thumb_path = $mini_src = $src_thumb = $thumbs_path . $file;
			
			//            if (!file_exists($src_thumb)) {

//                        if (!GalleryHelper::createImg($file_path, $creation_thumb_path, 122, 91, 'crop')) {
//
//                            $src_thumb = $mini_src = "";
//
//                        }
			
			//            }
			//check if is smaller than thumb
//                        list($img_width, $img_height, $img_type, $attr) = @getimagesize($file_path);
//
//                        if ($img_width < 122 && $img_height < 91) {
//
//                            $src_thumb = $file_path;
//
//                            $show_original = true;
//
//                        }

//                        if ($img_width < 45 && $img_height < 38) {
//
//                            $mini_src = $config['current_path'] . $rfm_subfolder . $subdir . $file;
//
//                            $show_original_mini = true;
//
//                        }
		}
	}
	
	$is_icon_thumb = false;
	
	$is_icon_thumb_mini = false;
	
	$no_thumb = false;
	
	if ($src_thumb == "") {
		
		$no_thumb = true;
		
		//        if (file_exists(public_path('img/') . $config['icon_theme'] . '/' . $file_array['extension'] . ".jpg")) {
		
		$src_thumb = $config['appUrl'] . '/' . $config['publicPath'] . '/img/' . $config['icon_theme'] . '/' . $file_array['extension'] . '.jpg';
		
		//        } else {
		//
		//            $src_thumb = $config['appUrl'] . '/' . $config['publicPath'] . '/img/' . $config['icon_theme'] . '/default.jpg';
		//
		//        }
		
		$is_icon_thumb = true;
	}
	
	if ($mini_src == "") {
		$is_icon_thumb_mini = false;
	}
	
	$class_ext = 0;
	
	if (in_array($file_array['extension'], $config['ext_video'])) {
		
		$class_ext = 4;
		
		$is_video = true;
		
	} elseif (in_array($file_array['extension'], $config['ext_img'])) {
		
		$class_ext = 2;
		
	} elseif (in_array($file_array['extension'], $config['ext_music'])) {
		
		$class_ext = 5;
		
		$is_audio = true;
		
	} elseif (in_array($file_array['extension'], $config['ext_misc'])) {
		
		$class_ext = 3;
		
	} else {
		
		$class_ext = 1;
		
	}
	
	?>
	
	@if((!(request('type') == 1 && !$is_img) && !((request('type') == 3 && !$is_video) && (request('type') == 3 && !$is_audio))) && $class_ext > 0)
		
		<li class="ff-item-type-{{ $class_ext }} file {{ (!$config['multiple_selection']) ? 'no-selector' : null }}"
		    data-name="{{ $file }}" {!! ($filter != '' && stripos($file, $filter) === false) ? ' style="display:none;"' : null !!}>
			
			<figure data-name="{{ $file }}" data-path="{{ $rfm_subfolder . $subdir . $file }}"
			        data-type="{{ $is_img ? 'img' : 'file' }}">
				
				@if($config['multiple_selection'])
					<div class="selector">
						<label class="cont">
							<input type="checkbox" class="selection" name="selection[]"
							       value="{{ $file }}">
							<span class="checkmark"></span>
						</label>
					</div>
				@endif
				
				<a href="javascript:void('')" class="link" data-file="{{ $file }}"
				   data-function="{{ $apply }}">
					
					<div class="img-precontainer">
						
						@if($is_icon_thumb)
							<div class="filetype">{{ $file_array['extension'] }}</div>
						@endif
						
						<div class="img-container">
							<img
								class="{{ $show_original ? "original" : null}}{{ $is_icon_thumb ? " icon" : null }}"
								data-src="{{ $src_thumb }}"
							>
						</div>
					</div>
					
					<div class="img-precontainer-mini {{ $is_img ? 'original-thumb' : null }}">
						
						<div
							class="filetype {{ $file_array['extension'] }}
							{{ (in_array($file_array['extension'], $config['editable_text_file_exts'])) ? 'edit-text-file-allowed' : null }}
							{{ (!$is_icon_thumb) ? 'hide': null }}">
							{{ $file_array['extension'] }}
						</div>
						
						<div class="img-container-mini">
							@if($mini_src != "")
								<img
									class="{{ $show_original_mini ? "original" : null }}{{ $is_icon_thumb_mini ? " icon" : null }}"
									data-src="{{ $mini_src }}">
							@endif
						</div>
					
					</div>
					
					@if($is_icon_thumb)
						<div class="cover"></div>
					@endif
					
					<div class="box">
						<h4 class="{{ $config['ellipsis_title_after_first_row'] ? 'ellipsis' : null }}">
							{{ $filename }}
						</h4>
					</div>
				</a>
				
				{{--                                    <input type="hidden" class="date" value="{{ $file_array['date'] }}"/>--}}
				{{----}}
				{{--                                    <input type="hidden" class="size" value="{{ $file_array['size'] }}"/>--}}
				
				<input type="hidden" class="extension" value="{{ $file_array['extension'] }}"/>
				
				<input type="hidden" class="name" value="{{ $file_array['file_lcase'] }}"/>
				
				{{--                                    <div class="file-date">{{ date(__('Date Type'), $file_array['date']) }}</div>--}}
				
				{{--                                    <div class="file-size">{{ GalleryHelper::makeSize($file_array['size']) }}</div>--}}
				
				<div class='img-dimension'>{{ $is_img ? $img_width . "x" . $img_height : null }}</div>
				
				<div class='file-extension'>{{ $file_array['extension'] }}></div>
				
				<figcaption>
					
					<form action="{{ route('gallery.fileDownload') }}" method="post" class="download-form"
					      id="form{{ $nu }}">
						
						@csrf
						
						<input type="hidden" name="path" value="{{ $rfm_subfolder . $subdir }}"/>
						
						<input type="hidden" class="name_download" name="name" value="{{ $file }}"/>
						
						@include('laravel-gallery::partials.download-file')
						
						@include('laravel-gallery::partials.preview-file')
						
						@include('laravel-gallery::partials.rename-file')
						
						@include('laravel-gallery::partials.delete-file')
					
					</form>
				</figcaption>
			
			</figure>
		
		</li>
	
	@endif
	<?php } ?>

</ul>
