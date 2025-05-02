<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (empty($_SESSION['aid'])) {
	header('location:logout.php');
	exit;
} else{
	if(isset($_POST['submit'])){
		$sid=intval($_GET['id']);
		$cshort=$_POST['course-short'];
		$cfull=$_POST['c-full'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob = $_POST['dob'];
		$gender=$_POST['gender'];
		$ocp=$_POST['ocp'];
		$nation=$_POST['nation'];
		$mobno=$_POST['mobno'];
		$email=$_POST['email'];
		$country1=$_POST['country1'];
		$dist1=$_POST['dist1'];
		$paddress=$_POST['padd'];
		$caddress=$_POST['cadd'];
        $institution_name = $_POST['institution_name'];
        $formation = $_POST['formation'];
		$country=$_POST['country'];
		$state=$_POST['state'];
		$dist=$_POST['dist'];
        $from_period = $_POST['from_period'];
        $to_period = $_POST['to_period'];
        $graduated = $_POST['graduated'];

		$query=mysqli_query($con,"update registration set course='$cshort', subject='$cfull', fname='$fname', lname='$lname', dob='$dob', gender='$gender', ocp='$ocp', nationality='$nation', mobno='$mobno', email='$email', country1='$country1', dist1='$dist1', padd='$paddress', cadd='$caddress', institution_name='$institution_name', formation='$formation', country='$country', state='$state', dist='$dist', from_period='$from_period', to_period='$to_period', graduated='$graduated' where registration.id='$sid'");
		if($query){
			echo '<script>alert("Update successfull")</script>';
			echo "<script>window.location.href='manage-students.php'</script>";
		} else{
			echo '<script>alert("Something went wrong. Please try again")</script>';
			echo "<script>window.location.href='manage-students.php'</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Edit students</title>
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<link href="bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">
	<!--left !-->
    <?php include('leftbar.php')?>;
	 

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

<?php 
$sid=intval($_GET['id']);
$query=mysqli_query($con,"SELECT *,states.name as sname,states.id as sid FROM registration 
join tbl_course on tbl_course.cid=registration.course left join countries on countries.id=registration.country
LEFT join states on states.id=registration.state where registration.id='$sid'");
while ($res=mysqli_fetch_array($query)) {

?>





			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
		<div class="form-group">
		<div class="col-lg-4">
		<label>Registration Number</label>
		</div>
		<div class="col-lg-6">
 <input class="form-control" name="regno"  id="regno"  value="<?php echo $res['regno'];?>" readonly>
       </select>
	</div>
	 </div>	
				

<br><br>	

			<div class="form-group">
		    <div class="col-lg-4">
			<label>Select Course<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div class="col-lg-6">
<select class="form-control" name="course-short" id="cshort"  onchange="showSub(this.value)" required="required" >			
<option VALUE="<?php echo $cid=$res['cid']?>"><?php echo $res['cshort'];?></option>				
			
             
                        
                        
                   
<?php $sql=mysqli_query($con,"select * from tbl_course");
while($res2=mysqli_fetch_array($sql)){ 
if($res2['cid']==$c){
continue;
}else{

	?>
 <option VALUE="<?php echo htmlentities($res2['cid']);?>"><?php echo htmlentities($res2['cshort']."-".$res2['cfull'])?></option>
<?php } } ?>
</select>
										</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Select Subject<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
 <input class="form-control" name="c-full"  id="c-full"  value="<?php echo $res['subject'];?>">
       </select>
	</div>
	 </div>	
										
	 <br><br>								
			
			<div class="form-group">
		<div class="col-lg-4">
		<label>Current Session<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		
	   <input class="form-control" name="session" value="<?php echo htmlentities($res['session']);?>" readonly>
	 </div>	
										
	 <br><br>								
	
	</div>	
	<br><br>		
		
									
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Personal Informations</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-12">
			<div class="form-group">
		    <div class="col-lg-2">
			<label>First Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="fname" value="<?php echo htmlentities($res['fname']);?>"required="required">
			</div>
		    <div class="col-lg-2">
			<label>Last Name</label>
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="lname" value="<?php echo htmlentities($res['lname']);?>"required="required">
			</div>
			</div>
			<br><br>


			<div class="form-group">
				<div class="col-lg-2">
					<label>Date of Birth</label>
				</div>
				<div class="col-lg-4">
					<input class="form-control" type="date" id="dob" name="dob" value="<?php echo htmlentities($res['dob']);?>"required="required">
				</div>
				<div class="col-lg-2">
					<label>Gender<span id="" style="font-size:11px;color:red">*</span></label>
				</div>
				<div class="col-lg-4">
					<?php 
					if (strcasecmp($res['gender'],"Male")==0){?>
						<input type="radio" name="gender" id="male" value="Male" required="required" checked> &nbsp; Male &nbsp;
					<?php }else{ ?>
						<input type="radio" name="gender" id="male" value="Male" required="required"> &nbsp; Male &nbsp;
					<?php }?>
					<?php 
					if (strcasecmp($res['gender'],"female")==0){?>
						<input type="radio" name="gender" id="female" value="female" checked> &nbsp; Female &nbsp;
					<?php } else{?>
						<input type="radio" name="gender" id="female" value="female"> &nbsp; Female &nbsp;
					<?php }?>
				</div>
			</div>	
			<br><br>		
			<div class="form-group">
				<div class="col-lg-2">
					<label>Occupation</label>
				</div>
				<div class="col-lg-4">
					<input class="form-control" name="ocp" id="ocp" value="<?php echo htmlentities($res['ocp']);?>">
				</div>
				<div class="col-lg-2">
					<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
				</div>
				<div class="col-lg-4">
					<input class="form-control" name="nation" id="nation" required="required" 
					value="<?php echo htmlentities($res['nationality']);?>">
				</div>
			</div>	
			<br><br>
			</div>	
			<br><br>
		</div>
      	</div>
		</div>
			
		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Contact Informations</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-12">
			<div class="form-group">
		    <div class="col-lg-2">
			<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" type="number" name="mobno" required="required" maxlength="10" 
			   value="<?php echo htmlentities($res['mobno']);?>">
			</div>
			 <div class="col-lg-2">
			<label>Email<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control"  type="email" name="email" required="required" 
			value="<?php echo htmlentities($res['email']);?>">
			</div>
			</div>	
			<br><br>
								
		<div class="form-group">
			<div class="col-lg-2">
				<label>Country<span id="" style="font-size:11px;color:red">*</span></label>
			</div>
			<div class="col-lg-4">
				<input class="form-control" name="country1" value="<?php echo htmlentities($res['country1']);?>"required="required">
			</div>
			<div class="col-lg-2">
				<label>City<span id="" style="font-size:11px;color:red">*</span></label>
			</div>
			<div class="col-lg-4">
				<input class="form-control" name="dist1" value="<?php echo htmlentities($res['dist1']);?>"required="required">
			</div>
		</div>
		<br><br>
		<div class="form-group">
			<div class="col-lg-2">
				<label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
			</div>
			<div class="col-lg-4">
				<textarea class="form-control" rows="3" name="padd"><?php echo htmlentities($res['padd']);?></textarea>
			</div>
			<div class="col-lg-2">
				<label>Correspondence Address<span id="" style="font-size:11px;color:red">*</span>
				</label>
			</div>
			<div class="col-lg-4">
				<textarea class="form-control" rows="3" name="cadd"><?php echo htmlentities($res['cadd']);?></textarea>
			</div>
		</div>
		<br><br>
			
			
			</div>
		</div>
      	</div>
		</div>					
        <div class="row">
        	<div class="col-lg-12">
        		<div class="panel panel-default">
        			<div class="panel-heading">Academic Informations</div>
        			<div class="panel-body">
        				<div class="row">
        					<div class="col-lg-12">
        						<div class="form-group">
        							<div class="col-lg-2">
        								<label>Institution Name<span id="" style="font-size:11px;color:red">*</span></label>
        							</div>
        							<div class="col-lg-4">
        								<input class="form-control" name="institution_name" value="<?php echo htmlentities($res['institution_name']);?>"required="required">
        							</div>
        							<div class="col-lg-2">
        								<label>Formation<span id="" style="font-size:11px;color:red">*</span></label>
        							</div>
        							<div class="col-lg-4">
        								<input class="form-control" name="formation" value="<?php echo htmlentities($res['formation']);?>"required="required">
        							</div>
        						</div>
        						<br><br>
        						<div class="form-group">
        							<div class="col-lg-2">
        								<label>Country<span id="" style="font-size:11px;color:red">*</span></label>
        							</div>
        							<div class="col-lg-4">
        								<select class="form-control" name="country" id="country" onchange="showState(this.value)"required="required"  value="<?php echo htmlentities($res['country']);?>">
        									<option VALUE="<?php echo htmlentities($res['country']);?>"><?php echo htmlentities($res['country'])?></option>
        									<?php $ret=mysqli_query($con,"SELECT * FROM countries");
        									while($res3=mysqli_fetch_array($ret)){
        									?>
        									<option VALUE="<?php echo htmlentities($res3['country']);?>"><?php echo htmlentities($res3['country'])?></option>
        									<?php }?>
        								</select>
        							</div>
        							<div class="col-lg-2">
        								<label>State<span id="" style="font-size:11px;color:red">*</span></label>
        							</div>
        							<div class="col-lg-4">
        								<select name="state" id="state"  class="form-control" onchange="showDist(this.value)" required="required">
        									<option VALUE="<?php echo htmlentities($res['state']);?>"><?php echo htmlentities($res['state'])?></option>
        								</select>
        							</div>
        						</div>
        						<br><br>
        						<div class="form-group">
        							<div class="col-lg-2">
        								<label>City<span id="" style="font-size:11px;color:red">*</span> </label>
        							</div>
        							<div class="col-lg-4">
        								<select name="dist" id="dist"  class="form-control" onchange="showDist(this.value)" >
        									<option VALUE="<?php echo htmlentities($res['dist']);?>"><?php echo htmlentities($res['dist'])?></option>
        								</select>
        							</div>
        							<div class="col-lg-2">
        								<label>From</label>
        							</div>
        							<div class="col-lg-4">
        								<input class="form-control" type="date" id="from_period" name="from_period" value="<?php echo htmlentities($res['from_period']);?>"required="required">
        							</div>
        						</div>
        						<br><br>
        						<div class="form-group">
        							<div class="col-lg-2">
        								<label>To</label>
        							</div>
        							<div class="col-lg-4">
        								<input class="form-control" type="date" id="to_period" name="to_period" value="<?php echo htmlentities($res['to_period']);?>"required="required">
        							</div>
        							<div class="col-lg-2">
        								<label>Graduated<span id="" style="font-size:11px;color:red">*</span></label>
        							</div>
        							<div class="col-lg-4">
        								<?php 
        								if (strcasecmp($res['graduated'],"Yes")==0){?>
        									<input type="radio" name="graduated" id="yes" value="Yes" required="required" checked> &nbsp; Yes &nbsp;
        								<?php }else{ ?>
        									<input type="radio" name="graduated" id="yes" value="Yes" required="required"> &nbsp; Yes &nbsp;
        								<?php }?>
        								<?php 
        								if (strcasecmp($res['graduated'],"No")==0){?>
        									<input type="radio" name="graduated" id="no" value="No" checked> &nbsp; No &nbsp;
        								<?php } else{?>
        									<input type="radio" name="graduated" id="no" value="No"> &nbsp; No &nbsp;
        								<?php }?>
        							</div>
        						</div>
        					</div>
        					<br>
        					<div class="form-group">
        						<div class="col-lg-4"></div>
        						<div class="col-lg-6">
        							<br><br>
        							<input type="submit" class="btn btn-primary" name="submit" value="Update">
        						</div>
        					</div>
        				</div>
        			</div><!--row!-->
				</div>
			</div>
		</div>
	</div>
	

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function showState(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'id='+val,
	success: function(data){
	  // alert(data);
		$("#state").html(data);
	}
	});
}

function showDist(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'did='+val,
	success: function(data){
	  // alert(data);
		$("#dist").html(data);
	}
	});
	
}



function showSub(val) {
    
    //alert(val);
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'cid='+val,
	success: function(data){
	  // alert(data);
		$("#c-full").val(data);
	}
	});
	
}
</script>
</form>
</body>
</html>
<?php } ?>