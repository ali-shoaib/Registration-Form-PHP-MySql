<!Doctype html>
<html>
    <head>
        <title>
            Login Form
        </title>
        <link href="./styling.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" />

    </head>
    <body>
    <?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['number']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email = '$email'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount > 0){
            ?>
                <script>
                    alert("EMAIL ALREADY EXISTS.");
                </script>
            <?php
        }
        else{
            if($password === $cpassword){
                $insertquery = "insert into registration(username, email, phone, 
                password, cpassword) values('$username','$email','$phone','$pass','$cpass')";

                $iquery = mysqli_query($con, $insertquery);

                if($iquery){
                    ?>
                    <script>
                    alert('Inserted successfully.');
                    </script>
                    <?php
                    }
                else{
                    ?>
                    <script>
                    alert('Not Inserted.');
                    </script>
                    <?php
                    }
                }
            else{
                ?>
                    <script>
                    alert('Passwords are not matching.');
                    </script>  
                <?php
            }
        }
    }
    ?>

        <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">    
	    <h4 class="card-title mt-3 text-center">Create Account</h4>
	    <p class="text-center">Get started with your free account</p>
	    <p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>Login via facebook</a>
	    </p>
	    <p class="divider-text">
        <span class="bg-light">OR</span>
        </p>
	    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

        <!-- form-group// -->
	    <div class="form-group input-group">
		<div class="input-group-prepend">
		<span class="input-group-text"> <i class="fa fa-user"></i> </span>
		</div>
        <input name="username" class="form-control" placeholder="Username" type="text" required />
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" required />
        </div>

        <!-- form-group// -->
        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="number" class="form-control" placeholder="Phone number" type="text" required />
        </div>

        <!-- form-group// -->
        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password" required />
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="cpassword" class="form-control" placeholder="Repeat password" type="password" required />
        </div> 

        <!-- form-group// -->                                      
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit"> Create Account  </button>
        </div> 

        <!-- form-group// -->      
        <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
       </form>
       </article>
       </div>
       </div> 

    </body>
</html>