function init() {
    
    if(window.owl)  {

        // register button loader
        if(window.owl.placeholder && typeof window.owl.placeholder.register == "function") {
            window.owl.placeholder.register();
        }

        // register button loader
        if(window.owl.buttonLoader && typeof window.owl.buttonLoader.register == "function") {
            window.owl.buttonLoader.register();
        }

        // register login
        if(window.owl.login && typeof window.owl.login.register == "function") {
            window.owl.login.register();
        }
    }
}

init();