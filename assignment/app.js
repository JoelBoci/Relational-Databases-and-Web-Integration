// JavaScript for the navbar
const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar_menu')

menu.addEventListener('click', function() {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active')
})

let clientID = "Fu2hyT7RKiMu5ogVz1bHzN-ALscmmBq7CpCXxU2bx8I";
let endpoint = `https://api.unsplash.com/photos/?client_id=${clientID}`;

let imageElement = document.querySelector("#unsplashImage");

fetch(endpoint).then(function(response) {
    return response.json();
})
.then(function(jsonData) {
    imageElement.src = jsonData.urls.regular;
})