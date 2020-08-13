function completeOrder() {

    elements = document.getElementsByClassName('order-details');
    var i;
    for (i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }

    elements2 = document.getElementsByClassName('cart-close-button');
    var i;
    for (i = 0; i < elements2.length; i++) {
        elements2[i].style.display = "none";
    }

    elements3 = document.getElementsByClassName('credit-card')[0];
    elements3.style.display = "block";

}

function backToCart() {

    elements = document.getElementsByClassName('order-details');
    var i;
    for (i = 0; i < elements.length; i++) {
        elements[i].style.display = "flex";
    }

    elements2 = document.getElementsByClassName('cart-close-button');
    var i;
    for (i = 0; i < elements2.length; i++) {
        elements2[i].style.display = "flex";
    }

    elements3 = document.getElementsByClassName('credit-card')[0];
    elements3.style.display = "none";

}