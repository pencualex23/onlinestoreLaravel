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
        <div class="antet-login">
            @if(session()->has('userData'))
            <a href="/logout"><i class="fa fa-sign-out"></i></a>
            @else
            <i class="fa fa-sign-in" onclick="openLogin()"></i>
            <i class="fa fa-id-card-o" onclick="openRegister()"></i>
            @endif
        </div>
        <div id="login">
            <form class="LoginForm" method="post" action="/login">
                @csrf
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="username" placeholder="Username"><br>
                <label for="password">Password: </label><br>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <input type="submit" value="Login"><br>
            </form>
            <button class="close-login" onclick="closeLogin()">Close</button><br>
            {{ session('loginMsg') }}
        </div>
        <div id="register">
            <form class="RegisterForm" method="post" action="/register">
                @csrf
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="username" placeholder="Username"><br>
                <label for="password">Password: </label><br>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <label for="passwordConfirm">Confirm Password: </label><br>
                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password"><br>
                <input type="submit" value="Register"><br>
            </form>
            <button class="close-login" onclick="closeRegister()">Close</button><br>
            {{ session('registerMsg') }}
        </div>


        <div id="shoppingcart">
            @foreach($orders as $order)
            <div class="order-details">
                <div class="shopping-image">
                    <img src="/img/tshirts/{{ $order->orderImage }}">
                </div>
                <div class="order-brand">
                    <p>Brand:{{$order->orderBrand }}</p>
                </div>
                <div class="order-size">
                    <p>Size:{{$order->orderSize }}</p>
                </div>
                <div class="order-price">
                    <p>Price:{{$order->orderPrice }}</p>
                </div>
                <div class="trash-icon">
                    <a href="/deleteOrder/{{$order->id}}"><i class="fa fa-trash" onclick="openLogin()"></i></a>
                </div>
            </div>
            @endforeach

            <div class="cart-close-button">
                <button class="close-cart-button" onclick="completeOrder()">Complete order</button>
                <button class="close-cart-button" onclick="closeCart()">Close</button>
            </div>

            <div class="credit-card">
                <form class="payment">
                    @csrf
                    <label>Card number:<label><br>
                            <input type="text" name="cardNumber" placeholder="----/----/----/----"><br>
                            <label>Name on card:<label><br>
                                    <input type="text" name="cardName" placeholder="John Doe"><br>
                                    <label>Expiration date:<label><br>
                                            <input type="text" name="expirationDate" placeholder="zz/aa"><br>
                                            <label>Security Code:<label><br>
                                                    <input type="password" name="securityCode" placeholder="836"><br>
                                                    <input type="submit" value="Pay"><br>
                </form>
                <button type="button" class="back-to-cart" onclick="backToCart()">Back to cart</button>
            </div>

        </div>

        <div class="description-antet">
            <p>We have all that you want! Don't hesitate and get the coolest outfit!</p>
        </div>
        @if(session()->has('userData'))
        <div class="description-cart">
            <i class="fa fa-shopping-cart" id="cart" onclick="openCart()"></i>
        </div>
        @else
        <div class="description-cart">
            <i class="fa fa-amazon"></i>
        </div>
        @endif
        </ul>
    </div>
    <div class="category">
        <a href="/men">Men</a>
        <a href="/women">Women</a>
        <a href="/kids">Kids</a>
    </div>
    <div class="category-for-men">
        <a href="/men/tshirts">T-Shirts</a>
        <a href="/views/jeans.blade.php">Polo T-Shirts</a>
        <a href="/views/shoes.blade.php">Sport T-Shirts</a>
        <a href="/views/shirts.blade.php">Tank Tops</a>
        <a href="/views/sport.blade.php">Casual T-Shirts</a>
    </div>
    @yield('content')
    <script src="/javascript/login.js"></script>
    <script src="/javascript/register.js"></script>
    <script src="/javascript/cart.js"></script>
    <script src="/javascript/completeOrder.js"></script>
</body>

</html>