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
    colores: ["blanco","aa","rojo"]           //vactor dentro de un objeto
}

let persona2 = {                                 //objeto              
    nombre : "Juan",
    apellido : "Galarraga",
    dni: "46201414",
    edad : 30,
    colores: ["blanco","azul","rojo"]
}

function comparar (persona1,persona2){                      //Función
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

let colorcitos = ["azul", "banana","verde"];
colorcitos.push("gris");                    //Push agrega un valor al final
colorcitos.unshift("negro");                //unshift agrega un valor al inicio
console.log(colorcitos);

// Cual de las dos cajas tiene la mayor cantidad

let caja1={
    color: "azul",
    altura: 10,
    peso: 10,
    cantidad: [10,2,3,4,5]
}
let caja2={
    color: "azul",
    altura: 10,
    peso: 10,
    cantidad: [2,3,4,5,6]
}

function mayor(caja1,caja2) {
    let cantNum1=0;
    let cantNum2=0;
    let i=0;

    do {
        cantNum1= cantNum1 + caja1.cantidad[i];
        i= i +1;
    } while (i < 5);
    console.log("caja 1 tiene: ", cantNum1);

    i=0;

    do {
        cantNum2= cantNum2 + caja2.cantidad[i];
        i= i +1;
    } while (i < 5);
    console.log("caja 2 tiene: ", cantNum2);

    if (cantNum1 > cantNum2){
        console.log("caja 1 es mayor con: ",cantNum1,", caja 2 tiene: ",cantNum2);
    }else{
        console.log("caja 2 es mayor con: ",cantNum2,", caja 1 tiene: ",cantNum2);
    }
}
console.log(mayor(caja1,caja2));

//Vamos a usar una api, que personaje aparece en mas episodios
let personaje1 = {
    id:1,
    name:"Rick Sanchez",
    status:"Alive",
    species:"Human",
    type:"",
    gender:"Male",
    origin:{"name":"Earth (C-137)",
    url:"https://rickandmortyapi.com/api/location/1"},
    location:{"name":"Citadel of Ricks","url":"https://rickandmortyapi.com/api/location/3"},
    image:"https://rickandmortyapi.com/api/character/avatar/1.jpeg",
    episode:["https://rickandmortyapi.com/api/episode/1","https://rickandmortyapi.com/api/episode/2","https://rickandmortyapi.com/api/episode/3","https://rickandmortyapi.com/api/episode/4","https://rickandmortyapi.com/api/episode/5","https://rickandmortyapi.com/api/episode/6","https://rickandmortyapi.com/api/episode/7","https://rickandmortyapi.com/api/episode/8","https://rickandmortyapi.com/api/episode/9","https://rickandmortyapi.com/api/episode/10","https://rickandmortyapi.com/api/episode/11","https://rickandmortyapi.com/api/episode/12","https://rickandmortyapi.com/api/episode/13","https://rickandmortyapi.com/api/episode/14","https://rickandmortyapi.com/api/episode/15","https://rickandmortyapi.com/api/episode/16","https://rickandmortyapi.com/api/episode/17","https://rickandmortyapi.com/api/episode/18","https://rickandmortyapi.com/api/episode/19","https://rickandmortyapi.com/api/episode/20","https://rickandmortyapi.com/api/episode/21","https://rickandmortyapi.com/api/episode/22","https://rickandmortyapi.com/api/episode/23","https://rickandmortyapi.com/api/episode/24","https://rickandmortyapi.com/api/episode/25","https://rickandmortyapi.com/api/episode/26","https://rickandmortyapi.com/api/episode/27","https://rickandmortyapi.com/api/episode/28","https://rickandmortyapi.com/api/episode/29","https://rickandmortyapi.com/api/episode/30","https://rickandmortyapi.com/api/episode/31","https://rickandmortyapi.com/api/episode/32","https://rickandmortyapi.com/api/episode/33","https://rickandmortyapi.com/api/episode/34","https://rickandmortyapi.com/api/episode/35","https://rickandmortyapi.com/api/episode/36","https://rickandmortyapi.com/api/episode/37","https://rickandmortyapi.com/api/episode/38","https://rickandmortyapi.com/api/episode/39","https://rickandmortyapi.com/api/episode/40","https://rickandmortyapi.com/api/episode/41","https://rickandmortyapi.com/api/episode/42","https://rickandmortyapi.com/api/episode/43","https://rickandmortyapi.com/api/episode/44","https://rickandmortyapi.com/api/episode/45","https://rickandmortyapi.com/api/episode/46","https://rickandmortyapi.com/api/episode/47","https://rickandmortyapi.com/api/episode/48","https://rickandmortyapi.com/api/episode/49","https://rickandmortyapi.com/api/episode/50","https://rickandmortyapi.com/api/episode/51"],"url":"https://rickandmortyapi.com/api/character/1",
    created:"2017-11-04T18:48:46.250Z"}
    console.log(personaje1);

let personaje2 = {
    "id": 3,
    "name": "Summer Smith",
    "status": "Alive",
    "species": "Human",
    "type": "",
    "gender": "Female",
    "origin": {
      "name": "Earth (Replacement Dimension)",
      "url": "https://rickandmortyapi.com/api/location/20"
    },
    "location": {
      "name": "Earth (Replacement Dimension)",
      "url": "https://rickandmortyapi.com/api/location/20"
    },
    "image": "https://rickandmortyapi.com/api/character/avatar/3.jpeg",
    "episode": [
      "https://rickandmortyapi.com/api/episode/6",
      "https://rickandmortyapi.com/api/episode/7",
      "https://rickandmortyapi.com/api/episode/8",
      "https://rickandmortyapi.com/api/episode/9",
      "https://rickandmortyapi.com/api/episode/10",
      "https://rickandmortyapi.com/api/episode/11",
      "https://rickandmortyapi.com/api/episode/12",
      "https://rickandmortyapi.com/api/episode/14",
      "https://rickandmortyapi.com/api/episode/15",
      "https://rickandmortyapi.com/api/episode/16",
      "https://rickandmortyapi.com/api/episode/17",
      "https://rickandmortyapi.com/api/episode/18",
      "https://rickandmortyapi.com/api/episode/19",
      "https://rickandmortyapi.com/api/episode/20",
      "https://rickandmortyapi.com/api/episode/21",
      "https://rickandmortyapi.com/api/episode/22",
      "https://rickandmortyapi.com/api/episode/23",
      "https://rickandmortyapi.com/api/episode/24",
      "https://rickandmortyapi.com/api/episode/25",
      "https://rickandmortyapi.com/api/episode/26",
      "https://rickandmortyapi.com/api/episode/27",
      "https://rickandmortyapi.com/api/episode/29",
      "https://rickandmortyapi.com/api/episode/30",
      "https://rickandmortyapi.com/api/episode/31",
      "https://rickandmortyapi.com/api/episode/32",
      "https://rickandmortyapi.com/api/episode/33",
      "https://rickandmortyapi.com/api/episode/34",
      "https://rickandmortyapi.com/api/episode/35",
      "https://rickandmortyapi.com/api/episode/36",
      "https://rickandmortyapi.com/api/episode/38",
      "https://rickandmortyapi.com/api/episode/39",
      "https://rickandmortyapi.com/api/episode/40",
      "https://rickandmortyapi.com/api/episode/41",
      "https://rickandmortyapi.com/api/episode/42",
      "https://rickandmortyapi.com/api/episode/43",
      "https://rickandmortyapi.com/api/episode/44",
      "https://rickandmortyapi.com/api/episode/45",
      "https://rickandmortyapi.com/api/episode/46",
      "https://rickandmortyapi.com/api/episode/47",
      "https://rickandmortyapi.com/api/episode/48",
      "https://rickandmortyapi.com/api/episode/49",
      "https://rickandmortyapi.com/api/episode/51"
    ],
    "url": "https://rickandmortyapi.com/api/character/3",
    "created": "2017-11-04T19:09:56.428Z"
  }
  console.log(personaje2);

  function masEpisodios (personaje1,personaje2){
    const episodiosCant = personaje1.episode.length;
    const episodiosCant2 = personaje2.episode.length;

    if (episodiosCant > episodiosCant2){
        console.log("El personaje " + personaje1.name+" tiene mas apariciones con: ",episodiosCant,",que "+personaje2.name+", el cual tiene: ",episodiosCant2);
    }else{
        console.log("El personaje " + personaje2.name+"tiene mas apariciones con: ",episodiosCant2,", que "+personaje1.name+" el cual tiene: ",episodiosCant);
    }
  }
  console.log(masEpisodios(personaje1,personaje2))