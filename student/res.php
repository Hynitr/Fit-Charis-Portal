<script>
function goBack() {
    window.history.back()
}
</script>
<?php
include("functions/init.php");
if(!isset($_GET['id']) && !isset($_GET['term']) && !isset($_GET['cls']) && !isset($_GET['ses'])) {

echo "Error 404!";

die();
} else {


$data =  $_GET['id'];
$tms  =  $_GET['term'];
$cls  =  $_GET['cls'];
$ses  =  $_GET['ses'];

$sql3 = "SELECT * FROM `motor` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set3 = query($sql3);
$row3 = mysqli_fetch_array($result_set3);

if(row_count($result_set3) == 0) {

   echo  "No result uploaded for this user yet<br/><a href='#' onclick='goBack()';>Click here to go back</a>";

   die();
} else {

if($row3['tess'] == null || $row3['tess'] == '') {

    echo "Your result has not yet been approved by the school admin <br/><a href='#' onclick='goBack()';>Click here to go back</a>";
    die();
} else {

$sql4 = "SELECT sum(sn) AS altol FROM students WHERE `Class` = '$cls'";
$res1 = query($sql4);
$qw1  = mysqli_fetch_array($res1);

$sql5 = "SELECT * FROM students WHERE `AdminID` = '$data'";
$res2 = query($sql5);
$qw2  = mysqli_fetch_array($res2);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $call['school'] ?> | Staff Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $call['school'] ?> | Staff Portal">
    <meta name="keywords" content="<?php echo $call['school'] ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" href="dist/img/logo.png" type="image/png" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    .table-bordered td,
    .table-bordered th {

        border: 1px solid #000000;
    }
    </style>
</head>

<body>
    <div class="text-center">
        <?php 
    if($qw2['Department'] == 'Secondary School') {

        echo '
        <h1><img style="width: 50px; height: 50px;" src="dist/img/logo.png"> <b>FIT-CHARIS COLLEGE</b></h1>
        ';
        } else {

        echo '
        <h1><img style="width: 50px; height: 50px;" src="dist/img/logo.png"> <b>FIT-CHARIS INTERNATIONAL SCHOOL</b></h1>
        ';
        }
        ?>
        <h4><b>Government Approved</b></h4>
        <h5>KM 10, Lasu Iba Road,
            Afolabi B/Stop, Akesan, Iba-Lasu Exp/Way, Lagos. <br />No. 5/13 Alhaji Fausat Street, St. Mary Bus-Stop,
            Governor Road, Ikotun, Lagos.</h5>
        <h6><b>Tel.: <?php echo $call['tel'] ?> <br /> Website.: <?php echo $call['website'] ?> &nbsp;
                &nbsp; &nbsp;
                Email.:
                info@fitcharisschools.com</b></h6>

        <br />

        <h3>STUDENT ASSESSMENT REPORT FOR <?php echo strtoupper($cls) ?> - <?php echo strtoupper($tms) ?></h3>
        <br />
    </div>

    <div class="container">
        <div class="row">
            <h5 class="col-sm-6">Name.:
                <b><?php echo $qw2['SurName']." ".$qw2['Middle Name']." ".$qw2['Last Name'] ?></b>
            </h5>
            <h5 class="col-sm-6">Admission Number.: <b><?php echo $data ?></b></h5>
            <h5 class="col-sm-6">Class.: <b><?php echo $cls ?></b></h5>
            <h5 class="col-sm-6">Academic Session.: <b><?php echo $ses ?></b></h5>
            <h5 class="col-sm-6">School Resumes.:
                <b><?php echo date('l, F d, Y ', strtotime($row3['resm'])); ?></b>
            </h5>
            <!-- <h5 class="col-sm-6">Times Present.: <?php echo $row3['tsp'] ?></h5> -->
        </div>
    </div>
    <br />
    <table class="table table-hover text-center table-bordered table-striped">
        <?php

            echo '

            <tr>
            <th>Subject</th>
            <th width="90px">Classwork <br />(10)</th>
            <th width="90px">Continuous
            Assessment <br />(10)</th>
            <th width="90px">Mid-Term Test<br>(10)</th>
            <th width="90px">Project<br>(10)</th>
            <th>Exam Score<br>(60)</th>
            <th>Total<br>(100)</th>';
           
            if($tms == '1st Term') {
                echo '
                <th>1st Term <br />Score</th>
                '; 
            } else {

            if($tms == '2nd Term') {

                echo '
                <th>1st Term <br />Score</th>
                <th>2nd Term <br />Score</th>
                ';
            } else {

            if($tms == '3rd Term') {

            echo '
            <th>1st Term <br />Score</th>
            
            <th>2nd Term <br />Score</th>

            ';
            }
            }
        }
            echo '
            <th>Cumulative <br /> Average Score</th>
            <th>Grade</th>
            <th>Remark</th>
        </tr>
            
            ';
            
            
        }


$sql= "SELECT * FROM `result` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set=query($sql);
if(row_count($result_set) == "") {
            
          } else {
while($row= mysqli_fetch_array($result_set))
 {
  $frd = $row['subject'];
$sql2= "SELECT * FROM `score` WHERE `admno` = '$data' AND `subject` = '$frd' AND `ses` = '$ses'";
$result_set2=query($sql2);
$row2= mysqli_fetch_array($result_set2);
    

        echo '

        <tr>
        <td>'.ucwords($row['subject']).'</td>
        <td>'.$row['classex'].'</td>
        <td>'.$row['test'].'</td>
        <td>'.$row['mid'].'</td>
        <td>'.$row['ass'].'</td>
        <td>'.$row['exam'].'</td>
        <td>'.$row['total'].'</td>';
        if($tms == '1st Term') {
            
            $annual = $row['total'];
         
            echo '
            <td>'.$row2['fscore'].'</td>
            <td>'.$annual.'</td>
            '; 
        } else {

        if($tms == '2nd Term') {

           $annual = round(($row2['fscore'] + $row2['sndscore']) / 2, 0);

            echo '
            <td>'.$row2['fscore'].'</td>
            <td>'.$row2['sndscore'].'</td>
            <td>'.$annual.'</td>
            ';
        } else {

        if($tms == '3rd Term') {

            $annual = round(($row2['fscore'] + $row2['sndscore'] + $row2['tscore']) / 3, 1);

        echo '
        <td>'.$row2['fscore'].'</td>
        <td>'.$row2['sndscore'].'</td>
        <td>'.$annual.'</td>

        ';
            
        }
        }
        }
        echo '
        <td>'.$row['grade'].'</td>
        <td>'.$row['remark'].'</td>
        </tr>


        ';
        }


        }
        ?>
    </table>

    <table style="width: 100%;" class="table table-hover table-bordered table-striped">

        <tr>
            <th class="text-center" colspan="4">Personal Development</th>
            <th class="text-center" colspan="2">Academic Performance Summary</th>
        </tr>
        <?php
$sql2 = "SELECT * FROM `motor` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set2 = query($sql2);
$row2 = mysqli_fetch_array($result_set2);
if(row_count($result_set2) == "") {
    echo "<span style='color:red'>No records found</span>";        
  } else {
?>

        <tr>
            <td>Mental Alertness</td>
            <td><?php echo $row2['attendance'] ?></td>
            <td>Physical development</td>
            <td><?php echo $row2['punctuality'] ?></td>
            <td><b>Mark Possible .:</b> &nbsp;&nbsp; <?php echo $row2['mrkpos'] ?></td>
            <td><b>Mark Obtained .:</b> &nbsp;&nbsp; <?php echo $row2['mrkobt'] ?></td>
        </tr>
        <tr>
            <td>Adjustment in school</td>
            <td><?php echo $row2['honesty'] ?></td>
            <td>Relationship with teachers</td>
            <td><?php echo $row2['neatness'] ?></td>
            <td colspan="2"><b>Percentage .:</b> &nbsp;&nbsp; <?php echo $row2['perc'] ?>%</td>
        </tr>
        <tr>
            <td>Relationship with
                students</td>
            <td><?php echo $row2['nonaggr'] ?></td>
            <td>General attitude
                and habit</td>
            <td><?php echo $row2['leader'] ?></td>
            <td><b>Total Grade.:</b> &nbsp;&nbsp; <?php echo $row2['totgra'] ?></td>
        </tr>
        <tr>
            <td colspan="4" rowspan="12"><b>Teacher's Comment.:</b> &nbsp;&nbsp;
                <?php echo ucwords($row2['principal']) ?></td>
            <td colspan="4" rowspan="12"><b>Principal Comment.:</b> &nbsp;&nbsp;
                <?php echo ucwords($row2['tess']) ?></td>
        </tr>

    </table>

</body>

<script type="text/javascript">
window.addEventListener("load", window.print());
</script>

</html>
<?php
}
}
}
?>