<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="img\icon.svg" type="image/x-icon">
    <title>ИС «Факультет»</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    

    <?
    
            
            $get_id = htmlspecialchars($_GET['id']);
		    if (isset($_POST['inputGroups'])){
		        
		        
		        $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
		        
		        $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
		        

    			if(mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();exit();}
		        
		        
		        $query = "SELECT * FROM schedule WHERE id = '$get_id'";
                        $r = mysqli_query($connect_to_db, $query) or die(mysqli_error($connect_to_db));
                        $row = mysqli_fetch_array($r);
                        //echo $row['name'];
                        $id = $row['id'];
                        
		        $post_week = htmlspecialchars($_POST["inputWeek"]);
		        $post_day = htmlspecialchars($_POST["inputDay"]);
		        $post_groups = htmlspecialchars($_POST["inputGroups"]);
		        $post_les1 = htmlspecialchars($_POST["inputLes1"]);
		        $post_les2 = htmlspecialchars($_POST["inputLes2"]);
		        $post_les3 = htmlspecialchars($_POST["inputLes3"]);
		        $post_les4 = htmlspecialchars($_POST["inputLes4"]);
		        $post_les5 = htmlspecialchars($_POST["inputLes5"]);
		        $post_les6 = htmlspecialchars($_POST["inputLes6"]);
	
	                $sql = "UPDATE schedule SET id = '$get_id', week = '$post_week', day = '$post_day', groups = '$post_groups', les1 = '$post_les1', les2 = '$post_les2', les3 = '$post_les3', les4 = '$post_les4', les5 = '$post_les5', les6 = '$post_les6' WHERE id = '$get_id'";
		        	$get_id = $id;
		        $r = mysqli_query($connect_to_db, $sql) or die(mysqli_error($connect_to_db));
		        
		        echo "
		        
		        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>Предупреждение: </strong> изменения успешно сохранены.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
		        
		        ";
		        
		    }
		?>
		
		

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                <div class="sidebar-brand-text mx-3">ИС «Факультет»</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <?php include 'nav.html'?> <!-- Подключение единой менюшки слева-->

            
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle"  id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?
                        $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
                        
                        $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
        		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
        		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
                        
                        $query = "SELECT * FROM schedule WHERE id = '$get_id'";
                        $r = mysqli_query($connect_to_db, $query) or die(mysqli_error($connect_to_db));
                        $row = mysqli_fetch_array($r);
                        //echo $row['name'];
                        $id = $row['id'];
                        $week = $row['week'];
                        $day = $row['day'];
                        $groups = $row['groups'];
                        $les1 = $row['les1'];
                        $les2 = $row['les2'];
                        $les3 = $row['les3'];
                        $les4 = $row['les4'];
                        $les5 = $row['les5'];
                        $les6 = $row['les6'];
                        
                        
                    ?>
                    
                    <form method="post" action="edit-schedule.php?id=<? echo $id; ?>">
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputZnum">Группа</label>
                              <input type="text" class="form-control" id="inputGroups" name="inputGroups" value="<?PHP echo $groups; ?>"  placeholder="группа">
                            </div>
                            
                            <div class="form-group col-md-3">
                              <label for="inputGroup">Неделя</label>
                              <input type="text" class="form-control" id="inputWeek" name="inputWeek" value="<?PHP echo $week; ?>"  placeholder="неделя">
                              
                            </div>
                            
                            <div class="form-group col-md-3">
                              <label for="inputGroup">День</label>
                              <input type="text" class="form-control" id="inputDay" name="inputDay" value="<?PHP echo $day; ?>"  placeholder="день">
                              
                            </div>
                          </div>
                          
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputZnum">1 пара</label>
                              <input type="text" class="form-control" id="inputLes1" name="inputLes1" value="<?PHP echo $les1; ?>"  placeholder="">
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="inputGroup">2 пара</label>
                              <input type="text" class="form-control" id="inputLes2" name="inputLes2" value="<?PHP echo $les2; ?>"  placeholder="">
                              
                            </div>
                            
                          </div>
                          
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputZnum">3 пара</label>
                              <input type="text" class="form-control" id="inputLes3" name="inputLes3" value="<?PHP echo $les3; ?>"  placeholder="">
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="inputGroup">4 пара</label>
                              <input type="text" class="form-control" id="inputLes4" name="inputLes4" value="<?PHP echo $les4; ?>"  placeholder="">
                              
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="inputGroup">5 пара</label>
                              <input type="text" class="form-control" id="inputLes5" name="inputLes5" value="<?PHP echo $les5; ?>"  placeholder="">
                              
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="inputGroup">6 пара</label>
                              <input type="text" class="form-control" id="inputLes6" name="inputLes6" value="<?PHP echo $les6; ?>"  placeholder="">
                              
                            </div>
                          </div>
                          
                          <button type="submit" id="myBtn" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- КОНТЕНТ  -->
                    
                    
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>