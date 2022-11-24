function getMessages(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET","AjaxMessages.php");

    requeteAjax.onload = function(){
        const resultat = JSON.parse(requeteAjax.responseText);
        ;
        const html = resultat.reverse().map(function(message){
            if (id_user == 8){
            return `
            <div id="user_message" style="background-color:red;">
                <span class="message">${message.message}</span>
                <span class="id_user">${message.id_user}</span>
                <span class="date_message">${message.date_message.substring(11, 16)}</span>
            </div>
            ` }
            else {
                console.log("error");
        }})
        .join('');
        const messages = document.querySelector('#flex_user_message');
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