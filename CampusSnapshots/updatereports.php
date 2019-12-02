<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    // Redirect user if they are not an admin
    header('Location: index.php');
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

    <title>Update Reports - Campus Snapshots</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="post.php">Post</a>
                        </li>
_END;
                    }

                    if (isset($_SESSION['admin'])) {
                        echo <<<_END
                        <li class="nav-item active">
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

        <div class="m-2 text-center">
            <h3 class="py-3">Report Queue</h3>
        </div>

        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Location</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="reports">
                
            </tbody>
        </table>

    </div>
    <!-- /.container -->

    <!-- JS Dependencies -->
    <script src="js/lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Page Functionality JS-->
    <script src="js/updatereports.js"></script>
    <script src="js/queue.js"></script>


</body>

</html>