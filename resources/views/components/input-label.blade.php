@props(['value'])

<label {{ $attributes->merge(['class' => 'fw-semibold']) }}>
    {{ $value ?? $slot }}
</label>
