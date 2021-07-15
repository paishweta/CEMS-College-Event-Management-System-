$(document).ready(function(){
	$("#form_login").on("submit", function(e){
		e.preventDefault();
		var student_prn = $("#student_prn");
		student_prn.removeClass("border-danger");
			$("#p_error").html("");
				var student_password = $("#student_password");
		var status = false;
		if(student_prn.val() == ""){
			student_prn.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter PRN here.</span>");
			status = false;
		}else{
		status = true;
		}
		if(student_password.val() == "" ){
			student_password.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter Password.</span>");
			status = false;
		}else{
			student_password.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if(status == true){
			$.ajax({
				url : "main.php",
				method : "POST",
				data :  $("#form_login").serialize(),
				success : function(data){
					if(data && data.status == false){
						student_prn.addClass("border-danger");
						$("#p_error").html("<span class='text-danger' style='color: #fff;'>"+data.message+"</span>");
					}else{
						console.log(data);
						window.location.href = "http://localhost/projects/cems/student.php";
						}
				}
			})
		}
	});

})	