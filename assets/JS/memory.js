//affichage des message
let idUser = parseInt(document.querySelector('#userId').innerText);

function getMessages(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET","AjaxMessages.php");

    requeteAjax.onload = function(){
        const resultat = JSON.parse(requeteAjax.responseText);
        ;
        const html = resultat.reverse().map(function(message){
            /*return `
            <div id="user_message">
            
            <span class="date_message" style="border: solid #817874 ;">${message.date_message.substring(11, 16)}</span>
            <span class="id_user" style="border: solid #817874 ;">${message.id_user}</span>
            <span class="message" style="word-wrap: break-word;"> : ${message.message}</span>
            </div>
            `*/
            if (message.id_user == idUser) {
                //console.log('message de l\'user actuel');
                return `
            <div class="user_message">
            <span class="me">Joueur ${message.id_user}</span>
            <span class="user_text">${message.message}</span>
            <span class="user_message_date">${message.date_message.substring(11, 16)}</span>
            
            </div>
            `
            }
            else {
                //console.log(message.id_user)
                //console.log(idUser)
                //console.log(message.id_user == idUser)
                return `
            <div class="others_message">
            <div class="other">Joueur ${message.id_user}</div>
            <div class="others_text">${message.message}</div>
            <div class="others_message_date">${message.date_message.substring(11, 16)}</div>
            </div>
            `
            }
            
            
            /*return `
            <div class="others_message">
            <div class="other">Joueur ${message.id_user}</div>
            <div class="others_text">${message.message}</div>
            <div class="others_message_date">${message.date_message.substring(11, 16)}</div>
            </div>
            `*/
        })
        .join('');
        const messages = document.querySelector('#messages_area');
        messages.innerHTML = html;
        messages.scrollTop = messages.scrollHeight;
    }   
    requeteAjax.send();
}

//Envoi des messages
function postMessage(event){
    event.preventDefault();

    const message1 = document.querySelector("#message1")

    const data = new FormData();
    data.append('message1', message1.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST','AjaxMessages.php?task=write');

    requeteAjax.onload = function(){
        message1.value = '';
        message1.focus();
        getMessages();
    }

    requeteAjax.send(data);

}
document.querySelector('#formAjax').addEventListener('submit', postMessage);

const interval = window.setInterval(getMessages, 3000);

getMessages();


//---------------------------------------------------------------
//Ce code permet d'afficher ou de cacher le chat
/*
let chat_display = document.querySelector('#chat_icon');

let chat = document.querySelector('#chat');

let chat_hide = document.querySelector('#hide_chat');

function display_chat() {
    chat_display.style.visibility = 'hidden';
    chat.style.visibility = 'visible';
}

function hide_chat() {
    chat.style.visibility = 'hidden';
    chat_display.style.visibility = 'visible';
}

chat_display.addEventListener('click', display_chat);

chat_hide.addEventListener('click', hide_chat);
*/
//---------------------------------------------------------------
//Ce code permet d'afficher et de cacher les différents éléments au début de jeu

let chat = document.querySelector('#chat');
let diffSel = document.querySelector('#diff_select');
let diffLabel = document.querySelector('#diffLabel');
let themeSel = document.querySelector('#theme_select');
let themeLabel = document.querySelector('#themeLabel');
let launchButton = document.querySelector('#launch');
let grid = document.querySelector('.grille');
let stats = document.querySelector('#game_stats');
let timeDisplay = document.querySelector('#time');

function prepare() {
    diffSel.style.display = 'inline';
    diffLabel.style.display = 'contents';
    themeSel.style.display = 'inline';
    themeLabel.style.display = 'contents';
    launchButton.style.display = 'inline';
    chat.style.display = 'none';
    stats.style.display = 'none';
    grid.style.display = 'none';
}

function launch() {
    diffSel.style.display = 'none';
    diffLabel.style.display = 'none';
    themeSel.style.display = 'none';
    themeLabel.style.display = 'none';
    launchButton.style.display = 'none';
    chat.style.display = 'block';
    stats.style.display = 'flex';
    grid.style.display = 'contents';
}

document.onload = prepare();

launchButton.addEventListener('click', launch());

//------------------------------------------------

//Le timer du jeu

let minutes = 0;
let secondes = 0;
let centiemes = 0;
let timer = 0;

const counter = document.getElementById('counter');

function increment() {
    centiemes++;
    counter.textContent = minutes+' : '+secondes+'.'+centiemes;
    if (centiemes == 100) {
        secondes++;
        timer++;
        centiemes = 0;
    }
    if (secondes == 60) {
        minutes++;
        secondes = 0;
    }
}

setInterval(increment, 10);

//--------------------------------------------

/*let diffValue = diffSel.value;
diffSel.addEventListener('change', function() {
    diffValue = diffSel.value;
    console.log(diffValue);
});

let themeValue = themeSel.value;
themeSel.addEventListener('change', function() {
    themeValue = themeSel.value;
    console.log(themeValue);
})*/

let memoryCases = document.getElementsByClassName('memoryCase');
let images = document.getElementsByClassName('image');
let fronts = document.getElementsByClassName('frontCard');
let backs = document.getElementsByClassName('backCard');

//Nombre de cartes retournées
let returnedCards = 0;

//Etat de cartes (si elles sont retournées et trouvées)
let displayedFace = {}
let state = {}

//Liste des différentes cartes retournées
let displayedCards = [];

//On mettra les id des cartes retournées (incrémentés automatiquement) ici
let cardsId = [];

//Nombre de cartes trouvées
let foundCards = 0;

let partieFinie = false;

//Les images du thème drapeaux
let flagsUrl = [
    'france.png',
    'uk.png',
    'italy.png',
    'germany.png',
    'belgium.png',
    'spain.png',
    'portugal.png',
    'netherlands.png',
    'afghanistan.png',
    'albania.png',
    'algeria.png',
    'andorra.png',
    'antigua-and-barbuda.png',
    'argentina.png',
    'armenia.png',
    'australia.png',
    'austria.png',
    'azerbaijan.png',
    'bahamas.png',
    'bahrain.png',
    'bangladesh.png',
    'barbados.png',
    'belarus.png',
    'belize.png',
    'benin.png',
    'bhutan.png',
    'bolivia.png',
    'bosnia-and-herzegovina.png',
    'botswana.png',
    'brazil.png',
    'brunei.png',
    'bulgaria.png',
    'burkina-faso.png',
    'burundi.png',
    'cambodia.png',
    'cameroon.png',
    'canada.png',
    'cape-verde.png',
    'central-african-republic.png',
    'chile.png',
    'china.png',
    'colombia.png',
    'comoros.png',
    'costa-rica.png',
    'croatia.png',
    'cuba.png',
    'cyprus.png',
    'czech-republic.png',
    'democratic-republic-of-congo.png',
    'denmark.png',
    'djibouti.png',
    'dominica.png',
    'dominican-republic.png',
    'ecuador.png',
    'egypt.png',
    'el-salvador.png',
    'equatorial-guinea.png',
    'eritrea.png',
    'estonia.png',
    'ethiopia.png',
    'fiji.png',
    'finland.png',
    'gabon.png',
    'gambia.png',
    'georgia.png',
    'ghana.png',
    'greece.png',
    'grenada.png',
    'guatemala.png',
    'guinea-bissau.png',
    'guinea.png',
    'guyana.png',
    'haiti.png',
    'honduras.png',
    'hungary.png',
    'india.png',
    'indonesia.png',
    'iran.png',
    'iraq.png',
    'ireland.png',
    'israel.png',
    'ivory-coast.png',
    'jamaica.png',
    'japan.png',
    'jordan.png',
    'kazakhstan.png',
    'kenya.png',
    'kiribati.png',
    'kuwait.png',
    'kyrgyzstan.png',
    'laos.png',
    'latvia.png',
    'lebanon.png',
    'lesotho.png',
    'liberia.png',
    'libya.png',
    'liechtenstein.png',
    'lithuania.png',
    'luxembourg.png',
    'madagascar.png',
    'malawi.png',
    'maldives.png',
    'mali.png',
    'malta.png',
    'marshall-island.png',
    'mauritania.png',
    'mexico.png',
    'micronesia.png',
    'moldova.png',
    'montenegro.png',
    'morocco.png',
    'mozambique.png',
    'myanmar.png',
    'namibia.png',
    'nauru.png',
    'nepal.png',
    'new-zealand.png',
    'nicaragua.png',
    'niger.png',
    'nigeria.png',
    'north-korea.png',
    'north-macedonia.png',
    'norway.png',
    'oman.png',
    'pakistan.png',
    'palau.png',
    'palestine.png',
    'panama.png',
    'papua-new-guinea.png',
    'paraguay.png',
    'peru.png',
    'philippines.png',
    'poland.png',
    'qatar.png',
    'republic-of-the-congo.png',
    'romania.png',
    'russia.png',
    'rwanda.png',
    'saint-kitts-and-nevis.png',
    'saint-lucia.png',
    'saint-vincent-and-the-grenadines.png',
    'samoa.png',
    'san-marino.png',
    'sao-tome-and-principe.png',
    'saudi-arabia.png',
    'senegal.png',
    'serbia.png',
    'seychelles.png',
    'sierra-leone.png',
    'singapore.png',
    'slovakia.png',
    'slovenia.png',
    'solomon-islands.png',
    'somalia.png',
    'south-africa.png',
    'south-korea.png',
    'south-sudan.png',
    'sri-lanka.png',
    'sudan.png',
    'suriname.png',
    'swaziland.png',
    'sweden.png',
    'switzerland.png',
    'syria.png',
    'tajikistan.png',
    'tanzania.png',
    'thailand.png',
    'timor-leste.png',
    'togo.png',
    'tonga.png',
    'trinidad-and-tobago.png',
    'tunisia.png',
    'turkey.png',
    'turkmenistan.png',
    'tuvalu.png',
    'uganda.png',
    'ukraine.png',
    'united-arab-emirates.png',
    'uruguay.png',
    'usa.png',
    'uzbekistan.png',
    'vanuatu.png',
    'venezuela.png',
    'vietnam.png',
    'yemen.png',
    'zambia.png',
    'zimbabwe.png',
    'ue.png',
    'northern-ireland.png',
    'reunion.png',
    'catalonia.png',
    'niue.png',
    'bermuda.png',
    'gibraltar.png',
    'guadeloupe.png',
    'greenland.png',
    'hongkong.png',
    'wales.png',
    'scotland.png',
    'england.png'
]

//Les images du thème animaux
let animalsUrl = [
    'penguin.png',
    'lion.png',
    'dolphin.png',
    'butterfly.png',
    'chinchilla.png',
    'giraffe.png',
    'hamster.png',
    'hippopotamus.png',
    'koala.png',
    'pig.png',
    'wolf.png',
    'axolotl.png',
    'bear.png',
    'bee.png',
    'bison.png',
    'camel.png',
    'cheetah.png',
    'chicken.png',
    'cow.png',
    'crab.png',
    'crane.png',
    'crocodile.png',
    'deer.png',
    'dog.png',
    'dragon.png',
    'duck.png',
    'eagle.png',
    'elephant.png',
    'fennec.png',
    'flamingo.png',
    'fox.png',
    'frog.png',
    'gazelle.png',
    'gorilla.png',
    'griffin.png',
    'groundhog.png',
    'hedgehog.png',
    'horse.png',
    'iguana.png',
    'kangaroo.png',
    'lemur.png',
    'leopard.png',
    'monkey.png',
    'narval.png',
    'octopus.png',
    'ostrich.png',
    'otter.png',
    'owl.png',
    'panda.png',
    'pangolin.png',
    'parrot.png',
    'platypus.png',
    'raccoon.png',
    'razorbill.png',
    'red-panda.png',
    'rhino.png',
    'rooster.png',
    'seal.png',
    'sheep.png',
    'shrimp.png',
    'sloth.png',
    'snake.png',
    'squirrel.png',
    'tapir.png',
    'tiger.png',
    'tortoise.png',
    'tucan.png',
    'turtle.png',
    'unicorn.png',
    'vulture.png',
    'whale.png',
    'zebra.png'
]

//Les images du thème Minecraft
let mcUrl = [
    'crafting-table.png',
    'chest.png',
    'enchanting-table.png',
    'furnace.png',
    'cobblestone.png',
    'grass.png',
    'bedrock.png',
    'command-block.png',
    'acacia-log.png',
    'ancient-debris.png',
    'barrel.png',
    'beacon.png',
    'bed.png',
    'birch-log.png',
    'blast-furnace.png',
    'bookshelf.png',
    'brewing-stand.png',
    'bricks.png',
    'cactus.png',
    'cake.png',
    'coal-ore.png',
    'copper.png',
    'crimson-stem.png',
    'diamond-block.png',
    'diamond-ore.png',
    'diorite.png',
    'dirt.png',
    'dispenser.png',
    'emerald-block.png',
    'emerald-ore.png',
    'end-stone.png',
    'ender-chest.png',
    'glowstone.png',
    'gold-block.png',
    'gold-ore.png',
    'granite.png',
    'gravel.png',
    'hay-bale.png',
    'ice.png',
    'iron-block.png',
    'iron-ore.png',
    'jukebox.png',
    'lapis-ore.png',
    'leaves.png',
    'mangrove-log.png',
    'netherrack.png',
    'note-block.png',
    'oak-log.png',
    'oak-planks.png',
    'observer.png',
    'obsidian.png',
    'piston.png',
    'prismarine-bricks.png',
    'pumpkin.png',
    'redstone-block.png',
    'redstone-lamp.png',
    'redstone-ore.png',
    'sand.png',
    'shulker-box.png',
    'slime-block.png',
    'smoker.png',
    'snow.png',
    'soul-sand.png',
    'spawner.png',
    'sponge.png',
    'spruce-log.png',
    'sticky-piston.png',
    'stone-bricks.png',
    'stone.png',
    'tnt.png',
    'warped-stem.png',
    'wool.png'
]

//Fonction pour changer l'url des images
function changeImageSrc(element, imageUrl) {
element.src = imageUrl;
}

//Array dans lequel on va lister les images qu'on utilisera et qu'on doublera
let duplicate = [];

function generateImages() {

    /*let diffValue = diffSel.value;
    diffSel.addEventListener('change', function() {
        diffValue = diffSel.value;
        console.log(diffValue);
    });*/

    let theme = document.getElementById('theme_value');

    let themeValue = theme.innerText;

    //On n'a pas trouvé assez d'images pour les thèmes 2 et 3 donc on fait une redirection si
    //quelqu'un veut faire le niveau impossible avec ces thèmes

    if (memoryCases.length == 400 && themeValue != 1) {
        var quit = confirm('Désolé on a pas réussi à trouver assez d\'images pour ce thème')

        if (quit) {
            document.location.href="memory.php?difficulty=20&theme=1";
        }
        else {
            document.location.href="memory.php?difficulty=20&theme=1";
        }

    }

    //console.log(diffValue);
    //console.log(themeValue);

    //On choisit quelle liste d'images on va sélectionner en fonction du thème
    switch (themeValue) {

        //Si le thème 1 (drapeaux) est choisi
        case '1' :
            duplicate = [];
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(flagsUrl[i]);
            }
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(duplicate[i]);
                //console.log(duplicate[i]);
            }

            for (let i = 0; i < memoryCases.length; i++) {
                let index = Math.floor(Math.random() * duplicate.length);
                let source = duplicate[index];
                duplicate.splice(index, 1);
                changeImageSrc(images[i], 'assets/images/theme_flags/'+source);
            }

            break;

        //Si le thème 2 (animaux) est choisi
        case '2' :
            duplicate = [];
            //console.log(memoryCases.length)
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(animalsUrl[i]);
            }
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(duplicate[i]);
                //console.log(duplicate[i]);
            }

            for (let i = 0; i < memoryCases.length; i++) {
                let index = Math.floor(Math.random() * duplicate.length);
                let source = duplicate[index];
                duplicate.splice(index, 1);
                changeImageSrc(images[i], 'assets/images/theme_animals/'+source);
            }
            break;

        //Si le thème 3 (Minecraft) est choisi
        case '3' :
            duplicate = [];
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(mcUrl[i]);
            }
            for (let i = 0; i < (memoryCases.length)/2; i++) {
                duplicate.push(duplicate[i]);
                //console.log(duplicate[i]);
            }

            for (let i = 0; i < memoryCases.length; i++) {
                let index = Math.floor(Math.random() * duplicate.length);
                let source = duplicate[index];
                duplicate.splice(index, 1);
                changeImageSrc(images[i], 'assets/images/theme_mc/'+source);
            }

            break;
    }
    
}

//console.log(diffValue);
//console.log(memoryCases.length);

//Initialisation : on dit que chaque case n'est pas trouvée, 
//qu'elle n'est pas retournée et on lui ajoute un event listener au clic
for (let i = 0; i < memoryCases.length; i++) {

    state[i] = 'notFound';
    displayedFace[i] = 'back';
    memoryCases[i].addEventListener('click', () => change(i));
    memoryCases[i].style.pointerEvents = 'none';
    setTimeout(function() {
        memoryCases[i].style.transform = 'rotateY(180deg)';
        memoryCases[i].style.pointerEvents = 'auto';
    }, 2000);
    
    //fronts[i].style.visibility = 'hidden';
    //backs[i].style.visibility = 'visible';

}

// fonction fetch---------
function createFetchOptions(bodyData) {
    return {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(bodyData)
    }
}
//--------------------------

//La fonction qui se lance quand on clique sur une case
function change(i) {

    if (!partieFinie) {

        console.log(displayedFace[i])

        if (displayedFace[i] == 'back') {

            if (returnedCards < 2) {

                //Si moins de 2 cartes sont retournées, on ne fait que retourner la carte actuelle
                memoryCases[i].style.transform = 'rotateY(0deg)'
                //fronts[i].style.visibility = 'visible';
                displayedFace[i] = 'front';
                returnedCards++;
                displayedCards.push(images[i].src);

                const cardId = memoryCases[i].id-1;
                cardsId.push(cardId);

                if (foundCards == memoryCases.length-2 || foundCards == memoryCases.length-1) {
                    foundCards++
                }

            }

            //Si 2 cartes sont déjà retournées
            else if (returnedCards == 2) {

                //console.log(displayedCards[0]);
                //console.log(displayedCards[1]);

                //Si les 2 cartes sont identiques
                if (displayedCards[0] == displayedCards[1]) {

                    //console.log('identical')

                    for (let j = 0; j < cardsId.length; j++) {

                        state[cardsId[j]] = 'found';
                        memoryCases[cardsId[j]].style.pointerEvents = 'none';

                    }

                    foundCards += 2;
                    displayedCards.splice(0, 2);
                    cardsId.splice(0, 2);

                }

                else {

                    //console.log('not identical');

                    //Si les 2 cartes ne sont pas identiques
                    displayedCards.splice(0, 2);
                    cardsId.splice(0, 2);

                }

                for (let j = 0; j < memoryCases.length; j++) {

                    if (state[j] == 'notFound' && displayedFace[j] == 'front') {

                        console.log('eeeehhh ?')
                        memoryCases[j].style.transform = 'rotateY(180deg)'
                        //fronts[j].style.visibility = 'hidden';
                        displayedFace[j] = 'back';
                        returnedCards = 0;

                    }

                    else if (state[j] == 'found' && displayedFace[j] == 'front') {

                        returnedCards = 0;

                    }

                    else {

                        returnedCards = 0;

                    }

                }

                memoryCases[i].style.transform = 'rotateY(0deg)'
                //fronts[i].style.visibility = 'visible';
                displayedFace[i] = 'front';
                returnedCards++;
                displayedCards.push(images[i].src);

                const cardId = memoryCases[i].id-1;
                cardsId.push(cardId);

            }  

        }

        //console.log(returnedCards)
        console.log(foundCards);

        //Définit les choses à faire à la fin de la partie
        if (foundCards == memoryCases.length-1) {
            partieFinie = true;
            //console.log('fini');
            for (let i = 0; i < memoryCases.length; i++) {
                //console.log(i)
                fronts[i].style.visibility = 'visible';
            }
            partieFinie = true;
            //console.log('fini');
            
            let popUp = document.getElementById('winner');
            popUp.style.visibility = "visible";

            let winMessage = document.getElementById("winText");
            winMessage.textContent = 'Victoire ! Vous avez gagné en ' + timer + ' secondes !' ;

            let main = document.getElementById("mainblock");
            main.style.filter = "blur(10px)";

            stats.style.visibility = 'hidden';

            let difficulty = 0;

            switch (memoryCases.length) {
                
                case 16 : 
                    difficulty = 1;
                    break;
                case 64 : 
                    difficulty = 2;
                    break;
                case 144 : 
                    difficulty = 3;
                    break;
                case 400 : 
                    difficulty = 4;
                    break;

            } 
            //fetch-----------------------------------------------------------------------------------
            fetch('assets/AJAX/create_score.php', createFetchOptions({ timer, difficulty }))         //
            .then(response => { return response.text() });                                           //
            //----------------------------------------------------------------------------------------
        }

    }

}

generateImages();