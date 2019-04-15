
(function() {
    window.owl = window.owl || {};

    window.owl.userAdd = {
        init: function() {
            
            var forms = document.querySelectorAll("[data-xhr-post]");
            if(forms.length === 0) return false;
            
            for (let i = 0; i < forms.length; i++) {
                var method = forms[i].getAttribute("method"),
                    url = forms[i].getAttribute("action"),
                    selector = forms[i].getAttribute("data-xhr-post")

                var validator = new OwlValidator();
                validator.initialize();

                forms[i].addEventListener("submit", function(e) {
                    e.preventDefault();
                    var data = new FormData(e.currentTarget);
                    window.owl.postData.post(method, url, data).then(response => window.owl.userAdd.respond(response));
                });
            }
        },
        respond: function(response) {
            if(response.type != "success") {
                window.owl.userAdd.error(response);
            } else {
                window.owl.userAdd.success(response);
            }
            window.owl.buttonLoader.undo();
        },
        success: function(response) {

            // KEEP THIS FUNCTION HERE AND SETUP THE NEW PLUGIN WITH A PROMISE.

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
        error: function(response) {


            // PULL THIS TOWARD OWL VALIDATOR OR A NEW PLUGIN THAT WORKS ALONGSIDE IT

            var messages = response.messages;
            for (let key in messages) {
                var inputWrapper = document.querySelector("[data-owldtr='" + key + "']");
                if(!inputWrapper) continue;
                inputWrapper.classList.add(response.type);
                inputWrapper.dataset.validationMsg = messages[key];
            }
            window.owl.userAdd.resetErrors();
        },
        resetErrors: function() {
            var fields = document.querySelectorAll("[data-validation] input, [data-validation] select");
            for (let i = 0; i < fields.length; i++) {
                fields[i].addEventListener("keyup", function(e) {
                    e.currentTarget.parentNode.setAttribute("data-validation-msg", "");
                    e.currentTarget.parentNode.classList.remove("danger", "warning", "success");
                    e.target.removeEventListener(e.type, arguments.callee);
                });
            }
        }
    }
})();

window.owl.userAdd.init();
window.owl.buttonLoader.register();
window.owl.placeholder.register();


