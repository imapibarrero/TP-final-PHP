const capturaInputA = document.getElementById("inputA")
const capturaInputB = document.getElementById('categoria')
// const capturaInputC = document.getElementById("inputC")
// const capturaInputD = document.getElementById("inputD")
const capturaLabel = document.getElementById("valorInput")

console.log(capturaLabel)

console.log(capturaInputA)

console.log(capturaInputA.value)

function sumarInput(){

   console.log("funciona el boton")
   console.log(capturaInputA.value)
   console.log(capturaInputB.value)
   // console.log(capturaInputC.value)
   // console.log(capturaInputD.value)
   // console.log(cat)

   capturaLabel.textContent = Number(capturaInputA.value) * Number(capturaInputB.value)
}
console.log(capturaLabel)
