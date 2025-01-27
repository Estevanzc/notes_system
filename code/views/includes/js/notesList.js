var main = document.getElementsByTagName("main")[0]
var filter_window = document.getElementById("filter_window")
var loading_screen = document.getElementById("loading_screen")
var empty_screen = document.getElementById("empty_screen")
var search_option = document.getElementsByClassName("search_option")
var notes_data = filter_close({id: "filter_apply"})
var scroll_value = 0
async function data_taker(request_type = 0, filter = [], require_login = 0) {
    loading_screen.style.display = "flex"
    var data = await fetch(`http://localhost/notes_system/code/data_taker.php?request_type=${request_type}&` + (request_type == 1 ? `filter=${encodeURIComponent(JSON.stringify(filter))}` : `require_login=${require_login}`))
    data = await data.json()
    loading_screen.style.display = "none"
    return data
}
function remove_main_child() {
    var child_num = main.children.length - 1
    for (var i = 2; i <= child_num; i ++) {
        main.removeChild(main.children[2])
    }
}
function list_style(element) {
    main.className = element.dataset.style_type
    element.style.backgroundColor = "rgb(174, 201, 217)"
    element.parentNode.children[(element.dataset.style_type == "notes_summary" ? 1 : 0)].style.backgroundColor = "transparent"
}
function filter_open(element) {
    filter_window.style.display = "flex"
    filter_window.style.animation = "filter_open 0.25s forwards"
}
async function filter_close(element) {
    filter_window.style.animation = "filter_close 0.25s forwards"
    setTimeout(() => {
        filter_window.style.display = "none"
    }, 250);
    if (element.id == "filter_apply") {
        var string = search_option[0].children[1].value
        var remind_date = search_option[2].children[1].value
        var create_date = search_option[1].children[1].value
        remove_main_child()
        //console.log(`http://localhost/notes_system/code/data_taker.php?request_type=1&filter=${encodeURIComponent(JSON.stringify([string.replace(/\s+/g, '') == "" ? "" : string, Number(remind_date), Number(create_date)]))}`);
        notes_data = await data_taker(1, [string.replace(/\s+/g, '') == "" ? "" : string, Number(remind_date), Number(create_date)])
        notes_creater(notes_data)
        if (Number(notes_data.length) == 0) {
            empty_screen.style.display = "flex"
        } else {
            empty_screen.style.display = "none"
        }
    }
}
function notes_creater() {
    for (var note of notes_data) {
        var item = document.createElement("a")
        item.setAttribute("href", `note.php?id=${note.id}`)
        item.className = "note"
        var top_note = document.createElement("div")
        var mid_note = document.createElement("div")
        var bot_note = document.createElement("div")
        top_note.className = "top_note"
        mid_note.className = "mid_note"
        bot_note.className = "bot_note"
        var h3 = document.createElement("h3")
        var h4 = document.createElement("h4")
        var h41 = document.createElement("h4")
        var h42 = document.createElement("h4")
        var p = document.createElement("p")
        h3.innerText = note.title
        h4.innerHTML = `<strong>Código da nota:</strong>${note.id}`
        p.innerText = note.description
        h41.innerText = `Data de criação: ${date_formater(note.create_date)}`
        h42.innerText = `Data de lembrete: ${note.remind_date == null ? "Não definido" : date_formater(note.remind_date)}`
        top_note.appendChild(h3)
        top_note.appendChild(h4)
        mid_note.appendChild(p)
        bot_note.appendChild(h41)
        bot_note.appendChild(h42)
        item.appendChild(top_note)
        item.appendChild(mid_note)
        item.appendChild(bot_note)
        main.appendChild(item)
    }
}
function date_formater(date) {
    return `${Number(date.substring(8, 10))}, ${["jan","fev","mar","abr","mai","jun","jul","ago","set","oct","nov","dec"][Number(date.substring(5, 7))]} de ${date.substring(0, 4)}`
}
/*
menu perfil margin-top em overflow-y
filtro
*/