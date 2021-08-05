<?php

include 'connect.php';

session_start();

if (!isset($_SESSION['student_login'])) {
    header("location: login.php");
}

// if (isset($_SESSION['id'])) {

//     $sql4 = "SELECT * FROM masterlogin WHERE id= ".$_SESSION['id'];
//     $query4 = mysql_query($sql4) or die;
//     $num4 = mysql_num_rows($query4);
//     $result_std = mysql_fetch_array($query4);
//     // echo $sql4;
//     // die;
// }
if (isset($_SESSION['id'])) {
    $sql = "SELECT rp.date, rp.topic, msl.nickname, rp.comment FROM `report` rp RIGHT JOIN masterlogin msl ON msl.id = rp.std_id WHERE rp.std_id = " . $_SESSION['id'];
    // echo $sql;
    // die;
    $query = mysql_query($sql) or die;
    $num = mysql_num_rows($query);

    if ($num > 0) {
        $rows = array();
        while ($r = mysql_fetch_assoc($query)) {
            $rows[] = $r;
        }
        $obj = json_encode($rows);
    } else {
        $obj = NULL;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Report - Coco Admin</title>
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
                    <h1 class="mt-4">รายงาน</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            ส่วนจัดการรายงาน
                        </div>
                        <div id="main-wrapper">
                            <!-- ============================================================== -->
                            <!-- Topbar header - style you can find in pages.scss -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Page wrapper  -->
                            <!-- ============================================================== -->
                            <div class="page-wrapper">
                                <!-- ============================================================== -->
                                <!-- Container fluid  -->
                                <!-- ============================================================== -->
                                <div class="container-fluid">
                                    <!-- ============================================================== -->
                                    <!-- Bread crumb and right sidebar toggle -->
                                    <!-- ============================================================== -->
                                    <div class="row page-titles">
                                        <div class="col-md-5 align-self-center">
                                            <h4 class="text-themecolor"></h4>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- End Bread crumb and right sidebar toggle -->
                                    <!-- ============================================================== -->
                                    <!-- ============================================================== -->
                                    <!-- Start Page Content -->
                                    <!-- ============================================================== -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="">
                                                <div class="">
                                                    <div class="row">
                                                        <!-- Column -->
                                                        <div class="col-lg-4 col-xlg-3 col-md-5">
                                                            <!-- <div class="card"> -->
                                                            <!-- <div class="card-body"> -->
                                                            <center class="m-t-30"> <img src="profile_img/<?php echo $r['img']; ?>" class="img-circle" width="150" />
                                                                <h4 class="card-title m-t-10"><?php echo $r['Firstname'] . ' ' . $r['Lastname']  ?></h4>
                                                            </center>
                                                            <!-- </div> -->
                                                        </div>
                                                        <!-- <a class="btn btn-success" href="#myModal" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i> Add Users</a> -->
                                                        <br><br>
                                                        <div class="table-responsive">
                                                            <table id="myTable" class="display nowrap" style="width:100%" class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>DATE</th>
                                                                        <th>TOPIC</th>
                                                                        <!-- <th>Nickname</th> -->
                                                                        <th>COMMENT</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    if ($obj != NULL) {
                                                                        $json_decoded = json_decode($obj);
                                                                        foreach ($json_decoded as $val) {
                                                                            // echo $val->email;

                                                                    ?>
                                                                            <!-- $sql = "SELECT rp.date, rp.topic, msl.nickname, rp.comment FROM `report` rp RIGHT JOIN masterlogin msl ON msl.id = rp.std_id"; -->

                                                                            <tr>
                                                                                <td><?php echo $val->date; ?></td>
                                                                                <td style="<?php echo ($val->topic != '' ? '' : "color:red") ?>"><?php echo ($val->topic != '' ? $val->topic : "N/A") ?></td>
                                                                                <!-- <td><?php echo $val->nickname; ?></td> -->
                                                                                <td><?php echo $val->comment; ?></td>

                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>DATE</th>
                                                                        <th>TOPIC</th>
                                                                        <!-- <th>Nickname</th> -->
                                                                        <th>COMMENT</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ============================================================== -->
                                        <!-- End PAge Content -->
                                        <!-- ============================================================== -->
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- End Container fluid  -->
                                    <!-- ============================================================== -->
                                </div>
                                <!-- ============================================================== -->
                                <!-- End Page wrapper  -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->

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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script>
        const datatablesSimple = document.getElementById('myTable');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    </script>
</body>

</html>