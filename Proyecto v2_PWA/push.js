var button = document.getElementById("btninsertar");

button.addEventListener('click', function(){
	notify();
 });

 function notify(){
 	//verificar que el navergador sea compatible
 	if (!("Notification" in window)){

 		alert("Tu Navegador no soporta notificaciones");
 	} else if(Notification.permission === "granted"){ 

 		//Lanzar notificacion si ya esta autorizado el servicio
 		var notification = new Notification("Se ha registrado un visitante");
   }else if(Notification.permission !== "denied"){

   	Notification.requestPermission(function(permission){

   		if(Notification.permission === "granted"){
   			var notification = new Notification("Nuevo registro");
   		}

   	});



   }

    

 }