// Navbar
const bars = document.querySelector('.checkbtn');
const ul_list = document.querySelector('.list');

bars.addEventListener('click', function(){
    this.classList.toggle('is-active');
    ul_list.classList.toggle('toggle');
})

// Bestellen
// const ADD_NOTITIE = document.getElementById("addbutton");
// const VERWIJDER_BUTTON = document.getElementById("buttondelete");
const WINKELMAND = document.getElementById("winkelmand");
const WINKELMANDID = document.getElementById("winkelmandids");
const smaken_input = document.getElementById("smaken_input");
const smaken_id = document.getElementById("smaken_id");
// var productPrijs = document.getElementById("productprijs");
// var productNaam = document.getElementById("productnaam");

if (!localStorage.getItem("cart")) {
  localStorage.setItem("cart", "[]"); // [] is de standaard waarde omdat als een array moet functioneren.
}

function addProduct(smaak, prijs, id) {
  let notitie = {
    naam: smaak,
    prijs: prijs,
    id: id,
  };

  // Pak de huidige notitie object en zet om in leesbaar JSON formaat.
  let huidigeOpslag = JSON.parse(localStorage.getItem("cart"));

  // Notities localstorage is een array formaat en we voegen een nieuwe notitie toe.
  huidigeOpslag.push(notitie);

  // huidigeOpslag heeft nu een nieuwe notitie in geheugen en schrijven de "notities" item over.
  localStorage.setItem("cart", JSON.stringify(huidigeOpslag));
}

function haalCart() {
  let cart = JSON.parse(localStorage.getItem("cart"));

  for (let i = 0; i < cart.length; i++) {
    smaken_input.value +=
      "  " +
      // cart[i].id +
      cart[i].naam
      // " + " +
      // cart[i].prijs
  }
}

// haalCart();

function getIds() {
  let cart = JSON.parse(localStorage.getItem("cart"));

  // for (let i = 0; i < cart.length; i++) {
  // var hoi = (WINKELMANDID.value += cart[i].id + ",");
  // var hoi2 = hoi.slice(0, -1);
  // var hoi = cart[i].id + ",";
  // WINKELMANDID.value += hoi;
  // }

  // cart.forEach((item, index) => {
  //   if (index === cart.length - 1) {
  //     WINKELMANDID.value += `${item.id}`;
  //     return;
  //   }
  //   WINKELMANDID.value += `${item.id},`;
  // });

  smaken_id.value = cart.map((item) => item.id).join(",");
  smaken_input.value = cart.map((item) => item.naam).join(",");
}

getIds();

function deleteProduct() {
  localStorage.removeItem("cart");

  if (!localStorage.getItem("cart")) {
    localStorage.setItem("cart", "[]"); // [] is de standaard waarde omdat als een array moet functioneren.
  }

  window.location.reload();
}