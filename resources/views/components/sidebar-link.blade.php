@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center flex-row gap-2 bg-[#a59eff] rounded content-start w-full px-3 py-2'
            : 'flex items-center flex-row gap-2 hover:bg-[#a59eff] rounded content-start w-full px-3 py-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
