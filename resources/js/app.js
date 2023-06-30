import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle'
import "../sass/app.scss";

//nav bar dropdown customize
const dropDownBtns = document.querySelectorAll(".dropdown--btn");
dropDownBtns.forEach((btn) => {
  btn.addEventListener("mouseover", (e) => {
    const triangle = btn.querySelectorAll(".triangle-bottom");
    if (triangle.length === 0) {
      const newDiv = document.createElement("div");
      newDiv.classList.add("triangle-bottom");
      btn.append(newDiv);
    }
    const dropDown = e.target.closest(".dropdown");
    const dropDownMenu = dropDown.querySelector(".dropdown-menu");
    if (!dropDownMenu.classList.contains("show")) {
      dropDownMenu.classList.add("show");
    }
    dropDownMenu.addEventListener("mouseover", (e) => {
      dropDownMenu.classList.add("show");
    });
  });
  btn.addEventListener("mouseleave", (e) => {
    const newDiv = e.target.querySelector(".triangle-bottom");
    newDiv.remove();
    const dropDown = e.target.closest(".dropdown");
    const dropDownMenu = dropDown.querySelector(".dropdown-menu");
    if (dropDownMenu.classList.contains("show")) {
      dropDownMenu.classList.remove("show");
    }
    dropDownMenu.addEventListener("mouseleave", (e) => {
      dropDownMenu.classList.remove("show");
    });
  });
});

const swiper = new Swiper(".swiper", {
  direction: "horizontal",
  loop: false,

  pagination: {
    // el: ".swiper-pagination",
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },

  slidesPerView: 4,
  spaceBetween: 10,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});


//review section
let items = document.querySelectorAll(".carousel .carousel-item");
items.forEach((el) => {
  const minPerSlide = 3;
  let next = el.nextElementSibling;
  for (var i = 1; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = items[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});

//own card
const card = document.querySelectorAll(".own-card");
card.forEach((el) => {
  el.addEventListener("mouseover", (e) => {
    const parent = e.target.closest(".own-card");
    const button = parent.querySelector(".addToCartContainer");
    button.style.display = "block";
    if(!button.classList.contains("hideBtn")){
      button.classList.add("showBtn");
    }
    button.classList.remove("hideBtn");
  });
  el.addEventListener("mouseleave", (e) => {
    const parent = e.target.closest(".own-card");
    const button = parent.querySelector(".addToCartContainer");
    button.style.display = "none";
    if(button.classList.contains("showBtn")){
      button.classList.remove("showBtn");
      button.classList.add("hideBtn");
    }
  });
});

const cardImage = document.querySelectorAll(".own-card-image");
cardImage.forEach((el) => {
  el.addEventListener("mouseover", (e) => {
    const parent = e.target.closest(".own-card");
    const button = parent.querySelector(".addToCartContainer");
    if(!button.classList.contains("hideBtn")){
      button.classList.add("showBtn");
    }
    button.classList.remove("hideBtn");
  });
  el.addEventListener("mouseleave", (e) => {
    const parent = e.target.closest(".own-card");
    const button = parent.querySelector(".addToCartContainer");
    if(button.classList.contains("showBtn")){
      button.classList.remove("showBtn");
      button.classList.add("hideBtn");
    }
  });
});



// hamburger menu
const menu = document.querySelector(".menu");
const menuItems = document.querySelectorAll(".menuItem");
const hamburger= document.querySelector(".hamburger");
const closeIcon= document.querySelector(".closeIcon");
const menuIcon = document.querySelector(".menuIcon");

function toggleMenu() {
  if (menu.classList.contains("showMenu")) {
    menu.classList.remove("showMenu");
    closeIcon.style.display = "none";
    menuIcon.style.display = "block";
  } else {
    menu.classList.add("showMenu");
    closeIcon.style.display = "block";
    menuIcon.style.display = "none";
  }
}

hamburger.addEventListener("click", toggleMenu);

menuItems.forEach(
  function(menuItem) {
    menuItem.addEventListener("click", toggleMenu);
  }
)
