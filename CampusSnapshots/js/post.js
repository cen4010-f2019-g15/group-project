$(function() {

    // Form submission event handler
    $('form').submit(function(e) {
        e.preventDefault()
        var formData = new FormData(this)
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1])
        }
    })

})