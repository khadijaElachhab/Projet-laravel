@props(['value'])

<label {{ $attributes->merge(['class' => 'glass-label block font-medium text-sm']) }}>
    {{ $value ?? $slot }}
</label>
