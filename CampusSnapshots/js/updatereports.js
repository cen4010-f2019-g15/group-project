$(function() {
    $.post('PHP/Report.php', function (response) {
        var json = JSON.parse(response)
        for (var item in json) {
            var report = createTableEntry(json[item].RID, json[item].Name, json[item].UserName, json[item].Location, json[item].Type, json[item].Reported, json[item].Status)
            $('.reports').append(report)
        }
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

    function createTableEntry(id, title, username, location, type, time, status) {
        var dateString = formatTimestamp(time)

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
            '</tr>'
        return $(report)
    }

})