<x-layout>
    <x-slot:title>
      Create category
    </x-slot:title>
    <h1>Create category</h1>
    <form method="POST" action="/categories">
        @csrf
        <input name="category_name" value="{{old("category_name")}}" />
        @error("category_name")
            <p>{{ $message }}</p>
        @enderror
        <button>Saglabāt</button>
    </form>
  </x-layout>