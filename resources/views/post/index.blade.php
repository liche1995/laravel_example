<h3>list all post</h3>
@foreach($posts as $post)
   <a href="{{route('post.edit', ['post'=>$post])}}">edit </a>{{$post->content}}</br>
@endforeach
<a href="{{route('post.create')}}">new post</a>