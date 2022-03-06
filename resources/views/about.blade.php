<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>
<body>
    <div class="product-form">
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="">Title</label><br>
            <input type="text" name="title" required value = {{$about->title}} ><br>
            <label for="">Content</label><br>
            <textarea type="number" name="content" required>{{$about->content}} </textarea><br>
            <label for="">Image</label><br>
            <input type="file" name="image" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>