<?php

require_once 'api/Btc_historical.php';

$btc_historical  = new Btc_historical();

?>

<!DOCTYPE html>
<html>
<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Bitcoin Historical Price Data</title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bitcoin Historical Price Data</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">

    </div><!--/.nav-collapse -->
  </div>
</nav>


<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-12">
		<canvas id="canvas"></canvas>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="/api/Chart.bundle.js"></script>
<script>
       
        var config = {
            type: 'line',
            data: {
                labels: [<?php echo $btc_historical->get_historical_dates(); ?>],
                datasets: [{
                    label: "Bitcoin Historical Price Data",
                    backgroundColor: 'rgb(123,44,312)',
                    borderColor: 'rgb(123,44,312)',
                    data: [
                       <?php echo $btc_historical->get_historical_values(); ?>
                    ],
                    fill: false,
                }
                ]
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

    </script>
</body>
</html>


