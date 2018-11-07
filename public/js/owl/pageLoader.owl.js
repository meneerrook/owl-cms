(function() {

    window.owl = window.owl || {};

    window.owl.pageLoader = {
        register: function() {
            window.addEventListener('load', window.owl.pageLoader._deactivatePageLoader);
        },
        _deactivatePageLoader: function() {
            var loadContainer = document.querySelector("#pageLoader");
            if(loadContainer) {
                loadContainer.addEventListener("transitionend", function(e){
                    if(e.propertyName == "opacity") {
                        loadContainer.parentNode.removeChild(loadContainer);
                    }
                });
                loadContainer.classList.add("fade");
            }
            
        }
    }

})();