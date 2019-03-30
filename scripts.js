
function retrieveCompetitions(callaback) {
    $.get("/api/competition/read.php", function (data) {
        callaback(data)
    });
}
