<?php include("functions/top.php"); ?>
<?php
if(!isset($_GET['id']) && !isset($_GET['cls']) && !isset($_GET['term']) && !isset($_GET['ses'])) {
  header("location: ../opps");
}

$data = $_GET['id'];
$cls  = $_GET['cls'];
$term = $_GET['term'];
$ses  = $_GET['ses'];


//get student name from admission no.
$sl = "SELECT * FROM students WHERE `AdminID` = '$data'";
$res = query("$sl");
$rower = mysqli_fetch_array($res);


$sql= "SELECT * FROM `motor` WHERE `admno` = '$data' AND `term` = '$term' AND `ses` = '$ses' AND `class` = '$cls'";
$result_set=query($sql);
$row= mysqli_fetch_array($result_set);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Approve
                        <?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name'] ?> Result</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Approve Result for <strong>
                            <?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name'] ?></strong> -
                        <?php echo $cls ?>
                        <?php echo $term ?> <?php echo $ses ?></h3>
                    <div class="card-tools">
                        <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                            data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form name="uploadQuestionaire" role="form">

                        <div class="form-group">
                            <div class="row">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">Mental alertness:</label>

                                            <input type="number" name="date" id="attd"
                                                value="<?php echo $row['attendance'] ?>" placeholder="Mental alertness"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">Physical development:</label>
                                            <input type="number" name="month" id="punc"
                                                value="<?php echo $row['punctuality'] ?>"
                                                placeholder="Physical development" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">Adjustment in school:</label>
                                            <input type="number" name="year" id="hons"
                                                value="<?php echo $row['honesty'] ?>" placeholder="Adjustment in school"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">Relationship with teachers:</label>
                                            <input type="number" name="year" id="neat"
                                                value="<?php echo $row['neatness'] ?>"
                                                placeholder="Relationship with teachers" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">Relationship with students:</label>
                                            <input type="number" name="year" id="nonaggr"
                                                value="<?php echo $row['nonaggr'] ?>"
                                                placeholder="Relationship with students" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2" hidden>
                                            <label for="exampleInputEmail1">General attitude and habit:</label>
                                            <input type="number" name="year" id="ldsk"
                                                value="<?php echo $row['leader'] ?>"
                                                placeholder="General attitude and habit" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">School Resumes .:</label>
                                            <input type="date" name="resmes" id="resmes"
                                                value="<?php echo date('Y-m-d',strtotime($row["resm"])) ?>"
                                                class="form-control">
                                        </div>


                                        <?php
$sql = "SELECT sum(sn) AS pss FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$term' AND `ses` = '$ses'";
$ssl = "SELECT sum(total) AS mobt FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$term' AND `ses` = '$ses'";
$ds   = query($sql);
$ress = query($ssl);
$dws  = mysqli_fetch_array($ds); 
$pos  = mysqli_fetch_array($ress);

 $mrkpos  = $dws['pss'] * 100;
 $mrkobt  = $pos['mobt'];
 if ($mrkpos == 0 && $mrkobt == 0) {
  
  $perc = 0;
  $grade = 0;
 } else {
    
 $perc    = ($mrkobt/$mrkpos) * 100;

 if ($perc <= 44) {
    
    $grade  = "5th Class";
   
     } else {

  if ($perc <= 54) {
    
  $grade  = "4th Class";
  
  } else {

  if ($perc <= 64) {

  $grade  = "3rd Class";
 
  } else {

  if ($perc <= 74) {
  
  $grade  = "2nd Class";
  
  } else {

  if ($perc <= 100) {
  
  $grade  = "1st Class";
 
  }
  }
  }
  }
  }
}
?>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Mark Possible.:</label>
                                            <input type="number" name="year" id="mrkps" value="<?php echo $mrkpos ?>"
                                                class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Mark Obtained.:</label>
                                            <input type="number" name="year" id="mrkbt" value="<?php echo $mrkobt ?>"
                                                class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Percentage.:</label>
                                            <input type="text" name="year" id="perci"
                                                value="<?php echo(round($perc,1)); ?>%" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Total Grade.:</label>
                                            <input type="text" name="year" id="tog" value="<?php echo $grade ?>"
                                                class="form-control" disabled>
                                        </div>


                                    </div>
                                </div>

                                <?php
                        if($term == '3rd Term') {

                            echo'

                            <label>Promoted to.:</label>
                            <select name="cls" id="cls" class="custom-select">
                            <option name="cls" id="cls">'.$rower['Class'].'</option>
                            <option name="cls" id="cls">Nursery 1</option>
                            <option name="cls" id="cls">Nursery 2</option>
                            <option name="cls" id="cls">KG 1</option>
                            <option name="cls" id="cls">KG 2</option>
                            <option name="cls" id="cls">Year 1</option>
                            <option name="cls" id="cls">Year 2</option>
                            <option name="cls" id="cls">Year 3</option>
                            <option name="cls" id="cls">Year 4</option>
                            <option name="cls" id="cls">Year 5</option>
                            <option name="cls" id="cls">J.S.S 1</option>
                            <option name="cls" id="cls">J.S.S 2</option>
                            <option name="cls" id="cls">J.S.S 3</option>
                            <option name="cls" id="cls">S.S.S 1</option>
                            <option name="cls" id="cls">S.S.S 2</option>
                            <option name="cls" id="cls">S.S.S 3</option>
                                </select>

                                <br /><br />

                                ';
                                }
                                ?>



                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Class Teacher Comment .:</label>
                            <select id="prin" class="form-control">
                                <option id="prin"><?php echo $row['principal'] ?></option>
                                <optgroup label="Attitude">
                                    <option id="prin">An enthusiastic learner who seems to enjoy school.</option>
                                    <option id="prin">Exhibits a positive outlook and attitude in the classroom.
                                    </option>
                                    <option id="prin">Appears well rested and ready for each day's activities.</option>
                                    <option id="prin">Shows enthusiasm for classroom activities.</option>
                                    <option id="prin">Shows initiative and looks for new ways to get involved.</option>
                                    <option id="prin">Uses instincts to deal with matters independently and in a
                                        positive way.</option>
                                    <option id="prin">Strives to reach full potential.</option>
                                    <option id="prin">Is committed to doing best.</option>
                                    <option id="prin">Seeks new challenges.</option>
                                    <option id="prin">Takes responsibility for learning.</option>
                                </optgroup>
                                <optgroup label="Behavior">
                                    <option id="prin">cooperates consistently with the teacher and other students.
                                    </option>
                                    <option id="prin">transitions easily between classroom activities without
                                        distraction.</option>
                                    <option id="prin">is courteous and shows good manners in the classroom.</option>
                                    <option id="prin">follows classroom rules.</option>
                                    <option id="prin">conducts themselves with maturity.</option>
                                    <option id="prin">responds appropriately when corrected.</option>
                                    <option id="prin">remains focused on the activity at hand.</option>
                                    <option id="prin">resists the urge to be distracted by other students.</option>
                                    <option id="prin">is kind and helpful to everyone in the classroom.</option>
                                    <option id="prin">sets an example of excellence in behavior and cooperation.
                                    </option>
                                </optgroup>
                                <optgroup label="Character">
                                    <option id="prin">shows respect for teachers and peers.</option>
                                    <option id="prin">treats school property and the belongings of others with care and
                                        respect.</option>
                                    <option id="prin">is honest and trustworthy in dealings with others.</option>
                                    <option id="prin">displays good citizenship by assisting other students.</option>
                                    <option id="prin">joins in school community projects.</option>
                                    <option id="prin">is concerned about the feelings of peers.</option>
                                    <option id="prin">faithfully performs classroom tasks.</option>
                                    <option id="prin">can be depended on to do what they are asked to do.</option>
                                    <option id="prin">seeks responsibilities and follows through.</option>
                                    <option id="prin">is thoughtful in interactions with others.</option>
                                    <option id="prin">is kind, respectful and helpful when interacting with his/her
                                        peers</option>
                                    <option id="prin">is respectful of other students in our classroom and the school
                                        community</option>
                                    <option id="prin">demonstrates responsibility daily by caring for the materials in
                                        our classroom carefully and thoughtfully</option>
                                    <option id="prin">takes his/her classroom jobs seriously and demonstrates
                                        responsibility when completing them</option>
                                    <option id="prin">is always honest and can be counted on to recount information when
                                        asked</option>
                                    <option id="prin">is considerate when interacting with his/her teachers</option>
                                    <option id="prin">demonstrates his/her manners on a daily basis and is always
                                        respectful</option>
                                    <option id="prin">has incredible self-discipline and always gets his/her work done
                                        in a timely manner</option>
                                    <option id="prin">can be counted on to be one of the first students to begin working
                                        on the task that is given</option>
                                    <option id="prin">perseveres when faced with difficulty by asking questions and
                                        trying his/her best</option>
                                    <option id="prin">does not give up when facing a task that is difficult and always
                                        does his/her best</option>
                                    <option id="prin">is such a caring boy/girl and demonstrates concern for his/her
                                        peers</option>
                                    <option id="prin">demonstrates his/her caring nature when helping his/her peers when
                                        they need the assistance</option>
                                    <option id="prin">is a model citizen in our classroom</option>
                                    <option id="prin">is demonstrates his/her citizenship in our classroom by helping to
                                        keep it clean and taking care of the materials in it</option>
                                    <option id="prin">can always be counted on to cooperate with his/her peers</option>
                                    <option id="prin">is able to cooperate and work well with any of the other students
                                        in the class</option>
                                    <option id="prin">is exceptionally organized and takes care of his/her things
                                    </option>
                                    <option id="prin">is always enthusiastic when completing his/her work</option>
                                    <option id="prin">is agreeable and polite when working with others</option>
                                    <option id="prin">is thoughtful and kind in his/her interactions with others
                                    </option>
                                    <option id="prin">is creative when problem solving</option>
                                    <option id="prin">is very hardworking and always completes all of his/her work
                                    </option>
                                    <option id="prin">is patient and kind when working with his/her peers who need extra
                                        assistance</option>
                                    <option id="prin">trustworthy and can always be counted on to step in and help where
                                        needed</option>
                                </optgroup>
                                <optgroup label="Communication Skills">
                                    <option id="prin">has a well-developed vocabulary.</option>
                                    <option id="prin">chooses words with care.</option>
                                    <option id="prin">expresses ideas clearly, both verbally and through writing.
                                    </option>
                                    <option id="prin">has a vibrant imagination and excels in creative writing.</option>
                                    <option id="prin">has found their voice through poetry writing.</option>
                                    <option id="prin">uses vivid language in writing.</option>
                                    <option id="prin">writes clearly and with purpose.</option>
                                    <option id="prin">writes with depth and insight.</option>
                                    <option id="prin">can make a logical and persuasive argument.</option>
                                    <option id="prin">listens to the comments and ideas of others without interrupting.
                                    </option>
                                </optgroup>
                                <optgroup label="Group Work">
                                    <option id="prin">offers constructive suggestions to peers to enhance their work.
                                    </option>
                                    <option id="prin">accepts the recommendations of peers and acts on them when
                                        appropriate.</option>
                                    <option id="prin">is sensitive to the thoughts and opinions of others in the group.
                                    </option>
                                    <option id="prin">takes on various roles in the work group as needed or assigned.
                                    </option>
                                    <option id="prin">welcomes leadership roles in groups.</option>
                                    <option id="prin">shows fairness in distributing group tasks.</option>
                                    <option id="prin">plans and carries out group activities carefully.</option>
                                    <option id="prin">works democratically with peers.</option>
                                    <option id="prin">encourages other members of the group.</option>
                                    <option id="prin">helps to keep the work group focused and on task.</option>
                                </optgroup>
                                <optgroup label="Interests and Talents">
                                    <option id="prin">has a well-developed sense of humor.</option>
                                    <option id="prin">holds many varied interests.</option>
                                    <option id="prin">has a keen interest that has been shared with the class.</option>
                                    <option id="prin">displays and talks about personal items from home when they relate
                                        to topics of study.</option>
                                    <option id="prin">provides background knowledge about topics of particular interest
                                        to them.</option>
                                    <option id="prin">has an impressive understanding and depth of knowledge about their
                                        interests.</option>
                                    <option id="prin">seeks additional information independently about classroom topics
                                        that pique interest.</option>
                                    <option id="prin">reads extensively for enjoyment.</option>
                                    <option id="prin">frequently discusses concepts about which they have read.</option>
                                    <option id="prin">is a gifted performer.</option>
                                    <option id="prin">is a talented artist.</option>
                                    <option id="prin">has a flair for dramatic reading and acting.</option>
                                    <option id="prin">enjoys sharing their musical talent with the class.</option>
                                </optgroup>
                                <optgroup label="Participation">
                                    <option id="prin">listens attentively to the responses of others.</option>
                                    <option id="prin">follows directions.</option>
                                    <option id="prin">takes an active role in discussions.</option>
                                    <option id="prin">enhances group discussion through insightful comments.</option>
                                    <option id="prin">shares personal experiences and opinions with peers.</option>
                                    <option id="prin">responds to what has been read or discussed in class and as
                                        homework.</option>
                                    <option id="prin">asks for clarification when needed.</option>
                                    <option id="prin">regularly volunteers to assist in classroom activities.</option>
                                    <option id="prin">remains an active learner throughout the school day.</option>
                                </optgroup>
                                <optgroup label="Social Skills">
                                    <option id="prin">makes friends quickly in the classroom.</option>
                                    <option id="prin">is well-liked by classmates.</option>
                                    <option id="prin">handles disagreements with peers appropriately.</option>
                                    <option id="prin">treats other students with fairness and understanding.</option>
                                    <option id="prin">is a valued member of the class.</option>
                                    <option id="prin">has compassion for peers and others.</option>
                                    <option id="prin">seems comfortable in new situations.</option>
                                    <option id="prin">enjoys conversation with friends during free periods.</option>
                                    <option id="prin">chooses to spend free time with friends.</option>
                                </optgroup>
                                <optgroup label="Time Management">
                                    <option id="prin">tackles classroom assignments, tasks, and group work in an
                                        organized manner.</option>
                                    <option id="prin">uses class time wisely.</option>
                                    <option id="prin">arrives on time for school (and/or class) every day.</option>
                                    <option id="prin">is well-prepared for class each day.</option>
                                    <option id="prin">works at an appropriate pace, neither too quickly or slowly.
                                    </option>
                                    <option id="prin">completes assignments in the time allotted.</option>
                                    <option id="prin">paces work on long-term assignments.</option>
                                    <option id="prin">sets achievable goals with respect to time.</option>
                                    <option id="prin">completes make-up work in a timely fashion.</option>
                                </optgroup>
                                <optgroup label="Work Habits">
                                    <option id="prin">is a conscientious, hard-working student.</option>
                                    <option id="prin">works independently.</option>
                                    <option id="prin">is a self-motivated student.</option>
                                    <option id="prin">consistently completes homework assignments.</option>
                                    <option id="prin">puts forth their best effort into homework assignments.</option>
                                    <option id="prin">exceeds expectations with the quality of their work.</option>
                                    <option id="prin">readily grasps new concepts and ideas.</option>
                                    <option id="prin">generates neat and careful work.</option>
                                    <option id="prin">checks work thoroughly before submitting it.</option>
                                    <option id="prin">stays on task with little supervision.</option>
                                    <option id="prin">displays self-discipline.</option>
                                    <option id="prin">avoids careless errors through attention to detail.</option>
                                    <option id="prin">uses free minutes of class time constructively.</option>
                                    <option id="prin">creates impressive home projects.</option>
                                </optgroup>
                            </select>

                        </div>


                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Principal Comment</label>
                            <input type="text" name="text" id="tess" placeholder="" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $data; ?>" id="admis" hidden>
                            <input type="text" class="form-control"
                                value="<?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name'] ?>"
                                id="name" hidden>
                            <input type="text" class="form-control" value="<?php echo $cls; ?>" id="cla" hidden>
                            <input type="text" class="form-control" value="<?php echo $term; ?>" id="term" hidden>
                            <input type="text" class="form-control" value="<?php echo $ses; ?>" id="ses" hidden>
                        </div>

                        <p class="text-danger">Recheck all details typed in before submitting</p>

                        <button type="button" id="eddsubdone"
                            class="btn float-right btn-primary btn-outline-light">Approve Result</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

        </div>
        <!--/.col (right) -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>
<script src="ajax.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});
</script>

<?php


//notification for deleted

if(isset($_SESSION['del'])) {
   unset($_SESSION['del']);
 
}


//notification for upload result
if(isset($_SESSION['upup'])) {
    unset($_SESSION['upup']);

}


//notification for reset result
if(isset($_SESSION['res'])) {
    unset($_SESSION['res']);

}

//notification for update result
if(isset($_SESSION['upupl'])) {
   unset($_SESSION['upupl']);

}

?>
<!-- page script -->
</body>

</html>