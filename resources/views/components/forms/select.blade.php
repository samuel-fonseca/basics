@props([
    'model' => null,
    'label' => null,
    'options' => [],
])

<div {{ $attributes->whereStartsWith('class')->class("my-2") }}>
    <span class="block">{{ $label }}</span>
    <select
        wire:model="{{ $model }}"
        @class([
            'w-full bg-slate-950 rounded-lg',
            'border-2 border-red-500' => $errors->has($model),
            'border border-slate-700' => $errors->missing($model),
        ])
        {{ $attributes->whereDoesntStartWith('class') }}
    >
        @if($options instanceof \Illuminate\View\ComponentsSlot)
            {{ $options }}
        @else
            @foreach ($options as $key => $option)
                <option
                    @if(is_int($key))value="{{ $key }}"@endif
                >
                    {{ $option }}
                </option>
            @endforeach
        @endif
    </select>
    @error($model) <em class="text-red-500">{{ $message }}</em> @enderror
</div>
