
<div class="container"><div class="col s12 m12 l10" style="margin-top:1.5%;">
    <div class="card white">
        <div class="card-content black-text">
        	<span class="card-title">Add Teachers</span>
            <form class="form-container" action="" method="post">
                <table class="striped responsive-table" style="margin-bottom: 10px;">
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
                            <td>
                                <input type="text" class="validate" name="teacher_unique_id[]" id="teacher_unique_id" placeholder="Enter Teacher Id." required="">
                                <div class="error"><?php echo form_error('teacher_unique_id'); ?></div>
                            </td>
                            <td>
                                <input type="text" class="validate" name="first_name[]" id="first_name" placeholder="Enter First Name" required="">
                                <div class="error"><?php echo form_error('first_name'); ?></div>
                            </td> 
                            <td>
                                <input type="text" class="validate" name="last_name[]" id="last_name" placeholder="Enter Last Name" required="">
                                <div class="error"><?php echo form_error('last_name'); ?></div>
                            </td> 
                            <td>
                                <input type="email" class="validate" name="email[]" id="email" placeholder="Enter Email" required="">
                                <div class="error"><?php echo form_error('email'); ?></div>
                            </td>
                            <td>
                                <input type="tel" class="validate" name="contact[]" id="phone" placeholder="Enter Phone" required="">
                                <div class="error"><?php echo form_error('contact'); ?></div>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            
                <a class="waves-effect waves-light btn blue darken-4" id="add-teacher-id">Add Teachers</a>
            <button type="submit" class="waves-effect waves-light btn blue darken-4">Submit</button>
        </form>
        </div>
    </div>
</div>
</div>
</main>

<script>
    $(document).ready(function (){
        $("#add-teacher-id").on("click",function (){
        var html =  '<tr>\n\
                        <td>\n\
                        <input type="text" class="validate" name="teacher_unique_id[]" id="teacher_unique_id" placeholder="Enter Teacher Id.">\n\
                            <div class="error"><?php echo form_error("teacher_unique_id"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="validate" name="first_name[]" id="first_name" placeholder="Enter First Name">\n\
                            <div class="error"><?php echo form_error("first_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" class="validate" name="last_name[]" id="last_name" placeholder="Enter Last Name">\n\
                            <div class="error"><?php echo form_error("last_name"); ?></div>\n\
                        </td>\n\
                        <td>\n\
                            <input type="email" class="validate" name="email[]" id="email" placeholder="Enter Email">\n\
                            <div class="error"><?php echo form_error("email"); ?></div>\n\
                        </td>\n\
\n\                     <td>\n\
                            <input type="tel" class="validate" name="contact[]" id="phone" placeholder="Enter Phone">\n\
                            <div class="error"><?php echo form_error("contact"); ?></div>\n\
                        </td>\n\
                    </tr>';
    
            $("#add-new-row").append(html);  
        });    
    });
</script>    