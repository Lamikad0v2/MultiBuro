// Ouvrir la boîte de dialogue modale
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
}

// Fermer la boîte de dialogue modale lorsque l'utilisateur clique sur le bouton de fermeture
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
}

// Fermer la boîte de dialogue modale lorsque l'utilisateur clique en dehors de la boîte de dialogue
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

