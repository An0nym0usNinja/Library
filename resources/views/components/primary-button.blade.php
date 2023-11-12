<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-white bg-indigo-700
    hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg
    text-sm px-5 py-2.5 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700
    dark:focus:ring-indigo-900']) }}>
    {{ $slot }}
</button>
