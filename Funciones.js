let botonPrender = document.getElementById("BotonPrender")
let botonApagar = document.getElementById("botonaPagar")
let imagenGato = document.getElementById("gatoImagen")
botonPrender.onclick = function(){
    imagenGato.src="./Imagenes/img_GatitoEncendido.png"
}
botonApagar.onclick = function(){
    imagenGato.src="./Imagenes/img_Gatito.png"
}