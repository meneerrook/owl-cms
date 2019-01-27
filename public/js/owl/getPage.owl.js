(function() {

    window.owl = window.owl || {};

    window.owl.getPage = {
        register: function() {
            var menuItems = document.querySelectorAll("[data-xhr-page]");
            for (let i = 0; i < menuItems.length; i++) {

                if(menuItems[i].getAttribute("data-has-event") && menuItems[i].getAttribute("data-has-event") == "true") {
                    continue
                }

                menuItems[i].setAttribute("data-has-event", "true");
                menuItems[i].addEventListener("click", function(e) {

                    window.owl.getPage._preparePage(e).then(function(){

                            var method = "GET";
                            var url = e.currentTarget.getAttribute("href");
                            if(!e.currentTarget.classList.contains("back-link")) {
                                window.owl.navigation._collapseMenus();
                                document.querySelector(".content-loader").classList.add("toFullWidth");
                            }

                            window.owl.getPage._getPage(method, url)
                                .then(response => window.owl.getPage._renderPage(response, url, e))
                                .then(window.owl.getPage.register);
                    });
                });
            }
        },
        _preparePage(e) {
            return new Promise( (resolve, reject) => {
                e.preventDefault();
                
                
                var rightMenu = document.querySelector("#right-menu");


                var toSubMenu_Statement = !rightMenu.classList.contains("submenu") && e.currentTarget.classList.contains("has-sub-menu");
                var toMainMenu_Statement = rightMenu.classList.contains("submenu") && !e.currentTarget.classList.contains("has-sub-menu");

                if(toSubMenu_Statement || toMainMenu_Statement) {

                    if(toSubMenu_Statement) {
                        rightMenu.classList.add("submenu");
                        
                    } else if (toMainMenu_Statement) {
                        rightMenu.classList.remove("submenu");
                    }
                    window.owl.common._showLoaders(true);
                    rightMenu.innerHTML = "";
                } else {
                    window.owl.common._showLoaders(false);
                }

                var activeItem = document.querySelector("#right-menu ul li.active");
                if(activeItem) {
                    activeItem.classList.remove("active");
                }
                e.currentTarget.parentNode.classList.add("active");
                resolve();
            });
        },
        _getPage(method, url) {
            return new Promise((resolve, reject) => {
        
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                request.send();
                
                request.onload = () => {
                    resolve(JSON.parse(request.responseText));
                }
        
                request.onerror = () => {
                    //reject("Error: XHR Request failed");
                    alert("Error: XMLHTTPRequest failed, please contact the system administrator. You can reload the page to restore the previous state.");
                }
            });
        },
        _renderPage(response, url, e) {
            window.history.pushState({"html":"","pageTitle":"Owl"},"", url);

            console.log(response);

            document.querySelector("#right-menu").innerHTML = response.html.navigation;
            document.querySelector("#content").innerHTML = response.html.content;
            document.querySelector("#loader-wrapper").style.display = "none";

            window.owl.common._hideLoaders();
            document.querySelector(".content-loader").classList.remove("toFullWidth");
        }
    }

})();