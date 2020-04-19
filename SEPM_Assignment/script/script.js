function changeToGray(a) {
    a.style.backgroundColor = 'gainsboro';
}

function changeToNon(a) {
    a.style.backgroundColor = '';
}

function paperColorType() {
    var paperColorType = document.getElementsByName("paperColorType");
    var type;
    for(var i = 0; i < paperColorType.length; i++){
        if(paperColorType[i].checked){
            type = paperColorType[i].value;
        }
    }
    if(type == "color"){
        document.getElementById("paperColor").removeAttribute("disabled");
        document.getElementById("paperTheme").setAttribute("disabled","disabled");
        document.getElementById("diaryPrice").innerHTML = "$10";
    }else{
        document.getElementById("paperTheme").removeAttribute("disabled");
        document.getElementById("paperColor").setAttribute("disabled","disabled");
        document.getElementById("diaryPrice").innerHTML = "$15";
    }
}

function changePaperColorType(){
    var paperColorType = document.getElementsByName("paperColorType");
    var type;
    for(var i = 0; i < paperColorType.length; i++){
        if(paperColorType[i].checked){
            type = paperColorType[i].value;
        }
    }
    if(type == "color"){
        document.getElementById("paperColor").removeAttribute("disabled");
        document.getElementById("paperTheme").setAttribute("disabled","disabled");
        document.getElementById("diaryPrice").innerHTML = "$10";
    }else{
        document.getElementById("paperTheme").removeAttribute("disabled");
        document.getElementById("paperColor").setAttribute("disabled","disabled");
        document.getElementById("diaryPrice").innerHTML = "$15";
    }
}

function getTotalPrice(total) {
    var paperColorType = document.getElementsByName("paperColorType");
    var type;
    for(var i = 0; i < paperColorType.length; i++){
        if(paperColorType[i].checked){
            type = paperColorType[i].value;
        }
    }
    var quantity = document.getElementById("quantity").value;
    var totalPrice;
    if(type == "color"){
        totalPrice = 10 * quantity;
        document.getElementById("totalPrice").innerHTML = "$"+totalPrice;
    }else{
        totalPrice = 15 * quantity;
        document.getElementById("totalPrice").innerHTML = "$"+totalPrice;
    }
}

function changePaymentType() {
    var paymentType = document.getElementsByName("paymentMethod");
    var type;
    for(var i = 0; i < paymentType.length; i++){
        if(paymentType[i].checked){
            type = paymentType[i].value;
        }
    }

    var holder = document.getElementById("holder");
    var account = document.getElementById("account");
    var date = document.getElementById("date");
    var cvv = document.getElementById("cvv");

    if(type == "Card"){
        holder.setAttribute("placeholder", "Card Holder");
        account.setAttribute("placeholder", "Account Number");
        date.setAttribute("placeholder", "Expire Date");
        cvv.setAttribute("placeholder", "CVV");
        date.removeAttribute("disabled");
        cvv.removeAttribute("disabled");
    }else{
        holder.setAttribute("placeholder", "Account Holder");
        account.setAttribute("placeholder", "Account Email Address");
        date.setAttribute("placeholder", "Not Available");
        cvv.setAttribute("placeholder", "Not Available");
        date.setAttribute("disabled", "disabled");
        cvv.setAttribute("disabled", "disabled");
    }
}

function userEditAddress(id){
    window.location.href = "updateAddress.php?id=" + id;
}

function userEditPayment(id){
    window.location.href = "updatePayment.php?id=" + id;
}

function changePaymentOption() {
    var paymentType = document.getElementsByName("paymentMethod");
    var type;
    for(var i = 0; i < paymentType.length; i++){
        if(paymentType[i].checked){
            type = paymentType[i].value;
        }
    }

    if(type == "Card"){
        document.getElementById("Card").removeAttribute("hidden");
        document.getElementById("PayPal").setAttribute("hidden", "hidden");
    }else{
        document.getElementById("PayPal").removeAttribute("hidden");
        document.getElementById("Card").setAttribute("hidden", "hidden");
    }
}