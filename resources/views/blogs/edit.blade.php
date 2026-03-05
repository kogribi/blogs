<x-layout>
    <x-slot:title>
      Editing blog
    </x-slot:title>
    <h1>Edit blog</h1>
    <form method='POST' action="/blog/{{ $blog->id }}">
    @csrf
    @method('PUT')
        <label>
        <input name="title" value="{{old("title",$blog->title)}}">
        </label>
        @error("title")
        <p>{{ $message }}</p>
        @enderror
        <label>
        <input name="content" value="{{old("content",$blog->content)}}">
        </label>
        @error("content")
        <p>{{ $message }}</p>
        @enderror

        <select name="category_id" id="cars">
            <option value="">No category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$blog->category_id == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
            @endforeach   
        </select>
        @error("category_id")
            <p>{{ $message }}</p>
        @enderror
        
        <button>Saglabāt</button>
    </form>
  </x-layout>