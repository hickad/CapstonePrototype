	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Login to Your Account</h1><br>
              <form method="get" action="">
                <input type="text" name="user" placeholder="Username" value="username123">
                <input type="password" name="pass" placeholder="Password" value="password123">	
				<input type="submit" name="role" class="login loginmodal-submit" value="Donor">
				<input type="submit" name="role" class="login loginmodal-submit" value="Client">
				<input type="submit" name="role" class="login loginmodal-submit" value="Administrator">
              </form>
			  
			  <?php

					if( isset($_GET['role']) )
					{
						$_SESSION["userRole"] = $_GET['role'];
					}
			  
	
					
				?>

            </div>
        </div>
      </div>
