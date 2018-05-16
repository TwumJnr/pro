<section id="events">
	<h1 class="text-center">Upcoming Events</h1><hr>
<div class="slideshow-container">
<?php
	$count=1;
	$sql1= "SELECT * FROM events";
	$result = $connect->query($sql1);
	$numR = $result->num_rows;
	if ($numR > 0) {
		while($row = $result->fetch_assoc()) {
			?>
<div class="mySlides fade text-center">
  <!--div class="numbertext"><?php /*echo $count++.'/'. $numR */;?></div-->
  <img src="<?php echo $row['event_details']; ?>" style="width:50%">
</div>


<?php
		}//end while loop
	}
?>
	<!--img src="../files/events/202.jpg" width="50%"-->
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>
<br>
</section>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
