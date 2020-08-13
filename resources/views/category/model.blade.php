@extends('layouts.background')
@section('content')
<div class="model-container">

    <div class="photos-container">
        <div class="model-image-1">
            <img src="/img/tshirts/nikemodel1/{{ $photo[0] }}">
        </div>

        <div class="model-image-1">
            <img src="/img/tshirts/nikemodel1/{{ $photo[1] }}">
        </div>

        <div class="model-image-2">
            <img src="/img/tshirts/nikemodel1/{{ $photo[2] }}">
        </div>

        <div class="model-image-2">
            <img src="/img/tshirts/nikemodel1/{{ $photo[3] }}">
        </div>

        <div class="model-image-2">
            <img src="/img/tshirts/nikemodel1/{{ $photo[4] }}">
        </div>

    </div>

    <div class="details">
        <div class="details-1">
            <div class="details-links">
                <a href="/men">Men </a>/
                <a href="/men/tshirts">T-Shirts</a>
            </div>
        </div>

        <div class="details-1">
            <div class="brand-image">
                <img src="/img/tshirts/nikemodel1/{{ $photo[5] }}">
            </div>
        </div>

        <div class="details-1">
            <div class="price">
                <p>Cool T-Shirt</p>
                <p>48 $<br><span>TVA included</span></p>
            </div>
        </div>

        <div class="details-1">
            <div class="size">
                <form method="post" action="/men/tshirts/{{ $model->id }}">
                    @csrf
                    <label for="size">Size: </label><br>
                    <select name="size" id="size">
                        <option value="" disabled selected hidden>Choose Size</option>
                        @if($model->S > 0) <option value="S">S</option>@endif
                        @if($model->M > 0) <option value="M">M</option>@endif
                        @if($model->L > 0) <option value="L">L</option>@endif
                        @if($model->XL > 0) <option value="XL">XL</option>@endif
                    </select>
                    <br>
                    <input type="submit" value="Buy it">
                </form>
            </div>
        </div>

        <div class="details-1">
            <div class="icons">
                <i class="fa fa-cc-paypal"><span>Cash or Credit card</span></i><br>
                <i class="fa fa-car"><span>Free delivery</span></i><br>
                <i class="fa fa-calendar-o"><span>Non-Stop</span></i><br>
                <i class="fa fa-globe"><span>All around the globe</span></i><br>
            </div>
        </div>

        <div class="details-1">
            <div class="about-us">
                <p>About you, About us !</p>
            </div>
        </div>

    </div>
</div>




@endsection