@if(count($config['ext_file']) > 0 or false)
	<input id="select-type-1" name="radio-sort" type="radio"
	       data-item="ff-item-type-1"
	       checked="checked" class="hide"/>
	<label id="ff-item-type-1" title="{{ __('Files') }}" for="select-type-1"
	       class="tip btn ff-label-type-1">
		<i class="icon-file"></i>
	</label>
@endif