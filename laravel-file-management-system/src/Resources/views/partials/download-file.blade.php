<a title="{{ __('Download') }}" class="tip-right"
   href="javascript:void('')" {!! $config['download_files'] ? "onclick=\"$('#form" . $nu . "').submit();\"" : null !!}>
	<i class="icon-download {{ (!$config['download_files']) ? 'icon-white' : null }}"></i>
</a>