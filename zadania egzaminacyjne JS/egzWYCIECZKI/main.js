const btn1 = document.querySelector("#btn1")
const btn2 = document.querySelector("#btn2")
let licznik = 1
const zdjPodmiana = document.querySelector("#zdjecieMain")

btn1.addEventListener("click", function (){
    licznik++

    if (licznik > 7){
        licznik = 1
    }

    zdjPodmiana.src = licznik + ".jpg";
})
btn2.addEventListener("click", function (){
    licznik--

    if (licznik < 1) {
        licznik = 7
    }

    zdjPodmiana.src = licznik + ".jpg"
})