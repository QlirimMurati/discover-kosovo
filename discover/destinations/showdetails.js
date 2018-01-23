//Deklarimi i variblave me referim tek elementet e html
var getImage=$("section");
var divContainer=$("#content");
var bodyContainer=$("body");
var getColor=$("#getColor");
var getFigCaption=$("figcaption");
var getTitleSpan=$("figcaption span");
//Ndrshimi i cilesimeve te fotografive dhe kontajnerit te tyre pasi te klikohet foto
	getImage.click(function () {
	document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
	getColor.css("position","absolute");
	getColor.css("width","100%");
	getColor.css("height","100%");
	getColor.css("z-index","15");
	getColor.css("display","block");
	getColor.css("background-color","rgba(0,0,0,0.8)");
	divContainer.css("position","absolute");			
	divContainer.css("float","none");
	divContainer.css("width","1100px");
	divContainer.css("height","600px");
	divContainer.css("left","0");
	divContainer.css("right","0");
	divContainer.css("margin-left","auto");
	divContainer.css("margin-right","auto");
	divContainer.css("margin-top","-30px");
	$(this).css("transition","all 2s");
	$(this).css("position", "absolute");
	$(this).css("width", "100%");
	$(this).css("height", "100%");
	$(this).css("z-index", "20");
	getFigCaption.css("height","570px");
	getFigCaption.css("margin-top","-610px");
	getFigCaption.css("width","400px");
	getFigCaption.css("float","right");
	getTitleSpan.css("font-size","20px");
	imgVar=$(this);
	bodyContainer.css("overflow","hidden");
});

//Larimi nga dritjarja e detajuar e fotos dhe pershkrimit duke perdorur ESC key
// Resetimi i te gjitha properties te elementeve te afektuara nga klikimi
window.addEventListener('keydown', function (e) {
            if(e.keyCode==27){
				getColor.css("display","none");
				divContainer.css("position","relative");			
				divContainer.css("float","right");
				divContainer.css("height","100%");
				divContainer.css("float","right");
				divContainer.css("margin-top","70px");
				imgVar.css("margin-left","10px");
				imgVar.css("margin-right","5px");
				imgVar.css("position", "relative");
				imgVar.css("width", "500px");
				imgVar.css("height", "350px");
				imgVar.css("float", "right");
				imgVar.css("z-index", "0");
				bodyContainer.css("overflow","scroll");
				getFigCaption.css("height","95px");
				getFigCaption.css("margin-top","-135px");
				getFigCaption.css("width","100%");
				getFigCaption.css("float","none");
				getTitleSpan.css("font-size","16px");
			}
});




//Calculate the distance between the user and destination
var getDistancaClass=$(".distanca");
getDistancaClass.click(function () {
	typeDistance=$(this);
});
function llogaritDistancen(latitude2, lotitude2) {
	lat2=latitude2;
	lot2=lotitude2;
	getLocation();
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
   	lat1 = position.coords.latitude; 
    lot1= position.coords.longitude;
    getDistanceFromLatLonInKm();
}

function getDistanceFromLatLonInKm() {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lot2-lot1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  typeDistance.html("You're <span style='font-size:1.2em; margin-left:0'>"+d.toFixed(3)+"</span> km away from this place");
}

function deg2rad(deg) {
  return deg * (Math.PI/180);
}
