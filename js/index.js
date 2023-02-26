
let addBtn = document.querySelector(".addBtn");
let overlay = document.querySelector(".overlay");
let popupForm = document.querySelector(".popup-form");
addBtn.addEventListener("click", function () {
    popupForm.classList.add("popup-form-visible");
    overlay.classList.add("overlay-active");
});