import scrollTo from 'scroll-to'

export default {
  afterEnter: function (el) {
  	let rect = el.getBoundingClientReact()
    let top = rect.top + (window.pageYOffset || document.document.scrollTop)
    let center = ((window.innerHeight || window.clientHeight) - rect.height) / 2
    scrollTo(0, top - center, {duration: 500})
  }
}
