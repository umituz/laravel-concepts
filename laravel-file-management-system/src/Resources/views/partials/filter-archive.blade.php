@if(count($config['ext_misc']) > 0 or false)
	<input id="select-type-3" name="radio-sort" type="radio"
	       data-item="ff-item-type-3"
	       class="hide"/>
	<label id="ff-item-type-3" title="{{ __('Archives') }}"
	       for="select-type-3"
	       class="tip btn ff-label-type-3">
		<i class="icon-inbox"></i>
	</label>
@endif