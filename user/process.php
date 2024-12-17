<?php 

session_start();

include '../include/db_connection.php';
$email = $_POST['email'];

	if(empty($_POST['heart_failure1'])){
$heart_failure1 = "0";
}
else
{
if($_POST['heart_failure1'] == "heart failure"){
$heart_failure1= "20";	
}
else
{
$heart_failure1 = "0";	
}
}

	if(empty($_POST['heart_failure2'])){
$heart_failure2 = "0";
}
else
{
if($_POST['heart_failure2'] == "heart failure"){
$heart_failure2= "5";	
}
else
{
$heart_failure2 = "0";	
}
}

if(empty($_POST['heart_failure3'])){
$heart_failure3 = "0";
}
else
{
if($_POST['heart_failure3'] == "heart failure"){
$heart_failure3= "10";	
}
else
{
$heart_failure3 = "0";	
}
}
	
if(empty($_POST['heart_failure4'])){
$heart_failure4 = "0";
}
else
{
if($_POST['heart_failure4'] == "heart failure"){
$heart_failure4= "5";	
}
else
{
$heart_failure4 = "0";	
}
}

if(empty($_POST['heart_failure5'])){
$heart_failure5 = "0";
}
else
{
if($_POST['heart_failure5'] == "heart failure"){
$heart_failure5= "20";	
}
else
{
$heart_failure5 = "0";	
}
}




if(empty($_POST['stroke1'])){
$stroke1 = "0";
}
else
{
if($_POST['stroke1'] == "stroke"){
$stroke1= "30";	
}
else
{
$stroke1 = "0";	
}
}



if(empty($_POST['stroke2'])){
$stroke2 = "0";
}
else
{
if($_POST['stroke2'] == "stroke"){
$stroke2= "20";	
}
else
{
$stroke2 = "0";	
}
}



if(empty($_POST['stroke3'])){
$stroke3 = "0";
}
else
{
if($_POST['stroke3'] == "stroke"){
$stroke3= "30";	
}
else
{
$stroke3 = "0";	
}
}


if(empty($_POST['stroke4'])){
$stroke4 = "0";
}
else
{
if($_POST['stroke4'] == "stroke"){
$stroke4= "10";	
}
else
{
$stroke4 = "0";	
}
}



if(empty($_POST['stroke7'])){
$stroke7 = "0";
}
else
{
if($_POST['stroke7'] == "stroke"){
$stroke7= "10";	
}
else
{
$stroke7 = "0";	
}
}


if(empty($_POST['coronary_heart_disease1'])){
$coronary_heart_disease1 = "0";
}
else
{
if($_POST['coronary_heart_disease1'] == "coronary heart disease"){
$coronary_heart_disease1= "30";	
}
else
{
$coronary_heart_disease1 = "0";	
}
}



if(empty($_POST['coronary_heart_disease3'])){
$coronary_heart_disease3 = "0";
}
else
{
if($_POST['coronary_heart_disease3'] == "coronary heart disease"){
$coronary_heart_disease3= "30";	
}
else
{
$coronary_heart_disease3 = "0";	
}
}

if(empty($_POST['coronary_heart_disease4'])){
$coronary_heart_disease4 = "0";
}
else
{
if($_POST['coronary_heart_disease4'] == "coronary heart disease"){
$coronary_heart_disease4= "20";	
}
else
{
$coronary_heart_disease4 = "0";	
}
}

if(empty($_POST['coronary_heart_disease6'])){
$coronary_heart_disease6 = "0";
}
else
{
if($_POST['coronary_heart_disease6'] == "coronary heart disease"){
$coronary_heart_disease6= "10";	
}
else
{
$coronary_heart_disease6 = "0";	
}
}

if(empty($_POST['coronary_heart_disease7'])){
$coronary_heart_disease7 = "0";
}
else
{
if($_POST['coronary_heart_disease7'] == "coronary heart disease"){
$coronary_heart_disease7= "10";	
}
else
{
$coronary_heart_disease7 = "0";	
}
}
if(empty($_POST['coronary_heart_disease8'])){
$coronary_heart_disease8 = "0";
}
else
{
if($_POST['coronary_heart_disease8'] == "coronary heart disease"){
$coronary_heart_disease8= "30";	
}
else
{
$coronary_heart_disease8 = "0";	
}
}


if(empty($_POST['Cor_pulmonale1'])){
$Cor_pulmonale1 = "0";
}
else
{
if($_POST['Cor_pulmonale1'] == "Cor pulmonale"){
$Cor_pulmonale1= "20";	
}
else
{
$Cor_pulmonale1 = "0";	
}
}

if(empty($_POST['Cor_pulmonale2'])){
$Cor_pulmonale2 = "0";
}
else
{
if($_POST['Cor_pulmonale2'] == "Cor pulmonale"){
$Cor_pulmonale2= "10";	
}
else
{
$Cor_pulmonale2 = "0";	
}
}
if(empty($_POST['Cor_pulmonale3'])){
$Cor_pulmonale3 = "0";
}
else
{
if($_POST['Cor_pulmonale3'] == "Cor pulmonale"){
$Cor_pulmonale3= "20";	
}
else
{
$Cor_pulmonale3 = "0";	
}
}
if(empty($_POST['Cor_pulmonale4'])){
$Cor_pulmonale4 = "0";
}
else
{
if($_POST['Cor_pulmonale4'] == "Cor pulmonale"){
$Cor_pulmonale4= "30";	
}
else
{
$Cor_pulmonale4 = "0";	
}
}
if(empty($_POST['Cor_pulmonale5'])){
$Cor_pulmonale5 = "0";
}
else
{
if($_POST['Cor_pulmonale5'] == "Cor pulmonale"){
$Cor_pulmonale5= "30";	
}
else
{
$Cor_pulmonale5 = "0";	
}
}
if(empty($_POST['Cor_pulmonale6'])){
$Cor_pulmonale6 = "0";
}
else
{
if($_POST['Cor_pulmonale6'] == "Cor pulmonale"){
$Cor_pulmonale6= "30";	
}
else
{
$Cor_pulmonale6 = "0";	
}
}
if(empty($_POST['Cor_pulmonale7'])){
$Cor_pulmonale7 = "0";
}
else
{
if($_POST['Cor_pulmonale7'] == "Cor pulmonale"){
$Cor_pulmonale7= "30";	
}
else
{
$Cor_pulmonale7 = "0";	
}
}
if(empty($_POST['Cor_pulmonale8'])){
$Cor_pulmonale8 = "0";
}
else
{
if($_POST['Cor_pulmonale8'] == "Cor pulmonale"){
$Cor_pulmonale8= "20";	
}
else
{
$Cor_pulmonale8 = "0";	
}
}
if(empty($_POST['Cor_pulmonale9'])){
$Cor_pulmonale9 = "0";
}
else
{
if($_POST['Cor_pulmonale9'] == "Cor pulmonale"){
$Cor_pulmonale9= "20";	
}
else
{
$Cor_pulmonale9 = "0";	
}
}
if(empty($_POST['Cor_pulmonale10'])){
$Cor_pulmonale10 = "0";
}
else
{
if($_POST['Cor_pulmonale10'] == "Cor pulmonale"){
$Cor_pulmonale10= "20";	
}
else
{
$Cor_pulmonale10 = "0";	
}
}

if(empty($_POST['cardiac_dysrhythmia'])){
$E = "0";
}
else
{
if($_POST['cardiac_dysrhythmia'] == "cardiac dysrhythmia"){
$E= "100";	
}
else
{
$E = "0";	
}
}

$A = $heart_failure1 + $heart_failure2 + $heart_failure3 + $heart_failure4 + $heart_failure5;	
$B = $stroke1 + $stroke2 + $stroke3 + $stroke4 + $stroke7;
$C = $Cor_pulmonale1 + $Cor_pulmonale2 + $Cor_pulmonale3 + $Cor_pulmonale4 + $Cor_pulmonale5 + $Cor_pulmonale6 + $Cor_pulmonale7 + $Cor_pulmonale8 + $Cor_pulmonale9 + $Cor_pulmonale10;

$D = $coronary_heart_disease1 + $coronary_heart_disease3 + $coronary_heart_disease4  + $coronary_heart_disease6 + $coronary_heart_disease7+ $coronary_heart_disease8;


if ($A>=40 AND $B>=70 AND $C >=110 AND $D >= 180 AND $E >=100 ) {
	$comment = "Go and see a Doctor";
}

elseif ($A >=40 AND $B >=70) {
	if ($A > $B) {
		$comment = "High Chances of Heart Failure & Stroke (".$A."/".$B.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.";
	} else {
		$comment = "High Chances of Stroke & Heart Failure  (".$B."/".$A.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.";
	}
}elseif ($A >=40 AND $C >=110) {
	if ($A > $C) {
		$comment = "High Chances of Heart Failure & Cor-Pulmonale (".$A."/".$C.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";

	} else {
		$comment = "High Chances of Cor-Pulmonale & Heart Failure  (".$C."/".$A.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}
}elseif ($A >=40 AND $D >=180) {
	if ($A > $D) {
		$comment = "High Chances of Heart Failure & Coronary Heart Disease (".$A."/".$D.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen";
	} else {
		$comment = "High Chances of Coronary Heart Disease & Heart Failure  (".$D."/".$A.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen";
	}
}elseif ($A >=40 AND $E >=100) {
	if ($A > $E) {
		$comment = "High Chances of Heart Failure & Cardiac Dysrhythmia (".$A."/".$E.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	} else {
		$comment = "High Chances of Cardiac Dysrhythmia & Heart Failure  (".$E."/".$A.")";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	}
}elseif ($B >=70 AND $C >=110) {
	if ($B > $C) {
		$comment = "High Chances of Stroke & Cor-Pulmonale  (".$B."/".$C.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	} else {
		$comment = "High Chances of Cor Pulmonale & Stroke  (".$C."/".$B.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}
}
elseif ($B >=70 AND $D >=180) {
	if ($B > $D) {
		$comment = "High Chances of Stroke & Coronary Heart Disease (".$B."/".$D.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Coronary Heart Disease & Stroke  (".$D."/".$B.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}
elseif ($B >=70 AND $E >=100) {
	if ($B > $E) {
		$comment = "High Chances of Stroke & Cardiac Dysrhythmia (".$B."/".$E.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	} else {
		$comment = "High Chances of Cardiac Dysrhythmia  & Stroke  (".$E."/".$B.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	}
}

elseif ($C >=110 AND $B >=70) {
	if ($C > $B) {
		$comment = "High Chances of Cor-Pulmonale & Stroke (".$C."/".$B.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	} else {
		$comment = "High Chances of Stroke  & Cor-Pulmonale  (".$B."/".$C.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}
}
elseif ($C >=110 AND $D >=180) {
	if ($C > $D) {
		$comment = "High Chances of Cor-Pulmonale & Coronary Heart Disease (".$C."/".$D.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Coronary Heart Disease  & Cor-Pulmonale  (".$D."/".$C.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}
elseif ($C >=110 AND $E >=100) {
	if ($C > $D) {
		$comment = "High Chances of Cor-Pulmonale & Cardiac Dysrhythmia (".$C."/".$E.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	} else {
		$comment = "High Chances of Cardiac Dysrhythmia  & Cor-Pulmonale  (".$E."/".$C.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	}
}

elseif ($D >=180 AND $B >=70) {
	if ($D > $B) {
		$comment = "High Chances of Coronary Heart Disease & Stroke (".$D."/".$B.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Stroke  & Coronary Heart Disease  (".$B."/".$D.")";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}

elseif ($D >=180 AND $C >=110) {
	if ($D > $C) {
		$comment = "High Chances of Coronary Heart Disease & Cor-Pulmonale (".$D."/".$C.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Cor Pulmonale & Coronary Heart Disease  (".$C."/".$D.")";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}
elseif ($D >=180 AND $E >=100) {
	if ($D > $E) {
		$comment = "High Chances of Coronary Heart Disease & Cardiac Dysrhythmia(".$D."/".$E.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Cardiac Dysrhythmia & Coronary Heart Disease  (".$E."/".$D.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}
elseif ($E >=100 AND $B >=70) {
	if ($E > $B) {
		$comment = "High Chances of Cardiac Dysrhythmia & Stroke(".$E."/".$B.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen..";
	} else {
		$comment = "High Chances of Stroke & Cardiac Dysrhythmia  (".$B."/".$E.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.";
	}
}
elseif ($E >=100 AND $C >=110) {
	if ($E > $C) {
		$comment = "High Chances of Cardiac Dysrhythmia & Cor-Pulmonale(".$E."/".$C.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	} else {
		$comment = "High Chances of Cor-Pulmonale & Cardiac Dysrhythmia  (".$C."/".$E.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}
}
elseif ($E >=100 AND $D >=180) {
	if ($E > $D) {
		$comment = "High Chances of Cardiac Dysrhythmia & Coronary Heart Disease (".$E."/".$D.")";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	} else {
		$comment = "High Chances of Coronary Heart Disease & Cardiac Dysrhythmia  (".$D."/".$E.")";
				$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.<br><span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
}

elseif ($A >=$B AND $A >=$C AND $A >=$D AND $A >=$E) {
	if ($A >= 40) {
		$comment = "High Chances of Heart Failure (100%)";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.";
	}else{
		$comment = "Slight Chances of Heart Failure, Try see a doctor";
		$treatment = "<span>Heart Failure: </span> A chronic condition in which the heart doesn't pump blood as well as it should.";
	}
		
}elseif ($B >=$A AND $B >=$C AND $B >=$D AND $B >=$E) {
	if ($B >= 70) {
		$comment = "High Chances of Stroke (100%)";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.";
	}else{
		$comment = "Slight Chances of Stroke, Try see a doctor";
		$treatment = "<span>Stroke: </span> Stroke occurs when the blood supply to part of the brain is interrupted or reduced, preventing brain tissue from getting oxygen.";
	}
		
}elseif ($C >=$A AND $C >=$B AND $C >=$D AND $C >=$E) {
		if ($C >= 110) {
		$comment = "High Chances of Cor-Pulmonale (100%)";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}else{
		$comment = "Slight Chances of Cor-Pulmonale, Try see a doctor";
		$treatment = "<span>Cor-Pulmonale: </span> Cor pulmonale is a condition that causes the right side of the heart to fail.";
	}
		
}elseif ($D >=$A AND $D >=$B AND $D >=$C AND $D >=$E) {
	if ($D >= 180) {
		$comment = "High Chances of Coronary Heart Disease (100%)";
		$treatment = "<span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}else{
		$comment = "Slight Chances of Coronary Heart Disease, Try see a doctor";
		$treatment = "<span>Coronary heart disease: </span> Coronary heart disease is a type of heart disease that happens when the arteries of the heart cannot deliver enough oxygen.";
	}
		
}elseif ($E >=$A AND $E >=$B AND $E >=$C AND $E >=$D) {
	if ($D >= 180) {
		$comment = "High Chances of Cardiac Dysrhythmia (100%)";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	}else{
		$comment = "Slight Chances of Cardiac Dysrhythmia, Try see a doctor";
		$treatment = "<span>Cardiac Dysrhythmia: </span> Improper beating of the heart, whether irregular, too fast or too slow.";
	}
		
}else{
	$comment = "No heart disease detected, try see a doctor";
}

$sql = "INSERT INTO diagnosis (email, heart_failure1, heart_failure2, heart_failure3, heart_failure4, heart_failure5, stroke1, stroke2, stroke3, stroke4, stroke7, Cor_pulmonale1, Cor_pulmonale2, Cor_pulmonale3, Cor_pulmonale4, Cor_pulmonale5, Cor_pulmonale6, Cor_pulmonale7, Cor_pulmonale8, Cor_pulmonale9, Cor_pulmonale10, coronary_heart_disease1, coronary_heart_disease3, coronary_heart_disease4, coronary_heart_disease6, coronary_heart_disease7, coronary_heart_disease8, cardiac_dysrhythmia, recommendation,binfo) VALUES ('$email', '$heart_failure1', '$heart_failure2', '$heart_failure3', '$heart_failure4', '$heart_failure5', '$stroke1', '$stroke2', '$stroke3', '$stroke4', '$stroke7', '$Cor_pulmonale1', '$Cor_pulmonale2', '$Cor_pulmonale3', '$Cor_pulmonale4', '$Cor_pulmonale5', '$Cor_pulmonale6', '$Cor_pulmonale7', '$Cor_pulmonale8', '$Cor_pulmonale9', '$Cor_pulmonale10', '$coronary_heart_disease1', '$coronary_heart_disease3', '$coronary_heart_disease4', '$coronary_heart_disease6', '$coronary_heart_disease7', '$coronary_heart_disease8', '$E', '$comment','$treatment')";
if (mysqli_query($dbcon,$sql)) {
	$test = "UPDATE users SET status = 'DIAGNOSED' WHERE email = '$email'";
	mysqli_query($dbcon,$test);
	echo "success";
}else{
	mysqli_error($dbcon);
}
	


?>