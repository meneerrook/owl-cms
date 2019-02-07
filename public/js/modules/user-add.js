
(function() {
    window.owl = window.owl || {};

    window.owl.userAdd = {
        init: function() {
            var forms = document.querySelectorAll("[data-xhr-post]");
            if(forms.length === 0) return false;
            
            for (let i = 0; i < forms.length; i++) {
                var method = forms[i].getAttribute("method"),
                    url = forms[i].getAttribute("action"),
                    selector = forms[i].getAttribute("data-xhr-post"),
                    fields = document.querySelectorAll("[data-xhr-post='" + selector + "'] input, [data-xhr-post='" + selector + "'] select");
                
                // for (let x = 0; x < fields.length; x++) {
                //     fields[x].addEventListener("change", function(e) {
                //         window.owl.userAdd.validateField(e.currentTarget);
                //     });
                // }

                var validator = new Owlidator();
                validator.validate();

                forms[i].addEventListener("submit", function(e) {
                    e.preventDefault();
                    var data = new FormData(e.currentTarget);
                    window.owl.postData.post(method, url, data).then(response => respond(response));
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
            var messages = response.messages;
            for (let key in messages) {
                var inputWrapper = document.querySelector("[data-validation='" + key + "']");
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
        },
        validateField: function(element) {
            var validate = {
                name: function(value) {
                    return (value.length > 0);
                },
                email: function(value) {
                    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return regex.test(value);
                },
                role: function(value) {
                    return (["admin", "manager", "editor", "user"].includes(value));
                },
                status: function(value) {
                    return (["active", "inactive"].includes(value));
                },
                password: function(value) {
                    var confirm = document.querySelector("input[name='password_confirmation']");
                    return (value.length > 4 && value == confirm.value);
                }
            };
        
            var validated = {
                field: element.name,
                default: true,
                msg: ""
            };
        
            switch(element.name) {
                case "firstname":
                case "lastname":
                    validated.isvalid = validate.name(element.value);
                    break;
                case "email":
                    validated.isvalid = validate.email(element.value);
                    validated.default = false,
                    validated.msg = "The email field must be a valid email address";
                    break;
                case "role":
                    validated.isvalid = validate.role(element.value);
                    break;
                case "status":
                    validated.isvalid = validate.status(element.value);
                    break;
                case "password":
                    validated.isvalid = validate.password(element.value);
                    validated.default = false,
                    validated.msg = "The password field requires 5 characters and must match the confirm field";
                    break;
            } 
        
            if (validated.default && !validated.isvalid) {
                validated.msg = "The " + element.name + " field is required";   
            }
        
            var inputWrapper = document.querySelector("[data-validation='" + validated.field + "']");
            inputWrapper.classList.remove("success", "danger");
            if(!validated.isvalid) {
                inputWrapper.dataset.validationMsg = validated.msg;
                inputWrapper.classList.add("danger");
            } else {
                inputWrapper.dataset.validationMsg = "";
                inputWrapper.classList.add("success");
            }
        }
    }
})();

window.owl.userAdd.init();
window.owl.buttonLoader.register();
window.owl.placeholder.register();


