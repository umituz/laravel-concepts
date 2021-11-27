@if(count($config['ext_video']) > 0 or false)
	<input id="select-type-4" name="radio-sort" type="radio"
	       data-item="ff-item-type-4"
	       class="hide"/>
	<label id="ff-item-type-4" title="{{ __('Videos') }}" for="select-type-4"
	       class="tip btn ff-label-type-4">
		<i class="icon-film"></i>
	</label>
@endif