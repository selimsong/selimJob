<!DOCTYPE html>
<html>
  <head>
   {include file="header.tpl"}
  </head>
  <body>
  {include file="top.tpl"}
  <div  class="container-fluid">
     <div class="row-fluid">
      <div class="span3"> <!-- span3 s -->
          {include file="left.tpl"}
      </div><!-- span3 e -->
      
       <div class="span9"><!-- span9 s -->
           <h1 class="page-title">人员列表</h1>
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
    
{include file="footer.tpl"}
</body>
</html>