<form>
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Trier par prix :
    </label>
    <select id="sort-by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5">
        <option value="{{ null }}" selected>Choisissez une option</option>
        <option value="asc" {{ request()->query('sortBy') == 'asc' ? 'selected' : '' }}>{{ __('Du plus bas au plus élevé') }}</option>
        <option value="desc" {{ request()->query('sortBy') == 'desc' ? 'selected' : '' }}>{{ __('Du plus élevé au plus bas') }}</option>
    </select>
</form>
