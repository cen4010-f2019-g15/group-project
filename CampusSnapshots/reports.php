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

    <title>Reports - Campus Snapshots</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
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
                            <a class="nav-link" href="admin.php">Admin</a>
                        </li>
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

        <div class="row justify-content-center py-3">
            <div class="col-md-12" id="posts">

                <!-- Filters -->
                <div class="dropright pb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filtersDropdown"
                        data-toggle="dropdown">
                        Filters
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="unresolved" value="unresolved" checked>
                            <label class="form-check-label" for="unresolved">Unresolved</label>
                        </div>
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="inProgress" value="inProgress" checked>
                            <label class="form-check-label" for="inProgress">In-Progress</label>
                        </div>
                        <div class="form-check dropdown-item">
                            <input class="form-check-input" type="checkbox" id="resolved" value="resolved" checked>
                            <label class="form-check-label" for="resolved">Resolved</label>
                        </div>
                    </div>
                </div>
                <!-- /.dropdown -->

                <div id="queue">
                    
                </div>

            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->

    <!-- JS Dependencies -->
    <script src="js/lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Page Functionality JS-->
    <script src="js/queue.js"></script>
    <script src="js/reports.js"></script>


</body>

</html>