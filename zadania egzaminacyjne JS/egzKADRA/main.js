const cytat1 = document.querySelector(".cytat1")
const cytat2 = document.querySelector(".cytat2")
const cytat3 = document.querySelector(".cytat3")

cytat1.addEventListener("click", function (){
    cytat1.style.display = "none";
    cytat2.style.display = "block"
    cytat3.style.display = "none"
})
cytat2.addEventListener("click", function (){
    cytat1.style.display = "none"
    cytat2.style.display = "none"
    cytat3.style.display = "block"
})
cytat3.addEventListener("click", function (){
    cytat1.style.display = "block"
    cytat2.style.display = "none"
    cytat3.style.display = "none"
})