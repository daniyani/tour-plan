$(document).ready(function(){
const hotelSwiper = new Swiper('.hotel-slider', {
  // Optional parameters
 
  loop: true,


  // Navigation arrows
  navigation: {
    nextEl: '.hotel-slider__button--next',
    prevEl: '.hotel-slider__button--prev',
  },
keyboard: {
  enabled: true,
  onlyInViewport: true,
  
}  

});

const reviewsSwiper = new Swiper('.reviews-slider', {
  // Optional parameters
 
  loop: true,


  // Navigation arrows
  navigation: {
    nextEl: '.reviews-slider__button--next',
    prevEl: '.reviews-slider__button--prev',
  },
  

});

var menuButton = document.querySelector(".menu-button");
menuButton.addEventListener("click", function ()  {
  console.log("Клик по кнопке меню");
  document
  .querySelector(".navbar-bottom")
  .classList.toggle("navbar-bottom--visible");

});

var modalButton = $('[data-toggle=modal]');
var closeModalButton = $(".modal__close");
modalButton.on("click", openModal);
closeModalButton.on("click", closeModal);

 function openModal () {
   var modalOverlay = $(".modal__overlay");
   var modalDialog = $(".modal__dialog");
   modalOverlay.addClass ("modal__overlay--visible")
   modalDialog.addClass ("modal__dialog--visible")

 }
  function closeModal (event) {
    event.preventDefault();
   var modalOverlay = $(".modal__overlay");
   var modalDialog = $(".modal__dialog");
   modalOverlay.removeClass ("modal__overlay--visible")
   modalDialog.removeClass ("modal__dialog--visible")
 }

$(document).on('keydown', function(e){
      if(e.which === 27){ 
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.removeClass ("modal__overlay--visible")
    modalDialog.removeClass ("modal__dialog--visible")
     
      }
});

// Обработка форм
$(".form-validate").each(function(){
  $(this).validate({
    errorClass: "invalid",
    messages: {
    name: { 
     required: "Please enter your name",
     minlength: "The name must be at least two letters"
    },
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    },
    phone: {
      required: "This field is required",
      minlength: "Enter the entire phone number",
    },
  },
  });
});

 $(".newsletter__subscribe").validate({
      errorClass: "invalid",
      messages: {        
        email: {
          required: "We need your email address to contact you",
          email: "Your email address must be in the format of name@domain.com",
        },       
      },
  });


var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '+7 (000) 000-0000' : '+7 (000) 000-0009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('.input-phone').mask(SPMaskBehavior, spOptions);

AOS.init();

});