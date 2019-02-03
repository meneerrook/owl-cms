(function() {

    window.owl = window.owl || {};

    window.owl.placeholder = {
        register: function() {
            var inputs = document.querySelectorAll(".grouped-input input, .grouped-input select");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener("focusout", function(e) {
                    window.owl.placeholder._checkValue(e.currentTarget);
                });
            }
        },
        _checkValue: function(element) {
            console.log(element.value.length);

            var value;
            if(element instanceof HTMLInputElement) {
                value = element.value.length;
            } else if (element instanceof HTMLSelectElement) {
                value = element.options[element.selectedIndex].value.length;
            }

            if (value > 0) {
                element.classList.add("val-exists");
            } else {
                element.classList.remove("val-exists");
            }

            
        }
    }

})();