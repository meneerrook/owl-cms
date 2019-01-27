// private methods:
const privateMethods = {
    _extendDefaults (source, properties) {
        var property;

        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    },
    _getElements(options) {
        var selector;

        if (options.id.length > 0) {
            selector = "[data-trdr='" + options.id + "']";
        } else {
            selector = "[data-trdr]";
        }

        var elements = document.querySelectorAll(selector);
        return sorted = privateMethods._sortElements(options, elements);
    },
    _sortElements (options, elements) {
        var sorted = [],
            order = true;

        for(var i = 0; i < elements.length; i++) {
            sorted.push(elements[i]);

            if(!("trdrOrder" in elements[i].dataset && elements[i].dataset.trdrOrder.length > 0)) {
                order = false;
            }
        }

        if (order) {
            return sorted.sort(function(a, b) {
                if(a.getAttribute("data-trdr-order") < b.getAttribute("data-trdr-order")) {
                    if (options.direction === "ASC" || !options.direction) {
                        return -1;
                    }  else if(options.direction === "DESC") {
                        return 1;
                    } else {
                        return 1;
                    }
                }
                if(a.getAttribute("data-trdr-order") > b.getAttribute("data-trdr-order")) {
                    
                    if (options.direction === "ASC" || !options.direction) {
                        return 1;
                    } else if(options.direction === "DESC") {
                        return -1;
                    } else {
                        return 1;
                    }
                }
            });
        } else {
            return sorted;
        }
    },
    _setTransitions(options, elements) {
        privateMethods._trigger(options, elements[0]);
        
        for(let i = 0; i < elements.length; i++) {
            
            elements[i].addEventListener("transitionend", function(e){
                e.target.removeEventListener(e.type, arguments.callee);

                if(!elements[(i+1)]) {
                    privateMethods._createEndEvent();
                } else {
                    privateMethods._trigger(options, elements[(i+1)]);
                }
            });
        }
    },
    _trigger(options, element) {
        var triggerClass;
        if("trdrClass" in element.dataset && element.dataset.trdrClass.length > 0) {
            triggerClass = element.dataset.trdrClass;
        } else {
            triggerClass = options.defaultClass;
        }

        if(element.classList.contains(triggerClass)) {
            element.classList.remove(triggerClass);
        } else {
            element.classList.add(triggerClass); 
        }
    },
    _createEndEvent() {
        var currentDateTime = new Date().toLocaleString();
        const event = new CustomEvent("traderend");
              event.endDate = currentDateTime;
        document.dispatchEvent(event);
    }
}

class Trader {
    constructor(options) {
        // Define option defaults
        this.options = {
            defaultClass: "trigger",
            direction: "ASC"
        };

        // Create options by extending defaults with the passed in arugments
        if (arguments[0] && typeof arguments[0] === "object") {
            this.options = privateMethods._extendDefaults(this.options, arguments[0]);
        }
    }

    // public methods:
    toggleTransition() {
        var elements = privateMethods._getElements(this.options);
        privateMethods._setTransitions(this.options, elements);
    }
}