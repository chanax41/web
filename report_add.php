<?php

    include 'connect.php';

    session_start();

    $sql = "SELECT * FROM `Topic` WHERE 1";
    $query = mysql_query($sql) or die;
    $num = mysql_num_rows($query);

    $sql2 = "SELECT * FROM masterlogin WHERE role = 1 "  ;
    $query2 = mysql_query($sql2) or die;
    $num2 = mysql_num_rows($query2);

    
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
    include 'navbar.php';

    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            include 'navside.php';
            ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Report</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Report student</li>
                    </ol>

                    <div>
                        <div>
                            <form action="report_db.php" method="post" class="form-horizontal my-5">

                            <div class="row">
                                <!-- <div class="col-md-1">
                                    <select class="form-select form-select-lg mb-3 section" aria-label=".form-select-lg example">
                                        <option selected>ID</option>
                                        <?php
                                            for ($i=1; $i<=$num2  ; $i++) { 
                                                $row=mysql_fetch_array($query2);
                                        ?>
                                        <option value="<?=$row['id'] ?>"><?=$row['id'] ?></option>
                                        <?php    
                                        }
                                            mysql_free_result($query2);

                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select form-select-lg mb-3 section" aria-label=".form-select-lg example">
                                        <option selected>First name</option>
                                        <?php
                                            $query2 = mysql_query($sql2) or die;
                                            for ($i=1; $i<=$num2  ; $i++) { 
                                                $row=mysql_fetch_array($query2);
                                        ?>
                                        <option value="<?=$row['Firstname'] ?>"><?=$row['Firstname'] ?></option>
                                        <?php 
                                            }
                                            mysql_free_result($query2);
                                        ?>
                                    </select>
                                </div> -->
                                <div class="col-md-3">
                                    <select class="form-select form-select-lg mb-3 section" name="id" aria-label=".form-select-lg example" required placeholder="Select name">
                                        <option selected>Nickname</option>
                                        <?php
                                            $query2 = mysql_query($sql2) or die;
                                            for ($i=1; $i<=$num2  ; $i++) { 
                                                $row=mysql_fetch_array($query2);
                                        ?>
                                        <option value="<?=$row['id'] ?>"><?=$row['nickname'] ?></option>
                                        <?php 
                                            }
                                            mysql_free_result($query2);
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-xlg-3 col-md-5" >
                                    <div class="card">
                                        <div class="card-body" style="max-height: 50 px !important;" >
                                            <center class="m-t-30"> <img id="prof" src="profile_img/pic_def.png" class="img-circle"
                                                    width="300" height= "200"/>
                                            </center>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-12">
                                        <input id="datepicker" type="text" name="date" class="form-control" required placeholder="Enter Date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="topic" class="col-sm-3 control-label">Topic</label>
                                    <div class="col-sm-12">
                                    <select class="form-select" name="topic" aria-label="Default select example" required placeholder="Select topic">
                                        <option selected>Open this select Topic</option>
                                        <?php
                                            for ($i=1; $i<=$num  ; $i++) { 
                                                $row=mysql_fetch_array($query);
                                        ?>
                                        <option value="<?=$row['Topic'] ?>"><?=$row['Topic'] ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                <p style="margin-right:20px;"> Comment :</p>
                                <textarea class="form-control" style="height:250px;  border: solid; margin-top:-10px" name="comment" required></textarea>


                                    <div class="form-group">
                                        <div class="col-sm-12 mt-3">
                                            <input type="submit" name="btn_report" class="btn btn-primary" style="width: 100%;" value="Add Report">
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- <script src="js/scripts.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script> -->
    <script>
    $(document).ready(function() {
    $('#datepicker').datepicker({format: 'dd/mm/yyyy'})
    
    $('.section').change(function(){
        // console.log($(this).val())
        var id = $(this).val();
        $.ajax({
            url: "get_img.php",
            method:"post",
            data:{id:id},
            // context: document.body
        }).done(function(data) {
            $( this ).addClass( "done" );
            data = JSON.parse(data)
            if(!data){
                $("#prof").attr("src","profile_img/pic_def.png")
                
            }else{
                $("#prof").attr("src","profile_img/"+ data.img)
            }
            // console.log(data)
        });
    })
    });
    </script>
</body>

</html>