@if(count($config['ext_music']) > 0 or false)
	<input id="select-type-5" name="radio-sort" type="radio"
	       data-item="ff-item-type-5"
	       class="hide"/>
	<label id="ff-item-type-5" title="{{ __('Music') }}" for="select-type-5"
	       class="tip btn ff-label-type-5">
		<i class="icon-music"></i>
	</label>
@endif