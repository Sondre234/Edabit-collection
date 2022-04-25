<?php include('finalserver.php') ?>

<!DOCTYPE html>
<header></header>
<head>

    <link rel='stylesheet' type='text/css' media='screen' href='finalregister.css'>
    <script type="text/javascript" src="registrering.js"></script>

    
    
</head>

<body>

    
 
    <div class="main">

        <form action="finalregister.php" method="post">
        	
	<?php include('finalerrors.php'); ?>

  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
            </form>
        </div>
    </div>
</body>