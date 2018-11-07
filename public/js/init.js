function init() {
    
    if(window.owl)  {

        // register page loader
        if(window.owl.pageLoader && typeof window.owl.pageLoader.register == "function") {
            window.owl.pageLoader.register();
        }

        // register button loader
        if(window.owl.buttonLoader && typeof window.owl.buttonLoader.register == "function") {
            window.owl.buttonLoader.register();
        }

        // register placeholder
        if(window.owl.placeholder && typeof window.owl.placeholder.register == "function") {
            window.owl.placeholder.register();
        }

        // register login
        if(window.owl.login && typeof window.owl.login.register == "function") {
            window.owl.login.register();
        }
    }
}

init();