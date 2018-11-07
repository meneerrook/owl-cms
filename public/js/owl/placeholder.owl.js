(function() {

    window.owl = window.owl || {};

    window.owl.placeholder = {
        register: function() {
            var inputs = document.querySelectorAll(".grouped-input input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener("focusout", function(e) {
                    window.owl.placeholder._checkValue(e.currentTarget);
                });
            }
        },
        _checkValue: function(element) {
            console.log(element.value.length);
            if(element.value.length > 0) {
                
                element.classList.add("val-exists");
            } else {
                element.classList.remove("val-exists");
            }
        }
    }

})();