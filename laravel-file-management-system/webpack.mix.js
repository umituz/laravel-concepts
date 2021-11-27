// const mix = require('laravel-mix');
//
// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

let mix = require('laravel-mix');

mix
	.setPublicPath(path.normalize('public/assets/admin/'))
	.options({
		processCssUrls: false
	})
	.js(
		'resources/admin/js/admin.js',
		'js/admin.js'
	)
	.js(
		'resources/admin/vendor/nestable/nestable.js',
		'vendor/nestable/nestable.js'
	)
	.sass(
		'resources/admin/sass/admin.scss',
		'css/admin.css'
	)
	.sass(
		'resources/admin/vendor/nestable/nestable.scss',
		'vendor/nestable/nestable.css'
	)
	.copyDirectory(
		'node_modules/tinymce',
		'public/assets/admin/vendor/tinymce'
	)
	.copyDirectory(
		'resources/admin/vendor/tinymce/lang',
		'public/assets/admin/vendor/tinymce/lang'
	)
	// .copyDirectory(
	// 	'resources/admin/vendor/elfinder',
	// 	'public/assets/admin/vendor/elfinder'
	// )
	.copyDirectory(
		'node_modules/@fortawesome/fontawesome-free/webfonts',
		'public/assets/admin/vendor/fontawesome/webfonts'
	)
	.copyDirectory(
		'resources/admin/vendor/datatables',
		'public/assets/admin/vendor/datatables'
	)
	.copy(
		[
			'node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js',
			'node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css'
		],
		'public/assets/admin/vendor/fontawesome'
	)
	.version()
;
