</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/materialize.js"></script> 

<!--scrollbar--> 

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> 



<!-- chartist --> 





<!-- sparkline --> 

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/plugins/sparkline/jquery.sparkline.min.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/plugins/sparkline/sparkline-script.js"></script> 



<!-- google map api --> 


<!--plugins.js - Some Specific JS codes for Plugin Settings--> 

<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/plugins.js"></script> 

<!-- Toast Notification --> 

	<script type="text/javascript">
		$('#instituteId').on('change',function(event){
			event.preventDefault();
			var  = $(this).val());
		});
	</script>

    <script>

        $( ".purchases_r_1 li" ).click(function() {	

	        $(".purchases_r_1 li .show_hide_box" ).toggleClass( "hide_box_show" );

      	});

	    $( ".purchases_r_2 li" ).click(function() {	

	        $(".purchases_r_2 li .show_hide_box" ).toggleClass( "hide_box_show" );

	    });

        $( ".purchases_r_3 li" ).click(function() {	

            $(".purchases_r_3 li .show_hide_box" ).toggleClass( "hide_box_show" );

        });

        $( ".bold_btn" ).click(function() {

            $(".editer_area" ).toggleClass( "text_bold" );

        });

        $( ".underline_btn" ).click(function() {

            $(".editer_area" ).toggleClass( "text_underline" );

        });



        $( ".italic_btn" ).click(function() {

            $(".editer_area" ).toggleClass( "text_italic" );

        });



$(".top_nav_btn").click(function(){

    $(".hide-on-small-and-down").toggleClass("left_nav_show");

});

</script>

</body>

</html>

