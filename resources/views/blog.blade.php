<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="product-form">
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="">Image</label><br>
            <input type="file" name="image" required><br>
            <label for="">Title</label><br>
            <input type="text" name="title" required value = "" ><br>
            <label for="">Author</label><br>
            <input type="text" name="author" required value = "" ><br>
            <label for="">Content</label><br>
            <textarea type="number" name="content" required> </textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>