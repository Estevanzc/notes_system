var aside = document.getElementsByTagName("aside")[0]
var profile_menu = document.getElementById("profile_menu")
var profile_data = document.getElementById("profile_btn").getBoundingClientRect()
function profile_dropdown(element) {
    if (element.dataset.open == 0) {
        profile_menu.style.top = `${profile_data.top + profile_data.height + 5 + window.scrollY}px`
        profile_menu.style.left = `${profile_data.left}px`
        element.dataset.open = 1
        element.style.borderBottomLeftRadius = "5px"
        element.style.borderBottomRightRadius = "5px"
        element.children[1].children[1].children[0].style.rotate = "180deg"
        profile_menu.style.display = "flex"
        profile_menu.style.animation = "open_menu 0.25s forwards"
    } else {
        element.dataset.open = 0
        element.style.borderBottomLeftRadius = "25px"
        element.style.borderBottomRightRadius = "25px"
        element.children[1].children[1].children[0].style.rotate = "0deg"
        profile_menu.style.animation = "close_menu 0.25s forwards"
        setTimeout(() => {
            profile_menu.style.display = "none"
        }, 250);
    }
}
function scroll_event(element) {
    profile_menu.style.top = `${profile_data.top + profile_data.height + 5 + window.scrollY}px`
}
function aside_open(element) {
    if (element.id == "aside_btn") {
        aside.style.width = "15vw"
    } else {
        aside.style.width = "0vw"
    }
}
