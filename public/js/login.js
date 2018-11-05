function loginInit() {

    var loginButton = document.querySelector("#loginButton");
    loginButton.addEventListener('click', function(e) {
        e.preventDefault();
        authenticateUser();
    });

}

function authenticateUser() {
    var token = document.querySelector("input[name='_token']");
    var email = document.querySelector("input[name='email']");
    var password = document.querySelector("input[name='password']");
    
    jQuery.ajax({
        method: "POST",
        url: "/owl/authenticate",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            email: email.value,
            password: password.value
        },
        success: function(response) {

            console.log(response);

            if(response.authenticated) {

                fade(response);

            } else {

            }


        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    })

}

function fade(response) {
    var loginWrapper = document.querySelector("#login-wrapper");
    loginWrapper.addEventListener('transitionend', function() {
        sizeDown(response);
    });
    loginWrapper.classList.add("fadeOut");
}

function sizeDown(response) {
    var loginContainer = document.querySelector("#login-container");
    loginContainer.addEventListener('transitionend', function() {
        console.log("size down is done");
    });
    loginContainer.classList.add("sizeDown");
}

loginInit();