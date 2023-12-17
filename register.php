<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3" action="php/register.php" method="post">

            <h4 class="display-4  fs-1">Create Account</h4><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo (isset($_GET['fname'])) ? htmlspecialchars($_GET['fname']) : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo (isset($_GET['email'])) ? htmlspecialchars($_GET['email']) : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="text" class="form-control" name="phone" value="<?php echo (isset($_GET['phone'])) ? htmlspecialchars($_GET['phone']) : "" ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : "" ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>

            <div class="mb-3">
                <label class="form-label">Retype Password</label>
                <input type="password" class="form-control" name="repass">
            </div>


            <button type="submit" class="btn btn-primary">Register </button>
            &nbsp;&nbsp;&nbsp;
            <a href="login.php" class="link-secondary">Login</a>
            &nbsp;&nbsp;&nbsp;
            <a href="index.php" class="link-secondary">Go to homepage</a>
        </form>
    </div>
</body>

</html>