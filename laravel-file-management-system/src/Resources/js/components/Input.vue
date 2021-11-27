<template>
    <div>
        <h1>Input Component</h1>
<!--        <input type="hidden" id="ftp" value="{{ !!$ftp }}"/>-->

<!--        <input type="hidden" id="popup" value="{{ $popup }}"/>-->

<!--        <input type="hidden" id="callback" value="{{ $callback }}"/>-->

<!--        <input type="hidden" id="crossdomain" value="{{ $crossdomain }}"/>-->

<!--        <input type="hidden" id="editor" value="{{ $editor }}"/>-->

<!--        <input type="hidden" id="view" value="{{ $view }}"/>-->

<!--        <input type="hidden" id="subdir" value="{{ $subdir }}"/>-->

<!--        <input type="hidden" id="field_id" value="{{ $field_id }}"/>-->

<!--        <input type="hidden" id="multiple" value="{{ $multiple }}"/>-->

<!--        <input type="hidden" id="type_param" value="{{ $type_param }}"/>-->

<!--        <input type="hidden" id="upload_dir" value="{{ $config['upload_dir'] }}"/>-->

<!--        <input type="hidden" id="cur_dir" value="{{ $cur_dir }}"/>-->

<!--        <input type="hidden" id="cur_dir_thumb" value="{{ $cur_dir_thumb }}"/>-->

<!--        <input type="hidden" id="insert_folder_name" value="{{ __('Insert Folder Name') }}"/>-->

<!--        <input type="hidden" id="rename_existing_folder" value="{{ __('Rename Existing Folder') }}"/>-->

<!--        <input type="hidden" id="new_folder" value="{{ __('New Folder') }}"/>-->

<!--        <input type="hidden" id="ok" value="{{ __('OK') }}"/>-->

<!--        <input type="hidden" id="cancel" value="{{ __('Cancel') }}"/>-->

<!--        <input type="hidden" id="rename" value="{{ __('Rename') }}"/>-->

<!--        <input type="hidden" id="lang_duplicate" value="{{ __('Duplicate') }}"/>-->

<!--        <input type="hidden" id="duplicate" value="{{ $config['duplicate_files'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="base_url" value="{{ $config['base_url'] }}"/>-->

<!--        <input type="hidden" id="ftp_base_url" value="{{ $config['ftp_base_url'] }}"/>-->

<!--        <input type="hidden" id="storage_base_url" value="{{ $config['storage_base_url'] }}"/>-->

<!--        <input type="hidden" id="fldr_value" value="{{ $subdir ?? null }}"/>-->

<!--        <input type="hidden" id="sub_folder" value="{{ $rfm_subfolder }}"/>-->

<!--        <input type="hidden" id="return_relative_url" value="{{ $return_relative_url ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="file_number_limit_js" value="{{ $config['file_number_limit_js'] }}"/>-->

<!--        <input type="hidden" id="sort_by" value="{{ $sort_by ?? null }}"/>-->

<!--        <input type="hidden" id="descending" value="{{ $descending ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="current_url" value="{!! $currentUrl !!}"/>-->

<!--        <input type="hidden" id="lang_show_url" value="{{ __('Show Url') }}"/>-->

<!--        <input type="hidden" id="copy_cut_files_allowed" value="{{ $config['copy_cut_files'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="copy_cut_dirs_allowed" value="{{ $config['copy_cut_dirs'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="copy_cut_max_size" value="{{ $config['copy_cut_max_size'] }}"/>-->

<!--        <input type="hidden" id="copy_cut_max_count" value="{{ $config['copy_cut_max_count'] }}"/>-->

<!--        <input type="hidden" id="lang_copy" value="{{ __('Copy') }}"/>-->

<!--        <input type="hidden" id="lang_cut" value="{{ __('Cut') }}"/>-->

<!--        <input type="hidden" id="lang_paste" value="{{ __('Paste') }}"/>-->

<!--        <input type="hidden" id="lang_paste_here" value="{{ __('Paste Here') }}"/>-->

<!--        <input type="hidden" id="lang_paste_confirm" value="{{ __('Paste Confirm') }}"/>-->

<!--        <input type="hidden" id="lang_files" value="{{ __('Files') }}"/>-->

<!--        <input type="hidden" id="lang_folders" value="{{ __('Folders') }}"/>-->

<!--        <input type="hidden" id="lang_files_on_clipboard" value="{{ __('Files_ON_Clipboard') }}"/>-->

<!--        <input type="hidden" id="clipboard"-->
<!--               value="{{ (isset($_SESSION['RF']['clipboard']['path']) && trim($_SESSION['RF']['clipboard']['path']) != null) ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="lang_clear_clipboard_confirm" value="{{ __('Clear Clipboard Confirm') }}"/>-->

<!--        <input type="hidden" id="lang_file_permission" value="{{ __('File Permissions') }}"/>-->

<!--        <input type="hidden" id="chmod_files_allowed" value="{{ $config['chmod_files'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="chmod_dirs_allowed" value="{{ $config['chmod_dirs'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="lang_lang_change" value="{{ __('Lang_Change') }}"/>-->

<!--        <input type="hidden" id="edit_text_files_allowed" value="{{ $config['edit_text_files'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="lang_edit_file" value="{{ __('Edit File') }}"/>-->

<!--        <input type="hidden" id="lang_new_file" value="{{ __('New File') }}"/>-->

<!--        <input type="hidden" id="lang_filename" value="{{ __('File Name') }}"/>-->

<!--        <input type="hidden" id="lang_file_info" value="{{ GalleryHelper::fixStrToUpper(__('File Info')) }}"/>-->

<!--        <input type="hidden" id="lang_edit_image" value="{{ __('Edit Image') }}"/>-->

<!--        <input type="hidden" id="lang_error_upload" value="{{ __('Error_Upload') }}"/>-->

<!--        <input type="hidden" id="lang_select" value="{{ __('Select') }}"/>-->

<!--        <input type="hidden" id="lang_extract" value="{{ __('Extract') }}"/>-->

<!--        <input type="hidden" id="extract_files" value="{{ $config['extract_files'] ? 1 : 0 }}"/>-->

<!--        <input type="hidden" id="transliteration" value="{{ $config['transliteration'] ? "true" : "false" }}"/>-->

<!--        <input type="hidden" id="convert_spaces" value="{{ $config['convert_spaces'] ? "true" : "false" }}"/>-->

<!--        <input type="hidden" id="replace_with" value="{{ $config['convert_spaces'] ? $config['replace_with'] : "" }}"/>-->

<!--        <input type="hidden" id="lower_case" value="{{ $config['lower_case'] ? "true" : "false" }}"/>-->

<!--        <input type="hidden" id="show_folder_size" value="{{ $config['show_folder_size'] }}"/>-->

<!--        <input type="hidden" id="add_time_to_img" value="{{ $config['add_time_to_img'] }}"/>-->
    </div>
</template>

<script>
    export default {
        name: "Input"
    }
</script>

<style scoped>

</style>