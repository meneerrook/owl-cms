const _builder = {
    extend: (source, properties) => {
        let property;

        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    },
    request: (method, url) => {
        return new Promise((resolve, reject) => {
            var request = new XMLHttpRequest();
            request.open(method, url, true);
            request.send();
            
            request.onload = () => {
                var response = JSON.parse(request.responseText);
                resolve(response);
            }
            request.onerror = () => {
                reject("Error: XHR Request failed");
            }
        });
    },
    build: (options, response, parentNode) => {

        if (typeof parentNode === "undefined") {
            parentNode = document.querySelector(options.builderOptions.parent);
        }

        for (let i = 0; i < response.length; i++) {
            let item = response[i];
            let childNode;

            if (item.node == "text") {
                childNode = document.createTextNode(item.value);
            } else if (item.node == "element") {
                childNode = document.createElement(item.tag);

                for (name in item.attributes) {
                    if (item.attributes.hasOwnProperty(name)) {
                        childNode.setAttribute(name, item.attributes[name]);
                    }
                }
                
                if (item.children && item.children.length > 0) {
                    _builder.build(options, item.children, childNode);
                }
            }

            parentNode.appendChild(childNode);
        }
    },
    validate: (options) => {
        if (options.builderOptions.setValidation) {
            var validator = new OwlValidator(options.validatorOptions);
            validator.initialize();
        }
    }
}

class OwlBuilder {
    constructor(options) {
        this.options = {
            xhr: {
                method: "get",
                url: "",
            },
            builderOptions: {
                parent: "form",
                setValidation: false,
            },
            validatorOptions: {}
        };

        if (arguments[0] && typeof arguments[0] === "object") {
            this.options = _builder.extend(this.options, arguments[0]);
        }
    }

    initialize () {

        if (!this.options.xhr.url || !this.options.xhr.url.length > 0) {
            console.warn("%c ABORT:%c Data url has not been given", "font-weight: bold;", "font-weight: normal");
            return false;
        }

        _builder.request(this.options.xhr.method, this.options.xhr.url)
                        .then(response => _builder.build(this.options, response))
                        .then(() => _builder.validate(this.options))
                        .catch(error => console.error(error));
    }
}



