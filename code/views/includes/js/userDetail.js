var delete_screen = document.getElementById("delete_screen")
function open_delete(element) {
    if (element.id == "delete_btn") {
        delete_screen.style.display = "flex"
        delete_screen.style.animation = "delete_screen_open 0.25s forwards"
    } else {
        delete_screen.style.animation = "delete_screen_close 0.25s forwards"
        setTimeout(() => {
            delete_screen.style.display = "none"
        }, 250);
    }
}