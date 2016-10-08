<?php 
$DatabaseFile = (string)"D:\WWW\V3Output\SIM3-SEA-STHS.db";;
$CareerStatDatabaseFile = (string)"D:\WWW\STHS Test PHP\SIM3-SEA-STHSCareerStat.db";
$NewsDatabaseFile = (string)"SIM3-SEA-STHSNews.db";
$LangOverwrite = (boolean)FALSE;
$lang = (string)"en"; /* The $lang option must be either "en" or "fr" */
if(isset($_GET['Lang'])){$lang  = filter_var($_GET['Lang'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW || FILTER_FLAG_STRIP_HIGH);$LangOverwrite=TRUE;}  /* Allow Users Language Overwrite */
If ($lang == "fr"){include 'LanguageFR.php';}else{include 'LanguageEN.php';} ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script type="text/javascript" src="STHSMain.js"></script>
<meta charset="utf-8" />
<link href="STHSMain.css" rel="stylesheet" type="text/css" />
<link href="SIMON2.css" rel="stylesheet" type="text/css" />
<?php If (file_exists("STHSMain-CSSOverwrite.css") == true){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}

