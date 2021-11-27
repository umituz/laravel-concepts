<form id="fileupload" action="" method="POST" enctype="multipart/form-data">
	<div class="container2">
		<div class="fileupload-buttonbar">
			<!-- The global progress state -->
			<div class="fileupload-progress">
				<!-- The global progress bar -->
				<div class="progress progress-striped active" role="progressbar"
				     aria-valuemin="0" aria-valuemax="100">
					<div class="bar bar-success" style="width:0%;"></div>
				</div>
				<!-- The extended global progress state -->
				<div class="progress-extended"></div>
			</div>
			<div class="text-center">
				<!-- The fileinput-button span is used to style the file input field as button -->
				<span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>{{ __('Add File') }}</span>
                                        <input type="file" name="files[]" multiple="multiple">
                                    </span>
				<button type="submit" class="btn btn-primary start">
					<i class="glyphicon glyphicon-upload"></i>
					<span>{{ __('Start Upload') }}</span>
				</button>
				<!-- The global file processing state -->
				<span class="fileupload-process"></span>
			</div>
		</div>
		<!-- The table listing the files available for upload/download -->
		<div id="filesTable">
			<table role="presentation"
			       class="table table-striped table-condensed small">
				<tbody class="files"></tbody>
			</table>
		</div>
		<div class="upload-help">
			{{ __('Upload_base_help') }}
		</div>
	</div>
</form>
