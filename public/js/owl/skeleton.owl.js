(function() {

    window.owl = window.owl || {};

    window.owl.skeleton = {
        register: function() {


            window.addEventListener('load', window.owl.skeleton._deactivateSkeleton);
        },
        _deactivateSkeleton: function() {
            var skeletons = document.querySelectorAll(".skeleton");

            for (let i = 0; i < skeletons.length; i++) {
                skeletons[i].addEventListener("transitionend", function(e){

                    if(e.propertyName == "opacity") {
                        skeletons[i].parentNode.removeChild(skeletons[i]);
                    }
                });
                skeletons[i].classList.add("fade");
            }
        }
    }

})();