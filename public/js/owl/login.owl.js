
(function() {

    window.owl = window.owl || {};

    window.owl.login = {
        register: function() {
            document.querySelector("#page-wrapper").classList.add("hide");

            var loginButton = document.querySelector("#loginButton");
            loginButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.owl.login._authenticateUser();
                
            });
        },
        _authenticateUser: function() {
            var token = document.querySelector("input[name='_token']");
            var email = document.querySelector("input[name='email']");
            var password = document.querySelector("input[name='password']");
            
            jQuery.ajax({
                method: "POST",
                url: "/owl/authenticate",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email.value,
                    password: password.value
                },
                success: function(response) {
                    window.history.pushState({"html":"","pageTitle":"Owl"},"", "/owl/dashboard");
                    window.owl.login._renderTemplate(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                    window.owl.buttonLoader.undo();
                }
            });
        },
        _renderTemplate: function(response) {
            switch(response.type) {
                case "page":
                    document.querySelector("#navigation").innerHTML = response.html.navigation;
                    document.querySelector("#content").innerHTML = response.html.content

                    window.owl.login._pageTransition();
                break;
                case "message":
                    window.owl.login._giveMessage();
                break;
                default:
                    alert("Something went wrong, please contact your system administrator or retry again in a few minutes.");
                    var button = document.querySelector("#loginButton");
                    window.owl.buttonLoader.undo(button);
            }
        },
        _pageTransition: function() {
            var skeletons = document.querySelectorAll(".skeleton");
            for (let i = 0; i < skeletons.length; i++) {
                skeletons[i].classList.add("fade", "hide");
            }

            var trader = new Trader({
                id: "login",
            });
            
            trader.toggleTransition();

            document.addEventListener("traderend", function() {
                window.owl.login._reinitPage();
            });
        },
        _reinitPage: function() {
            var loginContainer = document.querySelector("#login-container"),
                loginScript = document.querySelector("#login-script");

                loginContainer.parentNode.removeChild(loginContainer);
                loginScript.parentNode.removeChild(loginScript);

            if (window.owl.getPage && typeof window.owl.getPage.register == "function") {
                window.owl.getPage.register();
            }
            if (window.owl.common && typeof window.owl.common.register == "function") {
                window.owl.common.register();
            }
            if (window.owl.navigation && typeof window.owl.navigation.register == "function") {
                window.owl.navigation.register();
            }
        },
        _giveMessage: function() {
            var button = document.querySelector("#loginButton");
            window.owl.buttonLoader.undo(button);
            var loginPane = document.querySelector("#login-pane");
            loginPane.addEventListener("animationend", function(){
                loginPane.classList.remove("wrong-input");
            });
            loginPane.classList.add("wrong-input");

        }
    }

})();