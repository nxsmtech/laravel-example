<form action="/posts/create" method="post">
    @csrf
    
    Title: <input type="text" name="title"><br>
    Body: <input type="text" name="body"><br>
    <input type="submit">
</form>