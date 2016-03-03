<?php include "Header.php";?>
<?php
$Title = (string)"";
If (file_exists($DatabaseFile) == false){
	$LeagueName = $DatabaseNotFound;
	echo "<title>" . $DatabaseNotFound . "</title>";
	$Title = $DatabaseNotFound;
}else{
	$TypeText = (string)"Pro";
	$MaximumResult = (integer)10;
	$MinimumGamePlayer = (integer)1;
	if(isset($_GET['Farm'])){$TypeText = "Farm";}
	if(isset($_GET['Max'])){$MaximumResult = filter_var($_GET['Max'], FILTER_SANITIZE_NUMBER_INT);} 
	$LeagueName = (string)"";
	
	$db = new SQLite3($DatabaseFile);
	$Query = "Select Name from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);		
	$LeagueName = $LeagueGeneral['Name'];
	$Query = "Select ProMinimumGamePlayerLeader, FarmMinimumGamePlayerLeader from LeagueOutputOption";
	$LeagueOutputOption = $db->querySingle($Query,true);		
	
	$Title = $LeagueName . " - " . $TypeText . " " . $IndividualLeadersLang['IndividualLeadersTitle'];
	If ($TypeText == "Pro"){
		$MinimumGamePlayer = $LeagueOutputOption['ProMinimumGamePlayerLeader'];
	}elseif($TypeText == "Farm"){
		$MinimumGamePlayer = $LeagueOutputOption['FarmMinimumGamePlayerLeader'];
	}
	
	echo "<title>" . $Title ."</title>";
}?>
</head><body>
<?php include "Menu.php";?>
<?php echo "<h1>" . $Title . "</h1>"; ?>

<script type="text/javascript">
$(function() {
  $(".custom-popup").tablesorter({);
});
</script>

<div style="width:99%;margin:auto;">
<b>Minimum Games Played: <?php echo $MinimumGamePlayer;?></b><br />
<table class="STHSTableFullW">
<tr><td colspan="3"><h2 class="STHSProIndividualLeader_Players">Players</h2></td></tr>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Goals">G</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) ORDER BY Player" . $TypeText . "Stat.G DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Assists</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Assists">A</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.A > 0) ORDER BY Player" . $TypeText . "Stat.A DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['A'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Shots</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Shots">SHT</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.Shots, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.Shots > 0) ORDER BY Player" . $TypeText . "Stat.Shots DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . "</td><td>" . $Row['Shots'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Shots %</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Shooting Percentage">SHT%</th></tr></thead>
<?php
$Query = "SELECT ROUND((CAST(Player" . $TypeText . "Stat.G AS REAL) / (Player" . $TypeText . "Stat.Shots))*100,2) AS ShotsPCT, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (Player" . $TypeText . "Stat.Shots > Player" . $TypeText . "Stat.GP) AND (PlayerInfo.Team > 0) AND (ShotsPCT > 0) ORDER BY ShotsPCT DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . "</td><td>" . number_Format($Row['ShotsPCT'],2) . "%</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Center</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points">PTS</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.P, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre, PlayerInfo.PosC FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) AND (PlayerInfo.PosC='True') ORDER BY Player" . $TypeText . "Stat.P DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] . "-" . $Row['A'] . "-" . $Row['P'] . "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Left Wings</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points">PTS</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.P, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre, PlayerInfo.PosLW FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) AND (PlayerInfo.PosLW='True') ORDER BY Player" . $TypeText . "Stat.P DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] . "-" . $Row['A'] . "-" . $Row['P'] . "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Right Wings</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points">PTS</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.P, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre, PlayerInfo.PosRW FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) AND (PlayerInfo.PosRW='True') ORDER BY Player" . $TypeText . "Stat.P DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] . "-" . $Row['A'] . "-" . $Row['P'] . "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Defenseman</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points">PTS</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.P, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre, PlayerInfo.PosD FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) AND (PlayerInfo.PosD='True') ORDER BY Player" . $TypeText . "Stat.P DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] . "-" . $Row['A'] . "-" . $Row['P'] . "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Point per 20 Minutes</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points per 20 Minutes">P/20</th></tr></thead>
<?php
$Query = "SELECT ROUND((CAST(Player" . $TypeText . "Stat.P AS REAL) / (Player" . $TypeText . "Stat.SecondPlay) * 60 * 20),2) AS P20, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.P > 0) ORDER BY P20 DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . "</td><td>" . number_Format($Row['P20'],2) .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Face-off %</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Face offs Percentage">FO%</th></tr></thead>
<?php
$Query = "SELECT ROUND((CAST(Player" . $TypeText . "Stat.FaceOffWon AS REAL) / (Player" . $TypeText . "Stat.FaceOffTotal))*100,2) as FaceoffPCT, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (Player" . $TypeText . "Stat.FaceOffTotal > (Player" . $TypeText . "Stat.GP * 5)) AND (PlayerInfo.Team > 0) ORDER BY FaceoffPCT DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . "</td><td>" . number_Format($Row['FaceoffPCT'],2) . "%</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Plus/Minus</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Plus/Minus">+/-</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.PlusMinus, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) ORDER BY Player" . $TypeText . "Stat.PlusMinus DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['PlusMinus'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Penalty Minutes</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">Penalty Minutes</th><th title="Assists">PIM</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.Pim, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.Pim > 0) ORDER BY Player" . $TypeText . "Stat.Pim DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['Pim'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Shots Blocked</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Shots Blocked">SB</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.ShotsBlock, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.ShotsBlock > 0) ORDER BY Player" . $TypeText . "Stat.ShotsBlock DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['ShotsBlock'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Rookie</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Points">PTS</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.G, Player" . $TypeText . "Stat.A, Player" . $TypeText . "Stat.P, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre, PlayerInfo.Rookie FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.G > 0) AND (PlayerInfo.Rookie='True') ORDER BY Player" . $TypeText . "Stat.P DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['G'] . "-" . $Row['A'] . "-" . $Row['P'] . "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Hits</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Hits">HIT</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.Hits, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.Hits > 0) ORDER BY Player" . $TypeText . "Stat.Hits DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['Hits'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Power Play Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Power Play Goals">PPG</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.PPG, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.PPG > 0) ORDER BY Player" . $TypeText . "Stat.PPG DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['PPG'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Short Handed Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Short Handed Goals">PKG</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.PKG, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.PKG > 0) ORDER BY Player" . $TypeText . "Stat.PKG DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['PKG'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Game Winning Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Game Winning Goals">GW</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.GW, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.GW > 0) ORDER BY Player" . $TypeText . "Stat.GW DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['GW'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Game Tying Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Game Tying Goals">GT</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.GT, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.GT > 0) ORDER BY Player" . $TypeText . "Stat.GT DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['GT'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Empty Net Goals</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Empty Net Goals">EG</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.EmptyNetGoal, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.EmptyNetGoal > 0) ORDER BY Player" . $TypeText . "Stat.EmptyNetGoal DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['EmptyNetGoal'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>

<tr><td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Minutes Played</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Minutes Played">MP</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.SecondPlay, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.SecondPlay > 0) ORDER BY Player" . $TypeText . "Stat.SecondPlay DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . Floor($Row['SecondPlay']/60) .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td><td class=\"STHSWP2\"></td>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td><td class=\"STHSWP2\"></td>";
}?>

<td class="STHSWP49"><table class="tablesorter custom-popup"><thead><tr><th colspan="4"><span class="STHSIndividualLeadersTitle">Hat Tricks</span></td></tr>
<tr><th>#</th><th title="Player Name"><?php echo $PlayersLang['PlayerName'];?></th><th title="Games Played">GP</th><th title="Hat Tricks">HT</th></tr></thead>
<?php
$Query = "SELECT Player" . $TypeText . "Stat.HatTrick, Player" . $TypeText . "Stat.GP, Player" . $TypeText . "Stat.Name, Player" . $TypeText . "Stat.Number, Team" . $TypeText . "Info.Abbre FROM (PlayerInfo INNER JOIN Player" . $TypeText . "Stat ON PlayerInfo.Number = Player" . $TypeText . "Stat.Number) LEFT JOIN Team" . $TypeText . "Info ON PlayerInfo.Team = Team" . $TypeText . "Info.Number WHERE (Player" . $TypeText . "Stat.GP >= " . $MinimumGamePlayer. ") AND (PlayerInfo.Team > 0) AND (Player" . $TypeText . "Stat.HatTrick > 0) ORDER BY Player" . $TypeText . "Stat.HatTrick DESC, Player" . $TypeText . "Stat.GP ASC";
If ($MaximumResult > 0){$Query = $Query . " LIMIT " . $MaximumResult;}
$PlayerStat = $db->query($Query);
$LoopCount = (integer)0;
if (empty($PlayerStat) == false){while ($Row = $PlayerStat ->fetchArray()) {
	$LoopCount +=1;
	echo "<tr><td>" . $LoopCount . "</td><td><a href=\"PlayerReport.php?Player=" . $Row['Number'] . "\">" . $Row['Name'] . " (" . $Row['Abbre'] . ")</a></td><td>" . $Row['GP'] . "</td><td>" . $Row['HatTrick'] .  "</td></tr>\n";
}}
If ($LoopCount > 1){
	echo "</table></td></tr>";
}else{
	echo "<tr><td colspan=\"4\" class=\"STHSCenter\">No Result</td></tr></table></td></tr>";
}?>


</table>

</div>

<?php include "Footer.php";?>
