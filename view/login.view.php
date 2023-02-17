<div class="container w-25 mt-5 bg-dark p-5 text-white">
    <div class="login-form">
        <form action="controller/login.controller.php"  id="login" method="POST">
            <div class="form-container">
                <h1 class="text-center">Login</span></h1>
                <div class="form-group mt-3">
                <label for="email_username">Email address/Username</label>
                    <input type="text" class="form-control" name="email_username" id="email_username" placeholder="Enter your email/username">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                    <input type="password"class="form-control"  name="password" id="password" placeholder="Enter your password">
                </div>

                <button class="btn btn-primary btn-block" type="submit" name="loginSubmit">Login</button>
            </div>
        </form>


    </div>

</div>