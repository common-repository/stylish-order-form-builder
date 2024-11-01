<script type="text/javascript">var $ = jQuery.noConflict();</script>
<script type="text/javascript">function sofb_get_admin_path(){return "<?php echo admin_url('admin-ajax.php'); ?>";}</script>

<div class="shadow font" style="margin-top: 20px;margin-right: 10px;position: relative;">
<h1>Manage Product Properties</h1>
<hr>
<h3>Add / Remove / Edit Properties</h3>
<a href="?page=SOFB_demo_vid" style="font-size: 12px;color: red;">See Demo / Documentation</a>
<center>
<?php include __DIR__.'/add-property.php'; ?>
</center>
</div>



<style type="text/css">
 .tooltip{
    background-color:black;
    color: white;
    font-size: 11px;
    border: 1px solid black;
    font-family: Century Gothic;
    border-radius: 4px;
    text-align: left;
  }

  .ui-widget.ui-widget-content {
    border: 1px solid #000000;
    text-align: left;
}

.ui-widget-shadow {
     -webkit-box-shadow: 0px 0px 0px #666666; 
     box-shadow: 0px 0px 0px #666666; 
}
</style>


