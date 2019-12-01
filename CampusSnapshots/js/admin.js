$(function() {
    
    $('.deletePost').on('click', function(){
        var value = $(this).parent().siblings('.reportID').val()
        var type = $(this).siblings('.type').text()
        var modal = createConfirmDeleteModal(value, type)
        var parent = $(this).parents('tr')
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.on('submit', '#confirmDeleteForm', function (e) {
            e.preventDefault()
            // TODO: actual submission functionality
            console.log($(this).serialize())
            $(this).parents('.modal').modal('hide')
            parent.remove()
        })
        modal.modal()
    })

    $('.removeReport').on('click', function(){
        var value = $(this).parent().siblings('.reportID').val()
        var type = $(this).siblings('.type').text()
        var modal = createConfirmRemoveModal(value)
        var parent = $(this).parents('tr')
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.on('submit', '#confirmRemoveForm', function (e) {
            e.preventDefault()
            // TODO: actual submission functionality
            console.log($(this).serialize())
            $(this).parents('.modal').modal('hide')
            parent.remove()
        })
        modal.modal()
    })

    /*
    $(document).on('submit', '#confirmDeleteForm', function (e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this).parents('.modal').modal('hide')
    })
    */

    function createConfirmDeleteModal(id, type) {
        var modal = "<div class='modal' tabindex='-1' role='dialog'>" +
        "<div class='modal-dialog'>" + 
            "<div class='modal-content'>" +
                "<div class='modal-header'>" +
                    "<h5 class='modal-title'>Confirm Post Deletion</h5>" +
                    "<button type='button' class='close' data-dismiss='modal'>" +
                        "<span>&times;</span>" +
                    "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                    "<p>Are you sure you want to delete this post?</p>" +
                    "<form id='confirmDeleteForm' class='text-center'>" +
                        "<input type='hidden' name='postID' value='" + id + "'>" +
                        "<input type='hidden' name='postType' value='" + type + "'>" +
                        "<button type='submit' class='btn btn-danger'>Delete</button>" +
                    "</form>" +
                "</div>" +
            "</div>" + 
        "</div>" +
    "</div>"
    return $(modal)
    }

    function createConfirmRemoveModal(id) {
        var modal = "<div class='modal' tabindex='-1' role='dialog'>" +
        "<div class='modal-dialog'>" + 
            "<div class='modal-content'>" +
                "<div class='modal-header'>" +
                    "<h5 class='modal-title'>Confirm Report Removal</h5>" +
                    "<button type='button' class='close' data-dismiss='modal'>" +
                        "<span>&times;</span>" +
                    "</button>" +
                "</div>" +
                "<div class='modal-body'>" +
                    "<p>Are you sure you want to remove this report?</p>" +
                    "<form id='confirmRemoveForm' class='text-center'>" +
                        "<input type='hidden' name='postID' value='" + id + "'>" +
                        "<button type='submit' class='btn btn-danger'>Remove</button>" +
                    "</form>" +
                "</div>" +
            "</div>" + 
        "</div>" +
    "</div>"
    return $(modal)
    }

})