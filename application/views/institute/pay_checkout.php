 <div class="container">       
        <div class="row">           
            <div class="col-md-8 center">
                <div class="login-panel panel panel-default academic">                  
                   
                    <div class="panel-body blue-border checkout">
				   <h3>Checkout</h3>
				   <table class="table table-hover">
				   
				   <thead>
				   <tr>
				   <td>Sr.No</td>
				   <td>Name</td>
				   <td>Qty</td>
				   <td>Cost</td>
				   </tr>
				   </thead>
				   
  <tbody>
    <tr>
        <td>1</td>
        <td>PAY AS GO PLAN</td>
        <td><?php if(!empty($total)) echo $total; ?> </td>
        <td><?php if(!empty($total)) echo $total; ?> X 50</td>
    </tr>
	
	<tr>
      <td></td>
      <td>CHOOSE BILLING PLAN</td>
     <td>
	 <form>
	 <div class="form-group">
									  <select class="form-control" id="sel1">
										<option value="1" selected>Quaterly</option>

                  <option value="2">Half-Yearly</option>

                  <option value="3">Annaully</option>     
									  </select>
                                </div></td>
      <td><?php echo '100.00'  ?>/-</td>
  </form>
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
       <td><?php echo '100.00'  ?>/-</td>
    
    </tr>
	
	<tr>
      <td></td>
      <td></td>
      <td>Promo Code</td>
       <td></td>
     
    </tr>
	
	<tr>
      <td></td>
      <td></td>
      <td>Net Payable 
	  <p><span>The Net Payable amount includes all taxes<br/>
such as VAT, Service Tax etc.</span></p>
	  </td>
       <td><?php echo '100.00'  ?>/-</td>
     
    </tr>
	
	
	
  </tbody>
</table>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                
								<form action="" method="post" >

                                    <input type="hidden" name="pay_amount" value="<?php echo '100.00'  ?>">

                                    <button type="submit" class="btn btn-primary btn-block login">Pay</button>

                                </form>
                            
                </div>
                </div>
            </div>
        </div>
    </div>