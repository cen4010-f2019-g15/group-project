$(function () {
    $.post('PHP/Report.php', function (response) {
        var json = JSON.parse(response)
        for (var item in json) {
            var report = createReport(json[item].RID, json[item].Name, json[item].Image, json[item].Location, json[item].Type, json[item].Status, json[item].Reported, json[item].Description, json[item].UserName)
            $('#queue').append(report)
            var commentData = new FormData()
            commentData.append('idType', 'RID')
            commentData.append('id', json[item].RID)
        }
    })

    // Toggle comments on button click
    $(document).on('click', '.toggleComments', function () {
        $(this).parents('.card').children('.comments').slideToggle(200)
    })

    // Report comment button event handler
    $(document).on('click', '.reportComment', function () {
        var value = $(this).siblings('.commentID').val()
        var modal = createReportCommentModal(value)
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.modal()
    })

    // Report post button event handler
    $(document).on('click', '.reportPost', function () {
        var value = $(this).parents('.card').children('.postID').val()
        var modal = createReportPostModal(value)
        modal.on('hidden.bs.modal', function () {
            $(this).remove()
        })
        modal.modal()
    })

    // Comment form submission event handler
    $(document).on('submit', '#commentForm', function (e) {
        e.preventDefault()
        var formData = new FormData(this)
        $.ajax({
            type: 'POST',
            url: 'PHP/CommentCreator.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response === "User Not Logged In") {
                    $('#commentLoginModal').modal()
                } else {
                    $('.comments').append(createComment(formData.get('postID'), $('.username').text(), formData.get('commentText')))
                }
            }
        })
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