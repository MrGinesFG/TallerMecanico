@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-brand-cream-2 dark:border-gray-700 bg-white dark:bg-gray-900 text-brand-brown-dark dark:text-gray-300 focus:border-brand-yellow dark:focus:border-brand-yellow focus:ring-brand-yellow dark:focus:ring-brand-yellow rounded-md shadow-sm transition-colors duration-200']) }}>
