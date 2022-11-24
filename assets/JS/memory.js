function getMessages(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET","AjaxMessages.php");

    requeteAjax.onload = function(){
        const resultat = JSON.parse(requeteAjax.responseText);
        ;
        const html = resultat.reverse().map(function(message){
            return `
            <div id="user_message">
            <span class="id_user" style="border: solid black ;">${message.id_user}</span>
            <span class="date_message">${message.date_message.substring(11, 16)}</span>
            <span class="message">${message.message}</span>
            </div>
            `
        })
        .join('');
        const messages = document.querySelector('#messages_area');
        messages.innerHTML = html;
        messages.scrollTop = messages.scrollHeight;
    }   
    requeteAjax.send();
}


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
document.querySelector('form').addEventListener('submit', postMessage);

const interval = window.setInterval(getMessages, 3000);

getMessages();