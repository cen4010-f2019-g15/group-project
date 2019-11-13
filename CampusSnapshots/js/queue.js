$(function() {
    
    $('.toggleComments').on('click', function(){
        $(this).parents('.card').children('.comments').slideToggle(200)
    })

    $('.reportComment').on('click', function(){
        value = $(this).siblings('.commentID').val()
        console.log(value)
    })

    $('.reportPost').on('click', function(){
        value = $(this).parents('.card').children('.postID').val()
        console.log(value)
        $('#reportPostModal').modal()
    })

    $('#reportPostForm').on('submit', function(e){
        e.preventDefault()
        console.log($(this).serialize())
    })

})