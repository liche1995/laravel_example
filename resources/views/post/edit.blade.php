<h3>編輯文章</h3>
<form action="{{route('post.update', ['post'=>$post])}}" method="POST">
    @method("PUT")
    @csrf
    <label>內容：
        <textarea name="content"></textarea>
    </label></br>
    <input type="submit" value="送出更新">
</form>
<form action="{{route('post.destroy', ['post'=>$post])}}" method="POST">
    @method("DELETE")
    @csrf
    <input type="submit" value="刪除文章">
</form>