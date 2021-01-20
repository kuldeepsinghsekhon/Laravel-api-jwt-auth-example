<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mariachi Tierra Azteca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url('assets/admin_template/')?>css/style.css">
    <link href="<?=base_url('assets/admin_template/')?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/admin_template/')?>css/bootstrap-select.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



    <link href="<?=base_url('assets/admin_template/')?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/admin_template/')?>css/datatables.net-responsive-bs4responsive.bootstrap4.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque&display=swap" rel="stylesheet">

    <link rel="icon" href="<?=base_url('assets/admin_template/')?>images/Logo-fav.png" type="image/x-icon">

    <link rel="stylesheet" href="<?=base_url('assets/admin_template/')?>font/css/all.css">

    <script src="<?=base_url('assets/admin_template/')?>js/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- <script src="<=base_url('assets/admin_template/')?>js/bootstrap-select.min.js"></script> -->
    <script src="<?=base_url('assets/admin_template/')?>js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/admin_template/')?>js/file.js"></script>

    <script src="<?=base_url('assets/admin_template/')?>js/datatables.netjsjquery.dataTables.min.js">
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-bs4jsdataTables.bootstrap4.min.js">
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-responsivejsdataTables.responsive.min.js">
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-responsive-bs4jsresponsive.bootstrap4.min.js">
    </script>
    <!-- Buttons examples -->
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-buttonsjsbuttons.print.min.js" type="text/javascript">
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-buttonsjsbuttons.html5.min.js" type="text/javascript">
    </script>
    <!-- <script src="< =base_url('assets/admin_template/')?>js/datatables.net-buttonsjsbuttons.flash.min.js" type="text/javascript"> -->
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-buttonsjsbuttons.print.min.js" type="text/javascript">
    </script>
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-buttonsjsbuttons.colVis.min.js" type="text/javascript">
    </script>
    <!-- <script src="<=base_url('assets/admin_template/')?>js/datatables.net-buttons-bs4jsbuttons.bootstrap4.min.js" type="text/javascript">
    </script> -->
    <!-- Key Tables -->
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-keytablejsdataTables.keyTable.min.js">
    </script>
    <!-- Selection table -->
    <script src="<?=base_url('assets/admin_template/')?>js/datatables.net-selectjsdataTables.select.min.js"></script>

</head>

<body style="    background-color: #f6f5f5;">
    <section>
        <div class="header d-flex justify-content-between" id="nav">
            <div class="d-flex">
                <div class="  mx-3 mt-2">
                    <span style="font-size:30px;cursor:pointer" id="opennav" onclick="openNav()">&#9776;</span>
                </div>

                <a href="#">
<!--                    <img src="images/Logo-light.png" style="width:100%" ; class="biglogo">-->
<!--                    <img src="images/Logo-light.png" style="width:100%" ; class="minilogo">-->
                </a>
            </div>
            <div class="mt-3">
                <span class="sdno d-flex dropdown-toggle" >
                    <a href="#" class="mr-1" id="opennav123s" onclick="openNav123()"><i class="fas fa-user-alt"></i> <span class="username"><?=$this->session->userdata('user_name')?></span>
                    </a>
                    <div class="dropdown mr-3">
                        <button class="dropdown-toggle logoutdrop" data-toggle="dropdown">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item nameuser" href="#">
                                <p><strong><?=$this->session->userdata('name')?></strong></p>
                                <!-- <p><=$this->session->userdata('user_name')?></p> -->
                            </a>
                            <a class="dropdown-item" href="#">Edit Profile</a>
                            <a class="dropdown-item" href="<?=base_url('admin/change_password')?>">Change password</a>
                            <a class="dropdown-item" href="<?=base_url('admin/logout')?>">Logout</a>
                        </div>
                    </div>

                </span>

            </div>


        </div>
                <div class="navh">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                    
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <div class="nav-links">
            <a href="#" class="hnavbar"><span><i class="fas fa-home hicon"></i></span>Home</a>
            <a href="#" class="hnavbar"><span><i class="fas fa-user-tie  hicon"></i></span>Clients</a>
            <a href="#" class="hnavbar"><span><i class="fas fa-money-bill-alt  hicon"></i></span>Payments</a>
            <a href="#" class="hnavbar"><span><i class="fas fa-money-check-alt  hicon"></i></span>Withdrawals</a>
           
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <!--            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
            <div class="bradname">
                <h1 class="text-primary">Mariachi Tierra Azteca</h1>
            </div>
            <a href="<?=base_url('admin/change_password')?>"><span><i class="fas fa-home sideicon"></i></span>Home</a>
            <a href="#"><span><i class="fas fa-user-tie sideicon"></i></span>Clients</a>
            <a href="#"><span><i class="fas fa-money-bill-alt sideicon"></i></span>Payments</a>
            <a href="#"><span><i class="fas fa-money-check-alt sideicon"></i></span>Withdrawals</a>
        </div>
    </section>

    <!-- main page section start -->

    <section id="main" class="">