// Various functions for creating content for the queue pages (reports and events)

//TODO: Should move common event handler functions to this file so they are not duplicated in reports.js and events.js
//TODO: Need to redesign how Location, Times, and Status are displayed on posts to look better on mobile

// Create report
function createReport(id, title, image, location, type, status, time, description, user) {
    var statusString = ""
    if (status == 1) statusString = "Unresolved"
    else if (status == 2) statusString = "In-Progress"
    else if (status == 3) statusString = "Resolved"
    
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

    var report = "<div class='card pb-2 mb-3'>" +
        "<input type='hidden' class='postID' value='" + id + "'>" +
        "<img src='" + image + "' class='card-img-top'>" +
        "<div class='card-body'>" +
            "<div class='row justify-content-between p-3'>" +
                "<div class='col-md-6'>" +
                    "<div class='row'>" +
                        "<h5 class='card-title'>" + title + "</h5>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<p class='card-text'>" + description + "</p>" +
                    "</div>" +
                "</div>" + 
                "<div class='col-auto'>" +
                    "<div class='row py-1'>" + location + "</div>" +
                    "<div class='row py-1'>" + dateString + "</div>" +
                    "<div class='row py-1'>" + type + "</div>" +
                    "<div class='row py-1'>" + statusString + "</div>" +
                "</div>" +
            "</div>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-auto py-1'>" +
                    "<h6>" + user + "</h6>" +
                "</div>" +
                "<div class='col-auto py-1'>" +
                    "<button type='button' class='btn btn-link btn-sm toggleComments'>Toggle comments</button>" +
                    "<button type='button' class='btn btn-link btn-sm reportPost'>Report Post</button>" +
                "</div>" +
            "</div>" +
    "</div>" +
        "<div class='card-footer comments' style='display:none;'>" +
            "<form class='border-bottom py-2' id='commentForm'>" +
                "<div class='form-group'>" +
                    "<input type='hidden' name='postID' value='"+ id + "'>" +
                    "<input type='hidden' name='type' value='report'>" +
                    "<label for='commentText'>Enter Comment:</label>" +
                    "<textarea class='form-control' id='commentText' name='commentText' rows='2'></textarea>" +
                "</div>" +
                "<button type='submit' class='btn btn-primary'>Submit</button>" +
            "</form>" +
        "</div>" +
    "</div>"
    return $(report)
}

// Create event
function createEvent(id, title, image, location, status, starttime, endtime, description, user) {
    var startTimeSplit = new String(starttime).split(" ")
    var startTimeString = startTimeSplit[0].concat('T', startTimeSplit[1])
    var startDate = new Date(startTimeString)
    var startHours = startDate.getHours()
    var startAMPM = "AM"
    if (startHours > 12) {
        startHours %= 12
        startAMPM = "PM"
    }
    var startMinutes = startDate.getMinutes()
    if (startMinutes < 10) {
        startMinutes = "0".concat(startMinutes)
    }
    var startDateString = startDate.toDateString() + " " + startHours + ":" + startMinutes + " " + startAMPM

    var endTimeSplit = new String(endtime).split(" ")
    var endTimeString = endTimeSplit[0].concat('T', endTimeSplit[1])
    var endDate = new Date(endTimeString)
    var endHours = endDate.getHours()
    var endAMPM = "AM"
    if (endHours > 12) {
        endHours %= 12
        endAMPM = "PM"
    }
    var endMinutes = endDate.getMinutes()
    if (endMinutes < 10) {
        endMinutes = "0".concat(endMinutes)
    }
    var endDateString = endDate.toDateString() + " " + endHours + ":" + endMinutes + " " + endAMPM

    var statusString = ""
    if (startDate.getTime() > Date.now()) statusString = "Upcoming"
    else if (Date.now() > startDate.getTime() && Date.now() < endDate.getTime()) statusString = "In-Progress"
    else statusString = "Finished"

    var event = "<div class='card pb-2 mb-3'>" +
        "<input type='hidden' class='postID' value='" + id + "'>" +
        "<img src='" + image + "' class='card-img-top'>" +
        "<div class='card-body'>" +
            "<div class='row justify-content-between p-3'>" +
                "<div class='col-md-6'>" +
                    "<div class='row'>" +
                        "<h5 class='card-title'>" + title + "</h5>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<p class='card-text'>" + description + "</p>" +
                    "</div>" +
                "</div>" + 
                "<div class='col-auto'>" +
                    "<div class='row py-1'>" + location + "</div>" +
                    "<div class='row py-1'>Start: " + startDateString + "</div>" +
                    "<div class='row py-1'>End: " + endDateString + "</div>" +
                    "<div class='row py-1'>" + statusString + "</div>" +
                "</div>" +
            "</div>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-auto py-1'>" +
                    "<h6>" + user + "</h6>" +
                "</div>" +
                "<div class='col-auto py-1'>" +
                    "<button type='button' class='btn btn-link btn-sm toggleComments'>Toggle comments</button>" +
                    "<button type='button' class='btn btn-link btn-sm reportPost'>Report Post</button>" +
                "</div>" +
            "</div>" +
    "</div>" +
        "<div class='card-footer comments' style='display:none;'>" +
            "<form class='border-bottom py-2' id='commentForm'>" +
                "<div class='form-group'>" +
                    "<input type='hidden' name='postID' value='"+ id + "'>" +
                    "<input type='hidden' name='type' value='event'>" +
                    "<label for='commentText'>Enter Comment:</label>" +
                    "<textarea class='form-control' id='commentText' name='commentText' rows='2'></textarea>" +
                "</div>" +
                "<button type='submit' class='btn btn-primary'>Submit</button>" +
            "</form>" +
        "</div>" +
    "</div>"
    return $(event)
}

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