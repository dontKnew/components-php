
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="change-password.php"><i class="icon-user"></i> Change Password</a></li>
        <li class="divider"></li>
        
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <!--<li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>-->
    <li class=""><a title="" href="change-password.php"><i class="icon icon-cog"></i> <span class="text">Change Password</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="mainpage.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <? if($page=="mainpage"){ ?>  class="active"<? } ?>><a href="mainpage.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>



    <li <? if($page=="enquiry"){ ?>  class="active"<? } ?>><a href="enquiry.php"><i class="icon icon-th"></i> <span>Enquiry  Management</span></a></li>

 

    <li <? if($page=="ratelist"){ ?>  class="active"<? } ?>><a href="ratelist.php"><i class="icon icon-th"></i> <span>Ratelist  Management</span></a></li>

 


    <li <? if($page=="pincodelogic"){ ?>  class="active"<? } ?>><a href="pincode-logic.php"><i class="icon icon-th"></i> <span>Pincode Logic</span></a></li>

 
    <li <? if($page=="additionallogic"){ ?>  class="active"<? } ?>><a href="additional-logic.php"><i class="icon icon-th"></i> <span>Additional Logic</span></a></li>

 


    <li <? if($page=="company"){ ?>  class="active"<? } ?>><a href="company.php"><i class="icon icon-th"></i> <span>Company  Management</span></a></li>

 
    <li <? if($page=="package_type"){ ?>  class="active"<? } ?>><a href="package_type.php"><i class="icon icon-th"></i> <span>Package Type  Management</span></a></li>

 


    <li <? if($page=="country"){ ?>  class="active"<? } ?>><a href="country.php"><i class="icon icon-th"></i> <span>Country  Management</span></a></li>

 
   
 

<? /*

 <li <? if($page=="zone"){ ?>  class="active"<? } ?>><a href="zone.php"><i class="icon icon-th"></i> <span>Zone  Management</span></a></li>


    <li <? if($page=="course"){ ?>  class="active"<? } ?>><a href="course.php"><i class="icon icon-th"></i> <span>Course Management</span></a></li>
    
    
    
    <li <? if($page=="blog"){ ?>  class="active"<? } ?>><a href="blog.php"><i class="icon icon-th"></i> <span>Blog Management</span></a></li>
 

    <li <? if($page=="package"){ ?>  class="active"<? } ?>><a href="package.php"><i class="icon icon-th"></i> <span>Package Management</span></a></li>
 
 
    <li <? if($page=="question-category"){ ?>  class="active"<? } ?>><a href="question-category.php"><i class="icon icon-th"></i> <span>Question Category  </span></a></li>
    
    <li <? if($page=="question"){ ?>  class="active"<? } ?>><a href="question.php"><i class="icon icon-th"></i> <span>Question Management</span></a></li>
    
    
 

    <li <? if($page=="student"){ ?>  class="active"<? } ?>><a href="student.php"><i class="icon icon-th"></i> <span>Student Management</span></a></li>
 

 <li <? if($page=="system"){ ?>  class="active"<? } ?>><a href="system.php?action=edit&id=1"><i class="icon icon-th"></i> <span>System Management</span></a></li>



    <li <? if($page=="accountant"){ ?>  class="active"<? } ?>><a href="accountant.php"><i class="icon icon-th"></i> <span>Business Management</span></a></li>
    <li <? if($page=="reviews"){ ?>  class="active"<? } ?>><a href="reviews.php"><i class="icon icon-th"></i> <span>Review Management</span></a></li> 

    <li <? if($page=="enquiry"){ ?>  class="active"<? } ?>><a href="enquiry.php"><i class="icon icon-th"></i> <span>Enquiry Management</span></a></li> 

    <li <? if($page=="employer"){ ?>  class="active"<? } ?>><a href="employer.php"><i class="icon icon-th"></i> <span>Employer Management</span></a></li>
 <li <? if($page=="industry"){ ?>  class="active"<? } ?>><a href="industry.php"><i class="icon icon-th"></i> <span>Industry Management</span></a></li>
 <li <? if($page=="city"){ ?>  class="active"<? } ?>><a href="city.php"><i class="icon icon-th"></i> <span>City Management</span></a></li>
 <li <? if($page=="state"){ ?>  class="active"<? } ?>><a href="state.php"><i class="icon icon-th"></i> <span>State Management</span></a></li>

   
    <li <? if($page=="services"){ ?>  class="active"<? } ?>><a href="services.php"><i class="icon icon-th"></i> <span>Services Management</span></a></li>
 <li <? if($page=="packages"){ ?>  class="active"<? } ?>><a href="packages.php"><i class="icon icon-th"></i> <span>Package Management</span></a></li>


 */ ?>
    
<!--
    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>-->
  </ul>
</div>
<!--sidebar-menu-->
