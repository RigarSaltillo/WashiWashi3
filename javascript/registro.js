let username =document.getElementById('username')
let email = document.getElementById('email')
let telefono = document.getElementById('telefono')
let password = document.getElementById('password')
let rol= document.getElementById('Rol')
button.addEventListener('click', (e) => {
e.preventDefault()
 if(username.value.length <1 || username.value.trim()==""){
   let elment = document.querySelector(".usernamed");
   elment.lastElementChild.innerHTML="Error nombre no valido";
 }
 if(email.value.length <1 || email.value.trim()==""){
   let elment = document.querySelector(".email");
   elment.lastElementChild.innerHTML="Error email no valido";
 }
 if(password.value.length <1 || password.value.trim()==""){
   let elment = document.querySelector(".pasword");
   elment.lastElementChild.innerHTML="Error paswor no valido";
 }
 if(telefono.value.length <1 || telefono.value.trim()==""){
   let elment = document.querySelector(".telefono");
   elment.lastElementChild.innerHTML="Error telefono no valido";
 }

const data={
 
   username: username.value,
    email: email.value,
    telefono: telefono.value,
    password: password.value,
    rol: rol.value

 }
console.log(data)
})