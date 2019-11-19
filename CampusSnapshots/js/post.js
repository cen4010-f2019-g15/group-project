$(function() {

    $('#report').change(function() {
        var state = $('input[name="type"]:checked').val()
        var startDate = $('#startDate')
        var startTime = $('#startTime')
        var endDate = $('#endDate')
        var endTime = $('#endTime')
        var reportType = $('#reportType')

        if (state === 'report') {
            $('#reportFields').show(200)
            $('#eventFields').hide(200)
            startDate.prop('required', false)
            startTime.prop('required', false)
            endDate.prop('required', false)
            endTime.prop('required', false)
            reportType.prop('required', true)
        }
    })

    $('#event').change(function() {
        var state = $('input[name="type"]:checked').val()
        var startDate = $('#startDate')
        var startTime = $('#startTime')
        var endDate = $('#endDate')
        var endTime = $('#endTime')
        var reportType = $('#reportType')

        if (state === 'event') {
            $('#reportFields').hide(200)
            $('#eventFields').show(200)
            startDate.prop('required', true)
            startTime.prop('required', true)
            endDate.prop('required', true)
            endTime.prop('required', true)
            reportType.prop('required', false)
        }
    })

    // Form submission event handler
    $('form').submit(function(e) {
        e.preventDefault()
        var formData = new FormData(this)
        $.ajax({
            type: 'POST',
            url: 'PHP/PostCreator.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response)
            }
        })

        
    })

})