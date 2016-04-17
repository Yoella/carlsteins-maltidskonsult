function bubbleOpen(){
  var elem = document.getElementsById(box);
  elem.style.transistion = "opacity 0.5s ease-in-out 0s";
  elem.style.opacity = 0;
}

function startTime() { //functionen för att starta klockan
    var today = new Date(); //variable som sätter vid nytt dygn
    var h = today.getHours(); // variablesom hämtar timmar
    var m = today.getMinutes(); // variabel som hämtar minuter
    var s = today.getSeconds(); // variabel som hämtar sekunder
    m = checkTime(m); // gör så att om sifran är mindre än 10 så lägger den till en 0 innan siffran
    s = checkTime(s); // gör så att om sifran är mindre än 10 så lägger den till en 0 innan siffran
    document.getElementById('Clock').innerHTML = h + ":" + m + ":" + s; // hämtar id Clock och lägger in timmer kolon minuter kolon sekunder, alltså skriver ut klockan
    var t = setTimeout(function () { startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i }; //add zero in front of numbers <10
    return i; // skriver ut 0:an
}
