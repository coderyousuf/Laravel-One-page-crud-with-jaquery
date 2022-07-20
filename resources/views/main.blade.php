<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a data-bs-target="#add" data-bs-toggle="modal" class="btn btn-success mt-2"><i class="fa-solid fa-plus"></i></a>
				<hr>
				<table class="table table-bordered text-center">
					<tr>
						<th>SL</th>
						<th>User Name</th>
						<th>User Password</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
					@php
					$sl=1;
					foreach($qr as $row){
					@endphp
					<tr>
						<td><?php echo $sl++; ?></td>
						<td><?php echo $row->user_name?></td>
						<td><?php echo $row->user_password?></td>
						<td><?php echo $row->mobile?></td>
						<td><?php echo $row->email?></td>
						<td>
<a id="<?php echo $row->id?>" data-bs-toggle="modal" data-bs-target="#del" onclick="deleteid(id)" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
<a id="<?php echo $row->id?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update" onclick="update_form(id)"><i class="fa-solid fa-pen-to-square"></i></a>
						</td>
					</tr>
					@php } @endphp
				</table>
			</div>
		</div>
	</div>

	<div id="add" class="modal fade-show">
		<div class="modal-dialog modal-lg">
			<form id="save_data" method="post" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">Save User Data</div>
					<div class="modal-body">
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<input type="text" class="form-control form-control-sm mb-2" name="user_name" id="user_name" placeholder="user_name" onkeyup="formValidation(id)" onchange="formValidation(id)">
<span style="color:red; fornt-weight:bold" id="user_name_error"></span>
<input type="text" class="form-control form-control-sm mb-2" name="user_password" id="user_password" placeholder="password" onkeyup="formValidation(id)" onchange="formValidation(id)">
<span style="color:red; fornt-weight:bold" id="user_password_error"></span>
<input type="text" class="form-control form-control-sm mb-2" name="mobile" id="mobile" placeholder="mobile">
<input type="text" class="form-control form-control-sm mb-2" name="email" id="email" placeholder="email">
					</div>
					<div class="modal-footer">
<button type="button" onclick="save()" class="btn btn-primary btn-sm">Save</button>
<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div id="del" class="modal">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">Do you want to delete it permanently</div>
				<div class="modal-body">
					<input type="hidden" class="form-control form-control-sm" name="mid" id="mid">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-sm" onclick="delete_data()">Yes</button>
					<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>


<div id="update" class="modal">
	<div class="modal-dialog modal-lg">
		<form id="update_data" method="post">
			<div class="modal-content">
				<div class="modal-header">Update Data</div>
				<div class="modal-body mb-2">
					<input type="hidden" name="_token" id="u_token" value="">
					<input type="hidden" name="id" id="uid" value="">
					<input type="text" name="user_name" id="uuser_name" class="form-control form-control-sm">
					<input type="text" name="user_password" id="uuser_password" class="form-control form-control-sm">
					<input type="text" name="mobile" id="umobile" class="form-control form-control-sm">
					<input type="text" name="email" id="uemail" class="form-control form-control-sm">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-sm" onclick="update_data()">Update</button>
					<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
	window.Laravel = <?php echo json_encode([
'csrfToken' => csrf_token(),
		]); ?>
</script>
	<script type="text/javascript" src="resources/js/script.js"></script>
</body>
</html>