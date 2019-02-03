(function() {

    window.owl = window.owl || {};

    window.owl.getData = {
        register: function() {

        },
        post: function(method, url) {
            return new Promise((resolve, reject) => {
        
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.send();
                
                request.onload = () => {
                    var response = {
                        text: request.responseText,
                        json: JSON.parse(request.responseText)
                    }
                    resolve(response);
                }
        
                request.onerror = () => {
                    reject("Error: XHR Request failed");
                }
            });
        }
    }

})();