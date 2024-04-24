@props([
    'vertical' => false
])

<div
    {{ $attributes->class([
        'block bg-slate-500 rounded-full',
        'h-[1px] w-full' => ! $vertical,
        'w-[1px] h-full' => $vertical,
    ]) }}
></div>
