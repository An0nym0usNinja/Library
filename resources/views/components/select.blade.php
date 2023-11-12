@props(['options', 'key', 'value', 'selected' => null])

<select {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
rounded-md shadow-sm']) !!}>
    @foreach ($options as $option)
        <option value="{{ $option->$key }}" @if ($option->$key == $selected) selected @endif>
            {{ $option->$value }}
        </option>
    @endforeach
</select>
