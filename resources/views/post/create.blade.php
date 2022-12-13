<h3>新增文章</h3>

<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <label>內容：
        <textarea name="content"></textarea>
    </label><br>
    <input type="submit" value="送出文章">
</form>