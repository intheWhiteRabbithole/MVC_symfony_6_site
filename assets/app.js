/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
console.log('toto');
const titreSpans = document.querySelectorAll('h1 span');
const  btns = document.querySelectorAll('.btn');
const headert = document.getElementById("myheader")//.style.backgroundColor = "#ff0000";
const name = document.querySelectorAll('.container-second h1');
window.addEventListener('load', () => {
    const TL = gsap.timeline({paused: true});

    TL
        .staggerFrom(headert,1,{yPercent:-100,opacity:0, ease:"power1.out"},0.1)
        .staggerFrom(titreSpans,1,{top: -50,opacity:0, ease: "power1.out"},0.2)
        .staggerFrom(name,1,{xPercent:-100,opacity:0,ease:"power0.out"},0.3,'-=1');

    TL.play();
})