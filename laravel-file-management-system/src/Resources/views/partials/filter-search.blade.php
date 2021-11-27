<input accesskey="f" type="text"
       class="filter-input {{ (request('type') != 1 && request('type') != 3) ? '' : 'filter-input-notype' }}"
       id="filter-input" name="filter"
       placeholder="{{ __('Search') }}..."
       value="{{ $filter }}"/>