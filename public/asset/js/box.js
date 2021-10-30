/* SCRIPT BOX */

var creditisopen = 0;
var cinemamodisopen = 0;
var menumobileisopen = 0;


// COPYRIGHT CREDIT BOX
function creditbox(){
    var credit = document.getElementById('box-credit');
    
    if(this.creditisopen == 0){
        audio = new Audio('https://assets.mixkit.co/sfx/download/mixkit-ui-zoom-in-2617.wav');
        audio.play();
        credit.style.display = 'block';
        this.creditisopen = 1;
    }else{
        audio = new Audio('https://assets.mixkit.co/sfx/download/mixkit-user-interface-zoom-in-2618.wav');
        audio.play();
        credit.style.display = 'none';
        this.creditisopen = 0;
    }
}

// TWITCH CINEMA MODE
function cinemamod(){
    var cinema = document.getElementById('cinemamod');
    var body = document.getElementById('website');

    if(this.cinemamodisopen == 0){
        cinema.style.display = 'block';
        body.style.overflow = 'hidden'
        this.cinemamodisopen = 1;
    }else{
        cinema.style.display = 'none';
        body.style.overflowX = 'hidden';
        body.style.overflowY = 'auto';
        this.cinemamodisopen = 0;
    }

}

// MENU MOBILE
function menumobile(){
    var menumobile = document.getElementById('menu-site-mobile');
    var body = document.getElementById('website');

    if(this.menumobileisopen == 0){
        menumobile.style.display = 'block';
        menumobile.style.overflowY = 'hidden';
        body.style.overflow = 'hidden'
        this.menumobileisopen = 1;
    }else{
        menumobile.style.display = 'none';
        body.style.overflowX = 'hidden';
        body.style.overflowY = 'auto';
        this.menumobileisopen = 0;
    }

}