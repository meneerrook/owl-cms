(function() {

    window.owl = window.owl || {};

    window.owl.common = {
        register: function() {
            window.owl.common._toggler();
            window.owl.common._createMenuToggler();
        },
        _toggler: function() {
            var toggleButton = document.querySelectorAll("[data-toggle]");

            for (var i = 0; i < toggleButton.length; i++) {
                toggleButton[i].addEventListener('click', function(e) {
                    e.preventDefault();

                    var toggleItem = document.querySelector(this.dataset.toggle);
                    
                    if(toggleItem.classList.contains("hidden")) {
                        toggleItem.classList.remove("hidden");
                        this.classList.add("active");
                    } else {
                        toggleItem.classList.add("hidden");
                        this.classList.add("active");
                    }
                    
                });
                
            }
        },
        _createMenuToggler: function() {
            var toggleCreateMenu = document.querySelectorAll(".toggle-create-menu");
            var createMenu = document.querySelector("#create-menu");
            var createMenuOverlay = document.querySelector("#create-menu-overlay");
            var content = document.querySelector("#content");

            for (var i = 0; i < toggleCreateMenu.length; i++) {
                toggleCreateMenu[i].addEventListener("click", function(e) {
                    e.preventDefault();
                    
                    if(createMenu.classList.contains("open")) {

                        createMenu.classList.remove("open");
                        createMenuOverlay.classList.remove("fadeIn");
                        content.classList.remove("blur");
                        setTimeout(function(){ 
                            createMenuOverlay.classList.remove("show")
                        }, 200);

                    } else {
                        createMenu.classList.add("open");
                        createMenuOverlay.classList.add("show");
                        content.classList.add("blur");
                        setTimeout(function(){ 
                            createMenuOverlay.classList.add("fadeIn");
                        }, 1);
                    }
                    
                });
            }
        }
    }

})();