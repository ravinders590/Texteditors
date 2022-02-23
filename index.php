<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TextEditor</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<style>
		body,*{
			margin: 0;
			padding: 0;
		}
		section.text-editors {
		    display: flex;
		    align-items: center;
		    flex-wrap: wrap;
		}
		.text-editors-wrapper {
		    display: flex;
		    flex-wrap: wrap;
		    width: 100%;
		    max-width: 100%;
		    padding: 15px 15px;
		}

		.text-editors-info {
		    flex: 0 0 100%;
		    max-width: 100%;
		}

		textarea {
		    flex: 0 0 100%;
		    max-width: 100%;
		}
		button.btn {
		    width: 30px;
		    height: 30px;
		    border: 1px solid #ddd;
		    margin: 0 2px 4px;
		}

		.text-editors-info {
		    display: flex;
		    flex-wrap: wrap;
		    align-items: center;
		}

		button.btn:first-child {
		    margin-left: 0;
		}
		.content {
		    flex: 0 0 100%;
		    border: 1px solid #ddd;
		    min-height: 200px;
		    outline-width: 1px;
		    outline-color: #7e7e7e;
		    padding: 30px;
		    width: 1190px;
		}
		.active {
		    box-shadow: inset 0px 0px 4px 0px rgba(0,0,0,.2);
		}
		.get-url {
		    position: fixed;
		    right: 0;
		    left: 0;
		    top: 0;
		    bottom: 0;
		    background-color: rgba(0,0,0,.3);
		    display: flex;
		    align-items: center;
		    justify-content: center;
		}
		input[type="url"] {
		    height: 40px;
		    width: 100%;
		    margin: auto;
		}

		.get-url-info {
		    display: flex;
		    width: 100%;
		    justify-content: center;
		}

		.get-url-info form {
		    flex: 0 0 100%;
		    max-width: 40%;
		    display: flex;
		    flex-wrap: wrap;
		}
		
	</style>
</head>

<body>
	<section class="text-editors">
		<div class="text-editors-wrapper">
			
		<div class="text-editors-info">
			<button type="button" class="btn" data-element="bold">
				<i class="fa fa-bold" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="underline">
				<i class="fa fa-underline" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="italic">
				<i class="fa fa-italic" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="insertUnorderedList">
				<i class="fa fa-list-ul" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="insertOrderedList">
				<i class="fa fa-list-ol" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="insertImage">
				<i class="fa fa-picture-o" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="createLink">
				<i class="fa fa-link" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="unlink">
				<i class="fa fa-chain-broken" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="justifyFull">
				<i class="fa fa-align-justify" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="justifyLeft">
				<i class="fa fa-align-left" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="justifyCenter">
				<i class="fa fa-align-center" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="justifyRight">
				<i class="fa fa-align-right" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="redo">
				<i class="fa fa-repeat" aria-hidden="true"></i>
			</button>
		</div>
		<form action="" style="flex: 0 0 100%;" method="post" id="form-submit">
			<textarea name="description"  contenteditable="true" id="description" cols="30" rows="10"></textarea>
			<div class="content" contenteditable="true"></div>
			</div>
			
			<button class="submit" name="submit" >Submit</button>
			<span><?php echo $msg; ?></span>
		</form>
		
	</section>

	<script>
		function hasClass(el, className){
		    if (el.classList)
		        return el.classList.contains(className);
		    return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
		}

		document.querySelector('#description').style.display="none";
		document.querySelector('#form-submit').addEventListener('submit',function(){
			document.querySelector('#description').value = document.querySelector('.content').getInnerHTML();	
		})
		
		var element = document.querySelectorAll('.btn');
		element.forEach(element=>{
 			
 			element.addEventListener('click',()=>{
 				var hasClass = element.classList.toggle('active');
 				
 				let command = element.dataset['element'];
 				if (command == 'insertImage' || command == 'createLink') {
 					var url = prompt('Enter your URL:','');
 					document.execCommand(command,false,url);
 				}else{
 					document.execCommand(command,false,null);
 				}
 				// console.log(command);
 				
 			});

		});



	</script>
</body>
</html>