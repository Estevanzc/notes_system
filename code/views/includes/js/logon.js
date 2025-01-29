var profile_name = document.getElementById("profile_name")
var profile_date = document.getElementById("profile_date")
var entry_date = document.getElementById("entry_date")
var profile_img = document.getElementById("profile_img").children[0]
function pass_visibility(element) {
    var pass_input = element.parentNode.children[0]
    if (pass_input.getAttribute("type") == "password") {
        pass_input.setAttribute("type", "text")
        element.children[0].className = "fa-solid fa-eye"
        return
    }
    pass_input.setAttribute("type", "password")
    element.children[0].className = "fa-solid fa-eye-slash"
}
function input_focus(element) {
    element.children[0].focus()
    element.style.transition = "all 0.25s ease"
    element.style.borderColor = "rgb(82, 151, 255)"
    element.style.boxShadow = "1px 1px 5px rgba(45, 45, 45, 0.5)"
}
function input_blur(element) {
    element.parentNode.style.transition = "all 0.25s ease"
    element.parentNode.style.borderColor = "#acacac"
    element.parentNode.style.boxShadow = "none"
}
function del_btn(element, event) {
    if (element.value != null) {
        element.parentNode.children[0].style.display = "flex"
        element.parentNode.children[0].style.opacity = 1
    }
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profile_img.style.backgroundImage = `url(${e.target.result})`
        };
        reader.readAsDataURL(file);
    }
}
function del_profile(element) {
    element.style.display = "none"
    element.style.opacity = 0
    element.parentNode.removeChild(element.parentNode.children[1])
    var input = document.createElement("input")
    input.setAttribute("type", "file")
    input.setAttribute("accept", ".png, .jpg, .jpeg")
    input.id = "photo"
    input.name = "photo"
    input.addEventListener("change", function() {
        del_btn(this, event)
    })
    element.parentNode.appendChild(input)
    profile_img.style.backgroundImage = `url(uploads/default_profile.png)`
}
function change_name(element) {
    profile_name.innerText = element.value
}
const date = new Date()
var day = date.getDate()
var month = date.getMonth()
var year = date.getFullYear()
var month_name = ["jan","fev","mar","abr","mai","jun","jul","ago","set","oct","nov","dec"][month]
entry_date.value = `${year}-${month + 1}-${day}`
profile_date.innerHTML = `Desde ${day}, ${month_name} de ${year}`
