<?php 
require_once 'app/views/templates/headerPublic.php';
session_start();
$error = '';
if (isset($_SESSION["createError"]) && $_SESSION["createError"] == true) {
    $error = $_SESSION["createError"];
}
?>
<main role="main" class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h1>Create Account</h1>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="/create/newUser" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter your password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}" title="Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character." class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="verifypassword">Verify Password</label>
                                <input type="password" id="verifypassword" name="verifypassword" class="form-control" placeholder="Re-enter your password" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="text-center mt-3">
                        <a href="index.php">Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once 'app/views/templates/footer.php'; ?>
