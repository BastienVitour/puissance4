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
    // 👇️ this SHOWS the form
    formMail.style.display = 'block';
    formMdp.style.display = 'none';

  } else {
    // 👇️ this HIDES the form
    formMail.style.display = 'none';

  }
});




document.getElementById("mdp").addEventListener('click', () => {
    const form = document.getElementById('#form_mdp');

  if (formMdp.style.display === 'none') {
    // 👇️ this SHOWS the form
    formMdp.style.display = 'block';
    formMail.style.display = 'none';

  } else {
    // 👇️ this HIDES the form
    formMdp.style.display = 'none';
  }
});
