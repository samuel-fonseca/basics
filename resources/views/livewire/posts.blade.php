<div class="">
    <div class="flex justify-between align-center">
        <h1 class="text-3xl text-gray-200 font-bold mb-8">Posts</h1>
        <div>
            <a
                class="bg-blue-500 text-white px-4 py-2 rounded"
                href="{{ route('posts.create') }}"
            >
                Create Post
            </a>
        </div>
    </div>

    <x-card>

        @if ($posts->isEmpty())
            <p class="text-gray-200">No posts found.</p>
        @else
            <table class="table mt-8 w-full">
                <thead>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->summary }}</td>
                            <td>{{ $post->status }}</td>
                            <td>
                                {{-- <a href="{{ route('post.view', $post) }}" class="text-blue-500 hover:underline">View</a> --}}
                                <button type="button" wire:click="delete({{ $post->id }})" class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </x-card>
</div>
