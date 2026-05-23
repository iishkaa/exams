const btnKlient = document.querySelector("#one")
const btnAdres = document.querySelector("#two")
const btnKontakt = document.querySelector("#three")
const section1 = document.querySelector(".one")
const section2 = document.querySelector(".two")
const section3 = document.querySelector(".three")
btnKlient.addEventListener("click" , function (){
    section1.style.display = "block"
    section2.style.display = "none"
    section3.style.display = "none"
})
btnAdres.addEventListener("click", function (){
    section1.style.display = "none"
    section2.style.display = "block"
    section3.style.display = "none"
})
btnKontakt.addEventListener("click", function (){
    section1.style.display = "none"
    section2.style.display = "none"
    section3.style.display = "block"
})

let szerokosc = 4;

function zmienPostep(){
    szerokosc+= 12;

    if (szerokosc> 100) {
        szerokosc = 100;
    }
    document.getElementById("blok").style.width = szerokosc + "%";
}
let pola = document.querySelectorAll("input")

for (let i = 0; i < pola.length; i++){
    pola[i].addEventListener("blur", zmienPostep)
}
const btnZatwierdz = document.querySelector("#zatwierdz")

btnZatwierdz.addEventListener("click", function (){
    const imie = document.querySelector("#imie").value
    const nazwisko = document.querySelector("#nazwisko").value
    const dataUr = document.querySelector("#dataUr").value
    const ulica = document.querySelector("#ulica").value
    const nrUl = document.querySelector("#nrUl").value
    const miasto = document.querySelector("#miasto").value
    const nrTel = document.querySelector("#nrTel").value
    const RODO = document.querySelector("#rodo")
    let rodoTF = ""
    if (RODO.checked){
        rodoTF = "on"
    }
    else {
        rodoTF = "off"
    }
    console.log(`${imie}
    ${nazwisko}
    ${dataUr}
    ${ulica}
    ${nrUl}
    ${miasto}
    ${nrTel}
    ${rodoTF}`)

})