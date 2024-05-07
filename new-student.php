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
            //echo $_POST['inputZnum'];
		    if (isset($_POST['inputZnum'])){
		        
		        //пользователь пытается создать новую запись
		        //inputZnum inputGroup inputName inputDate inputKurs
		        
		        $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
		        
		        $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
		        

    			if(mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();exit();}
		        
		        $post_znum = htmlspecialchars($_POST["inputZnum"]);
		        $post_name = htmlspecialchars($_POST["inputName"]);
		        $post_dateBirth = htmlspecialchars($_POST["inputDate"]);
		        $post_course = htmlspecialchars($_POST["inputKurs"]);
		        $post_group = htmlspecialchars($_POST["inputGroup"]);
	
	
		        	$sql = "INSERT INTO `students` (`id`, `znum`, `name`, `dateBirth`, `course`, `groups`) VALUES (NULL, '$post_znum', '$post_name', '$post_dateBirth', '$post_course', '$post_group')";
		        
		       
		        	
		        //echo $sql;
		        $r = mysqli_query($connect_to_db, $sql) or die(mysqli_error($connect_to_db));
		        
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

                    

                    <!-- Topbar Navbar -->
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
                    
                    <!-- Новый студент  -->
                    
                    <form method="post" action="new-student.php">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputZnum">Номер зачетки</label>
                              <input type="text" class="form-control" id="inputZnum" name="inputZnum" placeholder="номер зач.книжки">
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="inputGroup">Группа</label>
                              <select id="inputGroup" name="inputGroup" class="form-control">
                                <option selected>выбор группы...</option>
                                <option>1М</option>
                                <option>1ПМ</option>
                                <option>1ИС</option>
                                <option>1ИБ</option>
                                
                                <option>2М</option>
                                <option>2ПМ</option>
                                <option>2ИС</option>
                                <option>2ИБ</option>
                                
                                <option>3М</option>
                                <option>3ПМ</option>
                                <option>3ИС</option>
                                <option>3ИБ</option>
                                
                                <option>4М</option>
                                <option>4ПМ</option>
                                <option>4ИС</option>
                                <option>4ИБ</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputName">ФИО студента</label>
                            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Иванов Иван Иванович">
                          </div>
                          
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputDate">Дата рождения</label>
                              <input type="text" class="form-control" name="inputDate" id="inputDate" placeholder="01.01.2000">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputKurs">Курс</label>
                              <select id="inputKurs" name="inputKurs" class="form-control">
                                <option selected>выбор курса...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                            
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                                какой-то чекбокс
                              </label>
                            </div>
                          </div>
                          <button type="submit" id="myBtn" class="btn btn-primary">Сохранить</button>
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