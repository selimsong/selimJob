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
              <span style="font-size:24px;line-height:26px;font-weight:bold;">����ʺ�</span>
              <button class="btn" style=" margin-left:50px; margin-bottom:5px; " ><i class="icon-hand-up"></i> ����</button>
           </div>
            <div class="well">
                <div class="tab-content" id="myTabContent">
                  <div id="home" class="tab-pane active">
                <form  class="form-horizontal" style="text-align:left;">
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">�û���:</label>
                       <div class="controls">
                         <input type="text" name="account_name" class="input-xlarge" value="">
                        </div>
                    </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">Ա������:</label>
                       <div class="controls">
                         <input type="text" name="employee_name" class="input-xlarge" value="">
                        </div>
                   </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">�Ա�:</label>
                       <div class="controls" style="padding-top: 5px;">
                         <input type="radio" name="gender" class="input-xlarge" value="1" checked> �� &nbsp;&nbsp;
                         <input type="radio" name="gender" class="input-xlarge" value="2"> Ů
                        </div>
                   </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">����:</label>
                       <div class="controls">
                         <input type="text" name="department" class="input-xlarge" value="">
                        </div>
                    </div>
                   <div class="control-group">
                       <label for="inputEmail" class="control-label">ְλ:</label>
                       <div class="controls">
                         <input type="text" name="positon" class="input-xlarge" value="">
                        </div>
                    </div>
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">����:</label>
                       <div class="controls">
                         <input type="text" name="email" class="input-xlarge" value="">
                        </div>
                    </div> 
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">��ϵ�绰:</label>
                       <div class="controls">
                         <input type="text" name="employee_phone" class="input-xlarge" value="">
                        </div>
                    </div>
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">��ϵ��ַ:</label>
                       <div class="controls">
                         <input type="text" name="employee_address" class="input-xlarge" value="">
                        </div>
                    </div>                      
                    <div class="control-group">
                       <label for="inputEmail" class="control-label">��ע:</label>
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