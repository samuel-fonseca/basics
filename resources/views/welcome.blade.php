@extends('components.layouts.app')

@section('content')
    <div class="container mx-auto my-8">
        <livewire:user-card />
    </div>

    <div class="container mt-5 mx-auto">
        <h1 class="text-2xl text-center">Be Inspired</h1>
        <livewire:quotes />
    </div>
@endsection
