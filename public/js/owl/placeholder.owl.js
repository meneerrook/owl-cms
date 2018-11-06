(function() {

    window.owl = window.owl || {};

    window.owl.placeholder = {
        register: function() {
            window.addEventListener('load', window.owl.placeholder._deactivatePlaceholder);
        },
        _deactivatePlaceholder: function() {
            var loadContainer = document.querySelector("#placeholder");
            loadContainer.addEventListener("transitionend", function(e){
                if(e.propertyName == "opacity") {
                    loadContainer.parentNode.removeChild(loadContainer);
                }
            });
            loadContainer.classList.add("fade");
        }
    }

})();