
function _prepareSearch() {
    var user_search_field = document.querySelector("#user-search");
    user_search_field.addEventListener("keyup", function(e) {
       _setCondition(e.currentTarget.value); 
    });
}
function _setCondition(value) {
    var condition_field = document.querySelector("#condition"),
        condition = condition_field.options[condition_field.selectedIndex].value;
    
    _findUser(value, condition);
}
function _findUser(value, condition) {
    var cells = document.querySelectorAll("[data-property='" + condition + "']");
    for (var i = 0; i < cells.length; i++) {
        if(cells[i].innerText.toLowerCase().includes(value.toLowerCase())) {
            cells[i].parentNode.classList.remove("hide");
        } else {
            cells[i].parentNode.classList.add("hide");
        }
    }
}

function init() {
    console.log("Users module loaded.");
    _prepareSearch();
}

init();

