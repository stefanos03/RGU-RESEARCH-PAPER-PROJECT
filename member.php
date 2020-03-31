<?php
    require_once("includes/login_module.php");
	$pageTitle = "Member";
	require_once("classes/Conf.php");
    
    
    if (!(isset($_GET['mp']) &&  $_GET['mp']!=''))
    {
    	header("location:index.php");
    }
    
    $mp = trim($_GET['mp']);
    $mp = explode('-',$mp);
    $memberid = $mp[1];
    $code1 = $mp[0];
    $code2 = $mp[2];

    
    $member = new Member();
    $memberInfo = (object) $member->getMemberById($memberid);

    $memberAddress = '';
    if ($memberInfo->location!='')
    {
    	$memberAddress = $memberInfo->location;
    }

    if ($memberInfo->country!='')
    {
    	if ($memberInfo->location!='')
    	{
    		$memberAddress = $memberAddress.', '.$memberInfo->country;
    	}
    	else
    	{
    		$memberAddress = $memberInfo->country;
    	}
    }

    $memberPhoto = $memberInfo->photo;
    if ($memberPhoto!='')
    {	
    	$memberPhoto = 'users photos/'.$memberInfo->photo;
    }else{
    	$memberPhoto = 'users photos/photoprofil.png';
    }


    

    require_once("header.php");
    

    $myUserId = $_SESSION['myUserId'];

    


    

   
   	
    
?>

<br/>
<div class="container">
	<div class="row">
		<div class="col-sm-12 profileTitle-Without-Top-Border text-right"><?php echo $memberInfo->lastname.' '.$memberInfo->firstname; ?>
			
		</div>
	</div>
	<div class="row">
	   	<div class="col-sm-3" style="text-align:center;border-radius:15px;">
	   		<img src="<?php echo $memberPhoto; ?>" id="userphoto" class="img-circle" width=150px" height='150px' hspace="2px" align="center" style="margin-bottom:5px;" ><br/>
	   		
	   	</div>
	   	<div class="col-sm-9" ><!-- column 1 //-->
	   		<div class="row">
	   			<div class="col-md-8 col-sm-12 profileTitle" style="padding:10px;font-size:16px;">
	   					<i class='fa fa-map-marker'> <?php echo $memberAddress; ?></i>
	   			</div>
	   			<div class="col-md-4 col-sm-12 profileTitle text-right" style="padding:10px;font-size:16px;">

	   				
	   			</div>
	   		</div>
	   		
	   		<div class="row">
	   				<div class="col-xs-12">
	   						<div> 
	   								<h3> <?php echo "<font color='purple';><i class='fa fa-user-o'></i> About ".$memberInfo->lastname.' '.$memberInfo->firstname.'</font>'; ?> </h3><hr>
	   								<?php
	   									echo "<font size='+0.5'>".nl2br($memberInfo->aboutme)."</font>";
	   								 ?>
	   						</div>



	   				</div>
	   		</div>
	   		<a name="sendMessage"></a>
	   		
	   		

	   		<br/>
	   		
			   	

				



	   	</div><!-- end of column 2 //-->

	</div><!-- outer row //-->
	

	

</div><!-- end of container //-->







<?php

   require_once("footer.php");

?>
 <script type="text/javascript" src="js/avatar.js"></script>
 <script type="text/javascript">
 	$("document").ready(function(){

 		//------------------------------------------------------------
	 		$("#btnMessage").bind("click",function(){
	 			 var message = $("#txtMessage").val();
	 			 var sender = $("#sender").val();
	 			 var recipient = $("#recipient").val();

	 			 var dataArray = {"sender":sender,"recipient":recipient,"message":message};

	 			 if (message!='')
	 			 {
   						$.ajax({
   							type: "POST",
   							url: "server/send_message.php",
   							data: dataArray,
   							success: function(data){
   									$("#conversations").eq(0).prepend(data);
					  				$("#conversations").children().eq(0).hide();
					  				$("#conversations").children().eq(0).slideDown("slow");
					  				$("#txtMessage").val('');
   							},
   							error: function(data){
   									alert(data);
   							}

   						});
	 			 }
	 			 
	 		});
 		//-------------------------------------------------------------

 	});

 </script>