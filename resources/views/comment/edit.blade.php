<x-layout>
    <x-slot:title>
      editing comment
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
    @foreach($Allcomments as $Allcomment)
    @if(isset($comment) && $comment->id == $Allcomment->id)
    <h1>Editing comment</h1>
    <form method='POST' action="/comment/{{ $comment->id }}">
    @csrf
    @method('PUT')
        <label>
        <input name="autors" value="{{old("autors",$comment->autors)}}">
        </label>
        @error("autors")
        <p>{{ $message }}</p>
        @enderror
        <label>
        <input name="content" value="{{old("content",$comment->content)}}">
        </label>
        @error("content")
        <p>{{ $message }}</p>
        @enderror
        <label>
        <input type="hidden" name="post_id" value="{{old("post_id",$comment->post_id)}}">
        </label>
        @error("post_id")
        <p>{{ $message }}</p>
        @enderror
        <button>Change it</button>
    </form>
    @elseif($comment->post_id == $blog->id)
        <div>
        <div>{{ $Allcomment->autors }}: {{ $Allcomment->content }}</div>
        <span>{{ $Allcomment->updated_at }}</span>
        <form method="POST" action="/comment/{{$Allcomment->id}}">
        @csrf
        @method("delete")
        <button>🗑️</button>
        </form>
        <a href="/comment/{{$Allcomment->id}}/edit">Rediģēt</a>
        </div>
    
    @endif
@endforeach
  </x-layout>