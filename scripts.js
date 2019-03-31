const JWT_KEY = "jwt";

function retrieveCompetitions(callaback) {
    $.get("/api/competition/read.php", function (data) {
        callaback(data)
    });
}

function login(username, password, callback) {
    $.ajax({
        url: '/api/users/login.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            sessionStorage.setItem(JWT_KEY, data.jwt);
            callback(true);
        },
        error: function(data) {
            callback(false);
        },
        data: JSON.stringify({
            email: username,
            password: password
        })
    });
}

function isTokenPresent() {
    return sessionStorage.getItem(JWT_KEY) !== null;
}
