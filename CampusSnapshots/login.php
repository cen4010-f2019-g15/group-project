<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: events.php');
    die();
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">

    <title>Login - Campus Snapshots</title>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card my-5 w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            Login to Campus Snapshots
                        </h5>
                        <form id="login">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="Username" id="username" maxlength="20"
                                    placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="Password" id="password" maxlength="30"
                                    placeholder="Password" required>
                                <span class="text-danger" id="loginError"></span>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Log In</button>
                        </form>
                        <div class="text-center pt-2">
                            Don't have an account? <a href="signup.php">create one today!</a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

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

    <!-- Page functionality JS -->
    <script src="js/cookie.js"></script>
    <script src="js/login.js"></script>
</body>

</html>
