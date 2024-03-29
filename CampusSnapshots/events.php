<?php
session_start();
$username = "";
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">

    <title>Events - Campus Snapshots</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo <<<_END
                        <li class="nav-item">
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
                    if (isset($_SESSION['user'])) {
                        echo <<<_END
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link username">$username</a>
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

        <div class="row justify-content-center py-3">
            <div class="col-md-6" id="posts">

                <!-- Filters -->
                <!--
                <div class="dropright pb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filtersDropdown"
                        data-toggle="dropdown">
                        Filters
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="inProgress" value="inProgress" checked>
                            <label class="form-check-label" for="inProgress">In-Progress</label>
                        </div>
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="upcoming" value="upcoming" checked>
                            <label class="form-check-label" for="upcoming">Upcoming</label>
                        </div>
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="finished" value="finished" checked>
                            <label class="form-check-label" for="finished">Finished</label>
                        </div>
                    </div>
                </div>
                -->
                <!-- /.dropdown -->

                <div id="queue">

                </div>

            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    <div class="modal" tabindex="-1" role="dialog" id="commentLoginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You must be logged in to comment</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="login.php" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Dependencies -->
    <script src="js/lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Page Functionality JS-->
    <script src="js/queue.js"></script>
    <script src="js/events.js"></script>


</body>

</html>