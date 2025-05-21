@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'glass-button px-4 py-2 rounded-md']) !!}>
    {{ $slot }}
</button>
