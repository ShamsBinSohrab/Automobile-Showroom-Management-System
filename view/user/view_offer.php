<!DOCTYPE html>

<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>

<script>
   
    $(document).ready(function(){
        
        var file = decodeURIComponent("<?php echo rawurlencode($_REQUEST['file']); ?>");
        console.log(file);
        
        $.ajax({
            
            url: "../../service/user/service_load_offer.php?file="+file,
            data: "text",
            success: function(Result)
            {
                var offer_data = Result.split(",");
                
                var titleObj = document.getElementById("title");
                var makerObj = document.getElementById("maker");
                var modelObj = document.getElementById("model");
                var model_yearObj = document.getElementById("model_year");
                var detailsObj = document.getElementById("details");
                
                
                titleObj.innerHTML = offer_data[0];
                makerObj.innerHTML = offer_data[1];
                modelObj.innerHTML = offer_data[2];
                model_yearObj.innerHTML = offer_data[3];
                detailsObj.innerHTML = offer_data[4];
            }
        })
    })
    
</script>
    
<html>
<head>
	<title>Royal Motors BD.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../image/rmlogo.png" type="image/png">

	<script type="text/javascript" src="view/js/jquery-3.2.1.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>
<body>
	<div class="main">
		<div class="menu">
			<ul>
				<li><a href="#" class="logo" alt="This is logo of Royal Motors BD." title="Royal Motors"><img src="../image/rmlogo.png"></a></li>
				<li><a href="#"><marquee class="marquee">Royal Motors <br><small>An Automobile Showcase</small></marquee></a></li>
				<li><a href="../../index.php">Home</a></li>
				<li><a href="../Team-15/index.php">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li class="access"><a href="../login.php">Login</a></li>
			</ul>
		</div>
        <div class="offer_details">
            <h1 class="title" id = "title"></h1>
            <h3 class="maker" id = "maker"></h3>
            <h3 class="model" id = "model"></h3>
            <h3 class="model_year" id = "model_year"></h3><br> 
            <p class="details" id = "details"></p><br> 
            <strong><p class="contact">Name of Contact Person<br>Phone: +8801XXXXXXXXX<br>Email: example@domain.com</p></strong> 
        </div>

	<div class="footer"><p>&COPY;Royal Motors <?=date("Y")?></p></div>










	<!-- Cursoel JS -->
	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
	    var i;
	    var x = document.getElementsByClassName("mySlides");
	    for (i = 0; i < x.length; i++) {
	      x[i].style.display = "none";  
	    }
	    myIndex++;
	    if (myIndex > x.length) {myIndex = 1}    
	    x[myIndex-1].style.display = "block";  
	    setTimeout(carousel, 7000);    
	}
	</script>
</body>
</html>