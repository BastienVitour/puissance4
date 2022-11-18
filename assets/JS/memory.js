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

//Ce code 

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

let timer = 0;