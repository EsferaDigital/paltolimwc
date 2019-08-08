const headerAnimado = () =>{
  let header = document.getElementById('Header')
  let pageActual = window.location.pathname

  if(pageActual != "/"){
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
  if(pageActual == "/tienda/"){
    t.classList.remove('ocultar')
    t.classList.add('mostrar')
  }else if(pageActual != "/tienda/"){
    t.classList.remove('mostrar')
    t.classList.add('ocultar')
  }
}


export {headerAnimado, OnLoad}
