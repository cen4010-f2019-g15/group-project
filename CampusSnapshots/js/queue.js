$(function() {
    
    $('.toggleComments').on('click', function(){
        $(this).parents('.card').children('.comments').slideToggle(200)
    })

})