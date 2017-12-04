
        <!-- end navbar top -->
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> Class-Feeds 
<div class="btn-group">                 
    <button class="btn btn-trans btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="material-icons">mode_edit</i>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal"><i class="material-icons">note_add</i></a>     
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1"><i class="material-icons">event</i></a> 
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal2"><i class="material-icons">chrome_reader_mode</i></a> 
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3"><i class="material-icons">book</i></a> 
        <a class="dropdown-item" href="chat-layout.html"><i class="material-icons">chat_bubble</i> </a>  
    </div>
</div>
</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
            <!-- add book -->

<div class="modal right fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p><a href="#">GENERAL</a></p>
                    <p><a href="#">RESEARCH JOURNALS</a></p>
                    <p><a href="#">HISTORY</a></p>
                    <p><a href="#">OTHER HUMANTIES</a></p>
                    <p><a href="#">ENGINEERING</a></p>
                    <p><a href="#">ECONOMICS</a></p>
                    <p><a href="#">MEDICAL</a></p>
                    <p><a href="#">SCIENCE</a></p>
                    <p><a href="#">SCHOOL BOOKS</a></p>
                    <p><a href="#">IIT-JEE</a></p>
                    <p><a href="#">NEET / AIIMS</a></p>
                    <p><a href="#">BANK PO / IAS</a></p>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>

<!-- end book -->
        <table class="table">
          <tbody>

          <?php if(!empty($classfeeds)){  foreach($classfeeds as $value){ ?>
             
            <tr>
              <td> <?php echo date('d M',strtotime($value->startDate)) ; ?>   <span> <?php echo date('Y',strtotime($value->startDate)) ; ?> </span></td>
              <td><?php echo sprintf("%02d",$value->start_HH).':'.sprintf("%02d",$value->start_MM).' '.$value->start_meridian ;  ?></td>
              <td><?php echo $value->title;  ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="<?php echo base_url('student/classfeed/view_feed/'.$value->id);      ?>" title="Edit Class Information" class="btn btn-xs btn-warning"><i class="material-icons">check</i></a></td>
           <!--    <td><a href="#" title="Edit Class Information" data-toggle="modal" data-target="#myModal4"><i class="material-icons">mode_edit</i></a></td>
              <td><a href="#" title="Edit Class Information"><i class="material-icons">delete</i></a></td>
               -->
            </tr>

          <?php } }else{  ?>
          <tr> <td colspan="12"> No Feed Found.</td>     </tr>
          <?php } ?>
            
          </tbody>
        </table>
    </div>

            
            
            
   
   