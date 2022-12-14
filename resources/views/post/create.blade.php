<h3>新增文章</h3>
<!--action's route == route("view's name[.controller function], ['route_name'=>$function save to list's value_name]")-->
<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <label>內容：
        <textarea name="content"></textarea>
    </label><br>
    <input type="submit" value="送出文章">
</form>