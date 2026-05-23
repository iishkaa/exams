const btn = document.querySelector("button")


btn.addEventListener("click", function (){
    const obraz = document.querySelector("#obraz")
    const liczbaKopii = Number(document.querySelector("#liczbaKopii").value)
    const matowy = document.querySelector("#matowy")
    const blyszczacy = document.querySelector("#blyszczacy")
    const nazwaPliku = obraz.files[0].name
    let cena = 0

    if (blyszczacy.checked) {
        cena = liczbaKopii * 1.5
    }
    else if(matowy.checked) {
        cena = liczbaKopii * 2
    }
    const sectionRight = document.querySelector(".right")
    const img = document.createElement("img")
    const paragraf = document.createElement("p")
    const paragraf2 = document.createElement("p")

    img.src = nazwaPliku
    paragraf.textContent = `Liczba kopii: ${liczbaKopii}`
    paragraf2.textContent = `Cena: ${cena}`

    sectionRight.appendChild(img)
    sectionRight.appendChild(paragraf)
    sectionRight.appendChild(paragraf2)

})