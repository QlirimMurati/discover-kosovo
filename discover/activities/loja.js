const gjeresiaRrafshit=513;
const gjatesiaRrafshit=480;
var canvas=document.getElementById('game');
var ctx=canvas.getContext("2d");

var bgReady=false;
var bgImage=new Image();
bgImage.src="../../images/activities/background.jpeg";
bgImage.onload=function() {
	bgReady=true;	
}

var vetura={};
	vetura.x =gjeresiaRrafshit/2;
	vetura.y =gjatesiaRrafshit/2;
var veturaSpeed=0.5;

var veturaReady=false;
var veturaImage=new Image();
veturaImage.src="../../images/activities/vetura.png";
veturaImage.onload=function() {
	veturaReady=true;
}

var porosia={};
	porosia.x =gjeresiaRrafshit-100;
	porosia.y =gjatesiaRrafshit-100;
var numeroPorosite=0;
var porosiaReady=false;
var porosiaImage=new Image();
porosiaImage.src="../../images/activities/gift.png";
porosiaImage.onload=function() {
	porosiaReady=true;
}


/*Caktimi i pozites permes psudo klasave dhe prototipeve ne js */
function nderroPozitatClass() {
};
nderroPozitatClass.prototype.randomRoll = function() {
var randNum = 32+(Math.random()*(gjatesiaRrafshit-100) );
return randNum;
};
var randamPosition=new nderroPozitatClass();

function reset() {
	vetura.x =gjeresiaRrafshit/2;
	vetura.y =gjatesiaRrafshit/2;
	porosia.x=randamPosition.randomRoll();
	porosia.y=randamPosition.randomRoll();
}

var drawGame = {
	start: function(){
			window.addEventListener('keydown', function (e) {
            drawGame.key = e.keyCode;
       	 });
	        window.addEventListener('keyup', function (e) {
	            drawGame.key = false;
	     })  
	    }
}; 	
var numri=0;

drawGame.start();
setInterval(function() {
	if(bgReady){ctx.drawImage(bgImage,0,0);}
	if(veturaReady){ctx.drawImage(veturaImage,vetura.x,vetura.y);}
	if(porosiaReady){ctx.drawImage(porosiaImage,porosia.x,porosia.y);}
	if(vetura.x<=(porosia.x+32)
		&& porosia.x<=(vetura.x+32)&&
		vetura.y<=(porosia.y+32)&&
		porosia.y<=(vetura.y+32)){clickCounter(); reset();}
	ctx.fillStyle="white";
	ctx.textBaseLine="top";
	ctx.textAlign="left";
	ctx.font="18px Helvatica";
	ctx.fillText("Vetura ke bere: "+numriPorosive.getLocalStorage()+" porosi gjate tere kohes",32,32);
	ctx.fillText("Vetura ke bere: "+numriPorosive.getSessionStorage()+" porosi prej kur ju e keni hapur shfletuesin",32,52);
	updateGameArea();
},1)


function updateGameArea() {
	    if (drawGame.key && drawGame.key == 65) {vetura.x+= -veturaSpeed; }
	    if (drawGame.key && drawGame.key == 68) {vetura.x += veturaSpeed; }
	    if (drawGame.key && drawGame.key == 87) {vetura.y+= -veturaSpeed; }
	    if (drawGame.key && drawGame.key == 83) {vetura.y += veturaSpeed; } 
}


function clickCounter() {
    if(typeof(Storage) !== "undefined") {
        if (localStorage.clickcount) {
            localStorage.clickcount = Number(localStorage.clickcount)+1;
        }
        else {
            localStorage.clickcount = 1;
        }
        if (sessionStorage.clickcount) {
            sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
        } else {
            sessionStorage.clickcount = 1;
        }
        localStorage.setItem("nr",localStorage.clickcount);
        sessionStorage.setItem("nr",sessionStorage.clickcount);
    }
}
   
function getStorage(){}
getStorage.prototype.getLocalStorage=function () {
	return localStorage.getItem("nr");
}
getStorage.prototype.getSessionStorage=function () {
	return sessionStorage.getItem("nr");
}
var numriPorosive=new getStorage();