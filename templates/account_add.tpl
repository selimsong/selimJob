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
           <div style="margin:0px 0px 5px 0px;">
              <span style="font-size:24px;line-height:26px;font-weight:bold;">添加帐号</span>
              <button class="btn" style=" margin-left:50px; margin-bottom:5px; " ><i class="icon-hand-up"></i> 保存</button>
           </div>
            <div class="well">
                <div class="tab-content" id="myTabContent">
                  <div id="home" class="tab-pane active">
                <form  class="form-horizontal" style="text-align:left;">
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">用户名:</label>
                       <div class="controls">
                         <input type="text" name="account_name" class="input-xlarge" value="">
                        </div>
                    </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">员工姓名:</label>
                       <div class="controls">
                         <input type="text" name="employee_name" class="input-xlarge" value="">
                        </div>
                   </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">性别:</label>
                       <div class="controls" style="padding-top: 5px;">
                         <input type="radio" name="gender" class="input-xlarge" value="1" checked> 男 &nbsp;&nbsp;
                         <input type="radio" name="gender" class="input-xlarge" value="2"> 女
                        </div>
                   </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">部门:</label>
                       <div class="controls">
                         <input type="text" name="department" class="input-xlarge" value="">
                        </div>
                    </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">职位:</label>
                       <div class="controls">
                         <input type="text" name="positon" class="input-xlarge" value="">
                        </div>
                    </div>
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">邮箱:</label>
                       <div class="controls">
                         <input type="text" name="email" class="input-xlarge" value="">
                        </div>
                    </div> 
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">联系电话:</label>
                       <div class="controls">
                         <input type="text" name="employee_phone" class="input-xlarge" value="">
                        </div>
                    </div>
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">联系地址:</label>
                       <div class="controls">
                         <input type="text" name="employee_address" class="input-xlarge" value="">
                        </div>
                    </div>                      
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">备注:</label>
                       <div class="controls">
                         <textarea class="input-xlarge" name="remark" rows="4" value="">
            
                         </textarea>
                        </div>
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