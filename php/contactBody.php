<?php

function getBody($str, $result){
        
	        			      			      
	    if($result){ 
            if(!empty($result)){
            	$flag=false;

	        	foreach ($result as $row) {
                        $name = strtolower($row['Name']);
  						 $pos=0;

	        			if((empty($str) || ($pos=strstr($name, $str))!=false) && isset($row['Email'])){
	        				$flag=true;			    	
			         		printf('
			        			      				<tr>
			        			      					<td>
			        			      						%s
			        			      					</td>
			        			      					<td>
			        			      						%s
			        			      					</td>
			        			      					<td>
			        			      						%s
			        			      					</td>
			        			      					<td>
			        			      						<div class="btn-group" >
			        			      							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        			      								<span class="glyphicon glyphicon-cog"></span>
			        			      								<span class="sr-only">Toggle Dropdown</span>
			        			      							</button>
			        			      							<ul class="dropdown-menu">
			        			      								<li>
				        			      								<a href="editContacts.php?id=%s" style="text-align:center"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
				        			      								</a>
			        			      								</li>
			        			      								<li role="separator" class="divider"></li>
			        			      								<li><button class="btn btn-default btn-block" data-toggle="modal" data-target="#%sdelete"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</button></li>
			        			      								<li role="separator" class="divider"></li>
			        			      								<li><a style="text-align:center" href="details.php?id=%s">
			        			      								<span aria-hidden="true">
																	<i class="fa fa-info" aria-hidden="true"></i>
																	 Details
			        			      								</span></a>
			        			      								</li>
			        			      							</ul>
			        			      						</div>
			        			      					</td>
			        			      				</tr>


										
										<div class="modal fade" id="%sdelete" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										         
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Delete Contact</h4>
										        </div>
										        <div class="modal-body">
										            <span>Are you sure ?</span>
										           	 
	 
										        </div>
										        <div class="modal-footer">

													<button class="btn btn-danger" data-dismiss="modal" class="btn btn-primary" onclick="deleteC(%s)">Yes</button> 
										        </div>
										         
										      </div>
										      
										    </div>
										  </div>

	   					             <div class="clearfix"></div>', $row['Name'], $row['Email'], $row['P_Number'], $row['CID'], $row['CID'], $row['CID'], $row['CID'], $row['CID']);

			             }

			             
			         }

			         if(!$flag){
			             	print("<tr>
			             		<td>
			             		No match found !!
			             		</td>

			             		</tr>");
			             }
			        }

			    else{
			         

			        print("<tr>
			             		<td>
			             		No Contacts !!!
			             		</td>

			             		</tr>");
			    }
	        }


	    else{
 				print("<tr>
			             		<td>
			             		Query Problem !!!
			             		</td>

			             		</tr>");
 	           
	        }

}


?>

