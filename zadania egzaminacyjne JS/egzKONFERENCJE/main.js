const btn1 = document.querySelector("#button1")
const btn2 = document.querySelector("#button2")
const btn3 = document.querySelector("#button3")
const div1 = document.querySelector(".one")
const div2 = document.querySelector(".two")
const div3 = document.querySelector(".three")
btn1.addEventListener("click", function (){
    div1.style.visibility = "hidden"
    div2.style.visibility = "visible"
    div3.style.visibility = "hidden"
})
btn2.addEventListener("click", function (){
    div1.style.visibility = "hidden"
    div2.style.visibility = "hidden"
    div3.style.visibility = "visible"
})
btn3.addEventListener("click", function (){
    const password = document.querySelector("#password").value
    const pass2 = document.querySelector("#passwordRepeat").value

    if (password !== pass2) {
        alert("Podane hasła różnią się")
    }
    const imie = document.querySelector("#imie").value
    const nazwisko = document.querySelector("#nazwisko").value

    console.log(`Witaj ${imie} ${nazwisko}`)

})