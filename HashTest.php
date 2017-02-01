<!DOCTYPE html>
<?php include "Header.php";?>
<?php
$Title = (string)"";
If (file_exists($DatabaseFile) == false){
	$LeagueName = $DatabaseNotFound;
	$EntryDraft = Null;
	$EntryDraftProspectAvailable = Null;
}else{
	$LeagueName = (string)"";
		
	$db = new SQLite3($DatabaseFile);
	
	$Query = "Select Name, LeagueWebPassword from LeagueGeneral";
	$LeagueGeneral = $db->querySingle($Query,true);		
	$LeagueName = $LeagueGeneral['Name'];
	
	$Query = "SELECT Name, GMName, WebPassword from TeamProInfo ORDER BY Number";
	$ProTeam = $db->query($Query);
	
}?>
<title>Password Hash Compaison</title>
</head><body>
<?php include "Menu.php";?>
<h1>Password Hash Compaison</h1>


<div style="width:99%;margin:auto;">
<table class="STHSEntryDraft_MainTable">
<thead><tr>
<th>Team</th>
<th>Match</th>
<th>DatabaseHash</th>
<th>CalculateHash</th>
</tr></thead><tbody>
<?php
mb_internal_encoding("UTF-8");
$CalculateHash = strtoupper(Hash('sha512',mb_convert_encoding($LeagueGeneral['Name'] . "mayonaise", 'ASCII')));
echo "<tr><td>League</td>\n";
If ($CalculateHash == $LeagueGeneral['LeagueWebPassword']){echo "<td style=\"background-color:green\">MATCH</td>\n";}else{echo "<td style=\"background-color:red\">NOT MATCH</td>\n";}
echo "<td>" . $LeagueGeneral['LeagueWebPassword'] . "</td>\n";
echo "<td>" . $CalculateHash . "</td>\n";
echo "</tr>";

if (empty($ProTeam ) == false){while ($row = $ProTeam  ->fetchArray()) { 
	$CalculateHash = strtoupper(Hash('sha512',mb_convert_encoding($row['GMName'] . $row['Name'], 'ASCII')));
	echo "<tr><td>" . $row['Name'] . "</td>\n";
	If ($CalculateHash == $row['WebPassword']){echo "<td style=\"background-color:green\">MATCH</td>\n";}else{echo "<td style=\"background-color:red\">NOT MATCH</td>\n";}	
	echo "<td>" . $row['WebPassword'] . "</td>\n";
	echo "<td>" . $CalculateHash . "</td>\n";
	echo "</tr>";
}}
?>
</tbody></table>

</div>

<?php include "Footer.php";?>
