import './bootstrap';

function togglePasswordDiv() {
    var passwordDiv = document.querySelector('.modif_password');
    var showButton = document.querySelector('.show_modif_password');

    if (passwordDiv.style.display === 'none') {
        passwordDiv.style.display = 'block';
        showButton.querySelector('span').textContent = 'Masquer';
    } else {
        passwordDiv.style.display = 'none';
        showButton.querySelector('span').textContent = 'Modifier le mot de passe';
    }
}

// Ajoute un écouteur d'événement au clic sur l'élément avec la classe "show_modif_password"
var showButton = document.querySelector('.show_modif_password');
showButton.addEventListener('click', togglePasswordDiv);
