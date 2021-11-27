<?php

namespace Gallery\Helpers;

/**
 * Class HtmlHelper
 * @package Gallery\Helpers
 */
class HtmlHelper
{
	/**
	 * Returns gallery music or video html codes
	 *
	 * @return string
	 */
	public static function galleryMusicOrVideo()
	{
		return '<div id="jp_container_1" class="jp-video" style="margin:0 auto;">
            <div class="jp-type-single">
                <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                <div class="jp-gui">
                    <div class="jp-video-play">
                        <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
                    </div>
                    <div class="jp-interface">
                        <div class="jp-progress">
                            <div class="jp-seek-bar">
                                <div class="jp-play-bar"></div>
                            </div>
                        </div>
                        <div class="jp-current-time"></div>
                        <div class="jp-duration"></div>
                        <div class="jp-controls-holder">
                            <ul class="jp-controls">
                                <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
                                </li>
                                <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max
                                        volume</a></li>
                            </ul>
                            <div class="jp-volume-bar">
                                <div class="jp-volume-bar-value"></div>
                            </div>
                            <ul class="jp-toggles">
                                <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full
                                        screen</a></li>
                                <li><a href="javascript:;" class="jp-restore-screen" tabindex="1"
                                       title="restore screen">restore screen</a></li>
                                <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a>
                                </li>
                                <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat
                                        off</a></li>
                            </ul>
                        </div>
                        <div class="jp-title" style="display:none;">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="jp-no-solution">
                    <span>Update Required</span>
                    To play the media you will need to either update your browser to a recent version or update your
                    <a href="https://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                </div>
            </div>
        </div>';
	}
	
	/**
	 * Returns gallery music script codes
	 *
	 * @param $title
	 * @param $file
	 * @return string
	 */
	public static function galleryMusicScript($title, $file)
	{
		return ' <script type="text/javascript">
            $(document).ready(function () {

                $("#jquery_jplayer_1").jPlayer({
                    ready: function () {
                        $(this).jPlayer("setMedia", {
                            title: "' . $title . '",
                            mp3: "' . $file . '",
                            m4a: "' . $file . '",
                            oga: "' . $file . '",
                            wav: "' . $file . '"
                        });
                    },
                    swfPath: "js",
                    solution: "html,flash",
                    supplied: "mp3, m4a, midi, mid, oga,webma, ogg, wav",
                    smoothPlayBar: true,
                    keyEnabled: false
                });
            });
        </script>';
	}
	
	/**
	 * Returns gallery video script codes
	 *
	 * @param $title
	 * @param $file
	 * @return string
	 */
	public static function galleryVideoScript($title, $file)
	{
		return ' <script type="text/javascript">
                $(document).ready(function () {

                    $("#jquery_jplaer_1").jPlayer({
                        ready: function () {
                            $(this).jPlayer("setMedia", {
                                title: "' . $title . '",
                                m4v: "' . $file . '",
                                ogv: "' . $file . '",
                                flv: "' . $file . '"
                            });
                        },
                        swfPath: "js",
                        solution: "html,flash",
                        supplied: "mp4, m4v, ogv, flv, webmv, webm",
                        smoothPlayBar: true,
                        keyEnabled: false
                    });

                });
            </script>';
	}
	
	/**
	 * Create file form html codes
	 *
	 * @param $editableTextFileExts
	 * @return string
	 */
	public static function createFileForm($editableTextFileExts)
	{
		$form = __('File Name') . ': <input type="text" id="create_text_file_name" style="height:30px"><select id="create_text_file_extension" style="margin:0;width:100px;">';
		foreach ($editableTextFileExts as $ext) {
			$form .= '<option value=".' . $ext . '">.' . $ext . '</option>';
		}
		$form .= '</select><br><hr><textarea id="textfile_create_area" style="width:100%;height:150px;"></textarea>';
		return $form;
	}
	
	/**
	 * Returns file permissions table html codes
	 *
	 * @param $info
	 * @param $path
	 * @param $ftp
	 * @return string
	 */
	public static function filePermissionsTable($info, $path, $ftp)
	{
		$ret = '<div id="files_permission_start">
            <form id="chmod_form">
                <table class="table file-perms-table">
                    <thead>
                        <tr>
                            <td></td>
                            <td>r&nbsp;&nbsp;</td>
                            <td>w&nbsp;&nbsp;</td>
                            <td>x&nbsp;&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . trans('User') . '</td>
                            <td><input id="u_4" type="checkbox" data-value="4" data-group="user" ' . (substr($info, 1, 1) == 'r' ? " checked" : "") . '></td>
                            <td><input id="u_2" type="checkbox" data-value="2" data-group="user" ' . (substr($info, 2, 1) == 'w' ? " checked" : "") . '></td>
                            <td><input id="u_1" type="checkbox" data-value="1" data-group="user" ' . (substr($info, 3, 1) == 'x' ? " checked" : "") . '></td>
                        </tr>
                        <tr>
                            <td>' . trans('Group') . '</td>
                            <td><input id="g_4" type="checkbox" data-value="4" data-group="group" ' . (substr($info, 4, 1) == 'r' ? " checked" : "") . '></td>
                            <td><input id="g_2" type="checkbox" data-value="2" data-group="group" ' . (substr($info, 5, 1) == 'w' ? " checked" : "") . '></td>
                            <td><input id="g_1" type="checkbox" data-value="1" data-group="group" ' . (substr($info, 6, 1) == 'x' ? " checked" : "") . '></td>
                        </tr>
                        <tr>
                            <td>' . trans('All') . '</td>
                            <td><input id="a_4" type="checkbox" data-value="4" data-group="all" ' . (substr($info, 7, 1) == 'r' ? " checked" : "") . '></td>
                            <td><input id="a_2" type="checkbox" data-value="2" data-group="all" ' . (substr($info, 8, 1) == 'w' ? " checked" : "") . '></td>
                            <td><input id="a_1" type="checkbox" data-value="1" data-group="all" ' . (substr($info, 9, 1) == 'x' ? " checked" : "") . '></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3"><input type="text" class="input-block-level" name="chmod_value" id="chmod_value" value="" data-def-value=""></td>
                        </tr>
                    </tbody>
                </table>';
		
		if ((!$ftp && is_dir($path))) {
			$ret .= '<div class="hero-unit" style="padding:10px;">' . __('Apply changes to those under the folder?') . '<br/><br/>
                        <ul class="unstyled">
                            <li><label class="radio"><input value="none" name="apply_recursive" type="radio" checked> ' . trans('No') . '</label></li>
                            <li><label class="radio"><input value="files" name="apply_recursive" type="radio"> ' . trans('Files') . '</label></li>
                            <li><label class="radio"><input value="folders" name="apply_recursive" type="radio"> ' . trans('Folders') . '</label></li>
                            <li><label class="radio"><input value="both" name="apply_recursive" type="radio"> ' . trans('Files') . ' & ' . trans('Folders') . '</label></li>
                        </ul>
                        </div>';
		}
		
		$ret .= '</form></div>';
		
		return $ret;
	}
	
	/**
	 * Returns classed text area via the data
	 *
	 * @param $data
	 * @return string
	 */
	public static function getTextArea($data)
	{
		return '<textarea id="textfile_edit_area" style="width:100%;height:300px;">' . $data . '</textarea>';
	}
	
	/**
	 * Returns classed ck editor via the data
	 *
	 * @param $data
	 * @return string
	 */
	public static function getCkEditor($data)
	{
		return '<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script><textarea id="textfile_edit_area" style="width:100%;height:300px;">' . $data . '</textarea><script>setTimeout(function(){ ClassicEditor.create( document.querySelector( "#textfile_edit_area" )).catch( function(error){ console.error( error ); } );  }, 500);</script>';
	}
	
	/**
	 * Returns google docs full path via $urlFile
	 *
	 * @param $urlFile
	 * @return string
	 */
	public static function getGoogleDocs($urlFile)
	{
		return "<iframe src=\"https://docs.google.com/viewer?url=" . $urlFile . "&embedded=true\" class=\"google-iframe\"></iframe>";
	}
	
	/**
	 * Returns prettied code
	 *
	 * @param $info
	 * @param $data
	 * @return string
	 */
	public static function getPrettyCode($info, $data)
	{
		$ret = '';
		$ret .= '<script src="https://rawgit.com/google/code-prettify/master/loader/run_prettify.js?autoload=true&skin=sunburst"></script>';
		$ret .= '<?prettify lang=' . $info['extension'] . ' linenums=true?><pre class="prettyprint"><code class="language-' . $info['extension'] . '">' . $data . '</code></pre>';
		return $ret;
	}
}
