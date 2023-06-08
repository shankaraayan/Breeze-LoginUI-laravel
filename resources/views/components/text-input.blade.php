@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200 dark:border-gray-300 dark:bg-gray-100 dark:text-gray-700 focus:border-indigo-200 dark:focus:border-indigo-200 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
