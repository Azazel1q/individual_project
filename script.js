// const slider = document.querySelector('.slider');
// const sliderLine = document.querySelector('.slider_line');
// const slide = document.querySelectorAll('.card');
// let width;
// let point = 0;

// const prewBtn = document.getElementById("prew");
// const nextBtn = document.getElementById("next");

// function init() {
//     width = slider.offsetWidth;
//     sliderLine.style.width = width * slide.length + 'px';
//     slide.forEach(item => {
//         item.style.width = width + 'px';
//         item.style.height = 'auto';
//     });
// }

// init();
// window.addEventListener('resize', init);

// prewBtn.addEventListener('click', function() {
//     point--;
//     if(point < 0) {
//         point = slide.length - 1;
//     }
//     sliderRol();
// });
// nextBtn.addEventListener('click', function() {
//     point++;
//     if(point >= slide.length) {
//         point = 0;
//     }
//     sliderRol();
// });

// function sliderRol() {
//     sliderLine.style.transform = 'translate(-' + width * point + 'px)';
// }

const modalReg = document.getElementById("modalReg");
const modalAuth = document.getElementById("modalAuth");
const modalRegBtn = document.getElementById("regBtn");
const modalAuthBtn = document.getElementById("authBtn");
const closeModal = document.querySelectorAll('.close');

modalAuthBtn.addEventListener('click', function() {
    modalAuth.style.opacity = 1;
    modalAuth.style.left = 0 + 'px';
    modalReg.style.opacity = 0;
    modalReg.style.left = 2000 + 'px';
});
modalRegBtn.addEventListener('click', function() {
    modalReg.style.opacity = 1;
    modalReg.style.left = 0 + 'px';
    modalAuth.style.opacity = 0;
    modalAuth.style.left = 2000 + 'px';
});


closeModal.forEach(item => {
    item.addEventListener('click', () => {
        modalReg.style.opacity = 0;
        modalReg.style.left = 2000 + 'px';
        modalAuth.style.opacity = 0;
        modalAuth.style.left = 2000 + 'px';
    });
});
