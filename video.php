<?php 

    include 'connect.php';

    session_start();

    if (!isset($_SESSION['student_login'])) {
        header("location: login.php");
    }
    $sql = "SELECT message FROM announce WHERE section=".$_SESSION['student_section']." order by id desc Limit 1";

    $query = mysql_query($sql) or die;
    $num = mysql_num_rows($query);

    $sql2 = "SELECT * FROM section_".$_SESSION['student_section'];
    $query2 = mysql_query($sql2) or die;
    $num2 = mysql_num_rows($query2);
    
    $sql3 = "SELECT message FROM announce WHERE section=".$_SESSION['student_section']." order by id desc Limit 1";
    $query3 = mysql_query($sql3) or die;
    $msg = mysql_num_rows($query3);
    $result = mysql_fetch_array($query3);
    $msg = $result['message'];

    if (isset($_SESSION['id'])) {
    
        $sql4 = "SELECT * FROM masterlogin WHERE id= ".$_SESSION['id'];
        $query4 = mysql_query($sql4) or die;
        $num4 = mysql_num_rows($query4);
        $result_std = mysql_fetch_array($query4);
        // echo $sql4;
        // die;
    }
    // echo $msg;
    // die;    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Coco Code Club</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php
            include 'navbar_std.php';
        ?>
        <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php
            include 'navside_std.php';
        ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Hello</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php if(isset($_SESSION['id'])) { ?>
                Welcome, <?php echo $result_std['nickname']; }
                // if (isset($_SESSION['id'])) {
                //     echo $result_std['Firstname'];
                //     echo $result_std['Lastname'];
                // }


                    ?></li></li>
                </ol>
               
              
            </div>

            <div class="container">
            
                <div class="row">
                <div class="col-9">Next class<br>
                <!-- Next class show here. -->
                <div class="fs-1">
                 <p>
                        <?php
                            $today = date("Y-m-d");
                            // // echo "$today";
                            // // die ;
                                for($i=1; $i<=$num2 ; $i++) { 
                                    $row = mysql_fetch_array($query2);
                                    $ID = $row['id'];
                                    $date = $row['date'];
                                    $topic = $row['topic'];
                                    $vdo = $row['link_video'];
                                    $passcode = $row['passcode'];

                                if($date >= $today){
                                    echo "$date"."&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "$topic"."&nbsp;&nbsp;&nbsp;&nbsp;";
                                
                                    if($row['teacher'] == 1){
                                        // echo '<a href="https://us02web.zoom.us/j/2311773138#success" target="_blank">Link</a>';
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://us02web.zoom.us/j/2311773138#success" target="_blank">Link</a>';
                                        
                                    }elseif($row['teacher'] == 2){
                                        // echo '<a href="https://www.google.co.th/" target="_blank">Link</a>';
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.google.co.th/" target="_blank">Link</a>';

                                        

                                    }else{
                                        // echo '<a href="https://www.youtube.com/" target="_blank">Link</a>';
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.youtube.com/" target="_blank">Link</a>';
                                    }
                            
                                ?></p><?php 
                                }
                            }
                        ?>
                    </p>
                    </div>    
                </div>
                    <div class="col-3" style="word-break: break-all; border:solid"><b>Announcement</b><hr>
                    <?= $msg; ?>
                    </div>
                </div>
                
            </div>


        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>