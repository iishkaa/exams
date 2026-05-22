const btn = document.querySelector("#btn")
const lista = document.querySelector("ul")
btn.addEventListener("click", function (){
    const tresc = document.querySelector("input").value


    const newLi = document.createElement("li")
    const btnWykonane = document.createElement("button")

    btnWykonane.className = "wykonane"
    btnWykonane.textContent = "Wykonane"

    newLi.textContent = tresc + " "

    newLi.appendChild(btnWykonane)
    lista.appendChild(newLi)
})
lista.addEventListener("click", function (e){
    if (e.target.classList.contains("wykonane")) {

        const elementListy = e.target.parentElement

        elementListy.style.textDecoration = "line-through"
    }
})


