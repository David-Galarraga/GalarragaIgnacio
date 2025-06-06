let urlPokemon = 'https://pokeapi.co/api/v2/pokemon/';
let pokemonID = []; //arrays vacios para funciones e Ids de pokemons
let showPokemons = [];
let showStats = [];
let pokeCombat = [];
let aTeamAttack = 0;    //variables globales para ataque y defensa de cada equipo
let bTeamAttack = 0;
let aTeamDefense = 0;
let bTeamDefense = 0;
const botonCombatir = document.getElementById("boton_combatir");    //variables para obtener IDs de partes de HTML
const mostrarPokemon = document.getElementById("mostrar_pokemon");
const mostrarStats = document.getElementById("mostrar_stats");
const mostrarGanador = document.getElementById("mostrar_ganador");

async function getRandomIds() { //obtengo 6 Ids randoms y les hago fetch a cada uno
    let index = 0;
    while (index < 6) { //creo los numeros randoms y los guardo en un array vacio
        let randomNum = Math.floor(Math.random() * (1025)) + 1;
        pokemonID.push(randomNum);
        index ++
    }
    try { 
        const requests = pokemonID.map(id =>    //le hago fetch a cada ID
            fetch(urlPokemon+id)
            .then(response => response.json())
        );
        Promise.all(requests)   //tomo los datos y llamo a las funciones a usar
            .then(data =>{
                result = data;
                showPokemons = getShowPokemons(result);
                showStats = getShowStats(result);
                
                botonCombatir.addEventListener("click", () =>{  //boton para iniciar el combate
                    pokeCombat = getPokeCombat();
                })
            })

    } catch (error){
        console.error(`Error en la consola ${error}`);  //si no se puede hacer el fetch muestra error
    }
}

function getPokeCombat() {  //Comparo ataque y defensa del equipo A y B para saber el ganador
    let combat1 = aTeamAttack - bTeamDefense;
    let combat2 = bTeamAttack - aTeamDefense;
    if (combat1 > combat2) {    //simple comparativa, se crea una tarjeta para mostrar al ganador
        mostrarGanador.innerHTML = 
            `<div id="gano_rojo" class="tarjetas_teamA">
                <h3>Ganador!</h3>
                <p>Equipo Rojo</p>
            </div>`;
    } else if (combat2 > combat1) {
        mostrarGanador.innerHTML = 
            `<div id="gano_verde" class="tarjetas_teamB">
                <h3>Ganador!</h3>
                <p>Equipo Verde</p>
            </div>`;
    } else if (combat1 = combat2) {
        mostrarGanador.innerHTML = 
            `<div id="empate" class="tarjetas_empate">
                <h3>Empate!</h3>
            </div>`;
    }
}

function getShowStats(result) { //mediante tarjetas muestro sus ataques y defensas totales
    let index = 0;
    let tarjetaStatsA = ``;
    let tarjetaStatsB = ``;
    result.forEach(res => { //sumo los ataquesy las defensas de cada equipo 
        if (index < 3) {
            aTeamAttack += res.stats[1].base_stat;
            aTeamDefense += res.stats[2].base_stat;
        } else {
            bTeamAttack += res.stats[1].base_stat;
            bTeamDefense += res.stats[2].base_stat;
        }
        index ++
    });
    tarjetaStatsA = //Tarjetas para mostrar los totales de cada equipo
        `<div class="tarjetas_teamA">
            <h3>Equipo Rojo</h3>
            <p><strong>Ataque total:</strong> ${aTeamAttack}</p>
            <p><strong>Defensa total:</strong> ${aTeamDefense}</p>
        </div>`;
    tarjetaStatsB = 
        `<div class="tarjetas_teamB">
            <h3>Equipo Verde</h3>
            <p><strong>Ataque total:</strong> ${bTeamAttack}</p>
            <p><strong>Defensa total:</strong> ${bTeamDefense}</p>
        </div>`;
    mostrarStats.innerHTML += tarjetaStatsA + tarjetaStatsB;

}

function getShowPokemons(result) {  //Con tarjetas muestro la info de los pokemon obtenido en el fetch
    let tarjetaHTML = ``;
    let index = 0;

    result.forEach(res => { //tarjetas para cada pokemon de cada equipo por separado
        let pokeImg = res.sprites.front_default;
        if (index < 3) {
            tarjetaHTML = 
                `<div class="tarjetas_teamA">
                <img src="${pokeImg}" alt="${res.name}">
                <h3>${res.name}</h3>
                <p><strong>Ataque:</strong> ${res.stats[1].base_stat}</p>
                <p><strong>Defensa:</strong> ${res.stats[2].base_stat}</p>
                </div>`;
        } else {
            tarjetaHTML = 
                `<div class="tarjetas_teamB">
                <img src="${pokeImg}" alt="${res.name}">
                <h3>${res.name}</h3>
                <p><strong>Ataque:</strong> ${res.stats[1].base_stat}</p>
                <p><strong>Defensa:</strong> ${res.stats[2].base_stat}</p>
                </div>`;
        }
        mostrarPokemon.innerHTML += tarjetaHTML;
        index ++
    });
}

getRandomIds();
