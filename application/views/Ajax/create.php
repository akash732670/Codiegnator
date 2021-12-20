<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center text-primary mt-3">Crud Operation In CI Using Ajax</h1>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Add New User
		</button>
		<div id="result" class="mt-2"></div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	<form>
		    		<div class="form-group">
		    			<label>Name</label>
		    			<input type="text" id="name" class="form-control">
		    		</div>
		    		<div class="form-group">
		    			<label>Email</label>
		    			<input type="text" id="email" class="form-control">
		    		</div>
		    		<button type="button" class="btn btn-primary adduser">Add User</button>
		    	</form>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	<form>
		    		<div class="form-group">
		    			<label>Name</label>
		    			<input type="text" id="nameE" class="form-control" value="">
		    		</div>
		    		<div class="form-group">
		    			<label>Email</label>
		    			<input type="text" id="emailE" class="form-control" value="">
		    		</div>
		    		<button type="button" class="btn btn-primary update" value="">Update</button>
		    	</form>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="exampleModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">View User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div id="view_res"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="viewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body viewr">
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="editModelData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body editr">
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			getAllRecords();
			function getAllRecords() {
				var html = '';
				$.ajax({
	            	type: 'GET',
		            url: "http://localhost/CI/AjaxCrud/getRecord",
		            success:function(data){
		            	//console.log(data);
		            	var resultData  = JSON.parse(data);
		            	html += '<table class="table table-bordered">';
						html +=	'<tr>';
						html +=		'<th>Id</th>';
						html +=		'<th>Name</th>';
						html +=		'<th>Email</th>';
						html +=		'<th>Created At</th>';
						html +=		'<th>Action</th>';
						html +=	'</tr>';

						for(var i = 0; i<resultData.length; i++) {
							html +=	'<tr>';
							html +=		'<td>'+resultData[i].id+'</td>';
							html +=		'<td>'+resultData[i].name+'</td>';
							html +=		'<td>'+resultData[i].email+'</td>';
							html +=		'<td>'+resultData[i].created_at+'</td>';
							html +=		'<td><button  class="btn btn-primary viewData" value='+resultData[i].id+'>View</button>  | <button  class="btn btn-secondary editData" value='+resultData[i].id+'>Edit</button> | <button class="btn btn-danger delete" value='+resultData[i].id+'> Delete</button></td>';
							html +=	'</tr>';
						}	

						html +='</table>';

		            	//console.log(JSON.parse(data));

		            	//console.log(html);

		            	$("#result").html(html);
		            }
		        });
			}

			$(document).on("click",".adduser", function() {
				var nameOfUser = $("#name").val();
				var email = $("#email").val();
				var data = { name : nameOfUser, email : email};

				$.ajax({
				      type: 'POST',
				      url: "http://localhost/CI/AjaxCrud/dataInsert",
				      data: data,
				      dataType: "text",
				      success: function(resultData) { 
				      	$("#name").val('');
				      	$("#email").val('');
				      	if (resultData) {
				      		getAllRecords();
				      		//$("#exampleModal").modal('hide');
				      		$('#exampleModal').modal('hide');
				      	}
				     }
				});
			});

			$(document).on("click",".delete", function() {
				var did = $(this).val();
				var dataDelete = { id : did};
				$.ajax({
				      type: 'POST',
				      url: "http://localhost/CI/AjaxCrud/deleteData",
				      data: dataDelete,
				      dataType: "text",
				      success: function(resultData) { 
				      	console.log(resultData);
				      	if (resultData) {
				      		getAllRecords();
				      	}
				     }
				});
				console.log(did);
			});

			$(document).on("click",".view", function(){
				$("#exampleModalView").modal('show');
				var vid = $(this).val();
				var dataDelete = { id : vid};
				$.ajax({
	            	type: 'POST',
		            url: "http://localhost/CI/AjaxCrud/getRecordById",
		            data: dataDelete,
				    dataType: "text",
		            success:function(data){ 
		            	var resultD = JSON.parse(data);
		            	console.log(resultD);
		            	html = '';
			            	html += '<table class="table table-bordered">';
			            	html += "<tr>";
				            	html += "<th>Name</th>";
				            	html += "<td>"+resultD[0].name+"<td>";
			            	html += "</tr>";
			            	html += "<tr>";
				            	html += "<th>Email</th>";
				            	html += "<td>"+resultD[0].email+"<td>";
			            	html += "</tr>";
		            	html += '</table>';
		            	$("#view_res").html(html);
		            }
		        });
			});

			$(document).on("click",".edit", function() {
				$("#exampleModalEdit").modal('show');

				var eid = $(this).val();
				$(".update").val(eid);
				var dataread = { id : eid};
				$.ajax({
	            	type: 'POST',
		            url: "http://localhost/CI/AjaxCrud/getRecordById",
		            data: dataread,
				    dataType: "text",
		            success:function(data){ 
		            	var resultE = JSON.parse(data);
		            	console.log(data);
		            	$("#nameE").val(resultE[0].name);
		            	$("#emailE").val(resultE[0].email);
		            }

		        });
			});

			$(document).on("click",".update", function() {
				var uid = $(this).val();
				var nameOfUser = $("#nameE").val();
				var email = $("#emailE").val();
				var dataUpdate = {id: uid, name : nameOfUser, email : email};
				console.log(dataUpdate);

				$.ajax({
	            	type: 'POST',
		            url: "http://localhost/CI/AjaxCrud/updateData",
		            data: dataUpdate,
				    dataType: "text",
		            success:function(data){ 
		            	console.log(data);

	            	if (data) {
			      		getAllRecords();

			      		$("#exampleModalEdit").modal('hide');
			      	}

		            }
		        });
			});

			$(document).on("click",".viewData", function() {
				var vid = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'http://localhost/CI/AjaxCrud/viewData',
					data: {id:vid},
					dataType: 'text',
					success:function(data) {
						var resultV = JSON.parse(data);
						console.log(resultV);
						var html = `<table class="table table-bordered">
		        	<tr>
		        		<th>Name</th>
		        		<td>`+resultV[0].name+`</td>
		        	</tr>
		        	<tr>
		        		<th>Email</th>
		        		<td>`+resultV[0].email+`</td>
		        	</tr>
		        </table>`;

		        $(".viewr").html(html);

					}
				});

				

				//console.log($(this).val());
				$("#viewModel").modal('show');
			});

			$(document).on("click",".editData", function() {
				var editId = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'http://localhost/CI/AjaxCrud/viewData',
					data: {id:editId},
					dataType: 'text',
					success:function(data) {
						var resultE = JSON.parse(data);
						console.log(resultE);
						
						var html = `<form>
				    		<div class="form-group">
				    			<label>Name</label>
				    			<input type="text" id="nameEdit" class="form-control" value="`+resultE[0].name+`">
				    		</div>
				    		<div class="form-group">
				    			<label>Email</label>
				    			<input type="text" id="emailEdit" class="form-control" value="`+resultE[0].email+`">
				    		</div>
				    		<button type="button" class="btn btn-primary updateData" value="`+resultE[0].id+`">Update</button>
				    	</form>`;

				    	$(".editr").html(html);
				    	$("#editModelData").modal('show');

					}
				});
			});	

			$(document).on("click",".updateData", function() {
				var uid = $(this).val();
				var nameOfUser = $("#nameEdit").val();
				var email = $("#emailEdit").val();
				var data = {id: uid, name : nameOfUser, email : email};
				console.log(data);
				$.ajax({
				      type: 'POST',
				      url: "http://localhost/CI/AjaxCrud/updateDataById",
				      data: data,
				      dataType: "text",
				      success: function(resultData) { 
				      	$("#nameEdit").val('');
				      	$("#emailEdit").val('');
				      	if (resultData) {
				      		getAllRecords();
				      		//$("#exampleModal").modal('hide');
				      		$('#editModelData').modal('hide');
				      	}
				     }
				});

			});
		});
	</script>
</body>
</html>