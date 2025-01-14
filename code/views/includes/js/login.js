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
