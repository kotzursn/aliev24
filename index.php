<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img\icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                <div class="sidebar-brand-text mx-3">ИС «Факультет»</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php include 'nav.html';
            ?> <!-- Подключение единой менюшки слева-->
           

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

                    <!-- КОНТЕНТ  -->
                    
                    <?
                    
                    ini_set('display_errors', 0);
                    ini_set('display_startup_errors', 0);
                    error_reporting(E_ALL);

                    
                    $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
                    $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
    		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
    		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
		        
		            
		            $res = $connect_to_db->query("SELECT count(*) FROM students");
                    $row = $res->fetch_row();
                    $countS = $row[0];
		            
		            
		            $res = $connect_to_db->query("SELECT count(*) FROM groups");
                    $row = $res->fetch_row();
                    $countG = $row[0];
                    
                    $removeID = htmlspecialchars($_GET['id']);
                    $connect_to_db->query("DELETE FROM `message` WHERE `id`='$removeID'");
                    
                    
                    
                    if (isset($_POST['nextText'])){
                        $nextText = htmlspecialchars($_POST['nextText']);
                        $nextName= htmlspecialchars($_POST['nextName']);
                        $res = $connect_to_db->query("INSERT INTO message SET name = '$nextName', text = '$nextText'");
                        unset($_POST);
                        $_POST = array();
                
                    }
                    
                    ?>
                    
                    <div class="content-body">
                        <!-- row -->
            			<div class="container-fluid">
            				<div class="row invoice-card-row">
                                
            					<div class="col-xl-3 col-xxl-6 col-sm-6">
            						<div class="card bg-success invoice-card">
            							<div class="card-body d-flex">
            								<div class="icon me-3">
            									<svg width="35px" height="34px">
            									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
            									 d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"/>
            									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
            									 d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"/>
            									</svg>
            								</div>
            								<div>
            									<h2 class="text-white invoice-num">
            									    <? echo "  ". $countS; ?>
            									</h2>
            									<span class="text-white fs-18">Студенты</span>
            								</div>
            							</div>
            						</div>
            					</div>
            					
            					
            					<div class="col-xl-3 col-xxl-6 col-sm-6">
            						<div class="card bg-warning invoice-card">
            							<div class="card-body d-flex">
            								<div class="icon me-3">
            									<svg width="35px" height="34px">
            									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
            									 d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"/>
            									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
            									 d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"/>
            									</svg>
            								</div>
            								<div>
            									<h2 class="text-white invoice-num">
            									    <? echo "  ". $countG; ?>
            									</h2>
            									<span class="text-white fs-18">Группы</span>
            								</div>
            							</div>
            						</div>
            					</div>
            					
            				</div>
            			</div>
            		</div>
            		
            		
                    <hr class="sidebar-divider">
                    <center><a class="navbar-brand" 
        			    <?php 
        			        echo 'data-toggle="modal" data-target="#newModalCenter" alt="New">';
        			    ?> Новая заметка</a>
        			<center>
                	<hr class="sidebar-divider">
            		
            		
            		
            		<div class="row">
                      
            		<?
                		$connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
                        $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
        		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
        		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
    		        
    		            
    		            $res = $connect_to_db->query("SELECT count(*) FROM message");
                        $row = $res->fetch_row();
                        $countS = $row[0];
                        $res = $connect_to_db->query("SELECT * FROM message");
                        while($row = mysqli_fetch_array($res)){
                            $id = $row['id'];
                            $text = $row['text'];
                            $name = $row['name'];
                            //$color = $row['color'];
                            echo
                            '
                            <div class="col-sm-6">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">'. 'Заметка №'. $id .'</h5>
                                <p class="card-text">'. $text .'</p>
                                <hr>
                                <p class="card-text">'. $name . '</p>
                                <a href="index.php?id='.$id.'" class="btn btn-primary">Выполнено</a>
                              </div>
                            </div>
                            </div>
                            
                            ';
                        }
            		?>
                      
                    </div>
                    
                    
                    
                    
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
    
    
    <div class="modal fade" id="newModalCenter" tabindex="-1" role="dialog" aria-labelledby="newModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newModalLongTitle">Новая заметка:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/">
                    
                      <!--2 row -->
                      <div class="form-row">
                      
                        <div class="col-md-6 mb-3">
                          <small id="species_lat" class="form-text text-muted">Текст:</small>
                          <input type="text" class="form-control" id="nextText" name="nextText" placeholder="" value="" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                          <small id="species_ru" class="form-text text-muted">Автор:</small>
                          <input type="text" class="form-control" id="nextName" name="nextName" placeholder="" value="" required>
                        </div>
                      
                      </div>
                      <!--end 2 row -->
                      
              </div>
              <div class="modal-footer">
	
                <button type="submit" class="btn btn-primary mb-2">Сохранить</button>
                
              </div>
            </div>
          </div>
        </div>
        <!-- END - New record-->

    

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