(function() {

    window.owl = window.owl || {};

    window.owl.navigation = {
        register: function() {
            window.owl.navigation._setSubmenuItem();
            window.owl.navigation._setMenuToggler();
        },
        _setMenuToggler: function() {
            var toggleCreateMenu = document.querySelectorAll(".toggle-create-menu");
            var createMenu = document.querySelector("#create-menu");

            var toggleMobileMenu = document.querySelectorAll(".toggle-main-menu");
            var mainMenu = document.querySelector("#main-menu");
            
            var menuOverlay = document.querySelector("#menu-overlay");
            var content = document.querySelector("#content");

            for (var i = 0; i < toggleCreateMenu.length; i++) {
                window.owl.common._runMenuToggle(toggleCreateMenu[i], createMenu, menuOverlay, content);
            }
            for (var i = 0; i < toggleMobileMenu.length; i++) {
                window.owl.common._runMenuToggle(toggleMobileMenu[i], mainMenu, menuOverlay, content);
            }
        },
        _runMenuToggle: function(button, menu, menuOverlay, content) {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                if(menu.classList.contains("open")) {
                    menu.classList.remove("open");

                    if(!(menu.classList.contains("create-menu") && document.querySelector("#main-menu").classList.contains("open"))) {
                        menuOverlay.classList.remove("fadeIn");
                        content.classList.remove("blur");
                        setTimeout(function(){ 
                            menuOverlay.classList.remove("show")
                        }, 200);
                    }
                } else {
                    menu.classList.add("open");
                    menuOverlay.classList.add("show");
                    content.classList.add("blur");
                    setTimeout(function(){ 
                        menuOverlay.classList.add("fadeIn");
                    }, 1);
                }
            });
        }
    }

})();