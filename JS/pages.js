var host_url = btoa(window.location.href);
var embed = '<style>iframe{width: 100%;min-width: 601px;border:none;}@media only screen and (max-width: 600px) {iframe { display: block; width:100%;min-width:280px; }</style><center><iframe id="myIframe" src="https://wppluginbox.com/api-sofb/packages/?key='+host_url+'" scrolling="no" border="no" onload="iFrameResize()"></iframe></center>';
jQuery('#SOFB-PACKAGES').html(embed);