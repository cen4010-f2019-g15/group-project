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
                var json = JSON.parse(response)
                if (json['result'] === true) {
                    window.location.href = 'reports.php'
                    setCookie('Username', formData.get(Username), 1)
                } else {
                    errorText.text("Invalid Login Information")
                }
            }
        })

    })

})
