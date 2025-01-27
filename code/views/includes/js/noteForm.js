var delete_screen = document.getElementById("delete_screen")
async function data_taker(filter = []) {
    var data = await fetch(`http://localhost/notes_system/code/data_taker.php?request_type=1&filter=${encodeURIComponent(JSON.stringify(filter))}`)
    data = await data.json()
    note_num = Number(data.length) + 1
}
var note_num = 0
data_taker()
function title_blur(element) {
    if (element.value.replace(/\s+/g, '') == "") {
        element.value = `Nota[${note_num}]`
    }
}
function remind_blur(element) {
    const date = new Date()
    var cur_day = date.getDate()
    var cur_month = date.getMonth() + 1
    var cur_year = date.getFullYear()
    var in_year = Number(element.value.substring(0, 4))
    var in_month = Number(element.value.substring(5, 7))
    var in_day = Number(element.value.substring(8, 10))
    if ((in_day - cur_day) + (in_month - cur_month) + (in_year - cur_year) < 0) {
        element.value = `${cur_year}-${cur_month < 10 ? "0" + cur_month : cur_month}-${cur_day < 10 ? "0" + cur_day : cur_day}`
    }
}
function remind_date(element) {
    if (element.children[0].classList.contains("toggle")) {
        element.children[0].classList.remove("toggle")
        element.parentNode.parentNode.children[1].classList.remove("visible")
    } else {
        element.children[0].classList.add("toggle")
        element.parentNode.parentNode.children[1].classList.add("visible")
        element.parentNode.parentNode.children[1].value = ""
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
