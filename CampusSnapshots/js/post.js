$(function() {

    $('#report').change(function() {
        var state = $('input[name="type"]:checked').val()
        var startDate = $('#startDate')
        var startTime = $('#startTime')
        var endDate = $('#endDate')
        var endTime = $('#endTime')

        if (state === 'report') {
            console.log(state)
            $('#eventFields').hide(200)
            startDate.prop('required', false)
            startTime.prop('required', false)
            endDate.prop('required', false)
            endTime.prop('required', false)
        }
    })

    $('#event').change(function() {
        var state = $('input[name="type"]:checked').val()
        var startDate = $('#startDate')
        var startTime = $('#startTime')
        var endDate = $('#endDate')
        var endTime = $('#endTime')

        if (state === 'event') {
            console.log(state)
            $('#eventFields').show(200)
            startDate.prop('required', true)
            startTime.prop('required', true)
            endDate.prop('required', true)
            endTime.prop('required', true)
        }
    })

    // Form submission event handler
    $('form').submit(function(e) {
        e.preventDefault()
        var formData = new FormData(this)
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1])
        }
    })

})