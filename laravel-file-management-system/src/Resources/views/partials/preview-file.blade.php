@if($is_img && $src_thumb != "")
	
	<a class="tip-right preview" title="{{ __('Preview') }}"
	   data-featherlight="{{ str_replace('public/','',$src) }}" href="#">
		<i class=" icon-eye-open"></i>
	</a>

@elseif(($is_video || $is_audio) && in_array($file_array['extension'], $config['jplayer_exts']))
	<a class="tip-right modalAV {{ $is_audio ? 'audio' : 'video' }}"
	   title="{{ __('Preview') }}"
	   data-url="{{ route('gallery.previewMedia',['title' => $filename,'file' => $rfm_subfolder . $subdir . $file ]) }}"
	   href="javascript:void('');">
		<i class=" icon-eye-open"></i>
	</a>

@elseif(in_array($file_array['extension'], $config['cad_exts']))
	
	<a class="tip-right file-preview-btn" title="{{ __('Preview') }}"
	   data-url="{{ route('gallery.previewCad',['title' => $filename,'file' => $rfm_subfolder . $subdir . $file ]) }}"
	   href="javascript:void('');">
		<i class=" icon-eye-open"></i>
	</a>

@elseif($config['preview_text_files'] && in_array($file_array['extension'], $config['previewable_text_file_exts']))
	
	<a class="tip-right file-preview-btn" title="{{ __('Preview') }}"
	   data-url="{{ route('gallery.editOrPreviewFile',['sub_action' => 'preview','preview_mode' => 'text','title' => $filename,'file' => $rfm_subfolder . $subdir . $file]) }}"
	   href="javascript:void('');">
		<i class=" icon-eye-open"></i>
	</a>

@elseif($config['googledoc_enabled'] && in_array($file_array['extension'], $config['googledoc_file_exts']))
	
	<a class="tip-right file-preview-btn" title="{{ __('Preview') }}"
	   data-url="{{ route('gallery.editOrPreviewFile',['sub_action' => 'preview','preview_mode' => 'google','title' => $filename,'file' => $rfm_subfolder . $subdir . $file]) }}"
	   href="docs.google.com;">
		<i class=" icon-eye-open"></i>
	</a>

@else
	
	<a class="preview disabled"><i class="icon-eye-open icon-white"></i></a>

@endif