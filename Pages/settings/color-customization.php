<form action="" method="post">
<table style="width: 800px;">   
   
<tr style="height:20px;"><td colspan="2"></td></tr>
<tr><td colspan="2"><h1>Design Customization </h1></td></tr>

   <tr>
      <td>Set Theme Color <i class="fas fa-question-circle" title="This will effect input borders color & button color."></i></td>
      <td>
         <input type="text" class="khyzer color" name="sofb_theme_color" id="sofb_theme_color" value="#3f51b5" style="width:100%;max-width:230px;" required>
         <input class="khyzer color-code" id="display-sofb_theme_color" readonly>
      </td>
   </tr>


   <tr>
      <td>Apply Shadow to form Area <i class="fas fa-question-circle" title="Use Shadow for form area. <br><br> If you don't need shadow, set this to 'No'"></i></td>
      <td><select type="text" class="khyzer" name="sofb_calc_shadow" id="sofb_calc_shadow" required>
         <option value="1">Yes</option>
         <option value="0">No</option>
      </select></td>
   </tr>

    <tr style="display: none;">
      <td>Form Width <i class="fas fa-question-circle" title="Choose width of form area on your webpage. <br><br>Keep this default, if you don't want to change the form width on your webpage."></i></td>
      <td>
         <input type="text" class="khyzer" name="sofb_table-width" id="sofb_table-width" list="sofb_t-width" value="1199px" required>
         <datalist id="sofb_t-width">
            <option value="100%">100%</option>
            <option value="95%">95%</option>
            <option value="85%">85%</option>
            <option value="80%">80%</option>
            <option value="1500px">1500px</option>
            <option value="1200px">1200px</option>
         </datalist>
      </td>
   </tr>


</table>


<table style="width: 800px;">   
   
<tr style="height:20px;"><td colspan="2"></td></tr>
<tr><td colspan="2"><h1>Order Notification Settings </h1></td></tr>



   <tr>
      <td>Notification Email <i class="fas fa-question-circle" title="Use Shadow for form area. <br><br> If you don't need shadow, set this to 'No'"></i></td>
      <td><input type="text" class="khyzer" name="sofb_email" id="sofb_email" placeholder="you@example.com" value=""></td>
   </tr>


</table>


<center>
<button type="button" onclick="sofb_pro_settings()" class="kzr-btn kzr-green kzr-update" style="margin-top: 20px;"> Update Settings <i class="fas fa-sync-alt"></i></button>
</center>

</form>


<div id="sofb-modal" class="modal" style="/*display: block*/;">
<center>
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Unlock Full Power</h1>
    <div style="height:20px;"></div>
    
    <div style="font-size: 28px;">
    <p>Theme customization & Notification settings are supported in <b>Stylish Form Builder <span style="color: #e91e63;">PRO</span></b></p>
    <p>Unlock full power - GO PRO</p>
    </div>

    <div style="height:40px;"></div>
    <a href="https://wppluginbox.com/en/stylish-order-form-builder-pro-pricing/" class="sofb-pro-btn">Go Pro</a>
  </div>
</center>
</div>