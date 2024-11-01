<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/create_staff.png', dirname(__FILE__) );?>" style="height: 60px">Create staff</h3>
</div>
<!-- Create staff form -->
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create new staff</h3>
		</div>
		<div class="panel-body">
			<form name="create_staff" class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php" onsubmit="return validate()">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="create_staff">

				<div class="form-group">
					<label for="inputName" class="col-lg-3 control-label">Name</label>
					<div class="col-lg-9">
				 		<input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">Email</label>
					<div class="col-lg-9">
				 		<input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPhone" class="col-lg-3 control-label">Phone</label>
					<div class="col-lg-9">
				 		<input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone">
					</div>
				</div>

				<div class="form-group">
					<label for="inputAddress" class="col-lg-3 control-label">Address</label>
					<div class="col-lg-9">
				 		<textarea class="form-control" rows="3" name="address" id="inputAddress" placeholder="Address"></textarea>
					</div>
				</div>

				<div class="form-group">
			    	<div class="col-lg-9 col-lg-offset-3">
			      		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
			        	<a href="<?php echo admin_url();?>admin.php?page=vpm-staff" class="btn btn-default">Cancel</a>
			       		<button type="submit" class="btn btn-primary">Submit</button>
			    	</div>
			    </div>

			</form>
		</div>
	</div>
</div>

<script>
function validate() {

	var a = document.forms["create_staff"]["name"].value;
	if (a == "") {
		alert("Please enter staff name");
		return false;
	}

	var b = document.forms["create_staff"]["email"].value;
	if (b == "") {
		alert("Please enter email address");
		return false;
	}
}
</script>