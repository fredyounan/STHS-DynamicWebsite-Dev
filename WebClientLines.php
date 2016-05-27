<?php
	include "STHSSetting.php";
	$lang = "en"; 
	include 'LanguageEN.php'; 
	$LeagueName = (string) "";

	require_once("WebClientAPI.php");
	// exempt is an array of api names.
	// example, if you do not need the html or layout api then add as an array item
	// $exempt = array("html","layout");
	$exempt = array();
	
	// Call the required APIs
	load_apis($exempt);
	
	// Make a connection variable to pass to API
	$db = api_sqlite_connect($DatabaseFile);

	// Make a default header 
	api_layout_header("lineeditor",$db,$WebClientHeadCode);
	
	include "Menu.php";

	// Look for a team ID in the URL, if non exists use 0
	$t = (isset($_REQUEST["TeamID"])) ? $_REQUEST["TeamID"] : 0;
	$l = (isset($_REQUEST["League"])) ? $_REQUEST["League"] : false;

	// Display the line editor page using API.
	api_pageinfo_editor_lines($db,$t,$l,False);

	// Close the db connection
	$db->close();

	// Display the default footer.
	include "Footer.php";
?>