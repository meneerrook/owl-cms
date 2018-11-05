function init() {

    var buttons = document.querySelectorAll("button.btn-loader");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(e) {
            buttonLoader(e.currentTarget);
        });
    }
}

function buttonLoader(button) {
    button.setAttribute("disabled", true);
    button.classList.add("loading");
}

init();