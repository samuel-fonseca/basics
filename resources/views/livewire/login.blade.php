<div class="container mt-5 mx-auto">
    <h1 class="text-2xl text-center">Login</h1>
    <div class="w-full max-w-sm mx-auto">
        @if(session('message'))
            <x-alert color="red">
                {{ session('message') }}
            </x-alert>
        @endif
        <form wire:submit.prevent="login">
            <x-forms.text label="Email" model="email" type="email" />
            <x-forms.text label="Password" model="password" type="password" />

            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                Login
            </button>
        </form>

        <div class="my-4">
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account? Register here</a>
        </div>
    </div>
</div>
