function save(){
   var form=$('#save_data').get(0);
    var user_name=$('#user_name').val();
    var user_password=$('#user_password').val();
    if(user_name==='' || user_password===''){
        if(user_name===''){
       $('#user_name').css('border-color','red');
       $('#user_name_error').html('Please enter your user name');
        }
        if(user_password===''){
       $('#user_password').css('border-color','red');
       $('#user_password_error').html('Please enter your password');
        }
       
    }else{
        
        $.ajax({
            url: 'save',
            method:'post',
            data:new FormData(form),
            processData: false,
            contentType: false,
            success:function(){
               $('#add').modal('hide');
                window.location.assign('http://localhost/start_LV/jquery_crud/');
            }
        })
    }
}


function formValidation(id){
    var val=$.trim($('#'+id).val());
    if(val===''){
        $('#'+id+'_error').html('');
        $('#'+id).css('border-color','red');
    }else{
        $('#'+id+'_error').html('');
        $('#'+id).css('border-color','green');
    }
}

function deleteid(id){
	$('#mid').val(id);
	// alert(id);
}

function delete_data(){
	var id=$('#mid').val();
	var token=$('#_token').val();
	$.ajax({
		url:'delete',
		method:'post',
		dataType:'html',
		data:{id:id,_token:token},
		success:function(){
			$('#del').modal('hide');
			window.location.assign('http://localhost/start_LV/jquery_crud/');
		}
	})
}

function update_form(id){
	$('#uid').val(id);
	var token=$('#_token').val();
	$.ajax({
		url:'up_form',
		method:'post',
		dataType:'html',
		data:{id:id,_token:token},
		success:function(data){
			var dat=$.parseJSON(data);
			$('#uuser_name').val(dat.qr.user_name);
			$('#uuser_password').val(dat.qr.user_password);
			$('#umobile').val(dat.qr.mobile);
			$('#uemail').val(dat.qr.email);
			$('#u_token').val(dat.qr._token);
		}
	})
}

function update_data(){
	var form=$('#update_data').get(0);
	$.ajax({
		url:'up',
		method:'post',
		data:new FormData(form),
		processData:false,
		contentType:false,
		success:function(){
			$('#update').modal('hide');
			window.location.assign('http://localhost/start_LV/jquery_crud/');
		}
	})
}