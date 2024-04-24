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
            <div class="my-2">
                <label for="country" class="block">Country</label>
                <select
                    wire:model="country"
                    id="country"
                    name="country"
                    @class([
                        'w-full bg-slate-950 rounded-lg',
                        'border-2 border-red-500' => $errors->has('country'),
                        'border border-slate-700' => $errors->missing('country'),
                    ])
                >
                    <option value="" selected disabled>Select a country</option>

                    @foreach(\App\Enums\Country::cases() as $country)
                        <option value="{{ $country->value }}">{{ $country->label() }}</option>
                    @endforeach
                </select>
                @error('country') <em>{{ $message }}</em> @enderror
            </div>
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
