
let addBtn = document.querySelector(".addBtn");
let overlay = document.querySelector(".overlay");
let popupFormAdd = document.querySelector(".popup-form-add");
addBtn.addEventListener("click", function () {
    popupFormAdd.classList.add("popup-form-add-visible");
    overlay.classList.add("overlay-active");
    overlay.classList.remove("overlay-click");
});
//DODAVANJE
let exitBtnAdd = document.querySelector(".popup-add-exit-btn");

exitBtnAdd.addEventListener("click", function (e) {
    e.preventDefault();
    popupFormAdd.classList.remove("popup-form-add-visible");
    overlay.classList.remove("overlay-active");
})

// UPDATE
// let changeBtn = document.querySelectorAll(".changeBtn");
// let popupFormUpdate = document.querySelector(".popup-form-update");
// for (let btn of changeBtn) {
//     btn.addEventListener("click", function ($event) {
//         $event.preventDefault();
//         popupFormUpdate.classList.add("popup-form-update-visible");
//         overlay.classList.add("overlay-active");
//     });
// }
let popupFormUpdate = document.querySelector(".popup-form-update");
let changeForm = document.querySelectorAll(".changeForm");
let invisibleMushroomId = document.querySelector("#invisibleMushroomId");
for (let form of changeForm) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        invisibleMushroomId.setAttribute("value", document.querySelector("#mushroomId").value);
        popupFormUpdate.classList.add("popup-form-update-visible");
        overlay.classList.add("overlay-active");
    });
}







//exit


let exitBtnUpdate = document.querySelector(".popup-update-exit-btn");
exitBtnUpdate.addEventListener("click", function ($e) {
    $e.preventDefault();
    popupFormUpdate.classList.remove("popup-form-update-visible");
    overlay.classList.remove("overlay-active");
})