<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
        <title>Alex's store</title>

        <!-- Fonts -->
        <link href="/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
       
    </head>
    <body>
    <div class="antet">
    <div class="description-antet">
        <p>We have all that you want! Don't hesitate and get the coolest outfit!</p>
    </div>
    <div class="description-cart">
        <i class="fa fa-shopping-cart" id="cart"></i>
    </div>   

    </ul>  
    </div>
    <div class="category">
       <a href="/men">Men</a>
       <a href="/women">Women</a>
       <a href="/kids">Kids</a>
    </div>
    <div class="category-for-men">
        <a href="/men/tshirts">T-Shirts</a>
        <a href="/views/jeans.blade.php">Jeans</a>
        <a href="/views/shoes.blade.php">Shoes</a>
        <a href="/views/sport.blade.php">Sport</a>
        <a href="/views/shirts.blade.php">Shirts</a>
        <a href="/views/underwear.blade.php">Underwear</a>
        <a href="/views/watches.blade.php">Watches</a>
</div>
    @yield('content')
    </body>
</html>