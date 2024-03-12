<?php
$con = mysqli_connect('localhost', 'root', '', 'student_master');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php


  if (isset($_POST['submit'])) {

    $College = $_POST['College'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $Password = $_POST['Password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];

    $pass= password_hash($Password, PASSWORD_BCRYPT);
   
    $emailquery = "select * from `students` where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
        <script>
            alert("Email already exists");
        </script>
        <?php
    }
    else{
    $insert_query = "insert into `students` (college,
   stu_name,clg_code,programme,email,Password,phone_no,gender) values ('$College',
   '$name','$code','$course','$email','$pass',$number,'$gender')";
    $sql_execute = mysqli_query($con, $insert_query);

    if ($sql_execute) {
      echo "<script>alert('Registered Successfully')</script>";
    }
    else{
      echo "<script>alert('Not Registered')</script>";
    }
  }
}
  ?>

  <div class="container">
    <div class="h1">
      <h1>Student Registration</h1>
    </div>
    <form action="" method="post">

    <div class="row">
        <div class="col-25">
          <label for="College">College:</label>
        </div>
        <div class="col-75">
          <select id="College:" name="College" required>
            <option value="">--Select Your College--</option>
            <?php
            $select_brands = "Select * from `colleges`";
            $result_brands= mysqli_query($con, $select_brands);

            while ($row_data = mysqli_fetch_assoc($result_brands)) {
              $clg_title = $row_data['college'];
              $clg_value = $row_data['code'];
              echo "<option value='$clg_value'>$clg_title</option>";
            }

            ?>
            <!-- <option value="Massachusetts Institute of Technology (MIT) ">Massachusetts Institute of Technology (MIT) </option>
                <option value="University of Cambridge">University of Cambridge </option>
                <option value=" Dr. B R Ambedkar University"> Dr. B R Ambedkar University</option>
                <option value="Chaudhary Charan Singh University">Chaudhary Charan Singh University</option>
                <option value="Amity University Noida">Amity University Noida</option>
                <option value="GLA University Mathura">GLA University Mathura</option>
                <option value="GL Bajaj Mathura">GL Bajaj Mathura</option> -->

          </select>
        </div>
      </div>

      <!-- <div class="row" >
            <div class="col-25">
              <label for="lname">College:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Enter your College.." required>
            </div>
        </div> -->

      <div class="row">
        <div class="col-25">
          <label for="fname">Student Name:</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="name" placeholder="Enter Your name.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">College Code:</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="code" placeholder="Enter your College Code.." required>
        </div>
      </div>
      <!-- <div class="row">
            <div class="col-25">
              <label for="lname">Place:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Enter your Place..">
            </div>
          </div> -->
      <div class="row">
        <div class="col-25">
          <label for="lname">Programme:</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="course" placeholder="Enter your Course.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Email:</label>
        </div>
        <div class="col-75">
          <input type="email" id="lname" name="email" placeholder="Your gmail id.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="Password">Password:</label>
        </div>
        <div class="col-75">
          <input type="text" id="Password" name="Password" placeholder="Enter Your Password.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Phone no:</label>
        </div>
        <div class="col-75">
          <input type="number" id="lname" name="number" placeholder="ENTER YOUR NUMBER" required>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Gender:</label>
        </div>
        <div class="col-75">
          <input type="radio" id="Male" name="gender" value="male" required>
          <label for="Male">Male</label>
          <input type="radio" id="female" name="gender" value="female" required>
          <label for="female">Female</label><br>
        </div>
      </div>

      <!-- <div class="row">
            <div class="col-25">
              <label for="lname">Team name:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Your Team Name..">
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="country">Country</label>
            </div>
            <div class="col-75">
              <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
              </select>
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="subject">Subject</label>
            </div>
            <div class="col-75">
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="lname">Team Size:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Your Team Size..">
            </div>
          </div> -->
      <br>
      <div class="row">
        <input type="submit" value="Submit" name="submit">
      </div>
    </form>
  </div>
</body>

</html>