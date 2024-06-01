// Tableau d'images
const images = ['./images/auto2.jpg', './images/es.jpg' , './images/auto3.jpg', './images/auto4.jpg', './images/auto5.jpg'];

// Fonction pour changer l'image d'arrière-plan
function changerImage() {
  const image = images[Math.floor(Math.random() * images.length)];
  const backgroundImage = document.getElementById('container');
  backgroundImage.style.backgroundImage = `url(${image})`;

  // Définir un intervalle pour changer l'image automatiquement (en secondes)
  setTimeout(changerImage, 3000); // 5 secondes
}

changerImage(); // Lancer le changement d'image initial
