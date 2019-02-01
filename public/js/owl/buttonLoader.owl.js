(function() {

    window.owl = window.owl || {};

    window.owl.buttonLoader = {
        register: function() {
            var buttons = document.querySelectorAll("button.btn-loader");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener("click", function(e) {

                    //e.currentTarget.setAttribute("disabled", true);
                    e.currentTarget.classList.add("loading", "disabled");
                });
            }
        },
        undo: function() {
            
            var buttons = document.querySelectorAll("button.btn-loader.loading");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("loading", "disabled");
            }
        }
    }

})();