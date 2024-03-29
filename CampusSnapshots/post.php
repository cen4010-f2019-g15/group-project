<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Redirect user if they are already signed in
    header('Location: login.php');
    die();
}
$username = $_SESSION['user'];
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">

    <title>New Post - Campus Snapshots</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Campus Snapshots</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo <<<_END
                        <li class="nav-item active">
                            <a class="nav-link" href="post.php">Post</a>
                        </li>
_END;
                    }

                    if (isset($_SESSION['admin'])) {
                        echo <<<_END
                        <li class="nav-item">
                            <a class="nav-link" href="updatereports.php">Update Reports</a>
                        </li>
_END;
                    }
                    ?>
                </ul>

                <ul class="navbar-nav ml-auto">
                <?php
                    if(isset($_SESSION['user'])) {
                        echo <<<_END
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link">$username</a>
                        </li>
_END;
                    } else {
                        echo <<<_END
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
_END;
                    }
                    ?>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 class="py-3 text-center display-4">New Post</h4>
                <form enctype="multipart/form-data">

                    <!-- TODO: Add funcitonality to choose report or event -->
                    <!-- TODO: Add date/time selection for event start and end time -->
                    <label class="pr-2">Post Type: </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="report" name="type" id="report" class="custom-control-input"
                            value="report" checked>
                        <label class="custom-control-label" for="report">Report</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="event" name="type" id="event" class="custom-control-input"
                            value="event">
                        <label class="custom-control-label" for="event">Event</label>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                            maxlength="30" required>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location"
                            maxlength="30" required>
                    </div>

                    <div id="reportFields">
                        <div class="form-group">
                            <label for="reportType">Report Type</label>
                            <select class="form-control" name="reportType" id="reportType" required>
                                <option value="Custodial">Custodial</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Technical">Technical</option>
                                <option value="Police">Police</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div id="eventFields" style="display:none;">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="startDate">Start Date</label>
                                <input type="date" class="form-control" name="startDate" id="startDate">
                            </div>
                            <div class="col-6">
                                <label for="startTime">Start Time</label>
                                <input type="time" class="form-control" name="startTime" id="startTime">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="endDate">End Date</label>
                                <input type="date" class="form-control" name="endDate" id="endDate">
                            </div>
                            <div class="col-6">
                                <label for="endTime">End Time</label>
                                <input type="time" class="form-control" name="endTime" id="endTime">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="Description" maxlength="140" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- JS Dependencies -->
    <script src="js/lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Page Functionality JS -->
    <script src="js/post.js"></script>


</body>

</html>
