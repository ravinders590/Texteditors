<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TextEditor</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body>
	<form action="" style="flex: 0 0 100%;" method="post">
		<textarea name="description" id="description" cols="30" rows="10"></textarea>
	</form>
	
	
	<script src="texteditor.js"></script>
	<script type="text/javascript">
		$('#description').texteditor();
	</script>
</body>
</html>