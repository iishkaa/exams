const obraz1 = document.querySelector("#pszczolka")
const obraz2 = document.querySelector("#pomaranczka")
const obraz3 = document.querySelector("#owocki")
const obraz4 = document.querySelector("#zolwik")
const btnZastosuj = document.querySelector("#btnZastosuj")
const btnZastosuj2 = document.querySelector("#btnZastosuj2")
const btnZastosuj3 = document.querySelector("#btnZastosuj3")
const btnKolor = document.querySelector("#kolor")
const btnCzarny = document.querySelector("#czarnoBialy")
btnZastosuj.addEventListener("click", function (){
    const blur = document.querySelector("#blur")
    const sepia = document.querySelector("#sepia")
    const negatyw = document.querySelector("#negatyw")

    if (blur.checked) {
        obraz1.style.filter = "blur(4px)"
    }
    else if (sepia.checked) {
        obraz1.style.filter = "sepia(100%)"
    }
    else if (negatyw.checked) {
        obraz1.style.filter = "invert(100%)"
    }
})
btnCzarny.addEventListener("click", function (){
    obraz2.style.filter = "grayscale(100%)"
})
btnKolor.addEventListener("click", function (){
    obraz2.style.filter = "grayscale(0%)"
})
btnZastosuj2.addEventListener("click", function (){
    const suwak = parseInt(document.querySelector("#suwakOwoce").value)
    obraz3.style.filter = `opacity(${suwak}%)`
})
btnZastosuj3.addEventListener("click", function (){
    const suwak2 = parseInt(document.querySelector("#suwakZolw").value)
    obraz4.style.filter = `brightness(${suwak2}%)`
})