const encaissementsBtn = document.getElementById('encaissements-btn');
const decaissementsBtn = document.getElementById('decaissements-btn');
const factureContainer = document.getElementById('facture-container');
const decaissementsContainer = document.getElementById('decaissements-container'); 
const encaisserBtn = document.getElementById('encaisser-btn');
const annulerBtn = document.getElementById('annuler-btn');

// Affiche la section des factures
encaissementsBtn.addEventListener('click', () => {
  factureContainer.style.display = 'block';
  //decaissementsContainer.style.display = 'none'; 
});

// Affiche la section des décaissements 
decaissementsBtn.addEventListener('click', () => {
  factureContainer.style.display = 'none';
  decaissementsContainer.style.display = 'block'; 
});

// Encaisse une facture (à compléter)
encaisserBtn.addEventListener('click', () => {
  // Ajoutez du code pour gérer l'encaissement de la facture
  // Par exemple, vous pouvez modifier l'état de la facture dans le tableau
  // ou envoyer une requête à un serveur pour enregistrer l'encaissement
  alert("La facture a été encaissée !"); // Affiche un message de confirmation
});

// Annule une facture (à compléter)
annulerBtn.addEventListener('click', () => {
  // Ajoutez du code pour gérer l'annulation de la facture
  // Par exemple, vous pouvez supprimer la ligne de la facture du tableau
  // ou envoyer une requête à un serveur pour annuler la facture
  alert("La facture a été annulée !"); // Affiche un message de confirmation
});