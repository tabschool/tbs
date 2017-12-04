		
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> View Class Feed 
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

    <div class="login-panel panel panel-default">                  
        <div class="panel-body">
	    <h2><?php  if(!empty($content_info->title)){ echo $content_info->title;  } ?></h2>
	    <div class="h5p-wp-admin-wrapper">
	    <div class="h5p-content-wrap">
	    <div class="h5p-iframe-wrapper">
	    <iframe id="h5p-iframe-1" class="h5p-iframe" data-content-id="1" style="height:1px" src="about:blank" frameBorder="0" scrolling="no"></iframe>
	    </div>    
	    </div> 
     </div>
    </div>



             
        </div>
    </div>

</div>

			
			
			           <!-- add note -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Title" name="text" type="text" autofocus="">
                                </div> 
								
								<div class="form-group">
									  <select class="form-control" id="sel1">
										<option>Select Notebook</option>
										<option>Select Notebook 1</option>
									  </select>
                                </div>

								<div class="form-group">
                                    <textarea class="form-control" placeholder="Add Description" autofocus=""></textarea>
                                </div> 	
								
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>

<!-- end add note -->


 <!-- add event -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Task Title" name="text" type="text" autofocus="">
                                </div>  
								
								<div class="form-group">
                                    <input class="form-control" placeholder="Choose Date" name="text" type="text" autofocus="">
                                </div> 
								<div class="form-group time">
									  <select class="form-control" id="sel1">
										<option>HH</option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									  </select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control" id="sel1">
										<option>MM</option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
										<option>16</option>
										<option>17</option>
										<option>18</option>
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option>30</option>
										<option>31</option>
										<option>32</option>
										<option>33</option>
										<option>34</option>
										<option>35</option>
										<option>36</option>
										<option>37</option>
										<option>38</option>
										<option>39</option>
										<option>40</option>
										<option>41</option>
										<option>42</option>
										<option>43</option>
										<option>44</option>
										<option>45</option>
										<option>46</option>
										<option>47</option>
										<option>48</option>
										<option>49</option>
										<option>50</option>
										<option>51</option>
										<option>52</option>
										<option>53</option>
										<option>54</option>
										<option>55</option>
										<option>56</option>
										<option>57</option>
										<option>58</option>
										<option>59</option>
										<option>60</option>
									  </select>
                                </div>
								
								<div class="form-group time">
									  <select class="form-control" id="sel1">
										<option>AM</option>
										<option>PM</option>
									  </select>
                                </div>
								
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>

<!-- end end -->

           <!-- create notebook -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="login-panel panel panel-default">                  
                   <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Create New Notebook" name="text" type="text" autofocus="">
                                </div> 	
								
                            </fieldset>
                        </form>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">done </button>
      </div>
    </div>
  </div>
</div>

<!-- end create notebook -->