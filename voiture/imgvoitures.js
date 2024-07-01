// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
const descriptionBtn = document.getElementById('description');
const texte = document.getElementById('texte');


descriptionBtn.addEventListener('click', () => {
  texte.style.display = 'block';
  //decaissementsContainer.style.display = 'none'; 
});


function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
