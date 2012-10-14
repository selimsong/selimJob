<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=gb2312"/>
    <title>微平台-home</title>
    <link href="css/home.css" rel="stylesheet">
    <link href="css/home-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>
  </head>
  <body>

  <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user icon-white"></i> Jack Smith
                            <i class="icon-chevron-down icon-white"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">基本信息设置</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="sign-in.html">退出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="second">新浪科技有限公司</span></a>
            </div>
        </div>
  </div>
    
  <div  class="container-fluid">
     <div class="row-fluid">
      <div class="span3"> <!-- span3 s -->
          
          <div class="sidebar-nav">
                  <div data-target="#dashboard-menu" data-toggle="collapse" class="nav-header"><i class="icon-home"></i>导航</div>
                    <ul class="nav nav-list collapse in" id="dashboard-menu">
                        <li><a href="index.html">基本设置</a></li>
                        <li><a href="users.html">Sample List</a></li>
                        <li class="active"><a href="user.html">Sample Item</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="help.html">Help</a></li>
                        
                    </ul>
                <div data-target="#accounts-menu" data-toggle="collapse" class="nav-header"><i class="icon-briefcase"></i>Account<span class="label label-info">+10</span></div>
                <ul class="nav nav-list collapse in" id="accounts-menu">
                  <li><a href="sign-in.html">Sign In</a></li>
                  <li><a href="sign-up.html">Sign Up</a></li>
                  <li><a href="reset-password.html">Reset Password</a></li>
                </ul>

                <div data-target="#settings-menu" data-toggle="collapse" class="nav-header"><i class="icon-exclamation-sign"></i>Error Pages</div>
                <ul class="nav nav-list collapse in" id="settings-menu">
                  <li><a href="403.html">403 page</a></li>
                  <li><a href="404.html">404 page</a></li>
                  <li><a href="500.html">500 page</a></li>
                  <li><a href="503.html">503 page</a></li>
                </ul>

            </div> 
      
      </div><!-- span3 e -->
      
       <div class="span9"><!-- span9 s -->
           <h1 class="page-title">基本设置</h1>
            <div class="well">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                  <li class=""><a data-toggle="tab" href="#profile">Password</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div id="home" class="tab-pane active">
                <form id="tab">
                    <label>Username</label>
                    <input type="text" class="input-xlarge" value="jsmith">
                    <label>First Name</label>
                    <input type="text" class="input-xlarge" value="John">
                    <label>Last Name</label>
                    <input type="text" class="input-xlarge" value="Smith">
                    <label>Email</label>
                    <input type="text" class="input-xlarge" value="jsmith@yourcompany.com">
                    <label>Address</label>
                    <textarea class="input-xlarge" rows="3" value="Smith">2817 S 49th
            Apt 314
            San Jose, CA 95101
                    </textarea>
                    <label>Time Zone</label>
                    <select class="input-xlarge" id="DropDownTimezone" name="DropDownTimezone">
                      <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
                      <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
                      <option value="-10.0">(GMT -10:00) Hawaii</option>
                      <option value="-9.0">(GMT -9:00) Alaska</option>
                      <option value="-8.0" selected="selected">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                      <option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                      <option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                      <option value="-5.0">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                      <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                      <option value="-3.5">(GMT -3:30) Newfoundland</option>
                      <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                      <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
                      <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                      <option value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                      <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                      <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
                      <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                      <option value="3.5">(GMT +3:30) Tehran</option>
                      <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                      <option value="4.5">(GMT +4:30) Kabul</option>
                      <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                      <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                      <option value="5.75">(GMT +5:45) Kathmandu</option>
                      <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                      <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                      <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                      <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                      <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
                      <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                      <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                      <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                </select>
                </form>
                  </div>
                  <div id="profile" class="tab-pane">
                <form id="tab2">
                    <label>New Password</label>
                    <input type="password" class="input-xlarge">
                    <div>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
                  </div>
              </div>
            
            </div>
       
       </div><!-- span9 e -->
     </div>
  </div>
    
    
   
  
      <hr>
      <div class="container">
      <footer>
        <a target="_blank">关于我们 </a> &nbsp;&nbsp;&nbsp;  <a target="_blank">联系我们 </a> 
      </footer>
      </div>
       <script src="js/bootstrap.js"></script>
  </body>
</html>