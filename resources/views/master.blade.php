<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html style="overflow: hidden;" lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <title>SALON KU</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="description">
   <meta content="Mosaddek" name="author">
   <link href="/Metro%20Lab_files/bootstrap.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/bootstrap-responsive.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/bootstrap-fileupload.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/font-awesome.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/style.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/style-responsive.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/style-default.css" rel="stylesheet" id="style_color">
   <link href="/Metro%20Lab_files/bootstrap-fullcalendar.css" rel="stylesheet">
   <link href="/Metro%20Lab_files/jquery.css" rel="stylesheet" type="text/css" media="screen">
   <link href="/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" media="screen">
   <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.css">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid" style="background-color: #333;">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone" style="background-color: #333;">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"><img src="/img/salon.png" style="max-height: 30px;"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="/">
                   
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   
                   
                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu">
                       <!-- BEGIN SUPPORT -->
                      
                      
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="/Metro%20Lab_files/avatar1_small.jpg" alt="">
                               <span class="username">Admin Salon</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">                               
                               <li><a href="/auth/logout"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div tabindex="5000" style="overflow: hidden;" class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input class="search-query" placeholder="Search" type="text">
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu">
                  <a class="" href="/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Manajemen Barang</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="/databarang">Manajemen Barang Salon</a></li>
                      <li><a class="" href="/katbar">Manajemen Kategori Barang Salon</a></li>                     
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Manajemen Jasa</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="/projasa">Manajemen Produk Jasa</a></li>
                      <li><a class="" href="/katjas">Manajemen Kategori Jasa</a></li>                      
                      <li><a class="" href="/datpeg">Manajemen Data Stylist</a></li>                      
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-cogs"></i>
                      <span>Transaksi</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="/ritbar">Transaksi Barang Ritel</a></li>
                      <li><a class="" href="/ritjas">Transaksi Produk Jasa</a></li>                      
                  </ul>
              </li>
             
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                  @yield('content')
                   
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 © Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="/Metro%20Lab_files/jquery-1.js"></script>
   <script src="/Metro%20Lab_files/jquery_002.js" type="text/javascript"></script>
   <script type="text/javascript" src="/Metro%20Lab_files/jquery-ui-1.js"></script>
   <script type="text/javascript" src="/Metro%20Lab_files/jquery_003.js"></script>
   <script src="/Metro%20Lab_files/fullcalendar.js"></script>
   <script src="/Metro%20Lab_files/bootstrap.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="/Metro%20Lab_files/jquery_005.js" type="text/javascript"></script>
   <script src="/Metro%20Lab_files/jquery.js" type="text/javascript"></script>
   <script src="/Metro%20Lab_files/Chart.js"></script>
   <script src="/Metro%20Lab_files/jquery_004.js"></script>


   <!--common script for all pages-->
   <script src="/Metro%20Lab_files/common-scripts.js"></script><div style="width: 5px; z-index: 100; background: rgb(64, 64, 64) none repeat scroll 0% 0%; cursor: default; position: fixed; top: 60px; left: 175px; height: 676px; display: none;" class="nicescroll-rails" id="ascrail2000"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(74, 139, 194); background-clip: padding-box; border-radius: 0px;"></div></div><div style="height: 5px; z-index: 100; background: rgb(64, 64, 64) none repeat scroll 0% 0%; top: 731px; left: 0px; position: fixed; cursor: default; display: none;" class="nicescroll-rails" id="ascrail2000-hr"><div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(74, 139, 194); background-clip: padding-box; border-radius: 0px;"></div></div><div style="width: 8px; z-index: 1000; background: rgb(64, 64, 64) none repeat scroll 0% 0%; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0;" class="nicescroll-rails" id="ascrail2001"><div style="position: relative; top: 0px; float: right; width: 8px; height: 209px; background-color: rgb(74, 139, 194); background-clip: padding-box; border-radius: 0px;"></div></div><div style="height: 8px; z-index: 1000; background: rgb(64, 64, 64) none repeat scroll 0% 0%; position: fixed; left: 0px; width: 100%; bottom: 0px; cursor: default; display: none; opacity: 0;" class="nicescroll-rails" id="ascrail2001-hr"><div style="position: relative; top: 0px; height: 8px; width: 1366px; background-color: rgb(74, 139, 194); background-clip: padding-box; border-radius: 0px;"></div></div>

   <!--script for this page only-->

   <script src="/Metro%20Lab_files/easy-pie-chart.js"></script>
   <script src="/Metro%20Lab_files/sparkline-chart.js"></script>
   <script src="/Metro%20Lab_files/home-page-calender.js"></script>
   <script src="/Metro%20Lab_files/home-chartjs.js"></script>
   <script type="text/javascript" src="/js/moment.js"></script>
   <script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>
   <script src="/sweetalert/sweetalert.min.js"></script>

   @yield('script')
   <!-- END JAVASCRIPTS -->   


</body><!-- END BODY -->
</html>