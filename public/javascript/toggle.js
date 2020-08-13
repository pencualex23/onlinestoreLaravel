var x = document.getElementById('image1');
var y = document.getElementById('image2');
var z = document.getElementById('image3');

var pos1 = 0;
var pos2 = 0;
var pos3 = 0;

var images1 = ["/img/image1.jpg", "/img/image2.jpg"];
var images2 = ["/img/image3.jpg", "/img/image4.jpg"];
var images3 = ["/img/image5.jpg", "/img/image6.jpg"];

function opacityDown() {
    x.style.opacity = "0";
    y.style.opacity = "0";
    z.style.opacity = "0";
    setTimeout(changeImage, 1010);
    setTimeout(opacityHigh, 1310);
}

function changeImage() {

    if (++pos1 >= images1.length)
        pos1 = 0;

    if (++pos2 >= images2.length)
        pos2 = 0;

    if (++pos3 >= images3.length)
        pos3 = 0;

    x.src = images1[pos1];
    y.src = images2[pos2];
    z.src = images3[pos3];
}

function opacityHigh() {
    x.style.opacity = "1";
    y.style.opacity = "1";
    z.style.opacity = "1";

}

setInterval(opacityDown, 9000);


