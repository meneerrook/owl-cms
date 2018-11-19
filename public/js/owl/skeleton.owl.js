(function() {

    window.owl = window.owl || {};

    window.owl.skeleton = {
        register: function() {
            window.addEventListener('load', window.owl.skeleton._deactivateSkeleton);
        },
        _deactivateSkeleton: function() {
            var skeletonWrapper = document.querySelector("#skeleton-wrapper");
            if(skeletonWrapper) {
                skeletonWrapper.addEventListener("transitionend", function(e){
                    if(e.propertyName == "opacity") {
                        skeletonWrapper.parentNode.removeChild(skeletonWrapper);
                    }
                });
                skeletonWrapper.classList.add("fade");
            }
            
        }
    }

})();