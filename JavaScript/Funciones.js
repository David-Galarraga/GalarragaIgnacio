let botonPrender = document.getElementById("BotonPrender")
let botonApagar = document.getElementById("botonaPagar")
let imagenGato = document.getElementById("gatoImagen")


let persona1 = {                                 //objeto              
    nombre : "David",
    apellido : "Galarraga",
    dni: "45201414",
    edad : 29,
    colores: ["blanco","amarillo","rojo"]
}

let persona2 = {                                 //objeto              
    nombre : "Juan",
    apellido : "Galarraga",
    dni: "46201414",
    edad : 30,
    colores: ["blanco","amarillo","rojo"]
}



function comparar (persona1,persona2){
    if ( (persona1.colores.includes("azul")) && (persona2.colores.includes("azul")) ){
        console.log(persona1.nombre," y ",persona2.nombre, " tienen azul")
    } else if (persona1.colores.includes("azul")) {
        console.log(persona1.nombre, " tiene azul")
    } else if (persona2.colores.includes("azul")) {
        console.log(persona2.nombre, " tiene azul")
    } else if ((!persona1.colores.includes("azul")) && (!persona2.colores.includes("azul"))) {
        console.log(persona1.nombre," y ",persona2.nombre, " no tienen azul")
    }
}

console.log(comparar(persona1,persona2)); 


botonPrender.onclick = function(){
    imagenGato.src="./Imagenes/img_GatitoEncendido.png"
}
botonApagar.onclick = function(){
    imagenGato.src="./Imagenes/img_Gatito.png"
}

