<?php

$config = config('gallery');

/**
 * Admin Gallery Routes
 */
Route::group(['middleware' => ['web', 'auth'], 'prefix' => $config['prefixRoute'], 'namespace' => 'Gallery\Http\Controllers'], function () use ($config) {
	
	$index = Route::get('/', 'GalleryController@index')->name('gallery.index');
	
	$config['use-laravel-permission'] ? $index->middleware('permission:gallery.index') : $index;
	
	$createFolder = Route::post('/create-folder', 'GalleryController@createFolder')->name('gallery.createFolder');
	
	$config['use-laravel-permission'] ? $createFolder->middleware('permission:gallery.createFolder') : $createFolder;
	
	$renameFolder = Route::post('/rename-folder', 'GalleryController@renameFolder')->name('gallery.renameFolder');
	
	$config['use-laravel-permission'] ? $renameFolder->middleware('permission:gallery.renameFolder') : $renameFolder;
	
	$deleteFolder = Route::post('/delete-folder', 'GalleryController@deleteFolder')->name('gallery.deleteFolder');
	
	$config['use-laravel-permission'] ? $deleteFolder->middleware('permission:gallery.deleteFolder') : $deleteFolder;
	
	$createFile = Route::post('/create-file', 'GalleryController@createFile')->name('gallery.createFile');
	
	$config['use-laravel-permission'] ? $createFile->middleware('permission:gallery.createFile') : $createFile;
	
	$createFileForm = Route::get('/create-file-form', 'GalleryController@createFileForm')->name('gallery.createFileForm');
	
	$config['use-laravel-permission'] ? $createFileForm->middleware('permission:gallery.createFile') : $createFileForm;
	
	$upload = Route::post('/upload', 'GalleryController@upload')->name('gallery.upload');
	
	$config['use-laravel-permission'] ? $upload->middleware('permission:gallery.upload') : $upload;
	
	$view = Route::get('/view', 'GalleryController@view')->name('gallery.view');
	
	$config['use-laravel-permission'] ? $view->middleware('permission:gallery.viewBoxes|gallery.viewColumnsList|gallery.viewList') : $view;
	
	$fileDownload = Route::post('/fileDownload', 'GalleryController@fileDownload')->name('gallery.fileDownload');
	
	$config['use-laravel-permission'] ? $fileDownload->middleware('permission:gallery.fileDownload') : $fileDownload;
	
	$renameFile = Route::post('/rename-file', 'GalleryController@renameFile')->name('gallery.renameFile');
	
	$config['use-laravel-permission'] ? $renameFile->middleware('permission:gallery.renameFile') : $renameFile;
	
	$deleteFile = Route::post('/delete-file', 'GalleryController@deleteFile')->name('gallery.deleteFile');
	
	$config['use-laravel-permission'] ? $deleteFile->middleware('permission:gallery.deleteFile') : $deleteFile;
	
	$deleteFiles = Route::post('/delete-files', 'GalleryController@deleteFiles')->name('gallery.deleteFiles');
	
	$config['use-laravel-permission'] ? $deleteFiles->middleware('permission:gallery.deleteFile') : $deleteFiles;
	
	$filter = Route::get('/filter', 'GalleryController@filter')->name('gallery.filter');
	
	$config['use-laravel-permission'] ? $filter->middleware('permission:gallery.filterSearch') : $filter;
	
	$duplicateFile = Route::post('/duplicate-file', 'GalleryController@duplicateFile')->name('gallery.duplicateFile');
	
	$config['use-laravel-permission'] ? $duplicateFile->middleware('permission:gallery.duplicateFile') : $duplicateFile;
	
	$copyCutFile = Route::post('/copy-cut-file', 'GalleryController@copyCutFile')->name('gallery.copyCutFile');
	
	$config['use-laravel-permission'] ? $copyCutFile->middleware('permission:gallery.copyCutFile') : $copyCutFile;
	
	$pasteClipboard = Route::post('/paste-clipboard', 'GalleryController@pasteClipboard')->name('gallery.pasteClipboard');
	
	$config['use-laravel-permission'] ? $pasteClipboard->middleware('permission:gallery.pasteClipboard') : $pasteClipboard;
	
	$clearClipboard = Route::post('/clear-clipboard', 'GalleryController@clearClipboard')->name('gallery.clearClipboard');
	
	$config['use-laravel-permission'] ? $clearClipboard->middleware('permission:gallery.clearClipboard') : $clearClipboard;
	
	$getFilePermissionsTable = Route::post('/file-permissions-table', 'GalleryController@getFilePermissionsTable')->name('gallery.getFilePermissionsTable');
	
	$config['use-laravel-permission'] ? $getFilePermissionsTable->middleware('permission:gallery.getFilePermissionsTable') : $getFilePermissionsTable;
	
	$chmod = Route::post('/chmod', 'GalleryController@chmod')->name('gallery.chmod');
	
	$config['use-laravel-permission'] ? $chmod->middleware('permission:gallery.chmod') : $chmod;
	
	$saveImage = Route::post('/save-image', 'GalleryController@saveImage')->name('gallery.saveImage');
	
	$config['use-laravel-permission'] ? $saveImage->middleware('permission:gallery.saveImage') : $saveImage;
	
	$sort = Route::get('/sort', 'GalleryController@sort')->name('gallery.sort');
	
	$config['use-laravel-permission'] ? $sort->middleware('permission:gallery.sorterFilename|gallery.sorterDate|gallery.sorterSize|gallery.sorterExtension') : $sort;
	
	$editOrPreviewFile = Route::get('/edit-preview-file', 'GalleryController@editOrPreviewFile')->name('gallery.editOrPreviewFile');
	
	$config['use-laravel-permission'] ? $editOrPreviewFile->middleware('permission:gallery.editOrPreviewFile') : $editOrPreviewFile;
	
	$saveTextFile = Route::post('/save-text-file', 'GalleryController@saveTextFile')->name('gallery.saveTextFile');
	
	$config['use-laravel-permission'] ? $saveTextFile->middleware('permission:gallery.saveTextFile') : $saveTextFile;
	
	$extractFile = Route::post('/extract-file', 'GalleryController@extractFile')->name('gallery.extractFile');
	
	$config['use-laravel-permission'] ? $extractFile->middleware('permission:gallery.extractFile') : $extractFile;
	
	$previewMedia = Route::get('/preview-media', 'GalleryController@previewMedia')->name('gallery.previewMedia');
	
	$config['use-laravel-permission'] ? $previewMedia->middleware('permission:gallery.previewMedia') : $previewMedia;
	
	$previewCad = Route::get('/preview-cad', 'GalleryController@previewCad')->name('gallery.previewCad');
	
	$config['use-laravel-permission'] ? $previewCad->middleware('permission:gallery.previewCad') : $previewCad;
});
