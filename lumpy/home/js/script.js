let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

window.onscroll = () =>{

  menu.classList.toggle('fa-time');
  navbar.classList.toggle('active');
}


window.onscroll = () =>{

  menu.classList.remove('fa-time');
  navbar.classList.remove('active');

}
var swiper = new Swiper(".home-slider", {
  spaceBetween: 40,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});
$('.count').counterUp({
  delay: 10,
  time: 3000
});