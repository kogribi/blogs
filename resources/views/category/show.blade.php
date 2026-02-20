<x-layout>
    <x-slot:title>
      {{ $category->category_name }}
    </x-slot:title>
    <h1>{{ $category->category_name }}</h1>
    <a href="categories/{{$category->id}}/edit">Rediģēt</a>
    <form method="POST" action="categories/{{$category->id}}">
    @csrf
    @method("delete")
    <button>🗑️</button>

    </form>
  </x-layout>