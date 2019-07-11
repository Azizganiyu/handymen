<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="<?php echo base_url; ?>/assets/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/plugins/jquery-modal-master/jquery.modal.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/fonts.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/custom.css">

    <!-- script
    ================================================== -->
    <script src="<?php echo base_url; ?>/assets/javascript/modernizr-2.6.2.min.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body>

    <!-- preloader
    ================================================== -->
    <div id="loader-wrapper">
		<div id="loader"></div>

		<div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

	</div>
    
    <!-- header 
    ================================================== -->
    <div class="container">
        <div class="module">
            <header class="s-header">
                <nav>
                    <div class="nav-icon-wrapper">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </nav>

                <a class="site-logo" href="<?php echo base_url.'/index.php/home';?>">
                    <img src="<?php echo base_url; ?>/images/logo.png" alt="Homepage">
                </a>

                <div class="main-search">
                    <input type="search" name="main_search" placeholder="Search site here">
                </div>
                
                

            </header> <!-- end header -->

            <section  id="<?php echo $page; ?>" class="main">  
                <nav>
                    <div class="nav-links">
                        <a href="<?php echo base_url; ?>/index.php/home" title="home">Home</a>
                        <a href="<?php echo base_url; ?>/index.php/explore" title="explore">Explore</a>
                        <a href="<?php echo base_url; ?>/index.php/post" title="post">Post</a>
                        <hr/>
                        <?php
                        if(isset($this->session->logged_in) && $this->session->logged_in == true)
                        {
                            echo '<a href="'.base_url.'/index.php/account" title="account">Account</a>';
                            echo '<a href="'.base_url.'/index.php/users/logout" title="logout" >Logout</a>';
                        }
                        else
                        {
                            echo '<a href="'.base_url.'/index.php/users/login" title="login">Login</a>';
                        }   
                    ?>
                    </div>
                </nav>
