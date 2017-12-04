
 <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url('assets/mainfront/'); ?>/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets/mainfront/'); ?>plugins/metisMenu/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
    var BASEURL = '<?php echo base_url(); ?>';
    </script>
    <script type="text/javascript">
       function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#image_upload_preview').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
        }
        $("#upload").change(function () {
            readURL(this);
        });
    </script>
    
    <script type="text/javascript">
    $('#student-course').on('change',function(){
      var institute_id =  $('#institute_id').val();
      var course_id =  $(this).val();
      if(course_id!=''){

        $.post(BASEURL+'student/onboard/getCourceBrachList/', {course_id:course_id,institute_id:institute_id,status:'Branch'}, function(data){
            var resp = $.parseJSON(data);
            if(resp.status==true){
              $('#student-branch').html('');
              $('#student-branch').html(resp.resp);
               $('#student-semester').html('');
               $('#student-semester').html('<option value="">- Select Year Semester- </option>');
            }else{
              $('#student-branch').html('');
              $('#student-semester').html('');
              $('#student-branch').html('<option value="">- Select Branch- </option>');
              $('#student-semester').html('<option value="">- Select Year Semester- </option>');
            }
        });

      }else{
            $('#student-branch').html('');
              $('#student-semester').html('');
              $('#student-branch').html('<option value="">- Select Branch- </option>');
              $('#student-semester').html('<option value="">- Select Year Semester- </option>');
      }
    });

    $('#student-branch').on('change',function(){
      var institute_id =  $('#institute_id').val();
      var course_id =  $('#student-course').val();
      var branch_id =  $(this).val();
      if(course_id!=''){
        $.post(BASEURL+'student/onboard/getCourceBrachSemesterList/', {course_id:course_id,institute_id:institute_id,branch_id:branch_id,status:'semester'},function(data){
            var resp = $.parseJSON(data);
            if(resp.status==true){
              $('#student-semester').html('');
              $('#student-semester').html(resp.resp);
              
            }else{
             
              $('#student-semester').html('');
              
              $('#student-semester').html('<option value="">- Select Year Semester- </option>');
            }
        });
      }else{        
        $('#student-semester').html('');
        $('#student-semester').html('<option value="">- Select Year Semester- </option>');
      }
    });
    </script>
    <script>

    $('.course_select').on('click', function(){
        var ids=[];
        var institute_id =  $('#institute_id').val();
        var checkbox = $(this).find('input[type=checkbox]');
        if(!checkbox.prop("checked")){
            checkbox.prop("checked",true);
        } else {
            checkbox.prop("checked",false);
        }
        var checked_name = checkbox.attr("name");
        $("input[name='"+checked_name+"']").each( function(){
          if($(this).prop("checked")){
            ids.push($(this).val());
          } 
        });
        if(ids.length>0) {
        $.post(BASEURL+'teacher/onboard/course_branches/', {course_ids:ids,institute_id:institute_id,status:'Branch'}, function(data){
            if(data!=''){
              $('#branch_program').html('');
              $('#branch_program').html(data);
            }else{
               alert('No Data Found');
               $('#branch_program').html('');
               $('#semester_div').html('');
            }
        });
      }else{
        alert('No Data Found');
               $('#branch_program').html('');
               $('#semester_div').html('');
      }
    });


    $(document).on('click','.branch_select',function(){
        var ids=[];
        var institute_id =  $('#institute_id').val();
       
        var checkbox = $(this).find('input[type=checkbox]');
        if(!checkbox.prop("checked")){
            checkbox.prop("checked",true);
        } else {
            checkbox.prop("checked",false);
        }
        var checked_name = checkbox.attr("name");
        $("input[name='"+checked_name+"']").each( function(){
          if($(this).prop("checked")){
            ids.push($(this).attr('id'));
          } 
        });
        if(ids.length>0) {
          $.post(BASEURL+'teacher/onboard/course_branch_semeters/', {branch_ids:ids,institute_id:institute_id,status:'Semester'}, function(data){
              
              if(data!=''){
                $('#semester_div').html('');
                $('#semester_div').html(data);
              }else{
                 alert('No Data Found');
                 $('#semester_div').html('');
              }
          });
        };
    });
    $(document).on('click','.semester_select',function(){
        var ids=[];
        var institute_id =  $('#institute_id').val();
        var checkbox = $(this).find('input[type=checkbox]');
        if(!checkbox.prop("checked")){
            checkbox.prop("checked",true);
        } else {
            checkbox.prop("checked",false);
        }
    });




    $('#birthday').datepicker();
     var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
    </script>

</body>

</html>
