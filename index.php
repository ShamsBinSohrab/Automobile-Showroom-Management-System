<!DOCTYPE html>
<html>
<head>
	<title>Royal Motors BD.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="view/image/rmlogo.png" type="image/png">

	<script type="text/javascript" src="view/js/jquery-3.2.1.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
        <script>
        $(document).ready(function(){
            

            
            $.ajax({
                
                url: "service/user/show_most_viewed.php",
                dataType: "text",
                success: function(Result)
                {
                   if(Result != "")
                   {
                       recomand(Result);
                   }
                }
            })
            
            $.ajax({
               
                url: "service/user/service_show_offer.php",
                dataType: "html",
                success: function(Result){
                    
                    var str = Result.split(",");
                    
                    for(var i = 0; i < str.length - 1 ; i++)
                    {
                        var offer_detail = str[i].split("-");
                        var offer_title = offer_detail[0];
                        var file_no = offer_detail[1];
//                        console.log("Title: "+offer_title);
//                        console.log("File No: "+offer_file);
                        $('#offer_list').append("<a href='view/user/view_offer.php?file="+file_no+".xml'><li><span class='arrow'>></span>"+offer_title+"</li></a><hr>");
                    }
                    
                    
                    
                }
            })
            
            
            $('#search_bar').on('keyup',function(){
                
                $.ajax({
                    
                    url: "service/user/service_search.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    success: function(Result){
                        if(Result != "")
                        {
                            var one = Result.split(",");
                            
                            for(var i = 0; i < one.length; i++)
                            {
                                console.log(one[i]);
                                show(one[i]);
                            }
                            
                        }

                        else
                        {
                            no_result();
                        }
                    }
                })
            })
            
            function show(Result)
            {
                var path = "temp_server/"+Result;
                 $.ajax({
                    url: path,
                    success: function(data){
                        $(data).find('a').attr("href", function(i,val){
                            if(val.match(/\.(jpe?g|png)$/)){
                                //document.getElementById("b").innerHTML ="<img width = '200px' height = '200px' src='"+path+"/"+ val +"'>";
                                //$('#b').append("<img width = '200px' height = '200px' src='"+path+"/"+ val +"'>    ");
                                $('#b').append("<div class='col-4'><img src='"+path+"/"+ val +"'><a href='view/sales/show_details.php?chassis_no="+Result+"'><figcaption class='grid_caption'>SHOW</figcaption></a></div>");
                                document.getElementById("recomanded").style.display = "none";
                                document.getElementById("r").style.display = "none";
                            }
                        })
                    }
                })
            }
            
            
            function no_result()
            {
                document.getElementById("b").innerHTML = "";
                document.getElementById("recomanded").style.display = "block";
            }
            
            function recomand(Result)
            {
                var info = Result.split(",");
                
                for(var i = 0; i < info.length - 1; i++)
                {
                    $('#recomanded').append("<div class='col-4'><img src='temp_server/"+info[i]+"/1.jpg'><a href='view/sales/show_details.php?chassis_no="+info[i]+"'><figcaption class='grid_caption'>SHOW</figcaption></a></div>");   
                }
                
                
            }
            
        })
    
    </script>

    
</head>
<body>
	<div class="main">
		<div class="menu">
			<ul>
				<li><a href="#" class="logo" alt="This is logo of Royal Motors BD." title="Royal Motors"><img src="view/image/rmlogo.png"></a></li>
				<li><a href="#"><marquee class="marquee">Royal Motors <br><small>An Automobile Showcase</small></marquee></a></li>
				<li><a href="#">Home</a></li>
				<li><a href="../Team-15/index.php">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li class="access"><a id = "login_button" href="view/login.php">Login</a></li>
			</ul>
		</div>
		<div class="slider">
			<img class="mySlides fading" src="view/image/1.jpg" style="width:100%">
			<img class="mySlides fading" src="view/image/2.jpg" style="width:100%">
			<img class="mySlides fading" src="view/image/3.jpg" style="width:100%">
			<img class="mySlides fading" src="view/image/4.jpg" style="width:100%">
			<img class="mySlides fading" src="view/image/5.jpg" style="width:100%">
		</div>

		<div class="search">
                <form action="" method="post" id = "search_form">
                    <section class="filter">
                        <select name="brand" class="brand">
                            <option value = "">Brand</option>
                            <option value = "Toyota">Toyota</option>
                            <option value = "Hyundai">Hyundai</option>
                            <option value = "Porsche">Porsche</option>
                            <option value = "BMW">BMW</option>
                            <option value = "TATA">TATA</option>
                            <option value = "Audi">Audi</option>
                            <option value = "Honda">Honda</option>
                            <option value = "Nissan">Nissan</option>
                        </select>
                        <br>
                        <select name="year" class="year">
                            <option value = "">Model Year</option>
                            <option value = "2010">2010</option>
                            <option value = "2011">2011</option>
                            <option value = "2012">2012</option>
                            <option value = "2013">2013</option>
                            <option value = "2014">2014</option>
                            <option value =  "2015">2015</option>
                            <option value = "2016">2016</option>
                            <option value = "2017">2017</option>
                        </select>
                        <br>
                        <select name="color" class="color">
                            <option value = "">Color</option>
                            <option value = "Royal Blue">Royal Blue</option>
                            <option value = "Red">Red</option>
                            <option value = "Blue">Blue</option>
                            <option value = "Black">Black</option>
                            <option value = "White">White</option>
                        </select>			
                    </section>
                     <div class="search_bar">
                        <input type="text" name="search_bar" id = "search_bar" placeholder="Search By Model">
                        <input type="submit" value="Search">
                     </div>
                </form>
                <div class="search_bar">
                    <div class="row">
                        <h3 id="message"></h3>
                    </div>
                        <h2 style = 'color: white' id = 'r'>Recommended Vehicles</h2>
                    <div class="row" id = "recomanded">
                        
                    </div>
                    <div class="row" id = "b"></div>
                </div>
			</div>
			
			<div class="offer">
				<h2>OFFER</h2>
				<hr>
				<ul style="list-style-type:none" id = "offer_list">
					
<!--
					<a href="#"><li><span class="arrow">></span>Offer2</li></a>
					<hr>
					<a href="#"><li><span class="arrow">></span>Offer3</li></a>
					<hr>
					<a href="#"><li><span class="arrow">></span>Offer4</li></a>
					<hr>
					<a href="#"><li><span class="arrow">></span>Offer5</li></a>
					<hr>
-->
				</ul>

			</div>
		</div>
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