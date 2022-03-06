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
            <h1>Add Category</h1>
        </div>
        <div>
            <label for="">Name:</label><br>
            <select name="name" id="" style="margin-bottom: 15px">
                <option value="Prestashop">Prestashop</option>
                <option value="Magento">Magento</option>
                <option value="Bigcommerce">Bigcommerce</option>
                <option value="osCommerce">osCommerce</option>
                <option value="3dcart">3dcart</option>
                <option value="Bags">Bags</option>
                <option value="Accessories">Accessories</option>
                <option value="Jewellery">Jewellery</option>
                <option value="Watches">Watches</option>
            </select>
            <br>
        </div><br>
        <button type="submit" class="">Submit</button>
        </form>
    </div>
</body>
</html>