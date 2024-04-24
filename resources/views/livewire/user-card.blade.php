<x-card>
    <div class="mb-4">
        <h2 class="text-2xl ">Welcome, {{ $this->user->name }}</h2>
        <p>{{ $this->user->email }}</p>
    </div>

    <x-divider />

    <div class="mt-8">
        <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
    </div>
</x-card>
