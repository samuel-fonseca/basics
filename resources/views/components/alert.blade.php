@props([
    'type' => 'info',
])

<div {{
    $attributes->class([
        'text-white p-4 my-4 rounded-xl',
        'bg-blue-500' => $type === 'info',
        'bg-green-500' => $type === 'success',
        'bg-yellow-500' => $type === 'warning',
        'bg-red-500' => $type === 'error',
    ])
}}>
    {{ $slot }}
</div>
