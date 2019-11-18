$(function () {
    $('#queue').append(
        createReport(1, "Report Title", "img/header-image.jpg", "EE96", "Unresolved", "7:30 P.M. 11/20/2019", "Report Description", "A User")
    )

    $('#queue').append(
        createReport(2, "Trash is Full", "img/header-image.jpg", "PK-103", "Unresolved", "7:30 A.M. 11/20/2019", "The trashcan in the starwell is overflowing.", "A User")
    )

    // Toggle comments on button click
    $('.toggleComments').on('click', function () {
        $(this).parents('.card').children('.comments').slideToggle(200)
    })

    // Report comment button event handler
    $('.reportComment').on('click', function () {
        var value = $(this).siblings('.commentID').val()
        var modal = createReportCommentModal(value)
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.modal()
    })

    // Report post button event handler
    $('.reportPost').on('click', function () {
        var value = $(this).parents('.card').children('.postID').val()
        var modal = createReportPostModal(value)
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.modal()
    })

    // Comment form submission event handler
    $('#commentForm').on('submit', function (e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this)[0].reset()
    })

    // Report post modal form submission event handler
    $(document).on('submit', '#reportPostForm', function (e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this).parents('.modal').modal('hide')
    })

    // Report comment modal form submission event handler
    $(document).on('submit', '#reportCommentForm', function (e) {
        e.preventDefault()
        // TODO: actual submission functionality
        console.log($(this).serialize())
        $(this).parents('.modal').modal('hide')
    })

})