@extends.('frontend.index')
@section('content')

    <?php if ($show_alert) : ?>
        <div class="btn btn-info" role="alert">
            Đăng ký thành công, vui lòng nhấn vào <a href="login.php">đây</a>
            để tới trang đăng nhập
        </div>
    <?php endif; ?>
    <form action="XuLiDangKi.php" method="POST">
        <div class="container">
            <h1 class="text-center">Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="Username" >
            <small class="form-text text-danger">
                <!-- hiển thị lỗi -->
                <?= (isset($errors['username'])) ? $errors['username'] : " "; ?>
            </small> <br>

            <label for="password"><b> Password</b></label>
            <input type="password" placeholder=" Password" name="password" id="" >
            <small class="form-text text-danger">
                <!-- hiển thị lỗi -->

                <?= (isset($errors['password'])) ? $errors['password'] : ""; ?>
            </small> <br>
            <label for="password"><b>Repeat Password</b></label>
            <input type="password" placeholder=" repeatpassword" name="repeatpassword" id="" >
            <small class="form-text text-danger">
                <!-- hiển thị lỗi -->
                <?= (isset($errors['repeatpassword'])) ? $errors['repeatpassword'] : ""; ?>
            </small> <hr>
           
            <p>By creating an account you agree to our <a href="trangtrolai.php">Terms & Privacy</a>.</p>

            <input type="submit" class="btn btn-primary" value="Register">
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="trangtrolai.php">Sign in</a>.</p>
        </div>
    </form>