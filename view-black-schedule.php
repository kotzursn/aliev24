

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

                    
                    <!-- Topbar Search 
                    
                    ПОИСК ПО ЗАПРОСУ
                    
                    

                    <!-- Topbar Search 
                    
                    ПОИСК ПО ЗАПРОСУ
                    
                    -->
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
                    
                    <?php
                        if(isset($_POST['button1'])) { 
                            echo '<script>window.location.replace("http://it01.pro/view-schedule.php");</script>';
            		        exit;
                        }  
                        
                        if(isset($_POST['button2'])) { 
                            echo "
		        
                		        <div class='alert alert-danger' role='alert'>
                                  <strong>Предупреждение: </strong> недоступно в тестовом режиме!
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>
                		        
                		        ";
                        } 
                    ?> 
                    <center>
                        <form method="post"> 
                            <button type="submit" class="btn btn-info" name="button1">Сменить неделю</button>
                            <button type="submit" class="btn btn-danger" name="button2">Очистить расписание</button>
                        </form> 
                    </center>
                    
    
                    <hr class="sidebar-divider">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?
                    
                    
                    
                    
                
                    //$result = mysql_query($query)
                    echo '<div class="table-responsive">';
                    echo "<table border='1' class='table'> <thead class='thead-dark'>"; // start a table tag in the HTML
                    echo '<tr><td colspan="6"; bgcolor="black";><center><font size="16" color="#FFFFFF" face="serif">Черная неделя</font></center></td></tr>';
                    echo "<tr><th scope='col'>Группа</th><th scope='col'>1 пара</th><th scope='col'>2 пара</th><th scope='col'>3 пара</th><th scope='col'>4 пара</th><th scope='col'>5 пара</th></tr>";
                    
                    
                    function printData($week){
                        $days = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота");
                        foreach ($days as $day) {
                            $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
                            $r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
            		        $r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
            		        $r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
        		        
        		            $query = "SELECT * FROM schedule"; 
                            $r = mysqli_query($connect_to_db, $query) or die(mysqli_error($connect_to_db));
                            echo '<tr><th colspan="6"><center>'.$day.'</center></th></tr>';
                            while($row = mysqli_fetch_array($r)){
                            if ($row['week'] == $week and $row['day']==$day){
                                $id = htmlspecialchars($row['id']);
                                echo "<tr>".
                                "<td>". '<a href="edit-schedule.php?id='.$id.'">'. htmlspecialchars($row['groups']) .'</a>' . "</td>" .
                                "<td>" . htmlspecialchars($row['les1']) . "</td>" .
                                "<td>" . htmlspecialchars($row['les2']) . "</td>" .
                                "<td>" . htmlspecialchars($row['les3']) . "</td>" .
                                "<td>" . htmlspecialchars($row['les4']) . "</td>" .
                                "<td>" . htmlspecialchars($row['les5']) . "</td>" .
                                "</tr>";
                            }
                        }
                        }
                        
                    }
                    
                    printData("Ч");
                    
                    
                    
                    echo "</table>"; //Close the table in HTML
                    echo '</div>';
                   
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
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