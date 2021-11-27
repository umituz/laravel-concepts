<a href="javascript:void('')"
   class="tip-left erase-button {{ ($config['delete_folders'] && !$file_prevent_delete) ? "delete-folder": null }}"
   title="{{ __('Delete') }}"
   data-confirm="{{ __('Confirm Delete') }}">
	<i class="icon-trash {{ (!$config['delete_folders'] || $file_prevent_delete) ? 'icon-white' : null }}"></i>
</a>