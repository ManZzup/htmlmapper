<?php

//$path = 'img/map5.png';

$path = null;
$o_path = null;
$error = "0";

if(isset($_POST['upload'])){
	$url = $_POST['url'];
	$ext = substr($url,strlen($url) - 3);
	
	$path = 'img/'.md5($url).'.'.$ext;
	$o_path = $url;
	
	if($ext == "jpg" || $ext == "png"){
		try{
			if(!file_exists($path)){
				if(file_put_contents($path,file_get_contents($url)) != false){
					$error = "Error downloading image file";
				}
			}
		}catch(Exception $e){
			$error = "Error downloading image file";
		}
	}else{
		$error = "Sorry that file type isnt supported yet :/ Please try with PNG or JPG";
	}
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate HTML Image map coordinates</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/pop.css" />

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="js/bootstrap-popover.js"></script>
	
	<script src="js/jquery.maphilight.js"></script> 
	<link rel="stylesheet" type="text/css" href="css/popupmenu.css">
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="a">HTML Mapper</a>
        </div>
        
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#about">Generate</a></li>
          </ul>
          
          <a class="btn btn-primary navbar-btn navbar-right" id="down" download="map.html" href="javascript:download">Download</a>
        </div>
      </div>
</div>

          
<div class="container" id="cont" style="margin-top:10%">
      		<?php if($error == "0") { ?>
      		
      		<img src="<?php echo $o_path ?>" usemap="#map"  id="mone" class="img"> </div>

		<map name="map" id="mapid">
			<?php

			echo shell_exec('python mapper.py ' . $path.'  5');

			?>
		</map>            
		
		<?php }else{ ?>
		
		<div class="alert alert-warning">
			<?php echo $error ?>
		</div>
		
		<?php } ?>
</div>

<div class="pop-div" id="pop">
	<div class="pop-content">
		<h4>Area sector id : <span id="titArea">00</span></h4>
		<div class="input-group">
		  <span class="input-group-addon">Link</span>
		  <input type="text" class="form-control" placeholder="#" id="linkArea">
		</div>
		<br />
		<div class="btn-group">
			<button class="btn btn-primary" id="saveArea">Done</button>
		</div>
    	</div>
</div>
<script type="text/javascript">
		var selArea = null;
  		$(function() {			
			$('#mone').maphilight({ stroke:false });
			
			
			$('area').click(function(e){
				selArea = this;
				$("#linkArea").val($(this).attr('href'));
				$("#titArea").text($(this).attr('title'));
				$("#pop").css('opacity',1);
				e.preventDefault();
			});
			
			$('#saveArea').click(function(){
				$(selArea).attr('href',$("#linkArea").val());
				$("#pop").css('opacity',0);
			});
			
			$('#down').click(function(){
				var img = '<img src="<?php echo $o_path ?>" usemap="#map"  id="mone" class="img"> </div>'
			
				$(this).attr('href','data:Application/octet-stream,' + encodeURIComponent(img + document.getElementById('mapid').outerHTML));
				
			});
  		});
</script>


</body>
</html>
