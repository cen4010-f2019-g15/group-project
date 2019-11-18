// Various functions for creating content for the queue pages (reports and events)

//TODO: Should move common event handler functions to this file so they are not duplicated in reports.js and events.js
//TODO: Need to redesign how Location, Times, and Status are displayed on posts to look better on mobile

// Create report
function createReport(id, title, image, location, status, time, description, user) {
        var report = "<div class='card pb-2 mb-3'>" +
        "<input type='hidden' class='postID' value='" + id + "'>" +
        "<img src='" + image + "' class='card-img-top'>" +
        "<div class='card-body'>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-md-6'>" +
                    "<h5 class='card-title'>" + title + "</h5>" +
                "</div>" +
                "<div class='col-auto'>" +
                    "<span class='pr-2'>" + location + "</span>" +
                    "<span class='px-2'>" + time + "</span>" +
                    "<span class='pl-2'>" + status + "</span>" +
                "</div>" +
            "</div>" +
            "<p class='card-text'>" + description + "</p>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-auto py-1'>" +
                    "<h6><a href='>" + user + "</a></h6>" +
                "</div>" +
                "<div class='col-auto py-1'>" +
                    // Disable commenting and reporting functionality for now
                    //"<button type='button' class='btn btn-link btn-sm toggleComments'>Toggle comments</button>" +
                    //"<button type='button' class='btn btn-link btn-sm reportPost'>Report Post</button>" +
                "</div>" +
            "</div>" +
    "</div>" +
    /* Disable commenting and reporting functionality for now
        "<div class='card-footer comments' style='display:none;'>" +
            "<form class='border-bottom py-2' id='commentForm'>" +
                "<div class='form-group'>" +
                    "<input type='hidden' name='postID' value='"+ id + "'>" +
                    "<label for='commentText'>Enter Comment:</label>" +
                    "<textarea class='form-control' id='commentText' name='commentText' rows='2'></textarea>" +
                "</div>" +
                "<button type='submit' class='btn btn-primary'>Submit</button>" +
            "</form>" +
        "</div>" +
        */
    "</div>"
    return $(report)
}

// Create event
function createEvent(id, title, image, location, status, starttime, endtime, description, user) {
    var event = "<div class='card pb-2 mb-3'>" +
        "<input type='hidden' class='postID' value='" + id + "'>" +
        "<img src='" + image + "' class='card-img-top'>" +
        "<div class='card-body'>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-md-6'>" +
                    "<h5 class='card-title'>" + title + "</h5>" +
                "</div>" +
                "<div class='col-auto'>" +
                    "<span class='pr-2'>" + location + "</span>" +
                    "<span class='px-2'>" + starttime + "</span>" +
                    "-" +
                    "<span class='px-2'>" + endtime + "</span>" +
                    "<span class='pl-2'>" + status + "</span>" +
                "</div>" +
            "</div>" +
            "<p class='card-text'>" + description + "</p>" +
            "<div class='row justify-content-between'>" +
                "<div class='col-auto py-1'>" +
                    "<h6><a href='>" + user + "</a></h6>" +
                "</div>" +
                "<div class='col-auto py-1'>" +
                    // Disable commenting and reporting functionality for now
                    //"<button type='button' class='btn btn-link btn-sm toggleComments'>Toggle comments</button>" +
                    //"<button type='button' class='btn btn-link btn-sm reportPost'>Report Post</button>" +
                "</div>" +
            "</div>" +
    "</div>" +
    /* Disable commenting and reporting functionality for now
        "<div class='card-footer comments' style='display:none;'>" +
            "<form class='border-bottom py-2' id='commentForm'>" +
                "<div class='form-group'>" +
                    "<input type='hidden' name='postID' value='"+ id + "'>" +
                    "<label for='commentText'>Enter Comment:</label>" +
                    "<textarea class='form-control' id='commentText' name='commentText' rows='2'></textarea>" +
                "</div>" +
                "<button type='submit' class='btn btn-primary'>Submit</button>" +
            "</form>" +
        "</div>" +
        */
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