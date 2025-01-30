var form = document.getElementsByTagName("form")[0]
var input_verifyer = document.getElementsByClassName("input_verifyer")
var users = []
async function data_taker(require_login = 0) {
    var data = await fetch(`http://localhost/notes_system/code/data_taker.php?request_type=0&require_login=${require_login}`)
    data = await data.json()
    users = data
}
data_taker()
function logon_verifyer() {
    var submit_value = true
    var login = document.getElementById("login")
    var name = document.getElementById("name")
    var password = document.getElementsByName("password")[0] ? document.getElementsByName("password")[0] : false
    var email_pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (name.value.replace(/ /g, "") == "") {
        name.style.borderColor = "rgb(205, 68, 68) !important"
        name.parentNode.children[2].innerHTML = "Campo obrigatório vazio"
        name.parentNode.children[2].style.opacity = 1
        submit_value = false
    } else {
        name.style.borderColor = "#acacac !important"
        name.parentNode.children[2].style.opacity = 0
    }
    var user = users.find(value => value.login == login.value)
    if (user) {
        if (password) {
            login.style.borderColor = "rgb(205, 68, 68) !important"
            login.parentNode.children[2].innerHTML = "Login já em uso"
            login.parentNode.children[2].style.opacity = 1
            submit_value = false
        } else {
            var user_by_id = users.find(value => value.id == Number(document.getElementById("id").value))
            if (user_by_id.login != login.value) {
                login.style.borderColor = "rgb(205, 68, 68) !important"
                login.parentNode.children[2].innerHTML = "Login já em uso"
                login.parentNode.children[2].style.opacity = 1
                submit_value = false
            } else {
                login.style.borderColor = "#acacac !important"
                login.parentNode.children[2].style.opacity = 0
            }
        }
    } else if (Number(login.value.replace(/ /g, "").length) < 11 || !email_pattern.test(login.value.replace(/ /g, ""))) {
        login.style.borderColor = "rgb(205, 68, 68) !important"
        login.parentNode.children[2].innerHTML = "Campo obrigatório incorreto"
        login.parentNode.children[2].style.opacity = 1
        submit_value = false
    } else {
        login.style.borderColor = "#acacac !important"
        login.parentNode.children[2].style.opacity = 0
    }
    if (password) {
        if (password.value.replace(/ /g, "") == "") {
            password.parentNode.parentNode.children[2].innerHTML = "Campo obrigatório vazio"
            password.parentNode.parentNode.children[2].style.opacity = 1
            password.style.borderColor = "rgb(205, 68, 68) !important"
            submit_value = false
        } else {
            password.parentNode.parentNode.children[2].style.opacity = 0
            password.style.borderColor = "#acacac !important"
        }
    }
    if (submit_value) {
        form.submit()
    }
}
function login_verifyer() {
    var submit_value = true
    var login = input_verifyer[0]
    var password = input_verifyer[1]
    var user = users.find(value => value.login == login.value.replace(/ /g, ""))
    if (user) {
        login.style.borderColor = "#acacac !important"
        login.parentNode.children[2].style.opacity = 0
        if (user.password == CryptoJS.MD5(password.value).toString()) {
            password.parentNode.parentNode.children[2].style.opacity = 0
            password.style.borderColor = "#acacac !important"
        } else {
            password.parentNode.parentNode.children[2].innerHTML = "Senha incorreta"
            password.parentNode.parentNode.children[2].style.opacity = 1
            password.style.borderColor = "rgb(205, 68, 68) !important"
            submit_value = false
        }
    } else {
        login.style.borderColor = "rgb(205, 68, 68) !important"
        login.parentNode.children[2].innerHTML = "Nenhum usuário encontrado"
        login.parentNode.children[2].style.opacity = 1
        submit_value = false
    }
    if (submit_value) {
        form.submit()
    }
}
//CryptoJS.MD5("admin").toString()
//rgb(205, 68, 68) #acacac
