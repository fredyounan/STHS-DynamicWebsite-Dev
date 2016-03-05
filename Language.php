<?php
switch ($lang){ 
case 'fr': /* Start FR Language Pack */

$DatabaseNotFound = "La base de donnée n'a pas été trouvé";
$Footer = "Website create by the <a href=\"http://sths.simont.info\">SimonT Hockey Simulator (STHS)</a>";
$WarningResolution = "La résolution de votre navigateur est trop petite pour cette page. Plusieurs informations sont cachées pour garder la page lisible.";

$TableSorterLang = array(
'ShoworHideColumn'		=> 'Afficher ou masquer des colonnes',
'ResetAllSearchFilter'		=> 'Réinitialiser tous les filtres de recherche',
'FilterTips'			=> 'Astuces sur les filtres (Anglais seulement)',
'Search'			=> 'Recherche',
);

$TransactionLang = array(
'LeagueTitle'		=> 'Transactions de Ligue',
'TeamTitle'			=> 'Transactions pour ',
'TradeHistory'			=> 'Historique d\'Échange',
);

$WaiverLang  = array(
'Title'		=> 'Ballotage',
'Waiver'		=> 'Ballotage',
'PlayerName'			=> 'Nom du joueur (Moyenne)',
'FromTeam'			=> 'De l\'équipe',
'Pickedby'			=> 'choisi par',
'DayPutonWaivers'			=> 'Jour placé au ballotage',
'DayRemovedfromWaivers'			=> 'Jour retiré du ballotage',
'WaiverOrder'		=> 'Ordre du ballotage',
);

$CoachesLang = array(
'CoachesTitle'		=> 'Coachs',
'ProCoaches'			=> 'Coachs Pro',
'FarmCoaches'			=> 'Coachs École',
'AvailableCoaches'			=> 'Coachs disponibles',
'CoachesName'			=> 'Nom de l\'entraîneur',
'TeamName'			=> 'Nom de l\'Équipe',
'Age'			=> 'Âge',
'Salary'			=> 'Salaire',
'Contract'			=> 'Contrat',
);

$ScheduleLang = array(
'ScheduleTitle1'		=> 'Ligue ',
'ScheduleTitle2'		=> ' Calendrier',
'TeamTitle'			=> ' Calendrier pour ',
'Day'			=> 'Jour',
'Game'			=> 'Match',
'VisitorTeam'			=> 'Équipe Visiteuse',
'HomeTeam'			=> 'Équipe Locale',
'Score'			=> 'Score',
'Link'			=> 'Lien',
'BoxScore'			=> 'Sommaire du match',
);

$SearchLang = array(
'SearchTitle'		=> 'Recherche',
'Team'		=> 'Équipe:',
'AllTeam'		=> 'Toutes les équipes',
'Type'		=> 'Type:',
'ProandFarm'		=> 'Pro and École',
'ProOnly'		=> 'Pro seulement',
'FarmOnly'		=> 'École seulement',
'OrderField'		=> 'Ordre de champs:',
'Max'		=> 'Max:',
'FreeAgents'		=> 'Agents libres:',
'ThisYear'		=> 'Cette année',
'NextYear'		=> 'L\'année prochaine',
'In2Years'		=> 'Dans 2 ans',
'In3Years'		=> 'Dans 3 ans',
'In4Years'		=> 'Dans 4 ans',
'In5Years'		=> 'Dans 5 ans',
'Unlimited'		=> '0 - Illimité',
'AcsendingOrder'		=> 'Ordre ascendant:',
'DecendingOrder'		=> 'Ordre descendant:',
'Select'		=> 'Selectionner',
'Farm'		=> 'École:',
'PlayersRosterMenu'		=> 'Menu Formation des joueurs',
'GoaliesRosterMenu'		=> 'Menu Formation des gardiens',
'PlayersInformationMenu'		=> 'Menu Informations des joueurs',
'PlayersStatsMenu'		=> 'Menu Statistiques des joueurs',
'GoaliesStatsMenu'		=> 'Menu Statistiques des gardiens',
'TeamStatsMenu'		=> 'Menu Statistiques des équipes',
);

$PlayersLang = array(
'PlayerName'		=> 'Nom du joueur',
'GoalieName'		=> 'Nom du gardien',
'TeamName'			=> 'Nom de l\'équipe',
'Age'			=> 'Âge',
'Birthday'			=> 'Date de naissance',
'Rookie'			=> 'Nouveau joueur',
'Weight'			=> 'Poids',
'Height'			=> 'Taille',
'NoTrade'			=> 'Non-échange',
'ForceWaiver'			=> 'Ballotage<br /> forcé',
'Status'			=> 'Status',
'Contract'			=> 'Contrat',
'Type'			=> 'Type',
'Salary'			=> 'Salaire',
'CurrentSalary'			=> 'Salaire<br />Actuel',
'SalaryYear2'			=> 'Salaire<br />Année 2',
'SalaryYear3'			=> 'Salaire<br />Année 3',
'SalaryYear4'			=> 'Salaire<br />Année 4',
'SalaryYear5'			=> 'Salaire<br />Année 5',
'SalaryYear6'			=> 'Salaire<br />Année 6',
'SalaryYear7'			=> 'Salaire<br />Année 7',
'SalaryYear8'			=> 'Salaire<br />Année 8',
'SalaryYear9'			=> 'Salaire<br />Année 9',
'SalaryYear10'			=> 'Salaire<br />Année 10',
'SalaryRemaining'			=> 'Salaire<br />restant',
'SalaryAverage'			=> 'Salaire<br />moyen',
'SalaryAveRemaining'			=> 'Salaire<br />moyen restant',
'1WayContract'			=> ' (Contrat à 1 volet)',
'OutofPayroll'			=> ' (sur la masse salariale)',
'Link'			=> 'Lien',
'UFA'			=> 'UFA',
'RFA'			=> 'RFA',
);

$DynamicTitleLang = array(
'InDecendingOrderBy'		=> ' en ordre descendant par ',
'InAscendingOrderBy'			=> ' en ordre ascendant par ',
'PlayersInformation'			=> ' Information des joueurs',
'PlayersRoster'			=> ' Formation des Joueurs',
'GoaliesRoster'			=> ' Formation des gardiens',
'GoaliesStat'			=> ' Statistiques des gardiens',
'PlayersStat'			=> ' Statistiques des joueurs',
'TeamStat'			=> ' Statistiques d\'équipe',
'TeamStatVS'			=> ' Statistiques d\'équipe VS',
'PlayersInformation'			=> ' Information des joueurs',
'ThisYearFreeAgents'			=> ' Agents libres cette année',
'NextYearFreeAgents'			=> ' Agents libres l\'année prochaine',
'YearsFreeAgents'			=> ' années agents libres',
'Unassigned'			=> 'Non assigné',
'Pro'			=> ' Pro',
'Farm'			=> ' École',
'All'			=> ' Tous ',
'Top'			=> ' Haut ',
'IndividualLeadersTitle'		=> 'Meneurs individuels',
);

$TeamStatLang = array(
'Overall'		=> 'Ligue',
'Home'			=> 'Domicile',
'Visitor'		=> 'Visiteur',
'TeamName'			=> 'Équipe',
'Last10'		=> 'Dernier 10',
);

$StandingLang = array(
'Standing'		=> ' Classement',
'Wildcard'		=> 'Quatrième As',
'Conference'		=> 'Conférence',
'Division'		=> 'Division',
'Overall'		=> 'Ligue',
);

$TeamLang = array(
'IncorrectTeam'		=> 'Équipe incorrecte',
'Teamnotfound'		=> 'Équipe non trouvée',
'GM'		=> 'DG: ',
'Morale'		=> 'Morale : ',
'TeamOverall'		=> 'Moyenne d\'équipe : ',
'Roster'		=> 'Formation',
'Scoring'		=> 'Points',
'PlayersInfo'		=> 'Informations Joueurs',
'Lines'		=> 'Lignes',
'TeamStats'		=> 'Statistiques d\'équipe',
'Schedule'		=> 'Calendrier',
'Finance'		=> 'Finance',
'Depth'		=> 'Profondeur',
'History'		=> 'Historique',
'InjurySuspension'		=> 'Blessure/Suspension',
'Scratches'		=> 'Rayé',
'TeamAverage'		=> 'MOYENNE D\'ÉQUIPE',
'TotalPlayers'		=> 'Joueurs total',
'AverageAge'		=> 'Âge moyen',
'AverageWeight'		=> 'Poids moyen',
'AverageHeight'		=> 'Taille moyenne',
'AverageContract'		=> 'Contrat moyen',
'AverageYear1Salary'		=> 'Salaire moyen 1ère année',
'LineNumber'		=> 'Ligne #',
'Center'		=> 'Centre',
'LeftWing'		=> 'Ailier Gauche',
'RightWing'		=> 'Ailier Droit',
'Wing'		=> 'Ailier',
'Defense'		=> 'Défense',
'Goalie'		=> 'Gardien',
'TimePCT'		=> '% Temps',
'PHY'		=> 'PHY',
'DF'		=> 'DF',
'OF'		=> 'OF',
'5vs5Forward'		=> 'Attaque à 5 contre 5',
'5vs5Defense'		=> 'Défense à 5 contre 5',
'PowerPlayForward'		=> 'Attaque en Avantage Numérique',
'PowerPlayDefense'		=> 'Défense en Avantage Numérique',
'PenaltyKill4PlayersForward'		=> 'Attaque à 4 en Désavantage Numérique',
'PenaltyKill4PlayersDefense'		=> 'Défense à 4 en Désavantage Numérique',
'PenaltyKill3Players'		=> '3 joueurs en Désavantage Numérique',
'4vs4Forward'		=> 'Attaque à 4 contre 4',
'4vs4Defense'		=> 'Défense à 4 contre 4',
'LastMinutesOffensive'		=> 'Attaque Dernière minute',
'LastMinutesDefensive'		=> 'Défense Dernière minute',
'ExtraForwards'		=> 'Attaquants Supplémentaires',
'ExtraDefensemen'		=> 'Défenseurs Supplémentaires',
'PenaltyShots'		=> 'Tirs de pénalité',
'CustomOTLinesForwards'		=> 'Lignes d\'attaque perso. en Prol.',
'CustomOTLinesDefensemen'		=> 'Lignes de défense perso. en Prol.',
'Normal'		=> 'Normal',
'PowerPlay'		=> 'Avantage Numérique',
'PenalityKill'		=> 'Désavantage Numérique',
'DepthChart'		=> 'Charte de profondeur',
'Prospects'		=> 'Éspoirs',
'DraftPicks'		=> 'Choix au repêchage',
'Year'		=> 'Année',
);

$IndexLang = array(
'IndexTitle'		=> 'Index',
'LatestTransactions'		=> 'Dernières transactions, blessures, suspensions, ballotages',
'News'		=> ' - Actualité',
'By'		=> ' Par',
'On'		=> ' le',
'Top5Point'		=> ' Top 5 Points',
'Top5Goal'		=> ' Top 5 Buts',
'Top5Goalies'		=> ' Top 5 Gardiens',
'Top20FreeAgents'		=> 'Top 20 Free Agents',
);

$TodayGamesLang = array(
'TodayGamesTitle'		=> ' Matchs du jour',
'BoxScore'		=> 'Sommaire du match',
'ProGames'		=> 'Matchs Pro ',
'FarmGames'		=> 'Matchs École ',
'UnknownGames'		=> 'Matchs inconnus',
);


break; /* End FR Language Pack */
	
default: /* Start EN Language Pack */

$DatabaseNotFound = "Database File Not Found";
$Footer = "Website create by the <a href=\"http://sths.simont.info\">SimonT Hockey Simulator (STHS)</a>";
$WarningResolution = "Your browser screen resolution is too small for this page. Some information are hidden to keep the page readable.";

$TableSorterLang = array(
'ShoworHideColumn'		=> 'Show or Hide Column',
'ResetAllSearchFilter'		=> 'Reset All Search Filter',
'FilterTips'			=> 'Filter Tips',
'Search'			=> 'Search',
);

$TransactionLang = array(
'LeagueTitle'		=> 'League Transactions',
'TeamTitle'			=> 'Transactions for ',
'TradeHistory'			=> 'Trade History',
);

$WaiverLang  = array(
'Title'		=> 'Waivers',
'Waiver'		=> 'Waivers',
'PlayerName'			=> 'Player Name (Overall)',
'FromTeam'			=> 'From Team',
'Pickedby'			=> 'Picked by',
'DayPutonWaivers'			=> 'Day Put on Waivers',
'DayRemovedfromWaivers'			=> 'Day Removed from Waivers',
'WaiverOrder'		=> 'Waiver Order',
);

$CoachesLang = array(
'CoachesTitle'		=> 'Coaches',
'ProCoaches'			=> 'Pro Coaches',
'FarmCoaches'			=> 'Farm Coaches',
'AvailableCoaches'			=> 'Available Coaches',
'CoachesName'			=> 'Coaches Name',
'TeamName'			=> 'Team Name',
'Age'			=> 'Age',
'Salary'			=> 'Salary',
'Contract'			=> 'Contract',
);

$ScheduleLang = array(
'ScheduleTitle1'		=> 'League ',
'ScheduleTitle2'		=> ' Schedule',
'TeamTitle'			=> ' Schedule for ',
'Day'			=> 'Day',
'Game'			=> 'Game',
'VisitorTeam'			=> 'Visitor Team',
'HomeTeam'			=> 'Home Team',
'Score'			=> 'Score',
'Link'			=> 'Link',
'BoxScore'			=> 'BoxScore',
);

$SearchLang = array(
'SearchTitle'		=> 'Search',
'Team'		=> 'Team:',
'AllTeam'		=> 'All Team',
'Type'		=> 'Type:',
'ProandFarm'		=> 'Pro and Farm',
'ProOnly'		=> 'Pro Only',
'FarmOnly'		=> 'Farm Only',
'OrderField'		=> 'Order Field:',
'Max'		=> 'Max:',
'FreeAgents'		=> 'Free Agents:',
'ThisYear'		=> 'This Year',
'NextYear'		=> 'Next Year',
'In2Years'		=> 'In 2 Years',
'In3Years'		=> 'In 3 Years',
'In4Years'		=> 'In 4 Years',
'In5Years'		=> 'In 5 Years',
'Unlimited'		=> '0 - Unlimited',
'AcsendingOrder'		=> 'Acsending Order:',
'DecendingOrder'		=> 'Decending Order:',
'Select'		=> 'Select',
'Farm'		=> 'Farm:',
'PlayersRosterMenu'		=> 'Players Roster Menu',
'GoaliesRosterMenu'		=> 'Goalies Roster Menu',
'PlayersInformationMenu'		=> 'Players Information Menu',
'PlayersStatsMenu'		=> 'Players Stats Menu',
'GoaliesStatsMenu'		=> 'Goalies Stats Menu',
'TeamStatsMenu'		=> 'Team Stats Menu',
);

$PlayersLang = array(
'PlayerName'		=> 'Player Name',
'GoalieName'		=> 'Goalie Name',
'TeamName'			=> 'Team Name',
'Age'			=> 'Age',
'Birthday'			=> 'Birthday',
'Rookie'			=> 'Rookie',
'Weight'			=> 'Weight',
'Height'			=> 'Height',
'NoTrade'			=> 'No Trade',
'ForceWaiver'			=> 'Force<br /> Waivers',
'Status'			=> 'Status',
'Contract'			=> 'Contract',
'Type'			=> 'Type',
'Salary'			=> 'Salary',
'CurrentSalary'			=> 'Current<br />Salary',
'SalaryYear2'			=> 'Salary<br />Year 2',
'SalaryYear3'			=> 'Salary<br />Year 3',
'SalaryYear4'			=> 'Salary<br />Year 4',
'SalaryYear5'			=> 'Salary<br />Year 5',
'SalaryYear6'			=> 'Salary<br />Year 6',
'SalaryYear7'			=> 'Salary<br />Year 7',
'SalaryYear8'			=> 'Salary<br />Year 8',
'SalaryYear9'			=> 'Salary<br />Year 9',
'SalaryYear10'			=> 'Salary<br />Year 10',
'SalaryRemaining'			=> 'Salary<br />Remaining',
'SalaryAverage'			=> 'Salary<br />Average',
'SalaryAveRemaining'			=> 'Salary Ave<br />Remaining',
'1WayContract'			=> ' (1 Way Contract)',
'OutofPayroll'			=> ' (Out of Payroll)',
'Link'			=> 'Link',
'UFA'			=> 'UFA',
'RFA'			=> 'RFA',
);

$DynamicTitleLang = array(
'InDecendingOrderBy'		=> ' In Decending Order By ',
'InAscendingOrderBy'			=> ' In Ascending Order By ',
'PlayersInformation'			=> ' Players Information',
'PlayersRoster'			=> ' Players Roster',
'GoaliesRoster'			=> ' Goalies Roster',
'GoaliesStat'			=> ' Goalies Stats',
'PlayersStat'			=> ' Players Stats',
'TeamStat'			=> ' Team Stats',
'TeamStatVS'			=> ' Team Stats VS',
'PlayersInformation'			=> ' Players Information',
'ThisYearFreeAgents'			=> ' This Year Free Agents',
'NextYearFreeAgents'			=> ' Next Year Free Agents',
'YearsFreeAgents'			=> ' Years Free Agents',
'Unassigned'			=> 'Unassigned',
'Pro'			=> ' Pro',
'Farm'			=> ' Farm',
'All'			=> ' All',
'Top'			=> ' Top ',
'IndividualLeadersTitle'		=> 'Individual Leaders',
);

$TeamStatLang = array(
'Overall'		=> 'Overall',
'Home'			=> 'Home',
'Visitor'		=> 'Visitor',
'TeamName'			=> 'Team',
'Last10'		=> 'Last 10',
);

$StandingLang = array(
'Standing'		=> ' Standing',
'Wildcard'		=> 'Wildcard',
'Conference'		=> 'Conference',
'Division'		=> 'Division',
'Overall'		=> 'Overall',
);

$TeamLang = array(
'IncorrectTeam'		=> 'Incorrect Team',
'Teamnotfound'		=> 'Team not found',
'GM'		=> 'GM : ',
'Morale'		=> 'Morale : ',
'TeamOverall'		=> 'Team Overall : ',
'Roster'		=> 'Roster',
'Scoring'		=> 'Scoring',
'PlayersInfo'		=> 'Players Info',
'Lines'		=> 'Lines',
'TeamStats'		=> 'Team Stats',
'Schedule'		=> 'Schedule',
'Finance'		=> 'Finance',
'Depth'		=> 'Depth',
'History'		=> 'History',
'InjurySuspension'		=> 'Injury / Suspension',
'Scratches'		=> 'Scratches',
'TeamAverage'		=> 'TEAM AVERAGE',
'TotalPlayers'		=> 'Total Players',
'AverageAge'		=> 'Average Age',
'AverageWeight'		=> 'Average Weight',
'AverageHeight'		=> 'Average Height',
'AverageContract'		=> 'Average Contract',
'AverageYear1Salary'		=> 'Average Year 1 Salary',
'LineNumber'		=> 'Line #',
'Center'		=> 'Center',
'LeftWing'		=> 'Left Wing',
'RightWing'		=> 'Right Wing',
'Wing'		=> 'Wing',
'Defense'		=> 'Defense',
'Goalie'		=> 'Goalie',
'TimePCT'		=> 'Time %',
'PHY'		=> 'PHY',
'DF'		=> 'DF',
'OF'		=> 'OF',
'5vs5Forward'		=> '5 vs 5 Forward',
'5vs5Defense'		=> '5 vs 5 Defense',
'PowerPlayForward'		=> 'Power Play Forward',
'PowerPlayDefense'		=> 'Power Play Defense',
'PenaltyKill4PlayersForward'		=> 'Penalty Kill 4 Players Forward',
'PenaltyKill4PlayersDefense'		=> 'Penalty Kill 4 Players Defense',
'PenaltyKill3Players'		=> 'Penalty Kill 3 Players',
'4vs4Forward'		=> '4 vs 4 Forward',
'4vs4Defense'		=> '4 vs 4 Defense',
'LastMinutesOffensive'		=> 'Last Minutes Offensive',
'LastMinutesDefensive'		=> 'Last Minutes Defensive',
'ExtraForwards'		=> 'Extra Forwards',
'ExtraDefensemen'		=> 'Extra Defensemen',
'PenaltyShots'		=> 'Penalty Shots',
'CustomOTLinesForwards'		=> 'Custom OT Lines Forwards',
'CustomOTLinesDefensemen'		=> 'Custom OT Lines Defensemen',
'Normal'		=> 'Normal',
'PowerPlay'		=> 'PowerPlay',
'PenalityKill'		=> 'Penality Kill',
'DepthChart'		=> 'Depth Chart',
'Prospects'		=> 'Prospects',
'DraftPicks'		=> 'Draft Picks',
'Year'		=> 'Year',
);

$IndexLang = array(
'IndexTitle'		=> 'Index',
'LatestTransactions'		=> 'Latest Trade, Waiver, Injury & Suspension Transactions',
'News'		=> ' News',
'By'		=> ' By',
'On'		=> ' On',
'Top5Point'		=> ' Top 5 Points',
'Top5Goal'		=> ' Top 5 Goals',
'Top5Goalies'		=> ' Top 5 Goalies',
'Top20FreeAgents'		=> 'Top 20 Free Agents',
);

$TodayGamesLang = array(
'TodayGamesTitle'		=> ' Today\'s Games',
'BoxScore'		=> 'BoxScore',
'ProGames'		=> 'Pro Games ',
'FarmGames'		=> 'Farm Games ',
'UnknownGames'		=> 'Unknown Games',
);


break; 	/* End EN Language Pack */
} 

?>