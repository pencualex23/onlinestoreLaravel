@extends('layouts.background')
@section('content')

<div class="description">
   <div class="discount">
      <p>Up to 30% discount if you order today !</p>
   </div>
   <div class="about-tshirts">
      <p>Try our new colection of T-Shirts and look awesome !</p>
   </div>
</div>

<div class="container-tshirts">
   <div class="firms">
      <ul>
         <li><a href="adidas">Adidas</a></li>
         <li><a href="nike">Nike</a></li>
         <li><a href="puma">Puma</a></li>
         <li><a href="gucci">Gucci</a></li>
         <li><a href="jackjones">Jack & Jones</a></li>
         <li><a href="tommy">Tommy Hilfiger</a></li>
         <li><a href="hugo">Hugo Boss</a></li>
         <li><a href="bruno">Bruno Banani</a></li>
         <li><a href="kalvin">Kalvin Klein</a></li>
         <li><a href="convers">Converse</a></li>
         <li><a href="guess">Guess</a></li>
         <li><a href="levis">Levis</a></li>
      </ul>
   </div>
   <div class="products-tshirts">

      @foreach($tshirts as $tshirt)
      <div class="tshirt-1">
         <a href="/men/tshirts/{{ $tshirt->id }}"><img src="/img/tshirts/{{ $tshirt->image }}"></a>
         <p>Available size: @if($tshirt->S >0) S @endif
            @if($tshirt->M >0) M @endif
            @if($tshirt->L >0) L @endif
            @if($tshirt->XL >0) XL @endif</p>
         <p>{{ $tshirt->price }}</p>
      </div>
      @endforeach

   </div>

</div>

@endsection