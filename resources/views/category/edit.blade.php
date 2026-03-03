<x-layout>
    <x-slot:title>
      Editing category
    </x-slot:title>
    <h1>Edit category</h1>
    <form method='POST' action="/categories/{{ $category->id }}">
    @csrf
    @method('PUT')
        <label>
        <input name="category_name" value="{{old("category_name",$category->category_name)}}">
        </label>
        @error("category_name")
        <p>{{ $message }}</p>
        @enderror
        <button>Saglabāt</button>
    </form>
  </x-layout>