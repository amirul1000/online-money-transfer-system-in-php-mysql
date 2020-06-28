<?php
  include("../template/login_header.php");
?>
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="" method="post" style="display:block;">
		<h3>Sign Up</h3>
		 <?php
		      if(isset($message))
		      {
		        echo '<code>'.$message.'</code>';	  
		      }
		   ?>
		<p class="hint">
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">First Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name" value="<?=$_REQUEST['first_name']?>"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Last Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name"  value="<?=$_REQUEST['last_name']?>"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"   value="<?=$_REQUEST['email']?>"/>
		</div>		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"  value="<?=$_REQUEST['password']?>"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"  value="<?=$_REQUEST['rpassword']?>"/>
		</div>		
		<!--
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Member Type</label>
			<select class="form-control placeholder-no-fix" type="text" placeholder="Member Type" name="user_type"/>
			    <option value="employee" <?php if($_REQUEST['user_type']=='employee'){ echo "selected";} ?>>Employee</option>
			    <option value="employer" <?php if($_REQUEST['user_type']=='employer'){ echo "selected";} ?>>Employer</option>
			</select>
		</div>
		-->
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
			Terms of Service </a>
			& <a href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
		   <input type="hidden" name="cmd" value="register">
			<button type="button" id="register-back-btn" class="btn btn-default" onClick="location.href='index.php'">Back</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<?php
  include("../template/login_footer.php");
?>
