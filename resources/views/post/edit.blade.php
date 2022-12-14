<h3>編輯文章</h3>
<form action="{{route('post.update', ['post'=>$post])}}" method="POST">
    @method("PUT")
    @csrf
    <label>內容：
        <textarea name="content"></textarea>
    </label></br>
    <button type="submit">送出更新</button>
    <input type="submit" value="送出更新">
</form>