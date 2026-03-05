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
        <input name="Create_autors" value="{{old("Create_autors")}}" />
        @error("Create_autors")
            <p>{{ $message }}</p>
        @enderror
        <input name="Create_content" value="{{old("Create_content")}}" />
        @error("Create_content")
            <p>{{ $message }}</p>
        @enderror
        <input type="hidden" name="Create_post_id" value="{{$blog->id}}" />
        @error("Create_post_id")
            <p>{{ $message }}</p>
        @enderror
        <button>Sūtīt</button>
    </form>
    @foreach($comments as $comment)
    @if($comment->post_id == $blog->id)
        <div>
        <div>{{ $comment->autors }}: {{ $comment->content }}</div>
        <span>{{ $comment->updated_at }}</span>
        <a href="/comment/{{$comment->id}}/edit">Rediģēt</a>
        <form method="POST" action="/comment/{{$comment->id}}">
        @csrf
        @method("delete")
        <button>🗑️</button>
        </form>
        </div>
    @endif
@endforeach
  </x-layout>