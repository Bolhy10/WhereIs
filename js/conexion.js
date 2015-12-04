var mic = new Wit.Microphone(document.getElementById("microphone"));
var vec=[];
var comercio, lugar, intent;
var info = function (msg) {
	document.getElementById("info").innerHTML = msg;
};

var BD=function(c,l) {
	document.getElementById("consulta").innerHTML = "Lo que deseas buscar es lo siguiente: " + c +" "+ l+"?";
	document.getElementById("boton").innerHTML='<button type="button" class="btn btn-primary btn-xs" onclick="enviar()">Continuar</button>';
};

var error = function (msg) {
	document.getElementById("error").innerHTML = msg;
};
mic.onready = function () {
	info("Microfono esta listo para escuchar");
};
mic.onaudiostart = function () {
	info("Recording started");
	error("");
};
mic.onaudioend = function () {
	info("Grabacion Detenida, procesando resultado");
};
mic.onresult = function (intent, entities) {
	var r = kv("intent", intent);

	for (var k in entities) {
		var e = entities[k];

		if (!(e instanceof Array))
		{
			r += kv(k, e.value);
		}
		else
		{
			for (var i = 0; i < e.length; i++)
			{
				r += kv(k, e[i].value);
			}
		}
	}

	document.getElementById("result").innerHTML = r;
	BD(comercio,lugar);
};
mic.onerror = function (err) {
	error("Error: " + err);
};
mic.onconnecting = function () {
	info("El microfono se esta conectando");
};
mic.ondisconnected = function () {
	info("El microfono no esta conectado");
};

mic.connect("PJEJ7DSH3ZM6QD2PZBOSZE56ZFPQJOTZ");  //en esta funcion se conecta al token creado en wit.ai
// mic.start();
// mic.stop();

function kv (k, v) {


	if (toString.call(v) !== "[object String]")
	{
		v = JSON.stringify(v);
	}
	//Agregando la linea de la conexión
	if(k=="intent"){
		intent=v;           //variable intent que almacenara el valor con el mismo nombre
		console.log(intent);
	}
	if((k=="local")){
		comercio=v;    //se le asigna a la variable comercio el valor de v solo cuando la entidad k es local
		console.log(comercio);
	}else if(k=="lugar"){
		lugar=v;      //se le asigna a la variable lugar el valor de v solo si la entidad k es lugar
		console.log(lugar);
	}
	return k + "=" + v + "\n";
	
}

function enviar(){    //Funcion en jquery que enviara mediante POST las variables comercio y lugar
$.ajax({
	url:'consulta.php',
	type:'POST',
	data:{intent: intent, comercio: comercio,lugar:lugar},
	dataType: 'json',
	success: function(respuesta){
		alert(respuesta.mensaje);
	}
});
	
}
