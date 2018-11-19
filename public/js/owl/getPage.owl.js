(function() {

    window.owl = window.owl || {};

    window.owl.getPage = {
        register: function() {
            var menuItems = document.querySelectorAll(".menu-item");
            for (var i = 0; i < menuItems.length; i++) {

                menuItems[i].addEventListener("click", function(e) {
                    e.preventDefault();
                    var method = "GET";
                    var url = e.currentTarget.getAttribute("href");
                    
                    document.querySelector("#loader-wrapper").style.display = "block";
                    if(e.currentTarget.classList.contains("has-sub-menu")) {
                        document.querySelector("#right-menu").classList.add("submenu");
                        document.querySelector("#right-menu").innerHTML = "";
                    }

                    window.owl.getPage._getPage(method, url)
                        .then(response => window.owl.getPage._renderPage(response))
                        .then(window.owl.getPage.register);
                });
            }
        },
        _getPage(method, url) {
            return new Promise((resolve, reject) => {
        
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.send();
                
                request.onload = () => {
                    resolve(JSON.parse(request.responseText));
                }
        
                request.onerror = () => {
                    reject("Error: XHR Request failed");
                }
            });
        },
        _renderPage(response) {
            document.querySelector("#right-menu").innerHTML = response.html.navigation;
            document.querySelector("#content").innerHTML = response.html.content;
            document.querySelector("#loader-wrapper").style.display = "none";
        }
    }

})();