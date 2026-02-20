<x-layout>
    <x-slot:title>
        blogs
    </x-slot:title>
    <h1>All blogs</h1>
<ul>
    @foreach ($blogs as $blog)
    <li><a href="blog/{{ $blog->id }}">{{ $blog->content }}</a></li>
    @endforeach
</ul>
</x-layout>