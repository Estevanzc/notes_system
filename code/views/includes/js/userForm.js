var user_img = document.getElementById("user_img")
var photo_remove = document.getElementById("photo_remove")
var change_photo = document.getElementById("change_photo")
function del_btn(element, event) {
    change_photo.value = 1
    if (element.value != null) {
        photo_remove.style.display = "flex"
        photo_remove.style.opacity = 1
    }
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            user_img.style.backgroundImage = `url(${e.target.result})`
        };
        reader.readAsDataURL(file);
    }
}
function del_profile(element) {
    change_photo.value = 1
    photo_remove.style.opacity = 0
    setTimeout(() => {
        photo_remove.style.display = "none"
    }, 250);
    var input = document.createElement("input")
    input.setAttribute("type", "file")
    input.setAttribute("accept", ".png, .jpg, .jpeg")
    input.id = "photo"
    input.name = "photo"
    input.addEventListener("change", function() {
        del_btn(this, event)
    })
    element.parentNode.parentNode.children[0].removeChild(element.parentNode.parentNode.children[0].children[0])
    element.parentNode.parentNode.children[0].appendChild(input)
    user_img.style.backgroundImage = `url(uploads/default_profile.png)`
}
