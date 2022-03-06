<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="POSt">
            @csrf
            <div>
            <h1>Add Brands</h1>
        </div>
        <div>
            <label for="">Name:</label><br>
            <select name="name" id="" style="margin-bottom: 10px">
                <option value="Coaster Furniture">Coaster Furniture</option>
                <option value="Fusion Dot High Fashion">Fusion Dot High Fashion</option>
                <option value="Unique Furnitture Restore">Unique Furnitture Restore</option>
                <option value="Dream Furnitture Flipping">Dream Furnitture Flipping</option>
                <option value="Young Repurposed">Young Repurposed</option>
                <option value="Green DIY furniture">Green DIY furniture</option>
            </select>
            <br>
        </div><br>
        <button type="submit" class="">Submit</button>
        </form>
    </div>
</body>
</html>