<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="app.css">
    <title>Product</title>
</head>

<body>

    @include('sweetalert::alert')


    <div class="product-form">
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="">Product Name</label><br>
            <input type="text" name="product_name" required><br>
            <label for="">Product Price</label><br>
            <input type="number" name="product_price" required><br>
            <label for="">Product Old Price</label><br>
            <input type="number" name="product_old_price" required><br>
            <label for="">Product Description</label><br>
            <input type="text" name="product_description" required><br>
            <label for="">Product Image1</label><br>
            <input type="file" name="product_image1" required><br>
            <label for="">Product Image2</label><br>
            <input type="file" name="product_image2" required><br>
            <label for="">Product Image3</label><br>
            <input type="file" name="product_image3" required><br>
            <label for="">Product Image4</label><br>
            <input type="file" name="product_image4" required><br><br>
            <label>Brand</label><br>
            <select name="brand_id" id="" style="margin-bottom: 10px">
                @foreach ($brand as $brands)
                <option value="{{$brands->id}}">{{$brands->name}}</option>
                @endforeach
            </select>
            <br>
            <label>Category</label><br>
            <select name="category_id" id="" style="margin-bottom: 15px">
                @foreach ($category as $categories)
                    
                <option value="{{$categories->id}}">{{$categories->name}}</option>

                @endforeach
               
            </select>
            <br>
            <label>Featured</label><br>
            <select name="featured" id="" style="margin-bottom: 15px">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
