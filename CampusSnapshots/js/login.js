$(function() {

    $('#login').submit(function (e) {
        e.preventDefault()

        var formData = new FormData(this)
        var errorText = $('#loginError')

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1])
        }

        // Test display of error text since getting repsonse from backend is not set up yet
        errorText.text("Invalid Login Information")
    })

})