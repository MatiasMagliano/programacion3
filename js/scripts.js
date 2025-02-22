function request(url, data, callback) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', url, true);
	var loader = document.createElement('div');
	loader.className = 'loader';
	document.body.appendChild(loader);
	xhr.addEventListener('readystatechange', function () {
		if (xhr.readyState === 4) {
			if (callback) {
				callback(xhr.response);
			}
			loader.remove();
		}
	});

	//var formdata = data ? (data instanceof FormData ? data : new FormData(document.querySelector(data))) : new FormData();
	var formdata = new FormData(document.querySelector(data));
	console.log(formdata)

	var csrfMetaTag = document.querySelector('meta[name="csrf_token"]');
	if (csrfMetaTag) {
		formdata.append('csrf_token', csrfMetaTag.getAttribute('content'));
	}

	xhr.send(formdata);
}

function login() {
	request('utilidades/autenticar.php', '#formularioLogin', function (data) {
		document.getElementById('errores').innerHTML = "";
		var transition = document.getElementById('errores').style.transition;
		document.getElementById('errores').style.transition = "none";
		document.getElementById('errores').style.opacity = 0;
		switch (data) {
			case '0':
				window.location = '/';
				break;
			case '1':
				document.getElementById('errores').innerHTML += '<div class="err">Nombre de usuario o contraseña incorrectos</div>';
				break;
			case '2':
				document.getElementById('errores').innerHTML += '<div class="err">Fallo en conexión a la base de datos. Por favor inténtelo más tarde</div>';
				break;
			case '3':
				document.getElementById('errores').innerHTML += '<div class="err">You have exceeded the max number of login attempts per hour. Try again in an hour.</div>';
				break;
			case '4':
				document.getElementById('errores').innerHTML += '<div class="err">Your email has not been validated. Please check your email for a validation link or <a href="./validate">click here</a> to send another link</div>';
				break;
			default:
				document.getElementById('errores').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function () {
			document.getElementById('errores').style.transition = transition;
			document.getElementById('errores').style.opacity = 1;
		}, 10);
	});
}

function logout() {
	request('/utilidades/salir.php', false, function (data) {
		if (data === '0') {
			window.location = '/';
		}
	});
}

function publicar(id) {
	request('utilidades/publicar.php', '#formPublicarContenido', function (data) {
		document.getElementById('errores').innerHTML = "";
		var transition = document.getElementById('errores').style.transition;
		document.getElementById('errores').style.transition = "none";
		document.getElementById('errores').style.opacity = 0;
		switch (data) {
			case '0':
				window.location = '/';
				break;
			case '1':
				document.getElementById('errores').innerHTML += '<div class="err">No se ha podido publicar el anuncio</div>';
				break;
			case '2':
				document.getElementById('errores').innerHTML += '<div class="err">Fallo en conexión a la base de datos. Por favor inténtelo más tarde</div>';
				break;
			case '3':
				document.getElementById('errores').innerHTML += '<div class="err">No tienes permiso para publicar o no seleccionó contenido</div>';
				break;
			case '4':
				document.getElementById('errores').innerHTML += '<div class="err">No se ha podido subir la imagen</div>';
				break;
			default:
				document.getElementById('errores').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function () {
			document.getElementById('errores').style.transition = transition;
			document.getElementById('errores').style.opacity = 1;
		}, 10);
	});
}

function reiniciar_anio() {
	request('utilidades/reiniciar.php', false, function (data) {
		switch (data) {
			case '0':
				window.location = '/';
				break;
			case '1':
				document.getElementById('errores').innerHTML += '<div class="err">No se ha podido reiniciar el año</div>';
				break;
			case '2':
				document.getElementById('errores').innerHTML += '<div class="err">Fallo en conexión a la base de datos. Por favor inténtelo más tarde</div>';
				break;
			case '3':
				document.getElementById('errores').innerHTML += '<div class="err">Usted no tiene permiso para publicar o no seleccionó contenido</div>';
				break;
			default:
				document.getElementById('errores').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function () {
			document.getElementById('errores').style.transition = transition;
			document.getElementById('errores').style.opacity = 1;
		}, 10);
	});
}

function nuevo_contenido() {
	request('/utilidades/proc_nuevo_contenido.php', '#formNuevoContenido', function (data) {
		document.getElementById('errores').innerHTML = "";
		var transition = document.getElementById('errores').style.transition;
		document.getElementById('errores').style.transition = "none";
		document.getElementById('errores').style.opacity = 0;
		switch (data) {
			case '0':
				window.location = '/';
				break;
			case '1':
				document.getElementById('errores').innerHTML += '<div class="err">Error de token CSRF. No se ha podido agregar el contenido.</div>';
				break;
			case '2':
				document.getElementById('errores').innerHTML += '<div class="err">Fallo en conexión a la base de datos. Por favor inténtelo más tarde</div>';
				break;
			case '3':
				document.getElementById('errores').innerHTML += '<div class="err">Complete los campos requeridos.</div>';
				break;
			case '4':
				document.getElementById('errores').innerHTML += '<div class="err">Error de método o no tiene permisos para agregar contenido.</div>';
				break;
			default:
				document.getElementById('errores').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function () {
			document.getElementById('errores').style.transition = transition;
			document.getElementById('errores').style.opacity = 1;
		}, 10);
	});
}

function borrar_contenido() {
	request('/utilidades/proc_borrar_contenido.php', '#formBorrarContenido', function (data) {
		document.getElementById('errores').innerHTML = "";
		var transition = document.getElementById('errores').style.transition;
		document.getElementById('errores').style.transition = "none";
		document.getElementById('errores').style.opacity = 0;
		switch (data) {
			case '0':
				window.location = '/';
				break;
			case '1':
				document.getElementById('errores').innerHTML += '<div class="err">Error de token CSRF. No se ha podido borrar el contenido.</div>';
				break;
			case '2':
				document.getElementById('errores').innerHTML += '<div class="err">Fallo en conexión a la base de datos. Por favor inténtelo más tarde</div>';
				break;
			case '3':
				document.getElementById('errores').innerHTML += '<div class="err">Complete los campos requeridos.</div>';
				break;
			case '4':
				document.getElementById('errores').innerHTML += '<div class="err">Error de método o no tiene permisos para borrar contenido.</div>';
				break;
			default:
				document.getElementById('errores').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function () {
			document.getElementById('errores').style.transition = transition;
			document.getElementById('errores').style.opacity = 1;
		}, 10);
	});
}