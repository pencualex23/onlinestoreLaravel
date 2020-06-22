var x = document.getElementById('image1');
var y = document.getElementById('image2');

var pos1 = 0;
var pos2 = 0;

var images1 = ["/img/image1.jpg" , "/img/image2.jpg" , "/img/image3.jpg"];
var images2 = ["/img/image4.jpg" , "/img/image5.jpg" , "/img/image6.jpg"];

function changeImage(){

   if(++pos1 >= images1.length)
       pos1 = 0;

   if(++pos2 >= images2.length)
       pos2 = 0;   
       
   x.src = images1[pos1];    
   y.src = images2[pos2]; 

}

 setInterval(changeImage , 5000);
