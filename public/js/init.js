function init() {
    
    if(window.owl)  {

        // register get page
        if(window.owl.getPage && typeof window.owl.getPage.register == "function") {
            window.owl.getPage.register();
        }

        // register post data
        if(window.owl.postData && typeof window.owl.postData.register == "function") {
            window.owl.postData.register();
        }

        // register skeleton
        if(window.owl.skeleton && typeof window.owl.skeleton.register == "function") {
            window.owl.skeleton.register();
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

        // register navigation
        if(window.owl.navigation && typeof window.owl.navigation.register == "function") {
            window.owl.navigation.register();
        }

         // register common
         if(window.owl.common && typeof window.owl.common.register == "function") {
            window.owl.common.register();
        }
    }
}

init();