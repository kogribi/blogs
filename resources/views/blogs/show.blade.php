<x-layout>
    <x-slot:title>
      {{ $blog->title }}
    </x-slot:title>
    <h1>{{ $blog->title }}</h1>
    <h2>Category: {{$blog->category->category_name ?? "No category"}}</h2>
    <p>{{$blog->content}}</p>
    <a href="/blog/{{$blog->id}}/edit">Rediģēt</a>
    <form method="POST" action="/blog/{{$blog->id}}">
    @csrf
    @method("delete")
    <button>🗑️</button>
    </form>
  
    <h2>Comments:</h2>
    <form method="POST" action="/comment">
        @csrf
        <input name="autors" value="{{old("autors")}}" />
        @error("autors")
            <p>{{ $message }}</p>
        @enderror
        <input name="content" value="{{old("content")}}" />
        @error("content")
            <p>{{ $message }}</p>
        @enderror
        <input type="hidden" name="post_id" value="{{$blog->id}}" />
        @error("post_id")
            <p>{{ $message }}</p>
        @enderror
        <button>Sūtīt</button>
    </form>
    @foreach($comments as $comment)
    @if($comment->post_id == $blog->id)
        <div>
        {{ $comment->autors }}: {{ $comment->content }}
        <form method="POST" action="/comment/{{$comment->id}}">
        @csrf
        @method("delete")
        <button>🗑️</button>
        </form> 
        </div>
    @endif
@endforeach
  </x-layout>