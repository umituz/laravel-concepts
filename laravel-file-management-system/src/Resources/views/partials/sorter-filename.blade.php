<li>
	<a class="sorter sort-name {{ $sort_by == "name" ? ((isset($descending)) ? "descending" : "ascending") : null }}
		" href="javascript:void('')" data-sort="name">
		{{ __('File Name') }}
	</a>
</li>