
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
        <li><a href="index.php?mod=mod_home">Home</a></li>
        <li class="dropdown" id="preview-menu">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php if($_SESSION['user']['UserType'] == 'SEO Specialist'  ){ ?>
              <li><a href="?mod=mod_reports">Upload a Report</a></li>
            <?php } ?>
            <li><a href="">View Report Calendar</a></li>
          </ul>
        </li>
        <li class="dropdown" id="preview-menu">
          <a class="dropdown-toggle" data-toggle="dropdown" href="?mod_projects">Projects<b class="caret"></b></a>
          <?php if($_SESSION['user']['UserType'] == 'SEO Specialist' || $_SESSION['user']['UserType'] == 'Tigervinci'){ ?>
            <ul class="dropdown-menu">
              <li><a href="">Create New Project</a></li>
              <li><a href="">View Clients</a></li>
              <li class="divider"></li>
              <li><a href="?mod=mod_projects">Go to Projects</a></li>
            </ul>
          <?php } ?>
        </li>
      </ul>
      <ul class="nav pull-right" id="main-menu-right">
        <li><a href="#" title="Calendar"><i class="icon-calendar icon-white"></i></a></li>
        <li><a href="#" title="Profile"><i class="icon-user icon-white"></i></a></li>
        <li><a href="modules/mod_home/process/logout.php" onclick="return confirm_logout();" title="Logout"><i class="icon-arrow-right icon-white"></i></a></li>
      </ul>
      <form class="navbar-search pull-right">
        <input type="text" class="search-query" placeholder="Search...">
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
          if($mod != 'mod_home')
            include "modules/$mod/default.php"; 
          else
            include "modules/mod_dashboard/default.php"; 
          ?>

      </div>
    </div>
  </div>
</div>

<script src="modules/mod_home/default.js" type="text/javascript"></script>