@props(["active" => false])

@php
    $classes = "block text-sm text-left leading-6 px-3 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
    if ($active) {
        $classes = $classes . " bg-blue-500 text-white";
    }
@endphp

<a {{ $attributes(["class" => $classes]) }}>
{{ $slot }}
</a>