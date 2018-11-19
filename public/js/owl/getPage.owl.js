(function() {

    window.owl = window.owl || {};

    window.owl.getPage = {
        register: function() {
            var menuItems = document.querySelectorAll("[data-xhr-page]");
            for (var i = 0; i < menuItems.length; i++) {

                menuItems[i].addEventListener("click", function(e) {
                    e.preventDefault();

                    document.querySelector("#loader-wrapper").style.display = "block";
                    if(e.currentTarget.classList.contains("has-sub-menu")) {
                        document.querySelector("#right-menu").classList.add("submenu");
                        document.querySelector("#right-menu").innerHTML = "";
                    }
                    
                    var activeItem = document.querySelector("#right-menu ul li.active");
                    if(activeItem) {
                        activeItem.classList.remove("active");
                    }
                    e.currentTarget.parentNode.classList.add("active");

                    var method = "GET";
                    var url = e.currentTarget.getAttribute("href");
                    window.owl.getPage._getPage(method, url)
                        .then(response => window.owl.getPage._renderPage(response, url))
                        .then(window.owl.getPage.register);
                });
            }
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
                    reject("Error: XHR Request failed");
                }
            });
        },
        _renderPage(response, url) {
            window.history.pushState({"html":"","pageTitle":"Owl"},"", url);
            document.querySelector("#right-menu").innerHTML = response.html.navigation;
            document.querySelector("#content").innerHTML = response.html.content;
            document.querySelector("#loader-wrapper").style.display = "none";
        }
    }

})();