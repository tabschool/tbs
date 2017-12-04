<?php 

    $segment2 = $this->uri->segment(2);
    $segment3 = $segment2."/".$this->uri->segment(3);
    if($segment2 == 'dashboard' || $segment2 == '') $dashboard = 'active'; else $dashboard = '';
    if($segment2 == 'classfeed' || $segment3 == 'classfeed/view' || $segment3 == 'classfeed/edit') $feed = 'active'; else $feed  = '';
    if($segment2 == 'libraries' || $segment3 == 'libraries/add' || $segment3 == 'libraries/view') $library = 'active'; else $library = '';
    if($segment2 == 'tasks' || $segment3 == 'tasks/add' || $segment3 == 'tasks/edit') $task = 'active'; else $task = '';
    if($segment2 == 'notes' || $segment3 == 'notes/add' || $segment3 == 'notes/edit') $note = 'active'; else $note = '';

?>                      
        <!-- end page-wrapper -->
<?php $this->load->view('student/all_model'); ?>
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo STUDENT_THEME_URL ?>plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo STUDENT_THEME_URL ?>plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo STUDENT_THEME_URL ?>plugins/metisMenu/jquery.metisMenu.js"></script> 
    <script src="<?php echo TEACHER_THEME_URL ?>scripts/jquery-ui.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="<?php echo STUDENT_THEME_URL ?>plugins/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo STUDENT_THEME_URL ?>plugins/main.js"></script>



<script type="text/javascript"> var BASEURL='<?php echo base_url();   ?>'</script>
 <?php if (!empty($feed)): ?>
<script>H5PIntegration = {"baseUrl":"http:\/\/webmosk.com\/tab\/wordpress","url":"\/tab\/wordpress\/wp-content\/uploads\/h5p","postUserStatistics":true,"ajax":{"setFinished":"http:\/\/webmosk.com\/tab\/wordpress\/wp-admin\/admin-ajax.php?token=f1f33fd873&action=h5p_setFinished","contentUserData":"http:\/\/webmosk.com\/tab\/wordpress\/wp-admin\/admin-ajax.php?token=02ad7cbfa5&action=h5p_contents_user_data&content_id=:contentId&data_type=:dataType&sub_content_id=:subContentId"},"saveFreq":false,"siteUrl":"http:\/\/webmosk.com\/tab\/wordpress","l10n":{"H5P":{"fullscreen":"Fullscreen","disableFullscreen":"Disable fullscreen","download":"Download","copyrights":"Rights of use","embed":"Embed","size":"Size","showAdvanced":"Show advanced","hideAdvanced":"Hide advanced","advancedHelp":"Include this script on your website if you want dynamic sizing of the embedded content:","copyrightInformation":"Rights of use","close":"Close","title":"Title","author":"Author","year":"Year","source":"Source","license":"License","thumbnail":"Thumbnail","noCopyrights":"No copyright information available for this content.","downloadDescription":"Download this content as a H5P file.","copyrightsDescription":"View copyright information for this content.","embedDescription":"View the embed code for this content.","h5pDescription":"Visit H5P.org to check out more cool content.","contentChanged":"This content has changed since you last used it.","startingOver":"You'll be starting over.","by":"by","showMore":"Show more","showLess":"Show less","subLevel":"Sublevel","confirmDialogHeader":"Confirm action","confirmDialogBody":"Please confirm that you wish to proceed. This action is not reversible.","cancelLabel":"Cancel","confirmLabel":"Confirm","licenseU":"Undisclosed","licenseCCBY":"Attribution","licenseCCBYSA":"Attribution-ShareAlike","licenseCCBYND":"Attribution-NoDerivs","licenseCCBYNC":"Attribution-NonCommercial","licenseCCBYNCSA":"Attribution-NonCommercial-ShareAlike","licenseCCBYNCND":"Attribution-NonCommercial-NoDerivs","licenseCC40":"4.0 International","licenseCC30":"3.0 Unported","licenseCC25":"2.5 Generic","licenseCC20":"2.0 Generic","licenseCC10":"1.0 Generic","licenseGPL":"General Public License","licenseV3":"Version 3","licenseV2":"Version 2","licenseV1":"Version 1","licensePD":"Public Domain","licenseCC010":"CC0 1.0 Universal (CC0 1.0) Public Domain Dedication","licensePDM":"Public Domain Mark","licenseC":"Copyright"}},"hubIsEnabled":true,"user":{"name":"admin","mail":"harshpal.khurana@tabschool.in"},"core":{"styles":["\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/styles\/h5p.css?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/styles\/h5p-confirmation-dialog.css?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/styles\/h5p-core-button.css?ver=1.9.4"],"scripts":["\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/jquery.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-event-dispatcher.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-x-api-event.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-x-api.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-content-type.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-confirmation-dialog.js?ver=1.9.4","\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-action-bar.js?ver=1.9.4"]},"loadedJs":[],"loadedCss":[],"contents":{"cid-1":{"library":"<?php echo $content_info->library_id; ?>","jsonContent":<?php echo $content_info->content; ?>,"fullScreen":"0","exportUrl":"\/tab\/wordpress\/wp-content\/uploads\/h5p\/exports\/this-is-the-title-1.h5p","embedCode":"<iframe src=\"http:\/\/webmosk.com\/tab\/wordpress\/wp-admin\/admin-ajax.php?action=h5p_embed&id=1\" width=\":w\" height=\":h\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"><\/iframe>","resizeCode":"<script src=\"http:\/\/webmosk.com\/tab\/wordpress\/wp-content\/plugins\/h5p\/h5p-php-library\/js\/h5p-resizer.js\" charset=\"UTF-8\"><\/script>","url":"http:\/\/webmosk.com\/tab\/wordpress\/wp-admin\/admin-ajax.php?action=h5p_embed&id=1","title":"this is the title","displayOptions":{"frame":true,"export":true,"embed":true,"copyright":true,"icon":true},"contentUserData":[{"state":"{}"}],"scripts":["\/tab\/wordpress\/wp-content\/uploads\/h5p\/cachedassets\/b7254897442c9cb2489730b5abe2f3fa7166ccdc.js"],"styles":["\/tab\/wordpress\/wp-content\/uploads\/h5p\/cachedassets\/b7254897442c9cb2489730b5abe2f3fa7166ccdc.css"]}}};</script>

<script type='text/javascript'>
/* <![CDATA[ */
var commonL10n = {"warnDelete":"You are about to permanently delete these items from your site.\nThis action cannot be undone.\n 'Cancel' to stop, 'OK' to delete.","dismiss":"Dismiss this notice.","collapseMenu":"Collapse Main menu","expandMenu":"Expand Main menu"};var heartbeatSettings = {"nonce":"a90de34ffc"};var authcheckL10n = {"beforeunload":"Your session has expired. You can log in again from this page or go to the login page.","interval":"180"};/* ]]> */
</script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check&amp;ver=4.8.3'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/jquery.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-event-dispatcher.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-x-api-event.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-x-api.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-content-type.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-confirmation-dialog.js?ver=1.9.4'></script>
<script type='text/javascript' src='http://webmosk.com/tab/wordpress/wp-content/plugins/h5p/h5p-php-library/js/h5p-action-bar.js?ver=1.9.4'></script>
<?php endif; ?>


<script type="text/javascript">
    function load_unseen_notification()  
    {
        $.post(BASEURL+'student/dashboard/get_notification/',{status:'notification'},function(data){
            var resp = $.parseJSON(data);
            if(resp.status){
                $('#notification').html('');
                $('#notification').html(resp.html);
                $('#label-count').html('');
                $('#label-count').html(resp.count);
            }else{
                $('#notification').html('');
                $('#notification').html('<li><a href="javascript:;">Currently there are no notifications</a></li>');
                $('#label-count').html('');
                $('#label-count').html(resp.count);
            }
        });
    }
    load_unseen_notification();
    setInterval(function(){   
       load_unseen_notification();
    }, 5000);

$(document).ready(function(){

  $('.delete_note').on('click', function(e){
    var note_id = $(this).attr('id');
    $('#confirmdel').modal({ backdrop:'static',keyboard: false })
    .one('click', '#delete', function (e) {
        var url = $('#'+note_id).attr('data');
        window.location.href = url;
    });
  }); 

  $('.delete_chapternote').on('click', function(e){
    var note_id = $(this).attr('id');
    $('#confirmdelChapter').modal({ backdrop:'static',keyboard: false })
    .one('click', '#delete', function (e) {
        var url = $('#'+note_id).attr('data');
        window.location.href = url;
    });
  }); 

  $('.status_change').on('click', function(e){
    var task_id = $(this).attr('id');
    $('#taskDone').modal({ backdrop:'static',keyboard: false })
    .one('click', '#its_done', function (e) {
        var url = $('#'+task_id).attr('data');
        window.location.href = url;
    });
  }); 

  $('.delete_task').on('click', function(e){
    var task_id = $(this).attr('id');
    $('#Delete_modal_task').modal({ backdrop:'static',keyboard: false })
    .one('click', '#delete', function (e) {
        var url = $('#'+task_id).attr('data');
        window.location.href = url;
    });
  });
  
  $('.already_added').on('click', function(e){
    $('#already_checked').modal({ backdrop:'static',keyboard: false })
    .one('click', '#checked_out', function (e) {
        //var url = $('#'+task_id).attr('data');
        window.location.reload();
    });
  });

});
</script>
<?php if(!empty($user_info->cover_photo)): ?>
    <script type="text/javascript">
    var  photourl ='rgba(0, 0, 0, 0) url("<?php echo $user_info->cover_photo; ?>") no-repeat scroll 0 0 / cover' ;
    </script>
    
    <?php else: ?> 
    <script type="text/javascript">
    var  photourl ='rgba(0, 0, 0, 0) url("http://webmosk.com/tab/assets/student/img/banner.png") no-repeat scroll 0 0 / cover' ;
    </script>
<?php endif; ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#main_profile').css("background", photourl);
});

 $('#course_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }
      $.post(BASEURL+'student/Profile/change_course_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
              alert('Your course status has updated successfully');
              window.location.reload();
          }else {
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });

  $('#birthday_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }

      $('#loader').css('display', 'block');
      $.post(BASEURL+'student/Profile/change_birthday_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
             $('#loader').css('display', 'none');
              alert('Your city status has updated successfully');
              window.location.reload();
          }else {
              $('#loader').css('display', 'none');
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });

  $('#gender_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }
      $.post(BASEURL+'student/Profile/change_gender_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
              alert('Your gender status has updated successfully');
              window.location.reload();
          }else {
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });
  
  $('#city_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }
      $.post(BASEURL+'student/Profile/change_city_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
              alert('Your city status has updated successfully');
              window.location.reload();
          }else {
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });

$('#address_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }
      $.post(BASEURL+'student/Profile/change_address_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
              alert('Your address status has updated successfully');
              window.location.reload();
          }else {
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });


$('#parents_view').change(function(){
      var check = '';
      if($(this).prop("checked") == true)
      {
          check=1;
      }
      else
      {
          check=0;
      }
      $.post(BASEURL+'student/Profile/change_parents_status/',{status:'status',check:check},function(data){
          /*optional stuff to do after success */
          if(data!='failed'){
              alert('Your parents status has updated successfully');
              window.location.reload();
          }else {
              alert('Your operation has failed. Please try later ');
              window.location.reload();
          }
      });
  });

  $('#save_qoute').on('click',function(){
      var your_qoute = $("#your_qoute").val();
      if($.trim(your_qoute)=='' ){
        $('#qoute_error').css('color', 'red');
          $('#qoute_error').html('Please enter motto');
          setTimeout(function(){ $('#qoute_error').html(''); }, 5000);
          return false;
      }
      if(your_qoute.length > 140) {
        $('#qoute_error').css('color', 'red');
         $('#qoute_error').html('only 140 characters allow');
          setTimeout(function(){ $('#qoute_error').html(''); }, 5000);
          return false;
      }
      $.post(BASEURL+'student/Profile/update_code/',{status:'status',qoute:your_qoute},function(data){
        /*optional stuff to do after success */
        var resp = $.parseJSON(data);
        if(resp.status==false && resp.error==1){
            alert('Error : '+resp.message);
            window.location.reload();
        }else{
            $('#yourBio').modal({ backdrop:'static',keyboard: false })
            .one('click', '#sure_one', function (e) {

                 window.location.href = BASEURL+"student/Profile";
            });
          
        }
        return false;
      });

  });

  $('#change_password').on('click',function(){
      var old_password = $("#old_password").val();
      var new_password = $("#new_password").val();
      var confirm_password = $("#confirm_password").val();
    
    
      if($.trim(old_password)=='' ){
          $('#old_password_error').css('color', 'red')
          $('#old_password_error').html('Please enter Old password');
          setTimeout(function(){ $('#old_password_error').html(''); }, 5000);
          return false;
      }
      if($.trim(new_password)=='' ){
          $('#new_password_error').css('color', 'red');
          $('#new_password_error').html('Please enter New password');
          setTimeout(function(){ $('#new_password_error').html(''); }, 5000);
          return false;
      } 

    
      if($.trim(new_password).length<=6 ){
          $('#new_password_error').css('color', 'red');
          $('#new_password_error').html('Please enter minimum 6 digit password');
          setTimeout(function(){ $('#new_password_error').html(''); }, 5000);
          return false;
      } 

      if($.trim(confirm_password)=='' ){
          $('#confirm_password_error').css('color', 'red');
          $('#confirm_password_error').html('Please enter Confirm password');
          setTimeout(function(){ $('#confirm_password_error').html(''); }, 5000);
          return false;
      }
      if($.trim(confirm_password)!=$.trim(new_password)){
          $('#confirm_password_error').css('color', 'red');
          $('#confirm_password_error').html('Confirm password not match with new password');
          setTimeout(function(){ $('#confirm_password_error').html(''); }, 5000);
          return false;
      }

      $.post(BASEURL+'student/Profile/change_password/',{status:'status',new_password:new_password,old_password:old_password},function(data){
        /*optional stuff to do after success */
        var resp = $.parseJSON(data);
        if(resp.status==false && resp.error==1){
            alert('Error : '+resp.message);
            window.location.reload();
        }else{
            $('#yourPass').modal({ backdrop:'static',keyboard: false })
            .one('click', '#passsure_one', function (e) {
                 window.location.href = BASEURL+"student/Profile";
            });
        }
        return false;
      });

  });


$('#change_email').on('click',function(){
      var old_email = $("#old_email").val();
      var new_email = $("#new_email").val();
      var confirm_email = $("#confirm_email").val();
     
      if($.trim(old_email)==''){
          $('#old_email_error').css('color', 'red')
          $('#old_email_error').html('Please enter Old email');
          setTimeout(function(){ $('#old_email_error').html(''); }, 5000);
          return false;
      }
      if($.trim(new_email)==''){
          $('#new_email_error').css('color', 'red')
          $('#new_email_error').html('Please enter new email');
          setTimeout(function(){ $('#new_email_error').html(''); }, 5000);
          return false;
      } 
      if($.trim(confirm_email)==''){
          $('#confirm_email_error').css('color', 'red')
          $('#confirm_email_error').html('Please enter confirm email');
          setTimeout(function(){ $('#confirm_email_error').html(''); }, 5000);
          return false;
      }
      if($.trim(confirm_email)!=$.trim(new_email)){
          $('#confirm_email_error').css('color', 'red')
          $('#confirm_email_error').html('Confirm email not match with new email');
          setTimeout(function(){ $('#confirm_email_error').html(''); }, 5000);
          return false;
      }

    
      $.post(BASEURL+'student/Profile/change_email/',{status:'status',new_email:new_email,old_email:old_email},function(data){
        /*optional stuff to do after success */
        var resp = $.parseJSON(data);
        if(resp.status==false && resp.error==1){
            alert('Error : '+resp.message);
            window.location.reload();
        }else{
             $('#yourEmail').modal({ backdrop:'static',keyboard: false })
            .one('click', '#email_one', function (e) {
                 window.location.href = BASEURL+"student/Profile";
            });
        }
        return false;
      });

  });
    
    $('.class_add_my_book').on('click',function(event) {
        event.preventDefault();
         var book_add_id= $(this).attr('id');
         $('#confirmBook').modal({ backdrop:'static',keyboard: false })
    .one('click', '#yes_add', function (e) {
           
            var book_id = book_add_id.split('_');
            if($.trim(book_id[2])!=''){
                $.post(BASEURL+'student/libraries/add_to_mybook/',{status:'add_in_book',book_id:book_id[2]},function(data){
                    if (data!='failed'){
                        $('#congrats').modal({ backdrop:'static',keyboard: false,show:true })
                        .one('click', '#thanks', function (e) {
                           window.location.reload();
                        });
                    }else {
                        alert('Your operation has failed. Please try later ');
                        window.location.reload();
                    }
                });
            }
        });
    });

 $('#create_notebook').on('click',function(event) {
        event.preventDefault();
        var note_book =  $.trim($('#notebook_name').val()); 
        if(note_book!=''){
            $.post(BASEURL+'student/Notes/create_notebook/',{status:'add_in_book',notebook:note_book},function(data){
                if (data!='failed'){
                    alert('Your notebook has created successfully');
                    window.location.reload();
                }else {
                    alert('Your operation has failed. Please try later ');
                    window.location.reload();
                }
            });
        }else{
            $('#notebook_name').val('');
            $('#notebook_name_error').html('Please enter the notebook name');
            setTimeout(function(){ 
              $('#notebook_name_error').html('');
            },3000);
            return false;
        }
    });

     $('#add_notes').on('click',function(){
        var note_title = $('#notes_title').val();
        var note_description = $('#notes_description').val();
        var note_book_id = $('#note_book_id').val();

        if($.trim(note_title)==''){
            $('#note_title_error').html('Please enter title');
            setTimeout(function() {
             $('#note_title_error').html('');
            },3000);
            return false;  
        }  
        if($.trim(note_book_id)==''){
            $('#note_book_error').html('Please select notebook');
            setTimeout(function() {
             $('#note_book_error').html('');
            },3000);
            return false;  
        }    
        if($.trim(note_book_id)==''){
             $('#note_desc_error').html('Please enter description');
            setTimeout(function() {
             $('#note_desc_error').html('');
            },3000);
            return false;  
        } 
        $.post(BASEURL+'student/notes/add_note/',{status:'note',title:note_title,note_book:note_book_id,description:note_description},function(data) {
              if(data!='' && data!='failed'){
                    $('#success_msg_note').html('');
                    $('#success_msg_note').html('Your note has been added successfully');
                    setTimeout(function() {
                    $('#success_msg_note').html('');
                     window.location.reload();
                    },1500);
                    return true;  
              }else{
                alert('Action has been failed');
                window.location.reload();
              }

        });
    });  
    
    $('#add_task_submit').on('click',function(){
        var task_title = $('#task_title').val();
        var task_date  = $('#task_date').val();
        var task_hour = $('#task_hour').val();
        var task_mint = $('#task_mint').val();
        var task_meri = $('#task_meri').val();
        if($.trim(task_title)==''){
             $('#task_title_error').html('Please enter title');
            setTimeout(function() {
             $('#task_title_error').html('');
            },3000);
            return false;  
        }  
        if($.trim(task_date)==''){
             $('#task_date_error').html('Please select Date');
            setTimeout(function() {
             $('#task_date_error').html('');
            },3000);
            return false;  
        }    
        if($.trim(task_hour)=='' || $.trim(task_mint)=='' || $.trim(task_meri)==''){
             $('#hours_min_error').html('Please Select proper time');
            setTimeout(function() {
             $('#hours_min_error').html('');
            },3000);
            return false;  
        } 
        var hmm =task_hour+'/'+task_mint+'/'+task_meri;
        $.post(BASEURL+'student/tasks/add_user_task/',{status:'note',title:task_title,hour_minute:hmm,date:task_date},function(data) {
            if(data!='' && data!='failed'){
                $('#success_msg_note').html('');
                $('#success_msg_note').html('Your note has been added successfully');
                setTimeout(function() {
                $('#success_msg_note').html('');
                 window.location.href = BASEURL+'student/tasks/';
                },1500);
                return true;  
            }else{
                alert('Action has been failed');
                window.location.reload();
            }
        });
    });  

</script>
<script>


var theToggle = document.getElementById('toggle');

function get_update_notes(argument_id) {

        var note_title = $('#notes_title'+argument_id).val();
        var note_description = $('#notes_description'+argument_id).val();
        var note_book_id = $('#note_book_id'+argument_id).val();

        if($.trim(note_title)==''){
            $('#note_title_error'+argument_id).html('Please enter title');
            setTimeout(function() {
             $('#note_title_error'+argument_id).html('');
            },3000);
            return false;  
        }  
        if($.trim(note_book_id)==''){
            $('#note_book_error'+argument_id).html('Please select notebook');
            setTimeout(function() {
             $('#note_book_error'+argument_id).html('');
            },3000);
            return false;  
        }    
        if($.trim(note_book_id)==''){
             $('#note_desc_error'+argument_id).html('Please enter description');
            setTimeout(function() {
             $('#note_desc_error'+argument_id).html('');
            },3000);
            return false;  
        } 
        $.post(BASEURL+'student/notes/update_note/',{status:'note',main_id:argument_id,title:note_title,note_book:note_book_id,description:note_description},function(data) {
              if(data!='' && data!='failed'){
                    $('#success_msg_note').html('');
                    $('#success_msg_note').html('Your note has been added successfully');
                    setTimeout(function() {
                    $('#success_msg_note').html('');
                     window.location.reload();
                    },1500);
                    return true;  
              }else{
                alert('Action has been failed');
                window.location.reload();
              }

        });
}


function update_task(argument_id) {

        var note_title = $('#notes_title'+argument_id).val();
        var note_description = $('#notes_description'+argument_id).val();
        var note_book_id = $('#note_book_id'+argument_id).val();
        var task_title = $('#task_title'+argument_id).val();
        var task_date  = $('#task_date1'+argument_id).val();
        var task_hour = $('#task_hour'+argument_id).val();
        var task_mint = $('#task_mint'+argument_id).val();
        var task_meri = $('#task_meri'+argument_id).val();
        if($.trim(task_title)==''){
             $('#task_title_error'+argument_id).html('Please enter title');
            setTimeout(function() {
             $('#task_title_error'+argument_id).html('');
            },3000);
            return false;  
        }  
        if($.trim(task_date)==''){
             $('#task_date_error'+argument_id).html('Please select Date');
            setTimeout(function() {
             $('#task_date_error'+argument_id).html('');
            },3000);
            return false;  
        }    
        if($.trim(task_hour)=='' || $.trim(task_mint)=='' || $.trim(task_meri)==''){
             $('#hours_min_error'+argument_id).html('Please Select proper time');
            setTimeout(function() {
             $('#hours_min_error'+argument_id).html('');
            },3000);
            return false;  
        } 
        var hmm =task_hour+'/'+task_mint+'/'+task_meri;
        $.post(BASEURL+'student/tasks/edit_user_task/',{status:'note',task_id:argument_id,title:task_title,hour_minute:hmm,date:task_date},function(data) {
            if(data!='' && data!='failed'){
                $('#success_msg_note').html('');
                $('#success_msg_note').html('Your note has been updated successfully');
                setTimeout(function() {
                $('#success_msg_note').html('');
                 window.location.href = BASEURL+'student/Tasks/';
                },1500);
                return true;  
            }else{
                alert('Action has been failed');
                window.location.reload();
            }
        });
}

// based on Todd Motto functions
// https://toddmotto.com/labs/reusable-js/

// hasClass
function hasClass(elem, className) {
    return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}
// addClass
function addClass(elem, className) {
    if (!hasClass(elem, className)) {
        elem.className += ' ' + className;
    }
}
// removeClass
function removeClass(elem, className) {
    var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}
// toggleClass
function toggleClass(elem, className) {
    var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0 ) {
            newClass = newClass.replace( " " + className + " " , " " );
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    } else {
        elem.className += ' ' + className;
    }
}

theToggle.onclick = function() {
   toggleClass(this, 'on');
   return false;
}

jQuery(document).ready(function($) {
   
    $("input[name='task_date']").datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
       minDate:new Date()
    });


    $(".date_check").datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
       minDate:new Date()
    });
   
});
    </script>
    
</body>

</html>
