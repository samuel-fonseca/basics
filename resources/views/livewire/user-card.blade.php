<x-card>
    <h2 class="text-2xl ">Welcome, {{ $this->user->name }}</h2>
    <p>{{ $this->user->email }}</p>

    <div class="block bg-slate-200 h-1 my-4 w-full rounded-full"></div>

    <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
</x-card>
