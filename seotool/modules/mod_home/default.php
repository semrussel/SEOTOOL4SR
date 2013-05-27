
<!-- **************************** NAVIGATION BAR **************************** -->
<div class="navbar navbar-fixed-top">
 <div class="navbar-inner">
   <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
     <a class="brand" href="#">Solutions Resource</a>
     <div class="nav-collapse collapse" id="main-menu">
      <ul class="nav" id="main-menu-left">
      <?php 
        if($_SESSION['user']['UserType'] != "Administrator"){
      ?>
        <li><a href="index.php?mod=mod_home">Home</a></li>
        <li><a href="index.php?mod=mod_projects">Projects</a></li>
      <?php
        }
        else{
       ?>   
        <li><a href="index.php?mod=mod_home">Admin</a></li>
      <?php  } 
      ?>
      </ul>
      <ul class="nav pull-right" id="main-menu-right">
        <li><a href="?mod=mod_profile" title="Profile"><i class="icon-user icon-white"></i></a></li>
        <li><a href="modules/mod_home/process/logout.php" onclick="return confirm_logout();" title="Logout"><i class="icon-arrow-right icon-white"></i></a></li>
      </ul>
      <form class="navbar-search pull-right">
        <divclass="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <input type="text" class="span12" placeholder="Search Projects and Reports..." onkeyup="suggest(this.value);" />
            </div>
            <div class="row-fluid">
              <div id="suggestions2"></div>
            </div>
          </div>
        </div>
      </form>
     </div>
   </div>
 </div>
</div>
<!-- **************************** END NAVIGATION BAR **************************** -->

<div class="span1"></div>
<div id="main_div" class="span10">
  <div class="row-fluid">
    <div class="span12">
      <div class="breadcrumbs">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li> 
          <span class="divider"> / </span>
          <li><a href="#">Dashboard</a></li>
          <li class="notifications"><span><a href="#" id="notification">1 new report(s).</a></a></li>
        </ul>
      </div>
      <div id="content">
        <!-- INCLUDE CONTENT-->
        <?php 
        if($_SESSION['user']['UserType']!='Administrator'){
          if($mod != 'mod_home'){
            include "modules/$mod/default.php"; 
          }
          else{
            include "modules/mod_dashboard/default.php"; 
          }
        }
        else{
            include "modules/mod_admin/default.php"; 
        }
          ?>
      </div>
    </div>
  </div>
</div>
<script src="modules/mod_home/default.js" type="text/javascript"></script>