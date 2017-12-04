!function ($) {
     $(function() {
     	//Start
        $('#content-course').on('change',function(){
		   	var course_id =  $(this).val();
		   	var institute_id =  $('#institute_id').val();
		   	if(course_id!=''){
		   		$.post(BASEURL+'teacher/contents/get_course_branches', {status:'status',institute_id:institute_id,course_id:course_id},function(data) {
		   			var resp = $.parseJSON(data);
		   			if(resp.status==true){
		   				$('#content-branch').html('');
						$('#content-branch').html(resp.resp);
						$('#content-semester').html('');
				   		$('#content-subject').html('');	
						$('#content-semester').html('<option value="">- Select Year Semester- </option>');
				   		$('#content-subject').html('<option value="">- Select Subject- </option>');

		   			}else{
		   				$('#content-branch').html('');
				   		$('#content-semester').html('');
				   		$('#content-subject').html('');
				   		$('#content-branch').html('<option value="">- Select Branch- </option>');
				   		$('#content-semester').html('<option value="">- Select Year Semester- </option>');
				   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   			}
		   		});
		   	}else{
		   		$('#content-branch').html('');
		   		$('#content-semester').html('');
		   		$('#content-subject').html('');
		   		$('#content-branch').html('<option value="">- Select Branch- </option>');
		   		$('#content-semester').html('<option value="">- Select Year Semester- </option>');
		   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   	}
		});
		//End
		// Start
		$('#content-branch').on('change',function(){
		   	var branch_id =  $(this).val();
		   	var course_id =  $('#content-course').val();
		   	var institute_id =  $('#institute_id').val();
		   	if(course_id!=''){
		   		$.post(BASEURL+'teacher/contents/get_course_semesters', {status:'status',institute_id:institute_id,course_id:course_id,branch_id:branch_id},function(data) {
		   			var resp = $.parseJSON(data);
		   			if(resp.status==true){
		   			
						$('#content-semester').html('');
						$('#content-semester').html(resp.resp);
				   		$('#content-subject').html('');	
				   		$('#content-subject').html('<option value="">- Select Subject- </option>');

		   			}else{
				   		$('#content-semester').html('');
				   		$('#content-subject').html('');
				   		$('#content-semester').html('<option value="">- Select Year Semester- </option>');
				   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   			}
		   		});
		   	}else{
		   		
		   		$('#content-semester').html('');
		   		$('#content-subject').html('');
		   		$('#content-semester').html('<option value="">- Select Year Semester- </option>');
		   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   	}

		});

		$('#content-semester').on('change',function(){
		   	var semester_id =  $(this).val();
		   	var branch_id =  $('#content-branch').val();
		   	var course_id =  $('#content-course').val();
		   	var institute_id =  $('#institute_id').val();
		   	if(course_id!=''){
		   		$.post(BASEURL+'teacher/contents/get_course_subjects', {status:'status',institute_id:institute_id,course_id:course_id,branch_id:branch_id,semester_id:semester_id},function(data){
		   			var resp = $.parseJSON(data);
		   			if(resp.status==true){
						$('#content-subject').html('');
						$('#content-subject').html(resp.resp);
		   			}else{
				   		$('#content-subject').html('');
				   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   			}
		   		});
		   	}else{

		   		$('#content-subject').html('');
		   		$('#content-subject').html('<option value="">- Select Subject- </option>');
		   	}

		});
	
    });
}(window.jQuery)