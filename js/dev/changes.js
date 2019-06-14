const headerAnimado = () =>{
  let header = document.getElementById('Header')
  let pageActual = window.location.pathname

  if(pageActual != "/PaltolimWC/"){
    header.classList.add('Header-active')
  }else {
    header.classList.remove('Header-active')
  }
}
const OnLoad = () =>{
  window.onload = function(){
    eliminaTitle()
  }
}
const eliminaTitle = () =>{
  const t = document.querySelector('#text-2 > h3')
  let pageActual = window.location.pathname
  if(pageActual == "/PaltolimWC/tienda/"){
    t.classList.remove('ocultar')
    t.classList.add('mostrar')
  }else if(pageActual != "/PaltolimWC/tienda/"){
    console.log('entro')
    t.classList.remove('mostrar')
    t.classList.add('ocultar')
  }
  console.log(pageActual)
  console.log(t)
}

export {headerAnimado, OnLoad}
