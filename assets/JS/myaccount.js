
              // FORMULAIRE DE MODIFICATION EMAIL ET MDP
let formMail = document.querySelector('#form_mail');
let formMdp = document.querySelector('#form_mdp');

document.onload = block();

function block() {
    formMail.style.display = 'none';
    formMdp.style.display = 'none';
}

document.getElementById("mail").addEventListener('click', () => {
    const form = document.getElementById('#form_mail');

  if (formMail.style.display === 'none') {
    // Montre le form mail et cache le form mdp
    formMail.style.display = 'block';
    formMdp.style.display = 'none';

  } else {
    // Cache le form mail
    formMail.style.display = 'none';

  }
});




document.getElementById("mdp").addEventListener('click', () => {
    const form = document.getElementById('#form_mdp');

  if (formMdp.style.display === 'none') {
    // Montre le form mdp et cache le form mail
    formMdp.style.display = 'block';
    formMail.style.display = 'none';

  } else {
    // Cache le form mdp
    formMdp.style.display = 'none';
  }
});



