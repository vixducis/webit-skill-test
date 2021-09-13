@props(['disabled' => false])

<input class="border max-w-full sm:w-full md:w-96 border-gray-800 py-1 px-2 rounded-sm" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
