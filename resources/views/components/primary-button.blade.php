<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-orange-900 dark:bg-orange-900 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-700 dark:active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-2 dark:focus:ring-offset-white-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
