const bodyTag = document.getElementsByTagName('body')[0];
const brandName = document.getElementById('brand-name');
const navButton = document.getElementById('nav-button');
const navContainer = document.getElementById('nav-container');
const navBurger = document.getElementById('nav-burger');
const navClose = document.getElementById('nav-close');


navButton.addEventListener('click', function() {
    bodyTag.classList.toggle('nav-open');
    brandName.classList.toggle('hidden');
    navContainer.classList.toggle('hidden');
    navBurger.classList.toggle('hidden');
    navClose.classList.toggle('hidden');
});