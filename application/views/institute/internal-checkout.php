    <div class="custom-container">

    	<div class="card white">

        	<div class="card-content black-text">

            	<div class="card-title" style="padding-bottom:3%; float:left">Checkout</div>

               

                <div class="row">

                	<div class="col s12 m12 l12">

                    	<table class="bordered centered responsive-table">

                	<thead>

                    	<tr>

                        	<th data-field="id">Sr.No</th>

                            <th data-field="name">Name</th>

                            <th data-field="qty">Qty</th>

                            <th data-field="cost">Cost</th>

                        </tr>

                    </thead>

                    <tbody>

                    	<tr>

                        	<td>1</td>

                            <td>Pay As You Go Plan</td>

                            <td><?php if(!empty($total)) echo $total; ?> </td>

                            <td><?php if(!empty($total)) echo $total; ?> X 50</td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td>Choose Your Billing</td>

                            <td>                           

  								<select class="browser-default">

    							<option value="1" selected>Quaterly</option>

    							<option value="2">Half-Yearly</option>

    							<option value="3">Annaully</option>    							

  								</select>

                            </td>

                            <td><?php if(!empty($total_amount))  echo number_format($total_amount,2); ?>/-</td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td></td>

                            <td></td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td>Discount @ 10%</td>

                            <td>N/A</td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td>Total Cost</td>

                            <td><?php if(!empty($total_amount))  echo number_format($total_amount,2); ?>/-</td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td>Promo Code</td>

                            <td>

                            	<input type="text" style="width:50%;">

                            </td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td>Net Payable</td>

                            <td><?php if(!empty($total_amount))  echo number_format($total_amount,2); ?>/-</td>

                        </tr>

                        <tr>

                        	<td></td>

                            <td></td>

                            <td></td>

                            <td>

                                <form action="" method="post" >

                                    <input type="hidden" name="pay_amount" value="<?php if(!empty($total_amount))  echo number_format($total_amount,2); ?>">

                                    <button type="submit" class="waves-effect waves-light btn blue darken-4">Pay</button>

                                </form>

                            </td>

                        </tr>

                    </tbody>

                </table>

                

                                  	

                    </div>

                </div>

            </div>

        </div>

        

    </div>

</main>



<script>

// Initialize collapse button

  $(".button-collapse").sideNav();

  // Initialize collapsible (uncomment the line below if you use the dropdown variation)

  //$('.collapsible').collapsible();

    $('.button-collapse').sideNav({

      menuWidth: 300, // Default is 300

      edge: 'right', // Choose the horizontal origin

      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor

      draggable: true // Choose whether you can drag to open on touch screens

    }

  );



  

  $(document).ready(function(){

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

    $('.modal').modal();

  });

  

  $(document).ready(function() {

    $('select').material_select();

  });

</script>

