var delete_screen = document.getElementById("delete_screen")
var user_popup = document.getElementById("user_popup")
var main = document.getElementsByTagName("main")[0]
var loading_screen = document.getElementById("loading_screen")
var users
async function data_taker() {
    loading_screen.style.display = "flex"
    var data = await fetch(`http://localhost/notes_system/code/data_taker.php?request_type=0&require_login=1`)
    data = await data.json()
    loading_screen.style.display = "none"
    users = data
    users_creater()
}
data_taker()
function users_creater() {
    for (var user of users) {
        var a = document.createElement("a")
        a.setAttribute("href", `userData.php?id=${user.id}`)
        a.dataset.user_id = user.id - 1
        a.className = "user"
        a.style.backgroundImage = `url(uploads/${user.photo == null ? "default_profile.png" : user.photo})`
        a.addEventListener("mouseenter", function() {
            mouse_enter(this)
        })
        a.addEventListener("mouseleave", function() {
            mouse_leave(this)
        })
        var div = document.createElement("div")
        div.className = "user_name"
        var p = document.createElement("p")
        p.innerHTML = user.name
        div.appendChild(p)
        a.appendChild(div)
        main.appendChild(a)
    }
}
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
var timeout_active = false
var popup_timeout
function mouse_enter(element) {
    timeout_active = true
    popup_timeout = setTimeout(() => {
        var element_data = element.getBoundingClientRect()
        var element_user = users[Number(element.dataset.user_id)]
        user_popup.children[1].children[0].innerHTML = `<strong>Nome:</strong> ${element_user.name}`
        user_popup.children[1].children[1].innerHTML = `<strong>Login:</strong> ${element_user.login}`
        user_popup.children[1].children[2].innerHTML = `<strong>Level:</strong> ${["Cliente", "Admin"][element_user.level-1]}`
        var year = Number(element_user.entry_date.substring(0, 4))
        var month = Number(element_user.entry_date.substring(5, 7))
        var day = Number(element_user.entry_date.substring(8, 10))
        var month_name = ["jan","fev","mar","abr","mai","jun","jul","ago","set","oct","nov","dec"][month - 1]
        user_popup.children[1].children[3].innerHTML = `Desde ${day}, ${month_name} de ${year}`
        user_popup.style.top = `${element_data.top - 2.5}px`
        user_popup.style.left = `${element_data.left + element_data.width - 5}px`
        user_popup.style.display = "flex"
        user_popup.style.animation = "popup_open 0.5s forwards"
        timeout_active = false
    }, 500);
}
function mouse_leave(element) {
    if (timeout_active) {
        clearTimeout(popup_timeout)
        timeout_active = false
        return
    } else {
        user_popup.style.animation = "popup_close 0.25s forwards"
        setTimeout(() => {
            user_popup.style.display = "none"
        }, 250);
    }
}
