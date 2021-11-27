@if(count($config['ext_img']) > 0 or false)
	<input id="select-type-2" name="radio-sort" type="radio"
	       data-item="ff-item-type-2"
	       class="hide"/>
	<label id="ff-item-type-2" title="{{ __('Images') }}" for="select-type-2"
	       class="tip btn ff-label-type-2">
		<i class="icon-picture"></i>
	</label>
@endif