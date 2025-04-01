const miImagen = document.getElementById("gatoImagen");
const miBody = document.getElementById("bodyApagado");

const botonNombreGato = document.getElementById("cambiarNombreGato");
const nombreG = document.getElementById("nombreGato");

if (localStorage.getItem("nombreGato")){
    nombreG.innerText = localStorage.getItem("nombreGato");
}
botonNombreGato.addEventListener("click", () =>{
    const nuevoNombre = prompt ("Ingrese nuevo nombre");
    if (!nuevoNombre){
        return
    }
    nombreG.innerText = nuevoNombre;
    localStorage.setItem("nombreGato", nuevoNombre);
})

miImagen.addEventListener("click", () => {
    const miSrc = miImagen.getAttribute("src");
    if (miSrc === "Imagenes/img_Gatito.png") {
        miImagen.setAttribute("src", "Imagenes/img_GatitoEncendido.png");
        miBody.setAttribute("id", "bodyPrendido");
    } else {
        miImagen.setAttribute("src", "Imagenes/img_Gatito.png");
        miBody.setAttribute("id", "bodyApagado");
    }
});

let persona1 = {                                 //objeto              
    nombre : "David",
    apellido : "Galarraga",
    dni: "45201414",
    edad : 29,
    colores: ["blanco","azul","rojo"]           //vactor dentro de un objeto
}

let persona2 = {                                 //objeto              
    nombre : "Juan",
    apellido : "Galarraga",
    dni: "46201414",
    edad : 30,
    colores: ["blanco","azul","rojo"]
}

function comparar (persona1,persona2){          //Función
    const p1Azul = persona1.colores.includes("azul")        //Constantes
    const p2Azul = persona2.colores.includes("azul")
    if ( p1Azul && p2Azul ){
        console.log(persona1.nombre," y ",persona2.nombre, " tienen azul")
    } else if (p1Azul) {
        console.log(persona1.nombre, " tiene azul")
    } else if (p2Azul) {
        console.log(persona2.nombre, " tiene azul")
    } else if (!p1Azul && !p2Azul) {
        console.log(persona1.nombre," y ",persona2.nombre, " no tienen azul")
    }
}

console.log(comparar(persona1,persona2)); 