<br />
<div class="footer"><?php echo $Footer;?></div>
<?php If ($lang == "fr"){echo "<script type=\"text/javascript\">\$(document).ready(function(){\$('a[href*=\".php\"').each(function(){if (this.href.indexOf('?') != -1) {this.href = this.href.replace('.php?', '.php?Lang=fr&');}else{this.href = this.href.replace('.php', '.php?Lang=fr');}});});</script>";}?>
</body>
</html>

