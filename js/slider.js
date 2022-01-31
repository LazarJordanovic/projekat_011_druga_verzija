var slajdovi = document.querySelector(".slider-item").children;
var desnaStrelica = document.querySelector(".right");
var levaStrelica = document.querySelector(".left");
var sviSlajdovi = slajdovi.length;
var index = 0;

desnaStrelica.onclick = function () {
    next("napred");
}
levaStrelica.onclick = function () {
    next("nazad");
}

function next(direction) {
    if (direction == "napred") {
        index++;
        if (index == sviSlajdovi) {
            index = 0;
            
        }
    }
    else{
        if (index == 0) {
            index = sviSlajdovi - 1;
        }else{
            index--;
        }
    }
  for (i= 0; i<slajdovi.length; i++){
      slajdovi[i].classList.remove("active");
  }
    slajdovi[index].classList.add("active");
    
}

