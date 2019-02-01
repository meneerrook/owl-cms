(function() {

    window.owl = window.owl || {};

    window.owl.postData = {
        register: function() {
            var forms = document.querySelectorAll("[data-xhr-post]");
            if(forms.length === 0) return false;

            // register button loader
            if(window.owl.buttonLoader && typeof window.owl.buttonLoader.register == "function") {
                window.owl.buttonLoader.register();
            }

            for (let i = 0; i < forms.length; i++) {
                forms[i].addEventListener("submit", function(e) {
                    e.preventDefault();
                    window.owl.postData._prepare(e.currentTarget);
                });
            }
        },
        _prepare: function(form) {
            var method = form.getAttribute("method");
            var url = form.getAttribute("action");
            var data = new FormData(form);
            
            window.owl.postData._send(method, url, data).then(response => window.owl.postData._respond(response));
        },
        _send: function(method, url, data) {
            return new Promise((resolve, reject) => {
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                request.send(data);

                request.onload = () => {
                    if(request.responseText.length ) {
                        resolve(JSON.parse(request.responseText));
                    } else {
                        console.warn("No response from the server");
                    }

                    window.owl.buttonLoader.undo();
                }

                request.onerror = () => {
                    alert("Error: XMLHTTPRequest failed, please contact the system administrator. You can reload the page to restore the previous state.");
                }
            });
        },
        _respond: function(response) {
            console.log(response);
        }
    }

})();