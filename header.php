<?php
try {
    require_once("admin/config/Database.php");
    $database = new Database();
    $conn = $database->getConnection();
    $sql_select = "SELECT * FROM menus";
    $stmt = $conn->prepare($sql_select);
    $stmt->execute();
    $menus = array();

    while(list($menu_id, $menuTitle, $parent_id) = $stmt->fetch()) {
        $menus[$parent_id][$menu_id] = $menuTitle;
    }
    function listing_menus($main_menus) {
        global $menus;
        echo "<ul>";
            foreach($main_menus as $menu_id => $title) {
                echo "<li><a href='index.php?menuID = '. {$menu_id}>{$title}</a>";
                    if(isset($menus[$menu_id])) {
                        listing_menus($menus[$menu_id]);
                    }
                echo "</li>";
            }
        echo "</ul>";
    }
} catch(PDOException $err) {
    $error = $err->getMessage();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <!--font-awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--end of font-awesome link-->

    <link rel="stylesheet" href="css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!--load css layer slider-->
    <link rel="stylesheet" href="css/layerslider.css" type="text/css">
    <!--end of load css layer slider-->

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>MJQPF</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="sticky-style-2">

        <div class="container clearfix">

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <h3 class="standard-logo">MJQPF LOGO</h3>
<!--                <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img class="divcenter" src="images/logo.png" alt="Canvas Logo"></a>-->
<!--                <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img class="divcenter" src="images/logo@2x.png" alt="Canvas Logo"></a>-->
            </div><!-- #logo end -->

            <div class="pull-right my_hide">
                <div class="form-group my_margin-top-1">
                    <a href="#" class="my_padding_right">Download Meterils</a>
                    <a href="#">Download Application</a>
                </div>

                <div class="form-group my_margin-top-2">
                    <a href="#" class="my_padding_right my_margin-left"><img src="images/km.gif" alt=""></a>
                    <a href="#"><img src="images/en.gif" alt=""></a>
                </div>
            </div>
        </div>

        <div id="header-wrap">

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-2 center">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <?php listing_menus($menus[0]);?>

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </div>

            </nav><!-- #primary-menu end -->

        </div>

    </header><!-- #header end -->

    <!--layer slider-->
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:500px;">
            <!--slide 1-->
            <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                <img src="images/slide1.jpg" class="ls-bg" alt="Slide background"/>
                <img class="ls-l ls-linkto-3" style="top:460px;left:610px;white-space: nowrap;" data-ls="offsetxin:-50;delayin:1000;rotatein:-40;offsetxout:-50;rotateout:-40;" src="sliderimages/left.png" alt=""><img class="ls-l ls-linkto-2" style="top:460px;left:650px;white-space: nowrap;" data-ls="offsetxin:50;delayin:1000;offsetxout:50;" src="sliderimages/right.png" alt="">
            </div>
            <!--end slide1-->
            <!--slide 2-->
            <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                <img src="images/slide2.jpg" class="ls-bg" alt="Slide background"/>
                <img class="ls-l ls-linkto-1" style="top:430px;left:210px;white-space: nowrap;" data-ls="offsetxin:-50;delayin:1000;offsetxout:-50;parallaxlevel:3;" src="sliderimages/left.png" alt=""><img class="ls-l ls-linkto-3" style="top:430px;left:250px;white-space: nowrap;" data-ls="offsetxin:50;delayin:1000;offsetxout:50;parallaxlevel:3;" src="sliderimages/right.png" alt="">
            </div>
            <!--end slide 2-->
            <!--slide 3-->
            <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
                <img src="images/slide3.jpg" class="ls-bg" alt="Slide background"/>
                <img class="ls-l ls-linkto-2" style="top:430px;left:960px;white-space: nowrap;" data-ls="offsetxin:-50;delayin:1000;offsetxout:-50;" src="sliderimages/left.png" alt=""><img class="ls-l ls-linkto-1" style="top:430px;left:1000px;white-space: nowrap;" data-ls="offsetxin:50;delayin:1000;offsetxout:50;" src="sliderimages/right.png" alt="">
            </div>
            <!--end of slide 3-->

        </div>
    </div>
    <!--end of layer slider-->
