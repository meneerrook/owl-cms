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
            
            window.owl.postData._send(method, url, data)
                .then(response => window.owl.postData._respond(response));
        },
        _send: function(method, url, data) {
            return new Promise((resolve, reject) => {
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                request.send(data);

                request.onload = () => {
                    if (request.responseText.length) {
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

            if(response.type == "success") {
                window.owl.postData._success(response);
            } else {
                window.owl.postData._error(response);
            }
        },
        _success: function(response) {
            console.log(response);

            var form = document.querySelector("[data-xhr-post='" + response.form + "']");

            var msgWrapper = document.querySelector("[data-msg]");
            var msg = document.createElement("div");
                msg.classList.add("alert", "alert-"+response.type, "col-12", "invisible");
                msg.innerText = response.message;

            form.addEventListener("transitionend", function(e) {
                e.currentTarget.classList.add("hide");
                msgWrapper.appendChild(msg); 
            });
            form.classList.add("invisible");

            setTimeout(function() {
                msg.classList.remove("invisible");
            }, 100)
        },
        _error: function(response) {
            var messages = response.messages;
            for (let key in messages) {
                var inputWrapper = document.querySelector("[data-validation='" + key + "']");
                if(!inputWrapper) continue;
                inputWrapper.classList.add(response.type);
                inputWrapper.dataset.validationMsg = messages[key];
            }

            window.owl.postData._resetErrors();
        },
        _resetErrors: function() {
            var fields = document.querySelectorAll("[data-validation] input, [data-validation] select");
            for (let i = 0; i < fields.length; i++) {
                fields[i].addEventListener("keyup", function(e) {
                    e.currentTarget.parentNode.setAttribute("data-validation-msg", "");
                    e.currentTarget.parentNode.classList.remove("error", "warning", "success");
                    e.target.removeEventListener(e.type, arguments.callee);
                });
            }
        }
    }

})();