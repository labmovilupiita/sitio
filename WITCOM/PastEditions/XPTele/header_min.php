<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title><?php echo $titulo; ?></title>
<style>
body{
	background:url(images/bg.jpg) center repeat-y #2b4254;
	color: #111;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	margin: 0;
	text-align: center;
	}

.info, .success, .warning, .error, .validation {
	border: 1px solid;
	margin: 10px 0px;
	padding:15px 10px 15px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
}

.opts_taller{
    display: none;
}

.info {
	color: #00529B;
	background-color: #BDE5F8;
	background-image: url('info.png');	
}
.success {
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image: url('success.png');	

}

.warning {
	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url('warning.png');	

}
.error {
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('error.png');	
}

#wrapper{
	background-image: url(images/header.jpg);
	background-position: top center;
	background-repeat:no-repeat;
	width:1110px;
	min-height:589px;
	padding-top: 50px;
	margin: 0 auto;	
	text-align: center;
	}
#footer{
	background-image: url(images/footer.jpg);
	background-position: center center;
	background-repeat:no-repeat;
	width:1110px;
	height:80px;
	margin: 0 auto;
	}
#form{
	margin: 70px auto 0 auto;
	border: 0px solid black;
	width: 600px;
	}
#main{
	width: 690px;
	border: 0px solid black;
	float: left;
	margin-left: 90px;
	text-align:left;
	}

#title{
	width: 320px;
	margin: 85px 5px 0 370px;
	border: 0px solid black;
	font-size:24px;
	font-weight:bold;
	font-family: Georgia, "Times New Roman", Times, serif;
	text-align:center;
	}
a{
	font-weight:bold;
	color: #000000;
	text-decoration:none;
	}
a:hover{
	font-weight:bold;
	text-decoration:none;
	color:#CCCCCC;}
#sidebar ul{
		list-style-type:none;
padding: 0}
#sidebar ul li{
			padding: 8px 0 0 14px;}
#sidebar ul ul li{
			padding: 8px 0 0 34px;}
#sidebar{
	width:170px;
	margin: 0;
	text-align: left;
	height: 250px;
	border: 0px solid red;
	}
#lcm{
	width:170px;
	padding-top: 90px;
	text-align: right;
	font-size:11px;
	border: 0px solid black;
	}
#right{
	width:170px;
	margin: 150px 125px 0 0;
	float: right;
	text-align: right;
	border: 0px solid blue;
	}

#progressShade {
    display: none;
    background: #323232;
    position: fixed; 
    left: 0; 
    top: 0;
    width: 100%; 
    height: 100%;
    z-index: 100;
}

#progressbar {
    position: fixed;
    height: 12px; 
    width: 200px;
    margin: auto;
    top: 50%;
    left: 50%;
    z-index: 200;
}

#progressbar .ui-progressbar-value {
    background-image:url(images/pbar-ani.gif);
}

</style>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

