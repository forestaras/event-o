<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Start timer</title>
    <link href="https://allfont.net/allfont.css?fonts=a_lcdnova" rel="stylesheet" type="text/css" />
	<link href="/dist/startcloc/font-awesome.min.css" rel="stylesheet">
	<link href="/dist/startcloc/styles.css" rel="stylesheet">
</head>
<body>
	{{-- <div class="load-file-navbar closed">
		<div class="open-navbar">
			<i class="fa fa-file"></i>
		</div>
		<div class="navbar-container">
			<input class="file-upload" type="file" id="input">
		</div>
	</div> --}}

	<main>
		<div class="this-m-start-wrapper">
			<div class="this-m-start"></div>
		</div>
		<div class="clock"></div> 
		<div class="start"></div>
	</main>
	<script>
var users = <?php echo json_encode($peopl);?>;

    </script>

	<script src="/dist/startcloc/papaparse.min.js" type="text/javascript"></script>
	<script src="/dist/startcloc/index2.js" type="module"></script>
</body>
</html>