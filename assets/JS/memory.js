//Ce code permet d'afficher ou de cacher le chat

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

//---------------------------------------------------------------

//Ce code permet d'afficher et de cacher les différents élément au début de jeu

let diffSel = document.querySelector('#diff_select');
let diffLabel = document.querySelector('#diffLabel');
let themeSel = document.querySelector('#theme_select');
let themeLabel = document.querySelector('#themeLabel');
let launchButton = document.querySelector('#launch');
let grid = document.querySelector('.grille');
let stats = document.querySelector('#game_stats');

function prepare() {
    diffSel.style.display = 'inline';
    diffLabel.style.display = 'contents';
    themeSel.style.display = 'inline';
    themeLabel.style.display = 'contents';
    launchButton.style.display = 'inline';
    stats.style.display = 'none';
    grid.style.display = 'none';
}

function launch() {
    diffSel.style.display = 'none';
    diffLabel.style.display = 'none';
    themeSel.style.display = 'none';
    themeLabel.style.display = 'none';
    launchButton.style.display = 'none';
    grid.style.display = 'contents';
    stats.style.display = 'flex';
}

document.onload = prepare();

launchButton.addEventListener('click', launch());

//------------------------------------------------
//methode ajax-------------------------------------------------------
function createFetchOptions(bodyData) {                             
    return {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(bodyData)
    }
}
//------------------------------------
//Le timer du jeu

let timer = 0;



var counter = document.getElementById('counter');

counter.innerText = timer;

function increment() {
    if (timer < 60) {
        counter.innerText = timer;
        
        
        timer++;
    }
    else {
        return
    }
    var partieFini=false ;       
    
                
    if (timer==3) {
        partieFini=true
        
    }
    
    if (partieFini==true){
        fetch('/assets/AJAX/create_score.php', createFetchOptions({ timer }))
        .then(response => { return response.text() })
    }
    alert()
}
setInterval(increment, 1000);
//--------------------------------------------

let diffValue = diffSel.value;
diffSel.addEventListener('change', function() {
    diffValue = diffSel.value;
    console.log(diffValue);
});

let themeValue = themeSel.value;

let memoryCases = document.getElementsByClassName('memoryCase');
let images = document.getElementsByName('image');
let fronts = document.getElementsByClassName('frontCard');

let returnedCards = 0;

let displayedFace = {}
let state = {}

let canReturn = true;

let flagsUrl = [
    'france.png',
    'uk.png',
    'italy.png',
    'germany.png',
    'belgium.png',
    'spain.png',
    'portugal.png',
    'netherlands.png',
    
]

let duplicate = [];

function generateImages() {
    console.log(themeValue);
    switch (themeValue) {
        
        case '1' :
            for (let i = 0; i < (diffValue*diffValue)/2; i++) {
                duplicate.push(flagsUrl[i]);
            }
            for (let i = 0; i < (diffValue*diffValue)/2; i++) {
                duplicate.push(duplicate[i]);
            }
            
            break;
            
            case '2' :
                break;
                
                case '3' :
                    break;
                }
                
            }
            
            console.log(memoryCases.length);
            
            for (let i = 0; i < memoryCases.length; i++) {
                
                state[i] = 'notFound';
                displayedFace[i] = 'back';
                memoryCases[i].addEventListener('click', changes);
                fronts[i].style.visibility = 'hidden';
                
                function changes() {
                    
                    //console.log(displayedFace[i]);
                    
                    if (displayedFace[i] == 'back') {
                        if (canReturn) {
                            fronts[i].style.visibility = 'visible';
                            displayedFace[i] = 'front';
                            returnedCards++;
                        }
                        
                        //Si deux cartes sont retournées elles se retournent au bout de 3 secondes
                        if (returnedCards == 2) {
                            canReturn = false;
                            
                            for (let i = 0; i < memoryCases.length; i++) {
                                memoryCases[i].style.cursor = 'none';
                                //console.log(displayedFace[i]);

                                if (displayedFace[i] == 'front') {
                                    setTimeout(function() {
                                        fronts[i].style.visibility = 'hidden';
                                        displayedFace[i] = 'back';
                                        returnedCards = 0;
                                        canReturn = true;
                                        memoryCases[i].style.cursor = 'pointer';
                                    }, 2000 )     
                                }
                                else {
                                    setTimeout(function() {
                                        memoryCases[i].style.cursor = 'pointer';
                                    }, 2000)
                                }
                                
                            }
                        }
                        
                        
                    }
                    /*else if (displayedFace[i] = 'front'){
                        fronts[i].style.visibility = 'hidden';
                        displayedFace[i] = 'back';
                        returnedCards--;
                    }*/
                    //console.log(returnedCards);
                }
            }
            
            generateImages();
            
            function getScore(){
                console.log(fetch("timer"));
                
            }
            