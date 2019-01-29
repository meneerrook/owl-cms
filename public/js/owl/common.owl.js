(function() {

    window.owl = window.owl || {};

    window.owl.common = {
        register: function() {
            window.owl.common._toggler();
            window.owl.common._userMenuHandler();
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
        _showLoaders: function(menuDifference) {
            var loaders = document.querySelectorAll(".loader-wrapper");
            for (let i = 0; i < loaders.length; i++) {

                if(!menuDifference && loaders[i].classList.contains("menu-loader")) {
                    continue;
                }

                loaders[i].style.display = "block";
            }
        },
        _hideLoaders: function() {
            var loaders = document.querySelectorAll(".loader-wrapper");
            for (let i = 0; i < loaders.length; i++) {
                loaders[i].style.display = "none";
            }
        },
        _userMenuHandler: function() {
            var links = document.querySelectorAll("#user-menu a");
            for(let i = 0; i < links.length; i++) {
                links[i].addEventListener("click", function() {
                    document.querySelector("[data-toggle='#user-menu']").classList.remove("active");
                    document.querySelector("#user-menu").classList.add("hidden");
                });
            }
        }
    }

})();