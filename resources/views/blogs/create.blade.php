<x-layout>
    <x-slot:title>
      Create blog
    </x-slot:title>
    <h1>Create blog</h1>
    <form method="POST" action="/blog">
        @csrf
        <input name="title" value="{{old("title")}}" />
        @error("title")
            <p>{{ $message }}</p>
        @enderror
        <input name="content" value="{{old("content")}}" />
        @error("content")
            <p>{{ $message }}</p>
        @enderror
        <select name="category_id">
            <option value="0">No category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach   
        </select>
        @error("category_id")
            <p>{{ $message }}</p>
        @enderror
        <button>Saglabāt</button>
    </form>
  </x-layout>