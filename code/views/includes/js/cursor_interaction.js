const viewportWidth = window.innerWidth || document.documentElement.clientWidth;
const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
var page_background = document.getElementById("page_background")
function cursor_locate(event) {
    var x_position = event.clientX * 100 / viewportWidth
    var y_position = event.clientY * 100 / viewportHeight
    page_background.style.backgroundPosition = `bottom ${y_position}% right ${x_position}%`
}
