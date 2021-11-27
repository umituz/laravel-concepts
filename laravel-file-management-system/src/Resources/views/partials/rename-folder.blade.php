<a href="javascript:void('')"
   class="tip-left edit-button rename-file-paths {{ ($config['rename_folders'] && !$file_prevent_rename) ? "rename-folder" : null }}"
   title="{{ __('Rename') }}" data-folder="1"
   data-permissions="{{ $directory_array['permissions'] }}">
	<i class="icon-pencil {{ (!$config['rename_folders'] || $file_prevent_rename) ? 'icon-white' : null }}"></i>
</a>