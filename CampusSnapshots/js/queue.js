$(function() {
    
    // Toggle comments on button click
    $('.toggleComments').on('click', function(){
        $(this).parents('.card').children('.comments').slideToggle(200)
    })

    // Report comment button event handler
    $('.reportComment').on('click', function(){
        var value = $(this).siblings('.commentID').val()
        var modal = createReportCommentModal(value)
        modal.on('hidden.bs.modal', function() {
            $(this).remove()
        })
        modal.modal()
    })

    // Report post button event handler
    $('.reportPost').on('click', function(){
        var value = $(this).parents('.card').children('.postID').val()
        var modal = createReportPostModal(value)
        modal.on('hidden.bs.modal', function() {
            $(this).remove()
        })
        modal.modal()
    })

    // Comment form submission event handler
    $('#commentForm').on('submit', function(e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this)[0].reset()
    })

    // Report post modal form submission event handler
    $(document).on('submit', '#reportPostForm', function(e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this).parents('.modal').modal('hide')
    })

    // Report comment modal form submission event handler
    $(document).on('submit', '#reportCommentForm', function(e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this).parents('.modal').modal('hide')
    })

    // Create report post modal with id in hidden input field
    function createReportPostModal(id) {
        var modal = "<div class='modal' tabindex='-1' role='dialog'>" +
        "<div class='modal-dialog'>" + 
            "<div class='modal-content'>" +
                "<div class='modal-header'>" +
                    "<h5 class='modal-title'>Report Post</h5>" +
                    "<button type='button' class='close' data-dismiss='modal'>" +
                        "<span>&times;</span>" +
                    "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                    "<form id='reportPostForm'>" +
                        "<input type='hidden' name='postID' value='" + id + "'>" +
                        "<div class='form-group'>" +
                            "<label for='reportText'>Report Message:</label>" +
                            "<textarea class='form-control' name='reportText' rows='3'></textarea>" +
                        "</div>" +
                        "<button type='submit' class='btn btn-primary'>Submit</button>" +
                    "</form>" +
                "</div>" +
            "</div>" + 
        "</div>" +
    "</div>"
    return $(modal)
    }

    // Create report comment modal with id in hidden input field
    function createReportCommentModal(id) {
        var modal = "<div class='modal' tabindex='-1' role='dialog'>" +
        "<div class='modal-dialog'>" + 
            "<div class='modal-content'>" +
                "<div class='modal-header'>" +
                    "<h5 class='modal-title'>Report Comment</h5>" +
                    "<button type='button' class='close' data-dismiss='modal'>" +
                        "<span>&times;</span>" +
                    "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                    "<form id='reportCommentForm'>" +
                        "<input type='hidden' name='commentID' value='" + id + "'>" +
                        "<div class='form-group'>" +
                            "<label for='reportText'>Report Message:</label>" +
                            "<textarea class='form-control' name='reportText' rows='3'></textarea>" +
                        "</div>" +
                        "<button type='submit' class='btn btn-primary'>Submit</button>" +
                    "</form>" +
                "</div>" +
            "</div>" + 
        "</div>" +
    "</div>"
    return $(modal)
    }

})