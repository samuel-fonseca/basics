@props([
    'color' => 'blue',
])

<div {{
    $attributes->merge([
        'class' => "bg-{$color}-500 text-white p-4 my-4 rounded-xl",
    ])
}}>
    {{ $slot }}
</div>
