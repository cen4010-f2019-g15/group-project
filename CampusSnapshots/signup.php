<?php
session_start();
if (isset($_SESSION['user'])) {
    // Redirect user if they are already signed in
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

    <title>Signup - Campus Snapshots</title>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card my-5 w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            Create an account now to join Campus Snapshots!
                        </h5>
                        <form id="signup">
                            <div class="form-row pb-3">

                                <div class="col">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                        placeholder="First name" maxlength="20" required>
                                </div>

                                <div class="col">
                                    <label for="middleInitial">MI</label>
                                    <input type="text" class="form-control" name="middleInitial" id="middleInitial"
                                        maxlength="1" placeholder="Middle initial">
                                </div>

                                <div class="col">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" maxlength="20"
                                        placeholder="Last name" required>
                                </div>

                            </div>

                            <div class="mb-3">
                                <span class="text-danger" id="nameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" maxlength="20"
                                    placeholder="Username" required>
                                <span class="text-danger" id="usernameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email address" maxlength="40" required>
                                <span class="text-danger" id="emailError"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password (6-30 characters)</label>
                                <input type="password" class="form-control" name="password" id="password" maxlength="30"
                                    placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                    maxlength="30" placeholder="Confirm password" required>
                                <span class="text-danger" id="passwordError"></span>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" value="" id="tosCheck">
                                <label class="form-check-label" for="tosCheck">
                                    I have read and agree to the 
                                    <a href="#" data-toggle="modal", data-target="#tosModal">
                                        User Agreement and Privacy Policy
                                    </a>
                                </label>
                                <p><span class="text-danger" id="tosError"></span></p>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <div class="modal" tabindex="-1" role="dialog" id="tosModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Campus Snapshots Terms of Service</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        You agree to allow Campus Snapshots to store images you upload 
                        for the purpose of displaying them on Campus Snapshots.
                    </p>
                    <p>
                        You agree to allow Campus Snapshots to store the user information 
                        supplied in the Signup form and allow Staff to view this information 
                        for administrative and disciplinary purposes.
                    </p>
                    <p>
                        You will not use Campus Snapshots to post offensive, inflamitory, or explicit 
                        information or images. Please abide by your institutions code of conduct while 
                        using Campus Snapshots.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Dependencies -->
    <script src="js/lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Page Functionality JS -->
    <script src="js/signup.js"></script>


</body>

</html>