@props([
    'model' => null,
    'label' => null,
    'type' => 'text',
])

<div {{ $attributes->whereStartsWith('class')->class(['my-4']) }}>
    <span class="block">{{ $label }}</span>
    <input
        wire:model="{{ $model }}"
        type="{{ $type }}"
        @class([
            'w-full bg-slate-950 rounded-lg',
            'border-2 border-red-500' => $errors->has($model),
            'border border-slate-700' => $errors->missing($model),
        ])
        {{ $attributes->whereDoesntStartWith('class') }}
    >
    @error($model) <em class="text-red-500">{{ $message }}</em> @enderror
</div>
