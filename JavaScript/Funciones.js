let urlRickAndMorty = 'https://rickandmortyapi.com/api/character';
let countCharacters = [];
let speciesAnalysis = [];
let mostPopularCharacter = [];
let filterByGender = [];
let searchByLocations = [];

function getCharacters(){
    fetch(urlRickAndMorty)
    .then(response => response.json())
    .then(data =>{
        result = data.results;
        countCharacters = getCountCharacters(result);
        speciesAnalysis = getSpeciesAnalysis(result);
        mostPopularCharacter = getMostPopularCharacter(result);
        filterByGender = getFilterByGender(result);
        searchByLocations = getSearchByLocations(result);
    })
}

function getCountCharacters(result){
    let cantCharacters= result.length
    let cantcharactersAlive=0

    result.forEach(characterAlive => {
        if (characterAlive.status == "Alive") {
            cantcharactersAlive ++
        }
    });
    console.log("CONTEO DE PERSONAJES:");
    console.log(`Cantidad de personajes: ${cantCharacters}`);
    console.log(`Personajes vivos: ${cantcharactersAlive}`);
}

//Identificar cuántas especies diferentes hay
//Mostrar cuál es la especie más común
function getSpeciesAnalysis(result){
    let species = []
    let aux=0
    let cantCommonSpecies=[]

    result.forEach(character => {
        if(!species.includes(character.species)){
            species.push(character.species)
        } 
    })

    species.forEach(specie => {
        cantCommonSpecies.push(0);
        for (let index = 0; index < result.length; index++) {
            if (result[index].species === specie) {
                cantCommonSpecies[aux] ++
            }
        }
        aux ++
    });

    const mayorSpecies = cantCommonSpecies.reduce(
        (firstValue, secondValue) => firstValue > secondValue ? 
        cantCommonSpecies.indexOf(firstValue) : cantCommonSpecies.indexOf(secondValue)
    );
    console.log("ANALISIS DE ESPECIES");
    console.log(`Cantidad de especies: ${species.length}`);
    console.log(`Especie dominante: ${species[mayorSpecies]}`);

}


//Encontrar al personaje que ha aparecido en más episodios (mayor valor en episode.length)
//Mostrar su nombre, imagen y número de episodios
function getMostPopularCharacter(result){
    let cantEpisodesPerCharacter = [];

    result.forEach(character => {
        let episodeLength = character.episode;
        if (!cantEpisodesPerCharacter.includes(episodeLength)) {
            cantEpisodesPerCharacter.push(episodeLength.length);
        }
    });

    const populars = cantEpisodesPerCharacter.reduce((acum, value, index) => {
    if (value > acum.max) {
    // Nuevo máximo encontrado, reiniciar array de índices
    return { max: value, indices: [index] };
    // a acum.max se le da un nuevo valor
    // se reinicia el arreglo indices con el indice actual
    } else if (value === acum.max) {
    // Mismo máximo, agregar índice
    acum.indices.push(index);
    }
    return acum;
    }, { max: -Infinity, indices: [] }); 
    // maz es -infinity para asegurar que todos los numeros lo superen a la primera
    // indices [] es un arreglo vacio para despues hacerle push

    console.log("PERSONAJE MAS POPULAR:");
    console.log("Los/El personaje/s mas popular/es son/es:");
    for (let index = 0; index < result.length; index++) {
        if (populars.indices.includes(index)) {
                console.log(`Nombre: ${result[index].name}`);
                console.log(`Cantidad de espisodios: ${populars.max}`);
                console.log(`Imagen: ${result[index].image}`);
        }
    }
}

//Crear dos listas separadas: personajes masculinos y femeninos
//Mostrar el recuento de cada género
function getFilterByGender(result){
    let cantMasculine = 0
    let cantFemenine = 0
    let cantUnkmown = 0
    result.forEach(gender => {
        if (gender.gender.includes("Male")) {
            cantMasculine ++
        } else if (gender.gender.includes("Female")){
            cantFemenine ++
        }
        else if (gender.gender.includes("unknown")){
            cantUnkmown ++
        }
    });
    console.log("FILTRADO POR GENERO");
    console.log(`Masculinos: ${cantMasculine}`);
    console.log(`Femeninos: ${cantFemenine}`);
    console.log(`Desconocidos: ${cantUnkmown}`);
}


//Permitir al usuario ingresar una ubicación (location.name)

//Mostrar todos los personajes que coincidan con esa ubicación
function getSearchByLocations(result) {
    
}


getCharacters();;

/*
let urlPokemon = 'https://pokeapi.co/api/v2/pokemon';

function consulNombres(){
    fetch(urlPokemon)
    .then(respuesta => respuesta.json())
    .then(datos => {
        const pokemonNames = datos.results
        pokemonNames.forEach(pokeName => {
            console.log(pokeName.name)
        })
    })
}

function consulImpar(){
    fetch("https://pokeapi.co/api/v2/pokemon/?limit=40")
    .then(respuesta2 => respuesta2.json())
    .then(datos2 => {
        const PokemonDatos = datos2.results
        for (let i = 0; i < PokemonDatos.length; i++) {
            if (i % 2 == 0 ) {
                console.log(PokemonDatos[i])
            }
        }
    })
}

function consulDitto(){
    urlPokemon += "/ditto"
    fetch(urlPokemon)
    .then(respuestaDitto => respuestaDitto.json())
    .then(datosDitto => {
        const dittoStats = datosDitto.stats
        console.log(dittoStats[1], dittoStats[2])
    })
}
consulDitto();
*/
