<?php

/*
|--------------------------------------------------------------------------
| Optional security
|--------------------------------------------------------------------------
|
| if set to true only those will access RF whose url contains the access key(akey) like:
| <input type="button" href="../filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey" value="Files">
| in tinymce a new parameter added: filemanager_access_key:"myPrivateKey"
| example tinymce config:
|
| tiny init ...
| external_filemanager_path:"../filemanager/",
| filemanager_title:"Filemanager" ,
| filemanager_access_key:"myPrivateKey" ,
|
|--------------------------------------------------------------------------
| Path configuration
|--------------------------------------------------------------------------
| In this configuration the folder tree is
| root
|    |- source <- upload folder
|    |- thumbs <- thumbnail folder [must have write permission (755)]
|    |- filemanager
|    |- js
|    |   |- tinymce
|    |   |   |- plugins
|    |   |   |   |- responsivefilemanager
|    |   |   |   |   |- plugin.js
*/

$config = array(
	
	/*
	 * Your app url => default config('app.url')
	 * Dont use / as the last character
	 */
	'appUrl' => config('app.url'),
	
	/*
	 * Your prefix route
	 * Dont use / as the last or first character
	 */
	'prefixRoute' => 'laravel-gallery',
	
	/*
	 * Your public path for assets
	 * Dont use / as the last or first character
	 */
	'publicPath' => 'vendor/laravel-gallery',
	
	/*
	 * Your file system
	 * It can be storage, ftp, local
	 */
	'filesystem' => 'storage',
	
	/*
	 * Database details
	 */
	'database' => [
		'connection' => true, // to save record to database change to true, to not save change to false. Be sure that you have the right relationships each model
		'gallery' => [
			'identity' => 'id', // gallery base table identity
			'baseTable' => 'files', // store all file names vith full path (not including app url)
			'relationshipTable' => 'fileables', // store all file relationships ids
			'polymorphism' => 'fileable', // polymorphism name for relationship connect
			'relatedColumn' => 'file_id', // related column between base table and relationship table
		],
		'user' => [
			'identity' => 'id', // user table identity
			'table' => 'users', // user table name
			'relatedColumn' => 'created_by'  // related column between user table and relationship table
		],
	],
	
	/*
	 * Database details
	 */
	'model' => [
		'identity' => 'id',
		'uniqueColumn' => 'path'
	],
	
	/*
	 * Publish js and css files for webpack
	 * Dont use / as the last or first character
	 *
	 */
	'webpack' => [
		'folders' => [
			'js' => 'admin',
			'sass' => 'admin'
		]
	],
	/*
   |--------------------------------------------------------------------------
   | https://github.com/spatie/laravel-permission
   |--------------------------------------------------------------------------
   |
   | Use laravel permissions package or not for role and permissions
   |
	*/
	'use-laravel-permission' => false,
	
	/*
	 * Dont change array key
	 * Give your unique permission name as the value
	 */
	'permissions' => [
		'index' => 'gallery.index',
		'createFolder' => 'gallery.createFolder',
		'createFile' => 'gallery.createFile',
		'upload' => 'gallery.upload',
		'viewBoxes' => 'gallery.viewBoxes',
		'viewList' => 'gallery.viewList',
		'viewColumnsList' => 'gallery.viewColumnsList',
		'filterFile' => 'gallery.filterFile',
	],
	
	/*
	|--------------------------------------------------------------------------
	| DON'T TOUCH (base url (only domain) of site).
	|--------------------------------------------------------------------------
	|
	| without final / (DON'T TOUCH)
	|
	*/
	'base_url' => rtrim(env('GOOGLE_CLOUD_STORAGE_API_URI'), '/'),
//	'base_url' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . @$_SERVER['HTTP_HOST'],
	
	/*
	|--------------------------------------------------------------------------
	| relative path from filemanager folder to upload folder
	|--------------------------------------------------------------------------
	|
	| with final /
	|
	*/
	'current_path' => env('GOOGLE_CLOUD_STORAGE_API_URI'),
	
	/*
	|--------------------------------------------------------------------------
	| Unwanted Folders For Cloud
	|--------------------------------------------------------------------------
	|
	*/
	'unwantedFiles' => [
		'assets',
		'packages',
		'vendor',
		'blog',
		'temp'
	],
	
	/*
	|--------------------------------------------------------------------------
	| path from base_url to base of upload folder
	|--------------------------------------------------------------------------
	|
	| with start and final /
	|
	*/
	'upload_dir' => '/',
	
	/*
	|--------------------------------------------------------------------------
	| relative path from filemanager folder to thumbs folder
	|--------------------------------------------------------------------------
	|
	| with final /
	| DO NOT put inside upload folder
	|
	*/
	'thumbs_base_path' => env('GOOGLE_CLOUD_STORAGE_API_URI'), // . 'thumbs/'
	
	/*
	|--------------------------------------------------------------------------
	| path from base_url to base of thumbs folder
	|--------------------------------------------------------------------------
	|
	| with final /
	| DO NOT put inside upload folder
	|
	*/
	'thumbs_upload_dir' => '/thumbs/',
	
	/*
	|--------------------------------------------------------------------------
	| mime file control to define files extensions
	|--------------------------------------------------------------------------
	|
	| If you want to be forced to assign the extension starting from the mime type
	|
	*/
	'mime_extension_rename' => true,
	
	/*
    |--------------------------------------------------------------------------
    | Storage configuration BETA VERSION
    |--------------------------------------------------------------------------
    |
    | If you want enable ftp use write these parametres otherwise leave empty
    | Remember to set base_url properly to point in the ftp server domain and
    | upload dir will be ftp_base_folder + upload_dir so without final /
    |
    */
	'storage_brand' => 'gcs', // Storage brand example gcs, ss3 etc.
	'storage_connection' => true, // storage connection
	'storage_base_folder' => "",
	'storage_base_url' => env('GOOGLE_CLOUD_STORAGE_API_URI'),
	
	/*
	|--------------------------------------------------------------------------
	| FTP configuration BETA VERSION
	|--------------------------------------------------------------------------
	|
	| If you want enable ftp use write these parametres otherwise leave empty
	| Remember to set base_url properly to point in the ftp server domain and
	| upload dir will be ftp_base_folder + upload_dir so without final /
	|
	*/
	'ftp_host' => false, //put the FTP host
	'ftp_user' => "user",
	'ftp_pass' => "pass",
	'ftp_base_folder' => "base_folder",
	'ftp_base_url' => "", // http://site to ftp root
	// Directory where place files before to send to FTP with final /
	'ftp_temp_folder' => "../temp/",
	/*
	|---------------------------------------------------------------------------
	| path from ftp_base_folder to base of thumbs folder with start and final /
	|---------------------------------------------------------------------------
	*/
	'ftp_thumbs_dir' => '/thumbs/',
	'ftp_ssl' => false,
	'ftp_port' => 21,
	
	/* EXAMPLE
	'ftp_host'         => "host.com",
	'ftp_user'         => "test@host.com",
	'ftp_pass'         => "pass.1",
	'ftp_base_folder'  => "",
	'ftp_base_url'     => "http://host.com/testFTP",
	*/
	
	/*
	|--------------------------------------------------------------------------
	| Multiple files selection
	|--------------------------------------------------------------------------
	| The user can delete multiple files, select all files , deselect all files
	*/
	'multiple_selection' => true,
	
	/*
	|
	| The user can have a select button that pass a json to external input or pass the first file selected to editor
	| If you use responsivefilemanager tinymce extension can copy into editor multiple object like images, videos, audios, links in the same time
	|
	 */
	'multiple_selection_action_button' => true,
	
	/*
	|--------------------------------------------------------------------------
	| Access keys
	|--------------------------------------------------------------------------
	|
	| add access keys eg: array('myPrivateKey', 'someoneElseKey');
	| keys should only containt (a-z A-Z 0-9 \ . _ -) characters
	| if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
	| $username = 'Admin';
	| $salt = 'dsflFWR9u2xQa' (a hard coded string)
	| $akey = md5($username.$salt);
	| DO NOT use 'key' as access key!
	| Keys are CASE SENSITIVE!
	|
	*/
	
	'access_keys' => array(),
	
	//--------------------------------------------------------------------------------------------------------
	// YOU CAN COPY AND CHANGE THESE VARIABLES INTO FOLDERS config.php FILES TO CUSTOMIZE EACH FOLDER OPTIONS
	//--------------------------------------------------------------------------------------------------------
	
	/*
	|--------------------------------------------------------------------------
	| Maximum size of all files in source folder
	|--------------------------------------------------------------------------
	|
	| in Megabytes
	|
	*/
	'MaxSizeTotal' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Maximum upload size
	|--------------------------------------------------------------------------
	|
	| in Megabytes
	|
	*/
	'MaxSizeUpload' => 10,
	
	/*
	|--------------------------------------------------------------------------
	| File and Folder permission
	|--------------------------------------------------------------------------
	|
	*/
	'filePermission' => 0755,
	'folderPermission' => 0777,
	
	
	/*
	|--------------------------------------------------------------------------
	| default language file name
	|--------------------------------------------------------------------------
	*/
	'default_language' => "en_EN",
	
	/*
	|--------------------------------------------------------------------------
	| Icon theme
	|--------------------------------------------------------------------------
	|
	| Default available: ico and ico_dark
	| Can be set to custom icon inside filemanager/img
	|
	*/
	'icon_theme' => "ico",
	
	//Show or not total size in filemanager (is possible to greatly increase the calculations)
	'show_total_size' => false,
	//Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
	'show_folder_size' => false,
	//Show or not show sorting feature in filemanager
	'show_sorting_bar' => true,
	//Show or not show filters button in filemanager
	'show_filter_buttons' => true,
	//Show or not language selection feature in filemanager
	'show_language_selection' => true,
	//active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
	'transliteration' => false,
	//convert all spaces on files name and folders name with $replace_with variable
	'convert_spaces' => false,
	//convert all spaces on files name and folders name this value
	'replace_with' => "_",
	//convert to lowercase the files and folders name
	'lower_case' => false,
	
	//Add ?484899493349 (time value) to returned images to prevent cache
	'add_time_to_img' => false,
	
	
	//*******************************************
	//Images limit and resizing configuration
	//*******************************************
	
	// set maximum pixel width and/or maximum pixel height for all images
	// If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected
	// if you don't need a limit set both to 0
	'image_max_width' => 0,
	'image_max_height' => 0,
	'image_max_mode' => 'auto',
	/*
	#  $option:  0 / exact = defined size;
	#            1 / portrait = keep aspect set height;
	#            2 / landscape = keep aspect set width;
	#            3 / auto = auto;
	#            4 / crop= resize and crop;
	*/
	
	//Automatic resizing //
	// If you set $image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension
	// If you set width or height to 0 the script automatically calculates the other dimension
	// Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit
	'image_resizing' => false,
	'image_resizing_width' => 0,
	'image_resizing_height' => 0,
	'image_resizing_mode' => 'auto', // same as $image_max_mode
	'image_resizing_override' => false,
	// If set to TRUE then you can specify bigger images than $image_max_width & height otherwise if image_resizing is
	// bigger than $image_max_width or height then it will be converted to those values
	
	
	//******************
	//
	// WATERMARK IMAGE
	//
	//Watermark path or false
	'image_watermark' => false,//"../watermark.png",
	# Could be a pre-determined position such as:
	#           tl = top left,
	#           t  = top (middle),
	#           tr = top right,
	#           l  = left,
	#           m  = middle,
	#           r  = right,
	#           bl = bottom left,
	#           b  = bottom (middle),
	#           br = bottom right
	#           Or, it could be a co-ordinate position such as: 50x100
	'image_watermark_position' => 'br',
	# padding: If using a pre-determined position you can
	#         adjust the padding from the edges by passing an amount
	#         in pixels. If using co-ordinates, this value is ignored.
	'image_watermark_padding' => 10,
	
	//******************
	// Default layout setting
	//
	// 0 => boxes
	// 1 => detailed list (1 column)
	// 2 => columns list (multiple columns depending on the width of the page)
	//******************
	'default_view' => 0,
	
	//set if the filename is truncated when overflow first row
	'ellipsis_title_after_first_row' => true,
	
	//*************************
	//Permissions configuration
	//******************
	'delete_files' => true,
	'create_folders' => true,
	'delete_folders' => true,
	'upload_files' => true,
	'rename_files' => true,
	'rename_folders' => false, // Ümit UZ changed to false
	'duplicate_files' => true,
	'extract_files' => true,
	'copy_cut_files' => true, // for copy/cut files
	'copy_cut_dirs' => true, // for copy/cut directories
	'chmod_files' => true, // change file permissions
	'chmod_dirs' => true, // change folder permissions
	'preview_text_files' => true, // eg.: txt, log etc.
	'edit_text_files' => true, // eg.: txt, log etc.
	'create_text_files' => true, // only create files with exts. defined in $config['editable_text_file_exts']
	'download_files' => true, // allow download files or just preview
	
	// you can preview these type of files if $preview_text_files is true
	'previewable_text_file_exts' => array("bsh", "c", "css", "cc", "cpp", "cs", "csh", "cyc", "cv", "htm", "html", "java", "js", "m", "mxml", "perl", "pl", "pm", "py", "rb", "sh", "xhtml", "xml", "xsl", 'txt', 'log'),
	
	// you can edit these type of files if $edit_text_files is true (only text based files)
	// you can create these type of files if $config['create_text_files'] is true (only text based files)
	// if you want you can add html,css etc.
	// but for security reasons it's NOT RECOMMENDED!
	'editable_text_file_exts' => array('txt', 'log', 'xml', 'html', 'css', 'htm', 'js', ''),
	
	'jplayer_exts' => array("mp4", "flv", "webmv", "webma", "webm", "m4a", "m4v", "ogv", "oga", "mp3", "midi", "mid", "ogg", "wav"),
	
	'cad_exts' => array('dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'svg'),
	
	// Preview with Google Documents
	'googledoc_enabled' => true,
	'googledoc_file_exts' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'odt', 'odp', 'ods'),
	
	// defines size limit for paste in MB / operation
	// set 'FALSE' for no limit
	'copy_cut_max_size' => 100,
	// defines file count limit for paste / operation
	// set 'FALSE' for no limit
	'copy_cut_max_count' => 200,
	//IF any of these limits reached, operation won't start and generate warning
	
	//**********************
	//Allowed extensions (lowercase insert)
	//**********************
	'ext_img' => array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'ico'), //Images
	'ext_file' => array('doc', 'docx', 'rtf', 'pdf', 'xls', 'xlsx', 'txt', 'csv', 'html', 'xhtml', 'psd', 'sql', 'log', 'fla', 'xml', 'ade', 'adp', 'mdb', 'accdb', 'ppt', 'pptx', 'odt', 'ots', 'ott', 'odb', 'odg', 'otp', 'otg', 'odf', 'ods', 'odp', 'css', 'ai', 'kmz', 'dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'tiff', 'js'), //Files
	'ext_video' => array('mov', 'mpeg', 'm4v', 'mp4', 'avi', 'mpg', 'wma', "flv", "webm"), //Video
	'ext_music' => array('mp3', 'mpga', 'm4a', 'ac3', 'aiff', 'mid', 'ogg', 'wav'), //Audio
	'ext_misc' => array('zip', 'rar', 'gz', 'tar', 'iso', 'dmg'), //Archives
	
	
	//*********************
	//  If you insert an extensions blacklist array the filemanager don't check any extensions but simply block the extensions in the list
	//  otherwise check Allowed extensions configuration
	//*********************
	'ext_blacklist' => false,//['exe','bat','jpg'],
	
	//Empty filename permits like .htaccess, .env, ...
	'empty_filename' => false,
	
	/*
	|--------------------------------------------------------------------------
	| accept files without extension
	|--------------------------------------------------------------------------
	|
	| If you want to accept files without extension, remember to add '' extension on allowed extension
	|
	*/
	'files_without_extension' => false,
	
	//**********************
	// Hidden files and folders
	//**********************
	// set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)
	'hidden_folders' => array(),
	// set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
	'hidden_files' => array('config.php'),
	
	/*
   |--------------------------------------------------------------------------
   | Available languages
   |--------------------------------------------------------------------------
   */
	'available_languages' => array(
		'az_AZ' => 'Azərbaycan dili',
		'bg_BG' => 'български език',
		'ca' => 'Català, valencià',
		'cs' => 'čeština, český jazyk',
		'da' => 'Dansk',
		'de' => 'Deutsch',
		'el_GR' => 'ελληνικά',
		'en_EN' => 'English',
		'es' => 'Español',
		'fa' => 'فارسی',
		'fr_FR' => 'Français',
		'he_IL' => 'Hebrew (Israel)',
		'hr' => 'Hrvatski jezik',
		'hu_HU' => 'Magyar',
		'id' => 'Bahasa Indonesia',
		'it' => 'Italiano',
		'ja' => '日本',
		'lt' => 'Lietuvių kalba',
		'mn_MN' => 'монгол',
		'nb_NO' => 'Norsk bokmål',
		'nn_NO' => 'Norsk nynorsk',
		'nl' => 'Nederlands, Vlaams',
		'pl' => 'Język polski, polszczyzna',
		'pt_BR' => 'Português(Brazil)',
		'pt_PT' => 'Português',
		'ro' => 'Română',
		'ru' => 'Pусский язык',
		'sk' => 'Slovenčina',
		'sl' => 'Slovenski jezik',
		'sv_SE' => 'Svenska',
		'th_TH' => 'ไทย',
		'tr_TR' => 'Türkçe',
		'uk_UA' => 'Yкраїнська мова',
		'vi' => 'Tiếng Việt',
		'zh_CN' => '中文 (Zhōngwén), 汉语, 漢語',
		
		// source: http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
	),
	
	/*
   |--------------------------------------------------------------------------
   | Mime Types
   |--------------------------------------------------------------------------
   */
	'mime_types' => array(
		"application/postscript" => "ps",
		"audio/x-aiff" => "aiff",
		"text/plain" => "txt",
		"video/x-ms-asf" => "asx",
		"audio/basic" => "snd",
		"video/x-msvideo" => "avi",
		"application/x-bcpio" => "bcpio",
		"application/octet-stream" => "so",
		"image/bmp" => "bmp",
		"application/x-rar" => "rar",
		"application/x-bzip2" => "bz2",
		"application/x-netcdf" => "nc",
		"application/x-kchart" => "chrt",
		"application/x-cpio" => "cpio",
		"application/mac-compactpro" => "cpt",
		"application/x-csh" => "csh",
		"text/css" => "css",
		"application/x-director" => "dxr",
		"image/vnd.djvu" => "djvu",
		"application/x-dvi" => "dvi",
		"image/vnd.dwg" => "dwg",
		"application/epub" => "epub",
		"application/epub+zip" => "epub",
		"text/x-setext" => "etx",
		"application/andrew-inset" => "ez",
		"video/x-flv" => "flv",
		"image/gif" => "gif",
		"application/x-gtar" => "gtar",
		"application/x-gzip" => "tgz",
		"application/x-hdf" => "hdf",
		"application/mac-binhex40" => "hqx",
		"text/html" => "html",
		"text/htm" => "htm",
		"x-conference/x-cooltalk" => "ice",
		"image/ief" => "ief",
		"model/iges" => "igs",
		"text/vnd.sun.j2me.app-descriptor" => "jad",
		"application/x-java-archive" => "jar",
		"application/x-java-jnlp-file" => "jnlp",
		"image/jpeg" => "jpg",
		"application/x-javascript" => "js",
		"audio/midi" => "midi",
		"application/x-killustrator" => "kil",
		"application/x-kpresenter" => "kpt",
		"application/x-kspread" => "ksp",
		"application/x-kword" => "kwt",
		"application/vnd.google-earth.kml+xml" => "kml",
		"application/vnd.google-earth.kmz" => "kmz",
		"application/x-latex" => "latex",
		"audio/x-mpegurl" => "m3u",
		"application/x-troff-man" => "man",
		"application/x-troff-me" => "me",
		"model/mesh" => "silo",
		"application/vnd.mif" => "mif",
		"video/quicktime" => "mov",
		"video/x-sgi-movie" => "movie",
		"audio/mpeg" => "mp3",
		"video/mp4" => "mp4",
		"video/mpeg" => "mpeg",
		"application/x-troff-ms" => "ms",
		"video/vnd.mpegurl" => "mxu",
		"application/vnd.oasis.opendocument.database" => "odb",
		"application/vnd.oasis.opendocument.chart" => "odc",
		"application/vnd.oasis.opendocument.formula" => "odf",
		"application/vnd.oasis.opendocument.graphics" => "odg",
		"application/vnd.oasis.opendocument.image" => "odi",
		"application/vnd.oasis.opendocument.text-master" => "odm",
		"application/vnd.oasis.opendocument.presentation" => "odp",
		"application/vnd.oasis.opendocument.spreadsheet" => "ods",
		"application/vnd.oasis.opendocument.text" => "odt",
		"application/ogg" => "ogg",
		"video/ogg" => "ogv",
		"application/vnd.oasis.opendocument.graphics-template" => "otg",
		"application/vnd.oasis.opendocument.text-web" => "oth",
		"application/vnd.oasis.opendocument.presentation-template" => "otp",
		"application/vnd.oasis.opendocument.spreadsheet-template" => "ots",
		"application/vnd.oasis.opendocument.text-template" => "ott",
		"image/x-portable-bitmap" => "pbm",
		"chemical/x-pdb" => "pdb",
		"application/pdf" => "pdf",
		"image/x-portable-graymap" => "pgm",
		"application/x-chess-pgn" => "pgn",
		"text/x-php" => "php",
		"image/png" => "png",
		"image/x-portable-anymap" => "pnm",
		"image/x-portable-pixmap" => "ppm",
		"application/vnd.ms-powerpoint" => "ppt",
		"audio/x-realaudio" => "ra",
		"audio/x-pn-realaudio" => "rm",
		"image/x-cmu-raster" => "ras",
		"image/x-rgb" => "rgb",
		"application/x-troff" => "tr",
		"application/x-rpm" => "rpm",
		"text/rtf" => "rtf",
		"text/richtext" => "rtx",
		"text/sgml" => "sgml",
		"application/x-sh" => "sh",
		"application/x-shar" => "shar",
		"application/vnd.symbian.install" => "sis",
		"application/x-stuffit" => "sit",
		"application/x-koan" => "skt",
		"application/smil" => "smil",
		"image/svg+xml" => "svg",
		"application/x-futuresplash" => "spl",
		"application/x-wais-source" => "src",
		"application/vnd.sun.xml.calc.template" => "stc",
		"application/vnd.sun.xml.draw.template" => "std",
		"application/vnd.sun.xml.impress.template" => "sti",
		"application/vnd.sun.xml.writer.template" => "stw",
		"application/x-sv4cpio" => "sv4cpio",
		"application/x-sv4crc" => "sv4crc",
		"application/x-shockwave-flash" => "swf",
		"application/vnd.sun.xml.calc" => "sxc",
		"application/vnd.sun.xml.draw" => "sxd",
		"application/vnd.sun.xml.writer.global" => "sxg",
		"application/vnd.sun.xml.impress" => "sxi",
		"application/vnd.sun.xml.math" => "sxm",
		"application/vnd.sun.xml.writer" => "sxw",
		"application/x-tar" => "tar",
		"application/x-tcl" => "tcl",
		"application/x-tex" => "tex",
		"application/x-texinfo" => "texinfo",
		"image/tiff" => "tiff",
		"image/tiff-fx" => "tiff",
		"application/x-bittorrent" => "torrent",
		"text/tab-separated-values" => "tsv",
		"application/x-ustar" => "ustar",
		"application/x-cdlink" => "vcd",
		"model/vrml" => "wrl",
		"audio/x-wav" => "wav",
		"audio/x-ms-wax" => "wax",
		"image/vnd.wap.wbmp" => "wbmp",
		"application/vnd.wap.wbxml" => "wbxml",
		"video/x-ms-wm" => "wm",
		"audio/x-ms-wma" => "wma",
		"text/vnd.wap.wml" => "wml",
		"application/vnd.wap.wmlc" => "wmlc",
		"text/vnd.wap.wmlscript" => "wmls",
		"application/vnd.wap.wmlscriptc" => "wmlsc",
		"video/x-ms-wmv" => "wmv",
		"video/x-ms-wmx" => "wmx",
		"video/x-ms-wvx" => "wvx",
		"image/x-xbitmap" => "xbm",
		"application/xhtml+xml" => "xhtml",
		"application/xml" => "xml",
		"image/x-xpixmap" => "xpm",
		"text/xsl" => "xsl",
		"image/x-xwindowdump" => "xwd",
		"chemical/x-xyz" => "xyz",
		"application/zip" => "zip",
		"application/msword" => "doc",
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "docx",
		"application/vnd.openxmlformats-officedocument.wordprocessingml.template" => "dotx",
		"application/vnd.ms-word.document.macroEnabled.12" => "docm",
		"application/vnd.ms-excel" => "xls",
		"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => "xlsx",
		"application/vnd.openxmlformats-officedocument.spreadsheetml.template" => "xltx",
		"application/vnd.ms-excel.sheet.macroEnabled.12" => "xlsm",
		"application/vnd.ms-excel.template.macroEnabled.12" => "xltm",
		"application/vnd.ms-excel.addin.macroEnabled.12" => "xlam",
		"application/vnd.ms-excel.sheet.binary.macroEnabled.12" => "xlsb",
		"application/vnd.openxmlformats-officedocument.presentationml.presentation" => "pptx",
		"application/vnd.openxmlformats-officedocument.presentationml.template" => "potx",
		"application/vnd.openxmlformats-officedocument.presentationml.slideshow" => "ppsx",
		"application/vnd.ms-powerpoint.addin.macroEnabled.12" => "ppam",
		"application/vnd.ms-powerpoint.presentation.macroEnabled.12" => "pptm",
		"application/vnd.ms-powerpoint.template.macroEnabled.12" => "potm",
		"application/vnd.ms-powerpoint.slideshow.macroEnabled.12" => "ppsm",
	),
	
	/******************
	 * TUI Image Editor config
	 *******************/
	// Add or modify the options below as needed - they will be json encoded when added to the configuration so arrays can be utilized as needed
	'tui_active' => true,
	'tui_position' => 'bottom',
	// 'common.bi.image'                      => "../assets/images/logo.png",
	// 'common.bisize.width'                  => '70px',
	// 'common.bisize.height'                 => '25px',
	'common.backgroundImage' => 'none',
	'common.backgroundColor' => '#ececec',
	'common.border' => '1px solid #E6E7E8',
	
	// header
	'header.backgroundImage' => 'none',
	'header.backgroundColor' => '#ececec',
	'header.border' => '0px',
	
	// submenu primary color
	'submenu.backgroundColor' => '#ececec',
	'submenu.partition.color' => '#000000',
	
	// submenu labels
	'submenu.normalLabel.color' => '#000',
	'submenu.normalLabel.fontWeight' => 'normal',
	'submenu.activeLabel.color' => '#000',
	'submenu.activeLabel.fontWeight' => 'normal',
	
	// checkbox style
	'checkbox.border' => '1px solid #E6E7E8',
	'checkbox.backgroundColor' => '#000',
	
	// rango style
	'range.pointer.color' => '#333',
	'range.bar.color' => '#ccc',
	'range.subbar.color' => '#606060',
	
	'range.disabledPointer.color' => '#d3d3d3',
	'range.disabledBar.color' => 'rgba(85,85,85,0.06)',
	'range.disabledSubbar.color' => 'rgba(51,51,51,0.2)',
	
	'range.value.color' => '#000',
	'range.value.fontWeight' => 'normal',
	'range.value.fontSize' => '11px',
	'range.value.border' => '0',
	'range.value.backgroundColor' => '#f5f5f5',
	'range.title.color' => '#000',
	'range.title.fontWeight' => 'lighter',
	
	// colorpicker style
	'colorpicker.button.border' => '0px',
	'colorpicker.title.color' => '#000',
	
	
	//The filter and sorter are managed through both javascript and php scripts because if you have a lot of
	//file in a folder the javascript script can't sort all or filter all, so the filemanager switch to php script.
	//The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number
	'file_number_limit_js' => 500,
	
	/*******************
	 * URL upload
	 *******************/
	'url_upload' => true,
	
	//************************************
	//Thumbnail for external use creation
	//************************************
	
	// New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
	// If you want create images resized out of upload folder for use with external script you can choose this method,
	// You can create also more than one image at a time just simply add a value in the array
	// Remember than the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
	// path_from_filemanager/test/test1/
	// PS if there isn't write permission in your destination folder you must set it
	//
	'fixed_image_creation' => false, //activate or not the creation of one or more image resized with fixed path from filemanager folder
	'fixed_path_from_filemanager' => array('../test/', '../test1/'), //fixed path of the image folder from the current position on upload folder
	'fixed_image_creation_name_to_prepend' => array('', 'test_'), //name to prepend on filename
	'fixed_image_creation_to_append' => array('_test', ''), //name to appendon filename
	'fixed_image_creation_width' => array(300, 400), //width of image
	'fixed_image_creation_height' => array(200, 300), //height of image
	/*
	#             $option:     0 / exact = defined size;
	#                          1 / portrait = keep aspect set height;
	#                          2 / landscape = keep aspect set width;
	#                          3 / auto = auto;
	#                          4 / crop= resize and crop;
	*/
	'fixed_image_creation_option' => array('crop', 'auto'), //set the type of the crop
	
	// New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
	// With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
	// just simply add a value in the array
	// The image creation path is always relative so if i'm inside source/test/test1 and I upload an image, the path start from here
	//
	'relative_image_creation' => false, //activate or not the creation of one or more image resized with relative path from upload folder
	'relative_path_from_current_pos' => array('./', './'), //relative path of the image folder from the current position on upload folder
	'relative_image_creation_name_to_prepend' => array('', ''), //name to prepend on filename
	'relative_image_creation_name_to_append' => array('_thumb', '_thumb1'), //name to append on filename
	'relative_image_creation_width' => array(300, 400), //width of image
	'relative_image_creation_height' => array(200, 300), //height of image
	/*
	 * $option:     0 / exact = defined size;
	 *              1 / portrait = keep aspect set height;
	 *              2 / landscape = keep aspect set width;
	 *              3 / auto = auto;
	 *              4 / crop= resize and crop;
	 */
	'relative_image_creation_option' => array('crop', 'crop'), //set the type of the crop
	
	
	// Remember text filter after close filemanager for future session
	'remember_text_filter' => false,

);


$config = array_merge(
	$config,
	array(
		// main icons
		'menu.normalIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-d.svg',
		'menu.normalIcon.name' => 'icon-d',
		'menu.activeIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-b.svg',
		'menu.activeIcon.name' => 'icon-b',
		'menu.disabledIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-a.svg',
		'menu.disabledIcon.name' => 'icon-a',
		'menu.hoverIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-c.svg',
		'menu.hoverIcon.name' => 'icon-c',
		'menu.iconSize.width' => '24px',
		'menu.iconSize.height' => '24px',
		
		// submenu icons
		'submenu.normalIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-d.svg',
		'submenu.normalIcon.name' => 'icon-d',
		'submenu.activeIcon.path' => $config['appUrl'] . '/' . $config['publicPath'] . '/svg/icon-b.svg',
		'submenu.activeIcon.name' => 'icon-b',
		'submenu.iconSize.width' => '32px',
		'submenu.iconSize.height' => '32px',
	)
);

return array_merge(
	$config,
	array(
		'ext' => array_merge(
			$config['ext_img'],
			$config['ext_file'],
			$config['ext_misc'],
			$config['ext_video'],
			$config['ext_music']
		),
		'tui_defaults_config' => array(
			//'common.bi.image'                   => $config['common.bi.image'],
			//'common.bisize.width'               => $config['common.bisize.width'],
			//'common.bisize.height'              => $config['common.bisize.height'],
			'common.backgroundImage' => $config['common.backgroundImage'],
			'common.backgroundColor' => $config['common.backgroundColor'],
			'common.border' => $config['common.border'],
			'header.backgroundImage' => $config['header.backgroundImage'],
			'header.backgroundColor' => $config['header.backgroundColor'],
			'header.border' => $config['header.border'],
			'menu.normalIcon.path' => $config['menu.normalIcon.path'],
			'menu.normalIcon.name' => $config['menu.normalIcon.name'],
			'menu.activeIcon.path' => $config['menu.activeIcon.path'],
			'menu.activeIcon.name' => $config['menu.activeIcon.name'],
			'menu.disabledIcon.path' => $config['menu.disabledIcon.path'],
			'menu.disabledIcon.name' => $config['menu.disabledIcon.name'],
			'menu.hoverIcon.path' => $config['menu.hoverIcon.path'],
			'menu.hoverIcon.name' => $config['menu.hoverIcon.name'],
			'menu.iconSize.width' => $config['menu.iconSize.width'],
			'menu.iconSize.height' => $config['menu.iconSize.height'],
			'submenu.backgroundColor' => $config['submenu.backgroundColor'],
			'submenu.partition.color' => $config['submenu.partition.color'],
			'submenu.normalIcon.path' => $config['submenu.normalIcon.path'],
			'submenu.normalIcon.name' => $config['submenu.normalIcon.name'],
			'submenu.activeIcon.path' => $config['submenu.activeIcon.path'],
			'submenu.activeIcon.name' => $config['submenu.activeIcon.name'],
			'submenu.iconSize.width' => $config['submenu.iconSize.width'],
			'submenu.iconSize.height' => $config['submenu.iconSize.height'],
			'submenu.normalLabel.color' => $config['submenu.normalLabel.color'],
			'submenu.normalLabel.fontWeight' => $config['submenu.normalLabel.fontWeight'],
			'submenu.activeLabel.color' => $config['submenu.activeLabel.color'],
			//'submenu.activeLabel.fontWeight'    => $config['submenu.activeLabel.fontWeightcommon.bi.image'],
			'checkbox.border' => $config['checkbox.border'],
			'checkbox.backgroundColor' => $config['checkbox.backgroundColor'],
			'range.pointer.color' => $config['range.pointer.color'],
			'range.bar.color' => $config['range.bar.color'],
			'range.subbar.color' => $config['range.subbar.color'],
			'range.disabledPointer.color' => $config['range.disabledPointer.color'],
			'range.disabledBar.color' => $config['range.disabledBar.color'],
			'range.disabledSubbar.color' => $config['range.disabledSubbar.color'],
			'range.value.color' => $config['range.value.color'],
			'range.value.fontWeight' => $config['range.value.fontWeight'],
			'range.value.fontSize' => $config['range.value.fontSize'],
			'range.value.border' => $config['range.value.border'],
			'range.value.backgroundColor' => $config['range.value.backgroundColor'],
			'range.title.color' => $config['range.title.color'],
			'range.title.fontWeight' => $config['range.title.fontWeight'],
			'colorpicker.button.border' => $config['colorpicker.button.border'],
			'colorpicker.title.color' => $config['colorpicker.title.color']
		),
	
	)
);