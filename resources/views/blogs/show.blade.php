<x-layout>
    <x-slot:title>
      {{ $blog->title }}
    </x-slot:title>
    <h1>{{ $blog->title }}</h1>
    <p>{{$blog->content}}</p>
    <a href="blog/{{$blog->id}}/edit">Rediģēt</a>
    <form method="POST" action="blog/{{$blog->id}}">
    @csrf
    @method("delete")
    <button>🗑️</button>

    </form>
  </x-layout>