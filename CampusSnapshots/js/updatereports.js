$(function() {
    $.post('PHP/Report.php', function (response) {
        console.log(response)
        var json = JSON.parse(response)
        console.log(json)
        for (var item in json) {
            var report = createTableEntry(json[item].RID, json[item].Name, json[item].UserName, json[item].Location, json[item].Type, json[item].Reported, json[item].Status)
            $('.reports').append(report)
        }
    })
    
    $(document).on('click', '.deletePost', function(){
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

    $(document).on('change', '#status', function() {
        var id = $(this).parent().siblings('.reportID').val()
        var status = $(this).val()
        var formData = new FormData()
        formData.append('PostID', id)
        formData.append('Status', status)
        formData.append('type', 'report')
        $.ajax({
            type: 'POST',
            url: 'PHP/Update.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
            }
        })
    })

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

    function createTableEntry(id, title, username, location, type, time, status) {
        var timeSplit = new String(time).split(" ")
        var timeString = timeSplit[0].concat('T', timeSplit[1])
        var date = new Date(timeString)
        var hours = date.getHours()
        var ampm = "AM"
        if (hours > 12) {
            hours %= 12
            ampm = "PM"
        }
        var minutes = date.getMinutes()
        if (minutes < 10) {
            minutes = "0".concat(minutes)
        }
        var dateString = date.toDateString() + " " + hours + ":" + minutes + " " + ampm

        var selected = ["", "", ""]
        selected[status-1] = "selected"

        var report = '<tr>' +
                '<input type="hidden" class="reportID" value="' + id + '">' +
                '<td>'+ title + '</td>' +
                '<td>' + username + '</td>' +
                '<td>' + location + '</td>' +
                '<td>'+ type + '</td>' +
                '<td>' + dateString + '</td>' +
                '<td><select class="form-control" name="status" id="status">' +
                    '<option value="1" ' + selected[0] + '>Unresolved</option>' +
                    '<option value="2" ' + selected[1] + '>In-Progress</option>' +
                    '<option value="3" ' + selected[2] + '>Resolved</option>' +
                '</select></td>' +
                '<td><button type="button" class="btn btn-danger deletePost">Delete Post</button></td>' +
            '</tr>'
        return $(report)
    }

})