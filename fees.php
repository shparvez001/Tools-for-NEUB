<!DOCTYPE html>

<html lang="en">
<head>
<?php include 'PDFInfo.php'; ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<!--    -->





<!--	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">	  -->

<!--
<link rel="stylesheet" href="http://eee.shparvez.net/includes/theme.css">
-->
<style type="text/css">

td.one {background: #acfff0; bgcolor="#acfff0";	}

td.two {background: #ffdaa1; bgcolor="#ffdaa1";	}


</style>



<title>NEUB CSE Fee Calculation</title>


<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>

</head>



<body >

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img alt="SHP" src="" height="30" ></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<li ><a title="Home"  href="/">Home</a></li>
<li ><a title="Contact"  href="fees.php">Semester Fee Calculator</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br><br><br><br>


<div class="container-fluid">

<div class="row">
<div class=" col-sm-1 col-md-1 col-lg-1">
</div>

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
<h3>Calculate Fees Based on Data from Excel File</h3>
<p style="text-align:center;">**Only applicable for no fail/retake course.</p>

Registration Number :<input maxlength="12" pattern="[0-9]{12}" type="text" name="reg" id="reg" placeholder="2001030200**" class="form-control" onkeyup="calculate_fee()">
Current waiver % :<input maxlength="3" pattern="[0-9]{3}" type="text" name="current-waiver" id="current-waiver" placeholder="40" class="form-control" onkeyup="calculate_fee()">
New waiver % :<input maxlength="3" pattern="[0-9]{3}" type="text" name="new-waiver" id="new-waiver" placeholder="50" class="form-control" onkeyup="calculate_fee()">

Fees with Current waiver :<input maxlength="8" pattern="[0-9]{8}" type="text" name="fees" id="fees" placeholder="18450" class="form-control" onkeyup="calculate_fee()">
<br>
<p> New Fees with new waiver is: <b><span id="new-fee"></span></b></p>
<p>Breakdown: <b><span id="breakdown"></span></b></p>
<br>
<span id="calculation"></span>

<script>
function calculate_fee()
{
	var reg=document.getElementById("reg").value;
	var currWaiver=document.getElementById("current-waiver").value;
	var newWaiver=document.getElementById("new-waiver").value;
	var oldFees=document.getElementById("fees").value;
	console.log(reg+"   "+currWaiver+"   "+newWaiver+"   "+oldFees);

	var fixedFee=3600;
	if(oldFees>0)
	{
		if(reg<170000000000)
		{
			fixedFee=2100;
		}
		console.log(fixedFee);
		var creditFees=oldFees-fixedFee;
		creditFees=creditFees*(100-newWaiver)/(100-currWaiver);
		creditFees=creditFees+fixedFee;
		console.log(creditFees);
		document.getElementById("new-fee").innerText=creditFees;
		var aa=creditFees-fixedFee;
		document.getElementById("breakdown").innerText="\nFixed Fees (Semester Fee + Lab Fee): "+fixedFee+"\nCredit Fees: "+aa;

		var waiveredCreditFee=oldFees-fixedFee;
		unwaiveredCred=waiveredCreditFee/(100-currWaiver)*100;
		newCred=unwaiveredCred*(100-newWaiver)/100;
		document.getElementById("calculation").innerText="Calculation Steps: \nOld Total Fee: "+oldFees+"\nSemester Fee + Lab Fee: "+fixedFee+"\nOld Waivered Credit Fees: "+waiveredCreditFee+"\n UnWaivered Credit Fees: "+unwaiveredCred+"\n New Waivered Cretir Fees: "+newCred+"\n Total Fee: "+fixedFee+" \+ "+newCred+" = "+creditFees;
	}
}
</script>

</div>

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
<h3>Calculate Fees Based on Credits Taken</h3>
Registration Number :<input maxlength="12" pattern="[0-9]{12}" type="text" name="reg2" id="reg2" placeholder="2001030200**" class="form-control" onkeyup="calculate_fee2()">
Total Credits Taken :<input maxlength="5" pattern="[0-9]{5}" type="text" name="credits" id="credits" placeholder="15" class="form-control" onkeyup="calculate_fee2()">
<p>Total Credits=Regular/Drop Credits + Fail Credits.<br> Total credits in the field above should contain both Fail/Retake and Regular/Drop Credits.</p>
Fail/Retake Credits Taken :<input maxlength="5" pattern="[0-9]{5}" type="text" name="failCredits" id="failCredits" placeholder="3" class="form-control" onkeyup="calculate_fee2()">
New Waiver Percent :<input maxlength="3" pattern="[0-9]{3}" type="text" name="waiver" id="waiver" placeholder="55" class="form-control" onkeyup="calculate_fee2()">

<br>
<p> New Fees with new waiver is: <b><span id="new-fee2"></span></b></p>
<p>Breakdown: <b><span id="breakdown2"></span></b></p>


<script>
function calculate_fee2()
{
	var reg=document.getElementById("reg2").value;
	var cred=document.getElementById("credits").value;
	var failCred=document.getElementById("failCredits").value;
	var waiver=document.getElementById("waiver").value;
	var regularCred=cred-failCred;

	var newFees=0;
	var creditFees=0;
	var fixedFee=3600;
	var perCredit=1650;

		if(reg>120000000000&&reg<170000000000)
		{
			fixedFee=2100;
			perCredit=1500
		}

		creditFees=cred*perCredit;
		waiveredFees=regularCred*perCredit*waiver/100;
		console.log(fixedFee);
		newFees=fixedFee+creditFees-waiveredFees;
		console.log(newFees);
		document.getElementById("new-fee2").innerText=newFees;
		document.getElementById("breakdown2").innerText="\nFixed Fees (Semester Fee + Lab Fee): "+fixedFee+"\nCredit Fees ("+cred+" * "+perCredit+"): "+creditFees+"\nWaivered Fee: "+waiveredFees+"\nTotal="+fixedFee+" \+ "+creditFees+" - "+waiveredFees+" = "+newFees;

}

/* old COde
function calculate_fee2()
{
	var reg=document.getElementById("reg2").value;
	var cred=document.getElementById("credits").value;
	var waiver=document.getElementById("waiver").value;

	var newFees=0;
	var creditFees=0;
	var fixedFee=3600;
	var perCredit=1650;

		if(reg<170000000000)
		{
			fixedFee=2100;
			perCredit=1500
		}

		creditFees=cred*perCredit*(100-waiver)/100;
		console.log(fixedFee);
		newFees=fixedFee+creditFees;
		console.log(newFees);
		document.getElementById("new-fee2").innerText=newFees;
		document.getElementById("breakdown2").innerText="\nFixed Fees (Semester Fee + Lab Fee): "+fixedFee+"\nCredit Fees ("+cred+" * "+perCredit+"): "+creditFees;

}
*/
</script>

</div>


<div class=" col-sm-1 col-md-1 col-lg-1">
</div>



</div>
</div>





<br><br>

<div class="row">



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow13.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

</div>
</div>
</body>
</html>
