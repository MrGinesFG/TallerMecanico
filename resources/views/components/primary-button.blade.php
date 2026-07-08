<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-brand-green dark:bg-brand-green border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-brand-green-dark dark:hover:bg-brand-green-dark focus:bg-brand-green-dark dark:focus:bg-brand-green-dark active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-brand-yellow focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-sm']) }}>
    {{ $slot }}
</button>
