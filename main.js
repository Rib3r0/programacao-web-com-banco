window.onscroll = function() {scrollFunction()}

function scrollFunction() {
  if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
    document.getElementById("header").classList.add('hidden-header')
    document.getElementById("logo").classList.add('hidden-logo')
    document.getElementById("nav").classList.add('hidden-nav')
    document.getElementById("autenticacao").classList.add('hidden-autenticacao')
  } else {
    document.getElementById("header").classList.remove('hidden-header')
    document.getElementById("logo").classList.remove('hidden-logo')
    document.getElementById("nav").classList.remove('hidden-nav')
    document.getElementById("autenticacao").classList.remove('hidden-autenticacao')
  }
}