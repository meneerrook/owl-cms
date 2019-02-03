(function() {

    window.owl = window.owl || {};

    window.owl.postData = {
        post: function(method, url, data) {
            return new Promise((resolve, reject) => {
        
                var request = new XMLHttpRequest();
                request.open(method, url, true);
                request.send(data);
                
                request.onload = () => {
                
                    resolve(JSON.parse(request.responseText));
                }
        
                request.onerror = () => {
                    reject("Error: XMLHTTPRequest failed, please contact the system administrator. You can reload the page to restore the previous state.");
                }
            });
        },
        _parse: function(data) {
            return new Promise((resolve, reject) => {
                try {
                    data = JSON.parse(data);
                    resolve(data);
                }
                catch (error){
                    reject(error);
                }
            });
        }
    }

})();