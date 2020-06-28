<?php
  include("../template/login_header.php");
?>
<!-- BEGIN LOGIN -->
<div class="content">

	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="" method="post" style="display:block;">
		<h3>Forget Password ?</h3>
		<?php
		      if(isset($message))
		      {
		        echo '<code>'.$message.'</code>';	  
		      }
		 ?>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
		    <input type="hidden" name="cmd" value="forget_pass">
			<button type="button"  class="btn btn-default" onClick="location.href='../login/index.php'">Back</button>
			<input type="submit" class="btn btn-success uppercase pull-right" value="Submit">
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->	
</div>
<?php
  include("../template/login_footer.php");
?>
