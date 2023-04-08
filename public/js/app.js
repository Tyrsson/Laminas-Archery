/* MENU */
const nav = document.querySelector('nav');
const button = document.querySelector('.hamburger-menu')
button.addEventListener('click', (event) => {
    nav.classList.toggle('open')
})



/* slder */
const slideViewPort = document.querySelector(".slide-container");
const sliderImageContainer = slideViewPort.querySelector(".images-container");
const numberOfSliderImage = sliderImageContainer.querySelectorAll("img").length;

let slideOffSet = 0;

const moveSlides = offset => {
    const imageWidth = 
    sliderImageContainer.querySelector("img").offsetWidth;
    sliderImageContainer.style.transform = `translateX(-${
        offset * imageWidth}px)`;

};

setInterval(() => {
    slideOffSet =
    slideOffSet < numberOfSliderImage - 1
    ? slideOffSet + 1 : 0;
    moveSlides(slideOffSet);
}, 2000);


/* BOOK NOW */

let buttons = document.querySelectorAll(".button");
for ( let i = 0 ; i< buttons.length; i++){
    buttons[i].addEventListener("click",function(){
        document.querySelector(".popup").style.display = "flex";
    });
};

/* Close btn for popup */
document.getElementById("close").addEventListener("click",function(){
    document.querySelector(".popup").style.display = "none"
})

document.querySelector("form").addEventListener("submit", function (e){
    e.preventDefault();
} )