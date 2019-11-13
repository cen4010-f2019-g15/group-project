$(function() {
    
    $('.deleteReport').on('click', function(){
        value = $(this).parent().siblings('.reportID').val()
        console.log(value)
    })

})