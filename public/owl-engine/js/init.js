
function init() {

    var options = {
        xhr: {
            url: "../owl-engine/data/form.json",
            method: "get",
        },
        builderOptions: {
            parent: "#form-wrapper",
            setValidation: true
        },
        validatorOptions: {
            showSuccessMsg: true
        }
    }

    var buidForm = new OwlBuilder(options);
    buidForm.initialize();

}

init();
