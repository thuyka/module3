<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        Product Description<input name="productDescription" >
        Price<input name="price">
        Discount Percent<input name="discountPercent">
        <button type="submit">Caculate</button>

    </form>
</body>
</html>