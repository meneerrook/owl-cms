(function() {

    window.owl = window.owl || {};

    window.owl.navigation = {
        register: function() {
            //window.owl.navigation._setSubmenuItem();
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
                window.owl.navigation._runMenuToggle(toggleCreateMenu[i], createMenu, menuOverlay);
            }
            for (var i = 0; i < toggleMobileMenu.length; i++) {
                window.owl.navigation._runMenuToggle(toggleMobileMenu[i], mainMenu, menuOverlay);
            }
        },
        _runMenuToggle: function(button, menu, menuOverlay) {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                if(menu.classList.contains("open")) {
                    menu.classList.remove("open");

                    if(!(menu.classList.contains("create-menu") && document.querySelector("#main-menu").classList.contains("open"))) {
                        menuOverlay.classList.remove("fadeIn");
                        setTimeout(function(){ 
                            menuOverlay.classList.remove("show")
                        }, 200);
                    }
                } else {
                    menu.classList.add("open");
                    menuOverlay.classList.add("show");
                    setTimeout(function(){ 
                        menuOverlay.classList.add("fadeIn");
                    }, 1);
                }
            });
        },
        _collapseMenus: function() {
            var mainMenu = document.querySelector("#main-menu");
            var createMenu = document.querySelector("#create-menu");
            var menuOverlay = document.querySelector("#menu-overlay");

            mainMenu.classList.remove("open");
            createMenu.classList.remove("open");
            menuOverlay.classList.remove("fadeIn");
            menuOverlay.classList.remove("show");
        }
    }

})();