<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title><? echo $titulo; ?></title>
<style>
body{
	background:url(images/bg.jpg) center repeat-y #2b4254;
	color: #111;
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;
	margin: 0;
	text-align: center;
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
			padding: 8px 0 0 15px;}
#sidebar ul ul li{
			padding: 8px 0 0 35px;}
#sidebar{
	width:170px;
	margin: 0;
	text-align: left;
	height: 250px;
	border: 0px solid red;
	}
#lcm{
	width:170px;
	padding-top: 80px;
	text-align: right;
	font-size:11px;
	border: 0px solid black;
	}
#right{
	width:170px;
	margin: 160px 125px 0 0;
	float: right;
	text-align: right;
	border: 0px solid blue;
	}
</style>

<script>              

  function viejo(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		vpl.style.visibility = 'hidden'; 
		npl.style.visibility = 'hidden'; 
		vpl.style.visibility = 'visible';
		npl.style.visibility = 'hidden';
		tv.style.visibility = 'visible';
		tn.style.visibility = 'hidden';
  }
  function nuevo(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		vpl.style.visibility = 'hidden'; 
		npl.style.visibility = 'hidden'; 
		vpl.style.visibility = 'hidden';
		npl.style.visibility = 'visible';  
		tn.style.visibility = 'visible';
		tv.style.visibility = 'hidden';
  }
  function egresado(booleano) {
		var vpl = document.getElementById("vplan");
		var npl = document.getElementById("nplan");
		var tv = document.getElementById("tv");
		var tn = document.getElementById("tn");
		npl.style.visibility = 'hidden';
		vpl.style.visibility = 'hidden';  
		tn.style.visibility = 'hidden';
		tv.style.visibility = 'hidden';
  }           

function unCheckRadio(btngrp)   
{     
    if(btngrp.length) {
		if( btngrp[0].checked == true ) {  
			btngrp[0].checked = false;  
	}  
    }  
    else {    
        if( btngrp.checked == true )  
            btngrp.checked == false;  
    }  
}  

</script>
</head>

<body>
	<div id="wrapper">
    <div id="main">
    <div id="title">
    <? echo $titulo; ?>
    </div>
    	<div id="form">