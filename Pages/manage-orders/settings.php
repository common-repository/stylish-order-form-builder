<script type="text/javascript">var $ = jQuery.noConflict();</script>
<script type="text/javascript">function sofb_get_admin_path(){return "<?php echo admin_url('admin-ajax.php'); ?>";}</script>

<?php echo file_get_contents("https://wppluginbox.com/wpbox-announcements/index.php"); ?>


<div class="shadow font" style="margin-top: 20px;margin-right: 10px;position: relative;">
<h1>Received Orders</h1>
<hr>
<!-- <center> -->
<?php include __DIR__.'/orders.php'; ?>
<!-- </center> -->
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


