<!DOCTYPE html>
<?php include "Header.php";?>
<?php
$LeagueName = (string)"";
$Title = (string)"";
If (file_exists($DatabaseFile) == false){
	$LeagueName = $DatabaseNotFound;
	$TodayGame = Null;
	echo "<title>" . $DatabaseNotFound . "</title>";
}else{
	$db = new SQLite3($DatabaseFile);
	
	$Type = (integer)0; /* 0 = All / 1 = Pro / 2 = Farm */
	if(isset($_GET['Type'])){$Type = filter_var($_GET['Type'], FILTER_SANITIZE_NUMBER_INT);} 
	
	$Query = "Select Name, OutputName from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);		
	$LeagueName = $LeagueGeneral['Name'];
	
	/* Pro Only, Farm Only or Both  */ 
	if($Type == 1){
		$Query = "SELECT TodayGame.* FROM TodayGame WHERE TodayGame.GameNumber Like 'Pro%'";
		$Title = $LeagueName . $DynamicTitleLang['Pro'];
	}elseif($Type == 2){
		$Query = "SELECT TodayGame.* FROM TodayGame WHERE TodayGame.GameNumber Like 'Farm%'";
		$Title = $LeagueName . $DynamicTitleLang['Farm'];
	}else{
		$Query = "SELECT TodayGame.* FROM TodayGame";
		$Title = $LeagueName;
	}
	$TodayGame = $db->query($Query);
}
echo "<title>" . $Title . $TodayGamesLang['TodayGamesTitle'] . "</title>";


Function PrintGames($Row, $TodayGamesLang){
	echo "<table class=\"STHSTodayGame_GameTitle\"><tr><td class=\"STHSTodayGame_GameNumber\"><h3>";
	If (substr($Row['GameNumber'],0,3) == "Pro"){
		echo $TodayGamesLang['ProGames'] . substr($Row['GameNumber'],3);
	}elseif (substr($Row['GameNumber'],0,4) == "Farm"){
		echo $TodayGamesLang['FarmGames'] . substr($Row['GameNumber'],4);
	}else{
		echo $TodayGamesLang['UnknownGames'];
	}
	echo "</h3></td><td class=\"STHSTodayGame_Boxscore\"><h3><a href=\"" . $Row['Link'] ."\">" . $TodayGamesLang['BoxScore'] .  "</a></h3></td>";
	echo "</tr></table>";
	echo "<table class=\"STHSTodayGame_GameData\"><tr>";
	echo "<td class=\"STHSTodayGame_TeamName\"><h3>" . $Row['VisitorTeam'] ."</h3></td>";
	echo "<td class=\"STHSTodayGame_TeamScore\"><h3>";
	If ($Row['VisitorTeamScore'] > $Row['HomeTeamScore']){echo "<span style=\"color:red\">" . $Row['VisitorTeamScore'] ."</span>";}else{echo $Row['VisitorTeamScore'];}
	echo "</h3></td></tr><tr>";
	echo "<td colspan=\"2\" class=\"STHSTodayGame_TeamNote\">" . $Row['VisitorTeamGoal'] ."<br /><br />" . $Row['VisitorTeamGoaler'] ."<br /><br /></td>";
	echo "</tr><tr>";
	echo "<td class=\"STHSTodayGame_TeamName\"><h3>" . $Row['HomeTeam'] ."</h3></td>";
	echo "<td class=\"STHSTodayGame_TeamScore\"><h3>";
	If ($Row['HomeTeamScore'] > $Row['VisitorTeamScore']){echo "<span style=\"color:red\">" . $Row['HomeTeamScore'] ."</span>";}else{echo $Row['HomeTeamScore'];}
	echo "</h3></td></tr><tr>";
	echo "<td colspan=\"2\" class=\"STHSTodayGame_TeamNote\">" . $Row['HomeTeamGoal'] ."<br /><br />" . $Row['HomeTeamGoaler'] ."<br /><br /></td>";
	echo "</tr></table>\n";
}
?>
</head><body>
<?php include "Menu.php";?>
<br />


<div style="width:95%;margin:auto;">
<h1><?php echo $Title . $TodayGamesLang['TodayGamesTitle'];?></h1>
<table class="STHSTodayGame_MainTable">
<?php
$LoopCount = (integer)0;
if (empty($TodayGame) == false){while ($Row = $TodayGame ->fetchArray()) {
	$LoopCount +=1;
	If ($LoopCount % 2 == 1){
		echo "<tr><td class=\"STHSTodayGame_GameOverall\">\n";
		PrintGames($Row, $TodayGamesLang);
		echo "<hr class=\"STHSTodayGame_HR\"><br /></td>\n";
	}else{
		echo "<td class=\"STHSTodayGame_GameOverall\">\n";
		PrintGames($Row, $TodayGamesLang);
        echo "<hr class=\"STHSTodayGame_HR\"><br /></td></tr>\n";
	}
}}
If ($LoopCount % 2 == 0){
	echo "</table>";
}else{
	echo "<td></td></tr></table>";
}

?>
<br />
</div>

<?php include "Footer.php";?>
