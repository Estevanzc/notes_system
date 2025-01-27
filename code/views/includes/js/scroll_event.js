var menu = document.getElementsByTagName("menu")[0]
var scroll_value = 0
function scroll_event(element) {
    var scroll_num = Number(window.scrollY)
    if (scroll_num > scroll_value && Number(menu.style.opacity) != 0.5) {
        menu.style.opacity = 0.5
    } else if (scroll_num < scroll_value && Number(menu.style.opacity) != 1) [
        menu.style.opacity = 1
    ]
    scroll_value = scroll_num
}