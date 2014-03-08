<!doctype html>
<html>
<head>
	<meta charset="utf-8">
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate HTML Image map coordinates</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link href="css/cover.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body>

<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">HTML Mapper</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Examples</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Generate coordinates for your HTML Image Map from ANY image</h1>
            <p class="lead">
            	HTML Mapper lets you upload any image and generate the HTML image from the edges identified by analysing the image.
            </p>
            <p class="lead">
            	<form action="map.php" method="POST">
		    	<div class="input-group input-group-lg">            	
		    		<input type="text" name="url" placeholder="Enter image URL here" class="form-control" />
		    		<span class="input-group-btn">
		      			<input type="submit" name="upload" class="btn btn-primary" value="Start !" />
		      		</span>              
		        </div>
                </form>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>HTML Mapper by <br /> manujith pallewatte<br /> <a hreh="http://twitter.com/_manzzup_" target="_blank">@_manzzup_</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>


</body>
</html>
