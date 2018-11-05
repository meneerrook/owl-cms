(function() {

    window.owl = window.owl || {};

    window.owl.buttonLoader = {
        register: function() {
            var buttons = document.querySelectorAll("button.btn-loader");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener("click", function(e) {

                    e.currentTarget.setAttribute("disabled", true);
                    e.currentTarget.classList.add("loading");
                });
            }
        },
        undo: function(button) {
            button.removeAttribute("disabled", false);
            button.classList.remove("loading");
        }
    }

})();