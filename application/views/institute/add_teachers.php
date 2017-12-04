 <div class="container">       
        <div class="row">           
            <div class="col-md-9 center">
                <div class="login-panel panel panel-default academic">                  
                   
                    <div class="panel-body blue-border add-student">
           <h3>Add Teachers</h3>
             <form class="form-container" action="" method="post">
           <table class="table table-bordered">
           <thead>
                      
                         <tr>
                          <th>Teacher Id.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
  <tbody id="add-new-row">
    <tr>
      <td><input type="text" class="form-control"    name="teacher_unique_id[]" id="teacher_unique_id" placeholder="Enter Teacher Id." required="">  </td>
      <td><input type="text" class="form-control"  name="first_name[]" id="first_name" placeholder="Enter First Name" required=""></td>
     <td><input type="text" class="form-control" name="last_name[]" id="last_name" placeholder="Enter Last Name" required=""></td>
      <td><input type="text" class="form-control" name="email[]" id="email" placeholder="Enter Email" required=""></td>
       <td><input type="text" class="form-control" name="contact[]" id="phone" placeholder="Enter Phone" required=""></td>
  
    </tr>
  

  
  
  </tbody>
</table>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input style="background: #1742ce none repeat scroll 0 0; padding: 10px 20px;" type="submit" class="btn btn-primary login" name="SUBMIT" value="SUBMIT">
                                
                                  <a class="btn btn-primary btn-block login" id="add-teacher-id">Add Another Teacher</a>
                                
                
                       </form>      
                </div>
                </div>
            </div>
        </div>
    </div>