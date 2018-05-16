<?php
	$name= $_SESSION['username'];
?>
<section class="text-center">
	<div class="container">
		<h2 class="text-center">Forum</h2><hr id="usrPage_hr">
		
<textarea id="screen" cols="40" rows="10"> </textarea> <br> 
		<input type="hidden" id="name" value="<?php echo $name;?>">
<input id="message" name="message" size="40">
<button id="sendChat" type="submit"> Send </button>
	</div>
	
	
<script type="text/javascript">  
 
function update()
{
	
    $.post("views/chat/chat_poster.php", {}, function(data){ $("#screen").val(data);});  
 
//    setTimeout('update()', 1000);
}
 
$(document).ready( 
function() 
	
    {
     update();
 
     $("#sendChat").click(    
      function() 
      {         
       $.post("views/chat/chat_poster.php", {
		    	message: $("#message").val(),
	   			name: $("#name").val()
	   		},
    		function(data){ 
    		$("#screen").val(data); 
    		$("#text").val("");
		    $("#name").val("");
    	}
    );
      }
     );
    });
  
</script>
	
</section>

