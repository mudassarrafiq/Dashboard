
<?php 




error_reporting(E_WARNING);




$apshmconusername = "sm_radi"; 
$apshmconpassword = "1234"; 
$apshmconhost = "localhost"; 
$apshmcondb = "sm_radi";
$apshmvarmsg="";
$apshmconsql = mysql_connect($apshmconhost,$apshmconusername,$apshmconpassword);
if (!$apshmconsql)
  {
  die('Could not connect: ' . mysql_error());
  }else{    
mysql_select_db($apshmcondb, $apshmconsql);
//echo('Connected');
}


//mysql_query("Insert Into projects (project_id) Values (".$i.") ");

//header('Location: http://www.shoaibmunir.com');
//exit;

$apshmreqpage=$_GET["page"];
$apshmreqid=$_GET["id"];
$apshmreqact=$_GET["act"];
$apshmreqvid=$_GET["vid"];
$apshmvarrand=mt_rand();

$apshmreqs=$_POST["s"];

//form start
if($apshmreqs=='y'){

$apshmreqid=$_POST["id"];
$apshmreqpage=$_POST["page"];
$apshmreqact=$_POST["act"];
$apshmreqvid=$_POST["vid"];
$apshmreqvaddress=$_POST["vaddress"];
$apshmreqvtype=$_POST["vtype"];
$apshmreqvstate=$_POST["vstate"];
$apshmreqvdescription=$_POST["vdescription"];
$apshmreqvestart=$_POST["ve_start"];
$apshmreqvlstart=$_POST["vl_start"];
$apshmreqveend=$_POST["ve_end"];
$apshmreqvlend=$_POST["vl_end"];
$apshmreqvisstarted=$_POST["vis_started"];
$apshmreqviscompleted=$_POST["vis_completed"];


//action start
if($apshmreqpage=='project'){
//project start
if($apshmreqact=='save'){

$apshmsqlquery = mysql_query("select  * from projects where project_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
 $apshmreqact='add';
 $apshmvarmsg='Your enterd id already exist in database. add to another one';
 }else{
 mysql_query("insert into projects (project_id) value(".$apshmreqvid.") ");
 $apshmvarmsg='New record has been added successfully';
 } 


}
//project end

}if($apshmreqpage=='sit'){
//Sites start
if($apshmreqact=='save'){
$apshmsqlquery = mysql_query("select  * from sites where site_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
 $apshmreqact='add';
 $apshmvarmsg='Your enterd id already exist in database. add to another one';
 }else{
 mysql_query("insert into sites (site_id, project_id, address_id) value(".$apshmreqvid.", ".$apshmreqid.", ".$apshmreqvaddress.") ");
 $apshmvarmsg='New record has been added successfully';
 } 


}elseif($apshmreqact=='update'){
$apshmsqlquery = mysql_query("select  * from sites where site_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
mysql_query("update sites set address_id=".$apshmreqvaddress." where (site_id=".$apshmreqvid.") ");
 $apshmvarmsg='Record has been updated successfully';
 }else{
 $apshmvarmsg='Record not exist!';
 } 


}
//Sites end
}if($apshmreqpage=='ps'){
//Projects States start
if($apshmreqact=='save'){
$apshmsqlquery = mysql_query("select  * from project_states where state_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
 $apshmreqact='add';
 $apshmvarmsg='Your enterd id already exist in database. add to another one';
 }else{
/*
 echo $apshmreqvid.'<br/>';
 echo $apshmreqid.'<br/>';
 echo $apshmreqvtype.'<br/>';
 echo $apshmreqvstate.'<br/>';
 echo $apshmreqvdescription.'<br/>';
 echo $apshmreqvestart.'<br/>';
 echo $apshmreqvlstart.'<br/>';
 echo $apshmreqveend.'<br/>';
 echo $apshmreqvlend.'<br/>';
 echo $apshmreqvisstarted.'<br/>';
 echo $apshmreqviscompleted.'<br/>';
 
 */ 
mysql_query("insert into project_states (state_id, site_id, type, state, description, e_start, l_start, e_end, l_end, is_started, is_completed) value(".$apshmreqvid.", ".$apshmreqid.", '".$apshmreqvtype."', '".$apshmreqvstate."', '".$apshmreqvdescription."', '".$apshmreqvestart."', '".$apshmreqvlstart."', '".$apshmreqveend."', '".$apshmreqvlend."', '".$apshmreqvisstarted."', '".$apshmreqviscompleted."') ");
 
 $apshmvarmsg='New record has been added successfully';
 } 


}elseif($apshmreqact=='update'){
$apshmsqlquery = mysql_query("select  * from project_states where state_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
mysql_query("update project_states set description='".$apshmreqvdescription."', type='".$apshmreqvtype."', state='".$apshmreqvstate."', e_start='".$apshmreqvestart."', l_start='".$apshmreqvlstart."', e_end='".$apshmreqveend."', l_end='".$apshmreqvlend."', is_started='".$apshmreqvisstarted."', is_completed='".$apshmreqviscompleted."' where (state_id=".$apshmreqvid.") ");
 $apshmvarmsg='Record has been updated successfully';
 }else{
 $apshmvarmsg='Record not exist!';
 } 


}
//Projects States end
}if($apshmreqpage=='sur'){



}if($apshmreqpage=='ns'){


}if($apshmreqpage=='at'){


}if($apshmreqpage=='ar'){

}if($apshmreqpage=='gro'){


}if($apshmreqpage=='use'){


}

//action end 
}
//form end

echo('<font style="color: #000000;font-size: 11px;font-family: Verdana, Arial, Helvetica, sans-serif;">');
if($apshmvarmsg!=''){
echo(' <h1><font color="#999900">'.$apshmvarmsg.'</font></h1> ');
}

if($apshmreqpage=="sit"){
 echo("<h1>Sites | <a href='index.php?page=".$apshmreqpage."&act=add&id=".$apshmreqid."&r=".$apshmvarrand."'>Add New</a></h1><br/>");
 
if($apshmreqact=="add"){

echo('<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="'.$apshmreqpage.'">
	<input type="hidden" name="id" id="id" value="'.$apshmreqid.'">
	    <input type="hidden" name="act" id="act" value="save">
    Project ID:     <strong>'.$apshmreqid.'</strong> <br/>
	Site ID:     <input type="text" name="vid" id="vid">  <font style="color: #666666;font-size: 9px;font-family: Verdana, Arial, Helvetica, sans-serif;">(Unique Required)</font> <br/>
	Address ID:     <input type="text" name="vaddress" id="vaddress"> <br/>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Add">

</form>

');
}elseif($apshmreqact=="edit"){

$apshmsqlquery = mysql_query("select  * from sites where site_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
 $apshmsqlrow = mysql_fetch_array($apshmsqlquery);
 echo('<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="'.$apshmreqpage.'">
	<input type="hidden" name="id" id="id" value="'.$apshmreqid.'">
	<input type="hidden" name="vid" id="vid" value="'.$apshmreqvid.'">
	    <input type="hidden" name="act" id="act" value="update">
    Project ID:     <strong>'.$apshmreqid.'</strong> <br/>
	Site ID:     <strong>'.$apshmreqvid.'</strong> <br/>
	Address ID:     <input type="text" name="vaddress" value="'.$apshmsqlrow['address_id'].'" id="vaddress"> <br/>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Update">

</form>

');
 }else{
 $apshmvarmsg='Record not exist!';
 } 


}else{ 
$ApshmSQLQuery = mysql_query("Select * From sites where project_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
   echo("<h2><a href='index.php?r=".$apshmvarrand."' style='color: #CC9900;'><< Projects</h2></a>");
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {

  echo('<br/>');
  echo("<h2><a href='index.php?page=ps&id=".$ApshmSQLRow['site_id']."&r=".$apshmvarrand."'>Projects States >></h2></a>");
  echo('<br/>');
  echo("Site ID: ".$ApshmSQLRow['site_id']." [<a href='index.php?page=".$apshmreqpage."&act=edit&vid=".$ApshmSQLRow['site_id']."&id=".$ApshmSQLRow['project_id']."&r=".$apshmvarrand."'>Edit</a>] ");
  echo('<br/>');
  echo("Project ID: ".$ApshmSQLRow['project_id']);
  echo('<br/>');
  echo("Address ID: ".$ApshmSQLRow['address_id']);
  echo('<hr/>');
}
}
}
}elseif($apshmreqpage=="ps"){
 echo("<h1>Projects States | <a href='index.php?page=".$apshmreqpage."&act=add&id=".$apshmreqid."&r=".$apshmvarrand."'>Add New</a></h1><br/>");

if($apshmreqact=="add"){

echo('<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="'.$apshmreqpage.'">
	<input type="hidden" name="id" id="id" value="'.$apshmreqid.'">
	    <input type="hidden" name="act" id="act" value="save">
    Site ID:     <strong>'.$apshmreqid.'</strong> <br/>
	State ID:     <input type="text" name="vid" id="vid">  <font style="color: #666666;font-size: 9px;font-family: Verdana, Arial, Helvetica, sans-serif;">(Unique Required)</font> <br/>
	type:     <input type="text" name="vtype" id="vtype"> <br/>
	state:     <input type="text" name="vstate" id="vstate"> <br/>
	description:     <input type="text" name="vdescription" id="vdescription"> <br/>
	e_start:     <input type="text" name="ve_start" id="ve_start"> <br/>
	l_start:     <input type="text" name="vl_start" id="vl_start"> <br/>
	e_end:     <input type="text" name="ve_end" id="ve_end"> <br/>
	l_end:     <input type="text" name="vl_end" id="vl_end"> <br/>
	is_started:     <input type="text" name="vis_started" id="vis_started"> <br/>
	is_completed:     <input type="text" name="vis_completed" id="vis_completed"> <br/>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Add">

</form>

');
}elseif($apshmreqact=="edit"){

$apshmsqlquery = mysql_query("select  * from project_states where state_id=".$apshmreqvid." ");
$apshmsqlnumrow = mysql_num_rows($apshmsqlquery);

 if ($apshmsqlnumrow>0){ 
 $apshmsqlrow = mysql_fetch_array($apshmsqlquery);
 echo('<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="'.$apshmreqpage.'">
	<input type="hidden" name="id" id="id" value="'.$apshmreqid.'">
	<input type="hidden" name="vid" id="vid" value="'.$apshmreqvid.'">
	    <input type="hidden" name="act" id="act" value="update">
    Site ID:     <strong>'.$apshmreqid.'</strong> <br/>
	State ID:     <strong>'.$apshmreqvid.'</strong> <br/>
	type:     <input type="text" name="vtype" value="'.$apshmsqlrow['type'].'" id="vtype"> <br/>
	state:     <input type="text" name="vstate" value="'.$apshmsqlrow['state'].'"  id="vstate"> <br/>
	description:     <input type="text" name="vdescription" value="'.$apshmsqlrow['description'].'"  id="vdescription"> <br/>
	e_start:     <input type="text" name="ve_start" value="'.$apshmsqlrow['e_start'].'"  id="ve_start"> <br/>
	l_start:     <input type="text" name="vl_start" value="'.$apshmsqlrow['l_start'].'"  id="vl_start"> <br/>
	e_end:     <input type="text" name="ve_end" value="'.$apshmsqlrow['e_end'].'"  id="ve_end"> <br/>
	l_end:     <input type="text" name="vl_end" value="'.$apshmsqlrow['l_end'].'"  id="vl_end"> <br/>
	is_started:     <input type="text" name="vis_started" value="'.$apshmsqlrow['is_started'].'"  id="vis_started"> <br/>
	is_completed:     <input type="text" name="vis_completed" value="'.$apshmsqlrow['is_completed'].'"  id="vis_completed"> <br/>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Update">

</form>

');
 }else{
 $apshmvarmsg='Record not exist!';
 } 


}else{ 
 echo("<h2><a href='index.php?page=sit&id=".$apshmreqid."&r=".$apshmvarrand."' style='color: #CC9900;'><< Sites</h2></a>");
$ApshmSQLQuery = mysql_query("Select * From project_states where site_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {  
  echo('<br/>');
  echo("<h2><a href='index.php?page=sur&id=".$ApshmSQLRow['state_id']."'>Surveys >></h2></a>");
  echo('<br/>');
  echo("<h2><a href='index.php?page=ns&id=".$ApshmSQLRow['state_id']."'>Next Sates >></h2></a>");
  echo('<br/>');
  echo("<h2><a href='index.php?page=at&id=".$ApshmSQLRow['state_id']."'>Attachments >></h2></a>");
  echo('<br/>');
  echo("state ID: ".$ApshmSQLRow['state_id']." [<a href='index.php?page=".$apshmreqpage."&act=edit&vid=".$ApshmSQLRow['state_id']."&id=".$ApshmSQLRow['site_id']."&r=".$apshmvarrand."'>Edit</a>] ");
  echo('<br/>');
  echo("site ID: ".$ApshmSQLRow['site_id']);
  echo('<br/>');
  echo("type: ".$ApshmSQLRow['type']);
  echo('<br/>');
  echo("state: ".$ApshmSQLRow['state']);
  echo('<br/>');
  echo("Description: ".$ApshmSQLRow['description']);
  echo('<br/>');
  echo("e start: ".$ApshmSQLRow['e_start']);
  echo('<br/>');
  echo("e end: ".$ApshmSQLRow['e_end']);
  echo('<br/>');
  echo("l start: ".$ApshmSQLRow['l_start']);
  echo('<br/>');
  echo("l end: ".$ApshmSQLRow['l_end']);
  echo('<br/>');
  echo("Started: ".$ApshmSQLRow['is_started']);
  echo('<br/>');
  echo("Completed: ".$ApshmSQLRow['is_completed']);
  echo('<hr/>');
}
}
}
}elseif($apshmreqpage=="sur"){
 echo('<h1>Surveys</h1><br/>');
$ApshmSQLQuery = mysql_query("Select * From surveys where state_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=ps&id=".$ApshmSQLRow['state_id']."'><< Projects States</h2></a>");
  echo('<br/>');
  echo("Surveys ID: ".$ApshmSQLRow['survey_id']);
  echo('<br/>');
  echo("Candidate ID: ".$ApshmSQLRow['candidate_id']);
  echo('<br/>');
  echo("State ID: ".$ApshmSQLRow['state_id']);
  echo('<br/>');
  echo("Details: ".$ApshmSQLRow['details']);
  echo('<hr/>');
}
}
}elseif($apshmreqpage=="ns"){
 echo('<h1>Next Sates</h1><br/>');
$ApshmSQLQuery = mysql_query("Select * From next_states where from_state_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=ps&id=".$ApshmSQLRow['from_state_id']."'><< Projects States</h2></a>");
  echo('<br/>');
  echo("from sate id: ".$ApshmSQLRow['from_state_id']);
  echo('<br/>');
  echo("condition : ".$ApshmSQLRow['condition']);
  echo('<br/>');
  echo("To Node: ".$ApshmSQLRow['to_node']);
  echo('<hr/>');
  }
}
}elseif($apshmreqpage=="at"){
  echo("<h1>Attachement | <a href='index.php?page=".$apshmreqpage."&act=add&id=".$apshmreqid."&r=".$apshmvarrand."'>Add New</a></h1><br/>");

if($apshmreqact=="add"){
echo('<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="'.$apshmreqpage.'">
	<input type="hidden" name="id" id="id" value="'.$apshmreqid.'">
	    <input type="hidden" name="act" id="act" value="save">
    Project ID:     <strong>'.$apshmreqid.'</strong> <br/>
	Site ID:     <input type="text" name="vid" id="vid">  <font style="color: #666666;font-size: 9px;font-family: Verdana, Arial, Helvetica, sans-serif;">(Unique Required)</font> <br/>
	Address ID:     <input type="text" name="vaddress" id="vaddress"> <br/>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Add">

</form>

');
}elseif($apshmreqact=="edit"){

}else{
$ApshmSQLQuery = mysql_query("Select * From attachements where state_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=ps&id=".$ApshmSQLRow['state_id']."'><< Projects States</h2></a>");
  echo('<br/>');
  echo("<h2><a href='index.php?page=ar&id=".$ApshmSQLRow['attachement_id']."'>Attachement Access rights >></h2></a>");
  echo('<br/>');
  echo("attachement id: ".$ApshmSQLRow['attachement_id']);
  echo('<br/>');
  echo("state id: ".$ApshmSQLRow['state_id']);
  echo('<br/>');
  echo("filename: ".$ApshmSQLRow['filename']);
  echo('<hr/>');
  }
}
}
}elseif($apshmreqpage=="ar"){
 echo('<h1>Attachement Access rights</h1><br/>');
if($apshmreqact=="add"){

}elseif($apshmreqact=="edit"){

}else{
$ApshmSQLQuery = mysql_query("Select * From att_access_rights where attachement_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=at&id=".$ApshmSQLRow['attachement_id']."'><< Attachement</h2></a>");
  echo('<br/>');
  echo("<h2><a href='index.php?page=gro&id=".$ApshmSQLRow['attachement_id']."'>Groups >></h2></a>");
  echo('<br/>');
  echo("attachement id: ".$ApshmSQLRow['attachement_id']);
  echo('<br/>');
  echo("group id: ".$ApshmSQLRow['group_id']);
  echo('<br/>');
  echo("list: ".$ApshmSQLRow['list']);
  echo('<br/>');
  echo("add: ".$ApshmSQLRow['add']);
  echo('<br/>');
  echo("edit: ".$ApshmSQLRow['edit']);
  echo('<br/>');
  echo("delete: ".$ApshmSQLRow['delete']);
  echo('<hr/>');
  }
}
}
}elseif($apshmreqpage=="gro"){
 echo('<h1>Groups</h1><br/>');
 if($apshmreqact=="add"){

}elseif($apshmreqact=="edit"){

}else{
$ApshmSQLQuery = mysql_query("Select * From groups where group_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=ar&id=".$ApshmSQLRow['group_id']."'><< Attachement Access rights</h2></a>");
  echo('<br/>');
  echo("<h2><a href='index.php?page=use&id=".$ApshmSQLRow['group_id']."'>Users >></h2></a>");
  echo('<br/>');
  echo("group id: ".$ApshmSQLRow['group_id']);
  echo('<br/>');
  echo("Name: ".$ApshmSQLRow['name']);
  echo('<br/>');
  echo('<hr/>');
  }
}
}
}elseif($apshmreqpage=="use"){
 echo('<h1>Users</h1><br/>');
if($apshmreqact=="add"){

}elseif($apshmreqact=="edit"){

}else{
$ApshmSQLQuery = mysql_query("Select * From users where group_id=".$apshmreqid);
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=gro&id=".$ApshmSQLRow['group_id']."'><< Groups</h2></a>");
  echo('<br/>');
  echo("User id: ".$ApshmSQLRow['user_id']);
  echo('<br/>');
   echo("person id: ".$ApshmSQLRow['person_id']);
  echo('<br/>');
  echo("group id: ".$ApshmSQLRow['group_id']);
  echo('<br/>');
  echo("login: ".$ApshmSQLRow['login']);
  echo('<br/>');
  echo("password: ".$ApshmSQLRow['password']);
  echo('<br/>');
  echo("valid from: ".$ApshmSQLRow['valid_from']);
  echo('<br/>');
  echo("valid until: ".$ApshmSQLRow['valid_until']);
  echo('<hr/>');
  }
}
}
}else{
echo("<h1>Projects | <a href='index.php?act=add&r=".$apshmvarrand."'>Add New</a></h1><br/>");
if($apshmreqact=="add"){
echo('

<form name="apshmfrm" method="post" action="index.php" id="apshmfrm">
    <input type="hidden" name="s" id="s" value="y">
    <input type="hidden" name="page" id="page" value="project">
	    <input type="hidden" name="act" id="act" value="save">
    Project ID: 
    <input type="text" name="vid" id="vid"> <font style="color: #666666;font-size: 9px;font-family: Verdana, Arial, Helvetica, sans-serif;">(Unique Required)</font>
  <br>
<br>

    <input type="submit" name="button" id="button" value="Add">

</form>

');

}else{ 
$ApshmSQLQuery = mysql_query("Select * From projects");
  $ApshmSQLNumRow = mysql_num_rows($ApshmSQLQuery);
 if ($ApshmSQLNumRow>0) 
 {
 while($ApshmSQLRow = mysql_fetch_array($ApshmSQLQuery))
  {
  echo("<h2><a href='index.php?page=sit&id=".$ApshmSQLRow['project_id']."&r=".$apshmvarrand."'>Sites >></h2></a>");
  echo("Project ID: ".$ApshmSQLRow['project_id']." ");
  echo('<hr/>');
}
}
}
}
echo('</font>');



?>


