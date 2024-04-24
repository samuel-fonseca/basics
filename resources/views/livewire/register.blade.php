<div class="container mt-5 mx-auto">
    <h1 class="text-2xl text-center">Register to my awesome app</h1>
    <div class="w-full max-w-sm mx-auto">
        @if(session('error'))
            <x-alert type="error">
                {{ $error }}
            </x-alert>
        @endif
        @if(session('message'))
            <x-alert type="info">
                {{ $message }}
            </x-alert>
        @endif
        <form wire:submit.prevent="register">
            <x-forms.text label="Name" model="name" type="text" />
            <x-forms.text label="Email" model="email" type="email" />
            <x-forms.select label="Country" model="country">
                <x-slot.options>
                    <option value="" selected disabled>Select a country</option>
                    @foreach(\App\Enums\Country::cases() as $country)
                        <option value="{{ $country->value }}">{{ $country->label() }}</option>
                    @endforeach
                </x-slot.options>
            </x-forms.select>
            <x-forms.text label="Password" model="password" type="password" />
            <x-forms.text label="Password Confirmation" model="password_confirmation" type="password" />

            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                Register
            </button>
        </form>

        <div class="my-4">
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Already have an account? Login here.</a>
        </div>
    </div>
</div>
