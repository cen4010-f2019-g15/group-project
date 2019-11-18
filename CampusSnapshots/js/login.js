$(function() {

    $('#login').submit(function (e) {
        e.preventDefault()

        var formData = new FormData(this)
        var errorText = $('#loginError')

        $.ajax({
            type: 'POST',
            url: 'PHP/Login.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response === 'true') {
                    window.location.href = 'reports.html'
                } else {
                    console.log(response)
                    errorText.text("Invalid Login Information")
                }
            }
        })

    })

})