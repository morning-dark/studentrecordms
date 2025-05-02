<?php 
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $cshort = $_POST['course-short'];
        $cfull = $_POST['c-full'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $ocp = $_POST['ocp'];
        $nation = $_POST['nationality'];
        $mobno = $_POST['mobno'];
        $email = $_POST['email'];
        $country1 = $_POST['country1'];
        $dist1 = $_POST['dist1'];
        $paddress = $_POST['padd'];
        $caddress = $_POST['cadd'];
        $institution_name = $_POST['institution_name'];
        $formation = $_POST['formation'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $dist = $_POST['dist'];
        $from_period = $_POST['from_period'];
        $to_period = $_POST['to_period'];
        $graduated = $_POST['graduated'];
        $session = $_POST['session'];
        $regno = mt_rand(1000000000, 9999999999);

        $query = mysqli_query($con, "INSERT INTO registration(course, subject, fname, lname, dob, gender, ocp, nationality, mobno, email, country1, dist1, padd, cadd, institution_name, formation, country, state, dist, from_period, to_period, graduated, session, regno) VALUES ('$cshort', '$cfull', '$fname', '$lname', '$dob', '$gender', '$ocp', '$nation', '$mobno', '$email', '$country1', '$dist1', '$paddress', '$caddress', '$institution_name', '$formation', '$country', '$state', '$dist', '$from_period', '$to_period', '$graduated', '$session', '$regno')");

        if ($query) {
            echo '<script>alert("Student Registration successful")</script>';
            echo "<script>window.location.href='manage-students.php'</script>";
        } else {
            echo '<script>alert("Something went wrong. Please try again")</script>';
            echo "<script>window.location.href='register.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Registration</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        function showSub(val) {
            $.ajax({
                type: "POST",
                url: "subject.php",
                data:'cid='+val,
                success: function(data){
                    $("#c-full").val(data);
                }
            });
        }
    </script>
</head>
<body>
    <form method="post">
        <div id="wrapper">
            <?php include('leftbar.php');?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Register</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>Select Course<span id="" style="font-size:11px;color:red">*</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="course-short" id="cshort" onchange="showSub(this.value)" required="required">
                                                    <option VALUE="">SELECT</option>
                                                    <?php $query=mysqli_query($con,"select * from tbl_course");
                                                    while($res=mysqli_fetch_array($query)){ ?>
                                                        <option VALUE="<?php echo htmlentities($res['cid']);?>"><?php echo htmlentities($res['cshort']."-".$res['cfull'])?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>

                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>Select Subject<span id="" style="font-size:11px;color:red">*</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="c-full" id="c-full" required>
                                            </div>
                                        </div>
                                        <br><br>

                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label>Current Session<span id="" style="font-size:11px;color:red">*</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <?php $query=mysqli_query($con,"SELECT * FROM session where status=1");
                                                while($res=mysqli_fetch_array($query)){?> 
                                                    <input class="form-control" name="session" value="<?php echo htmlentities($res['session']);?>" readonly>
                                                <?php } ?>
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
                                    <div class="panel-heading">Personal Information</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>First Name<span id="" style="font-size:11px;color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Last Name</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="lname" required="required" pattern="[A-Za-z]+$">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Date of Birth</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="date" id="dob" name="dob" required="required">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="radio" name="gender" id="male" value="Male" required="required"> Male
                                                        <input type="radio" name="gender" id="female" value="Female" required="required"> Female
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Occupation</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="ocp" id="ocp">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="nationality" id="nation" required="required">
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Contact Information</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Mobile Number<span id="" style="font-size:11px;color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="tel" name="mobno" required="required" pattern="[0-9]+">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="email" name="email" required="required">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Country</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="country1" id="country1" required="required">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>City</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="dist1" id="dist1" required="required">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <textarea class="form-control" rows="3" name="padd" id="padd"></textarea>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Correspondence Address</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <textarea class="form-control" rows="3" name="cadd" id="cadd"></textarea>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Academic Information</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Institution Name<span id="" style="font-size:11px;color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="institution_name" id="institution_name" required="required">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Formation</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="formation" id="formation" required="required">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Country</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                    	<select class="form-control" name="country" id="country" onchange="showState(this.value)" required="required" >			
                                                    		<option VALUE="">Select Country</option>
                                                    		<?php $ret=mysqli_query($con,"SELECT * FROM countries");
                                                    		while($res=mysqli_fetch_array($ret)){?>

                                                    		<option VALUE="<?php echo htmlentities($res['id']);?>"><?php echo htmlentities($res['name'])?></option>


                                                    		<?php }?>
                                                    	</select>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>State</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                    	<select name="state" id="state"  class="form-control" onchange="showDist(this.value)" required="required">
                                                    		<option value="">Select State</option>
                                                    	</select>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                	<div class="col-lg-2">
                                                		<label>City</label>
                                                	</div>
                                                	<div class="col-lg-4">
                                                		<select name="dist" id="dist"  class="form-control" onchange="" required="required">
                                                    		<option value="">Select City</option>
                                                    	</select>
                                                	</div>
                                                    <div class="col-lg-2">
                                                        <label>From Period</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="date" name="from_period" id="from_period" required="required">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>To Period</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" type="date" name="to_period" id="to_period" required="required">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Graduated</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="radio" name="graduated" value="Yes" required="required"> Yes
                                                        <input type="radio" name="graduated" value="No" required="required"> No
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                	<div class="col-lg-4"></div>
                                                	<div class="col-lg-6">
                                                		<br><br>
                                                		<input type="submit" class="btn btn-primary" name="submit" value="Register">
                                                	</div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </form>

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
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


</script>
</body>
</html>
<?php ?>