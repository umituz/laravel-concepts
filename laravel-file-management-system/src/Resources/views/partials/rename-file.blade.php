<a href="javascript:void('')"
   class="tip-left edit-button rename-file-paths {{ ($config['rename_files'] && !$file_prevent_rename) ? 'rename-file' : null}}"
   title="{{ trans('Rename') }}" data-folder="0"
   data-permissions="{{ $file_array['permissions'] }}">
	<i class="icon-pencil {{ (!$config['rename_files'] || $file_prevent_rename) ? 'icon-white' : null }}"></i>
</a>