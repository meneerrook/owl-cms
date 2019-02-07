const _private = {
    // #region - extend (f)
    extend: (source, properties) => {
        let property;

        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    },
    set: (options) => {

        let wrappers = document.querySelectorAll("[data-owldtr]");
        for (let w = 0; w < wrappers.length; w++) {
            let eventType = wrappers[w].dataset.owldtrEvent || options.event;

            if (eventType instanceof Array) {
                for(e = 0; e < eventType.length; e++) {
                    wrappers[w].addEventListener(eventType[e], event => { _private.prepare(options, event.currentTarget) });
                }
            } else {
                wrappers[w].addEventListener(eventType, event => { _private.prepare(options, event.currentTarget) });
            }
        }
    },
    prepare: (options, wrapper) => {
        let field = wrapper.querySelector("input, select, textarea");
        let rules = wrapper.dataset.owldtrRules || options.rules;
        
        _private.specify(options, rules, field, wrapper);
    },
    specify: (options, rules, field, wrapper) => {
        var details = [];

        rules = rules.split("|");

        for (let r = 0; r < rules.length; r++) {
            let rule = rules[r].split(":");
            let ruleData = {};
            
            ruleData.name = rule[0]
            ruleData.msg = options.msgSuccess;

            switch(ruleData.name) {
                case "required":
                    ruleData.valid = _private.validate.required(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.required;
                    break;
                case "alpha":
                    ruleData.valid = _private.validate.alpha(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.alpha;
                    break;
                case "alpha_num":
                    ruleData.valid = _private.validate.alpha_num(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.alpha_num;
                    break;
                case "alpha_dash":
                    ruleData.valid = _private.validate.alpha_dash(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.alpha_dash;
                    break;
                case "email":
                    ruleData.valid = _private.validate.email(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.email;
                    break;
                case "min_char":
                    ruleData.valid = _private.validate.min_char(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.min_char;
                    break;
                case "max_char":
                    ruleData.valid = _private.validate.max_char(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.max_char;
                    break;
                case "size":
                    ruleData.valid = _private.validate.size(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.size;
                    break;
                case "equal":
                    ruleData.valid = _private.validate.equal(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.equal;
                    break;
                case "is_num":
                    ruleData.valid = _private.validate.is_num(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.is_num;
                    break;
                case "min_num":
                    ruleData.valid = _private.validate.min_num(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.min_num;
                    break;
                case "max_num":
                    ruleData.valid = _private.validate.max_num(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.max_num;
                    break;
                case "one_of":
                    ruleData.valid = _private.validate.one_of(rule, field);
                    if (!ruleData.valid) ruleData.msg = options.msgDanger.one_of;
                    break;
            }

            ruleData.msg = ruleData.msg.replace("{field}", field.name).replace("{param}", rule[1])
            details.push(ruleData);
        }

        _private.respond(options, wrapper, details);
    },
    validate: {
        required: (rule, field) => {
            return (field.value.length > 0); 
        },
        alpha: (rule, field) => {
            let re = /^[a-zA-Z ]+$/;
            return re.test(field.value); 
        },
        alpha_num: (rule, field) => {
            let re = /^[a-zA-Z0-9 ]+$/;
            return re.test(field.value); 
        },
        alpha_dash: (rule, field) => {
            let re = /^[a-zA-Z0-9-_ ]+$/;
            return re.test(field.value); 
        },
        email: (rule, field) => {
            let re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
            return re.test(field.value); 
        },
        min_char: (rule, field) => {
            return (Number(field.value.length) >= Number(rule[1])); 
        },
        max_char: (rule, field) => {
            return (Number(field.value.length) <= Number(rule[1])); 
        },
        size: (rule, field) => {
            return (field.value.length == Number(rule[1])); 
        },
        equal: (rule, field) => {
            let equal = document.querySelector("[name='" + rule[1] + "']");
            return (field.value == equal.value); 
        },
        is_num: (rule, field) => {
            return (!isNaN(Number(field.value))); 
        },
        min_num: () => {
            return (!isNaN(Number(field.value)) && Number(field.value) >= Number(rule[1])); 
        },
        max_num: () => {
            return (!isNaN(Number(field.value)) && Number(field.value) <= Number(rule[1])); 
        },
        one_of: (rule, field) => {
            options = rule[1].split(",");
            for(let o = 0; o < options.length; o++) {
                if (field.value == options[o]) return true; 
            }
            return false; 
        }
    },
    respond: (options, wrapper, details) => {
        
        // determine wether success messages should be shown at all:
        options.showSuccessMsg ? details = details : details = details.filter(d => !d.valid);
        if (options.showSuccessMsg) {
            details = details.sort(function(a,b) {
                if (a.valid) return 1;
                if (!a.valid) return -1;
                return 0;
            });
        } else {
            details = details.filter(d => !d.valid);
        }

        // determine wether only a single message should be shown:
        options.showSingleMsg ? details = details[0] : details = details;
        
        let msgElement; 
            msgElement = wrapper.querySelector("." + options.msgClass);
        if (!msgElement) {
            msgElement = document.createElement("div");
            msgElement.classList.add(options.msgClass);
        }
        
        if(options.showSingleMsg) {
            if(details) {
                // determine success class or danger class/text on wrapper/message element:
                if (details.valid) {
                    wrapper.classList.remove(options.msgWrapperClass.danger);
                    wrapper.classList.add(options.msgWrapperClass.success);
                } else {
                    wrapper.classList.remove(options.msgWrapperClass.success);
                    wrapper.classList.add(options.msgWrapperClass.danger);
                }

                msgElement.innerText = details.msg;
                wrapper.appendChild(msgElement);
            } else {
                wrapper.classList.remove(options.msgWrapperClass.success, options.msgWrapperClass.danger);
                if (wrapper.contains(msgElement)) wrapper.removeChild(msgElement);
               
            }
            
        } else {

        }
    }
}

class Owlidator {
    constructor (options) {
        // Define option defaults
        this.options = {
            event: ["keyup", "change", "focusout"],
            rules: "required",
            msgDanger: {
                required: "The field {field} is required",
                alpha: "The field {field} must only have alphabetic characters",
                alpha_num: "The field {field} must only have alphabetic and/or numeric characters",
                alpha_dash: "The field {field} must only have alphabetic, numeric characters and/or dashed and underscores",
                email: "The field {field} must be an email address",
                min_char: "The field {field} needs at least {param} characters",
                max_char: "The field {field} can have no more than {param} characters",
                size: "The field {field} must have exactly {param} characters",
                equal: "The field {field} must be equal to the {param} field",
                is_num: "The field {field} must have a numeric value",
                min_num: "The field {field} must have a number of at least {param}",
                max_num: "The field {field} can have a number maximum of {param}",
                one_of: "The field {field} is invalid."
            },
            msgSuccess: "The field {field} is valid.",
            msgWrapperClass: {
                danger: "owldtr-danger",
                success: "owldtr-success" 
            },
            msgClass: "owldtr-msg",
            showSingleMsg: true,
            showSuccessMsg: true,
        };
        
        // Create options by extending defaults with the passed in arugments
        if (arguments[0] && typeof arguments[0] === "object") {
            this.options = _private.extend(this.options, arguments[0]);
        }
    }
    validate() {
        _private.set(this.options);
    }
}

// requirements:
//  - Every input requires a wrapper
//  - The wrapper needs the attribute "data-owldtr"
//  - message field must be either inside the wrapper or can be a data attribute on the wrapper.

// rules:
// multiple rules can be defined for each element inside the data attribute;
// "data-owldtr-rules" and must be seperated by a "|", for example:
// <div data-owldtr data-owldtr-rules="required,size:5,equal:password_confirm">...

// the following rules are specified in v1.0:
//  - required = Value must have at least 1 character in it.
//  - size = Value must have at least the amount of specified characters.
//  - equal = Value must equal the value that of the specified field.
//  - numeric = Value must be numeric.
//  - alpha = Value must be alphabetic.
//  - alpha_num = Value can only have alphabetic and/or numeric characters.
//  - alpha_dash = Value can only have alphabetic and/or numeric characters along with dashes and underscores.

