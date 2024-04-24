<x-layouts.app>
    <h1 class="text-4xl text-start">Available Components</h1>

    <x-divider class="my-8" />

    <section class="container mx-auto mt-8">
        <h2 class="text-2xl text-left">Alerts</h2>

        <x-alert type="info">This is an info alert</x-alert>
        <x-alert type="success">This is a success alert</x-alert>
        <x-alert type="warning">This is a warning alert</x-alert>
        <x-alert type="error">This is an error alert</x-alert>
    </section>

    <section class="container mx-auto mt-8">
        <h2 class="text-2xl text-left">Forms</h2>

        <x-forms.text label="Name" type="text" />
        <x-forms.text label="Email" type="email" />
        <x-forms.text label="Password" type="password" />
        <x-forms.select label="Select" :options="['Option 1', 'Option 2', 'opt_3' => 'Option 3']" />
    </section>

    <section class="container mx-auto mt-8">
        <h2 class="text-2xl text-left">Cards</h2>

        <x-card>
            I am a card
        </x-card>
    </section>
</x-layouts.app>
