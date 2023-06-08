@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200focus:border-indigo-200  focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
