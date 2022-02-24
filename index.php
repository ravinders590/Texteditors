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
	<section class="text-editors">
		<div class="text-editors-wrapper">
			
		<div class="text-editors-info">
			<select class="form-control fonts choose-font" data-element="fontName">
				<option value="Arial">Arial</option>
				<option value="Courier New">Courier New</option>
				<option value="Helvetica">Helvetica</option>
			</select>
			<select class="form-control fonts choose-size" data-element="fontSize">
				<?php 
				for ($i=1; $i <=120; $i++) { 
					?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php
				}
				 ?>
			</select>
			<select class="form-control fonts heading" data-element="formatBlock">
				<?php 
				for ($i=1; $i <=6; $i++) { 
					?>
				<option value="<?php echo 'H'.$i; ?>"><?php echo 'H'.$i; ?></option>
				<?php
				}
				 ?>
			</select>
			
			<button type="button" class="btn" data-element="bold">
				<i class="fa fa-bold" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="underline">
				<i class="fa fa-underline" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="italic">
				<i class="fa fa-italic" aria-hidden="true"></i>
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
			<button type="button" class="btn" data-element="cut">
				<i class="fa fa-scissors" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="subscript">
				<i class="fa fa-subscript" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="superscript">
				<i class="fa fa-superscript" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="strikeThrough">
				<i class="fa fa-strikethrough" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="insertParagraph">
				<i class="fa fa-paragraph"></i>
			</button>
			<button type="button" class="btn" data-element="indent">
				<i class="fa fa-indent"></i>
			</button>
			<button type="button" class="btn" data-element="outdent">
				<i class="fa fa-dedent"></i>
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

			<button type="button" class="btn createlink" data-element="createLink">
				<i class="fa fa-link" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="unlink">
				<i class="fa fa-chain-broken" aria-hidden="true"></i>
			</button>			
			<button type="button" class="btn" data-element="redo">
				<i class="fa fa-repeat" aria-hidden="true"></i>
			</button>
			<button type="button" class="btn" data-element="undo">
				<i class="fa fa-undo" aria-hidden="true"></i>
			</button>
			<div class="setcolor">
				<div class="forground">
					<label for="fname">Forground Color:</label>
					<input type="color" class="showcolors" data-element="foreColor">
				</div>
				<div class="background">
					<label for="fname">Background Color:</label>
					<input type="color" class="showcolors" data-element="hiliteColor">
				</div>
			</div>
		</div>
		
		<form action="" style="flex: 0 0 100%;" method="post" id="form-submit">
			<input type="hidden" id="createlink_url">
			<textarea name="description"  contenteditable="true" id="description" cols="30" rows="10"></textarea>
			<div class="content" contenteditable="true"></div>
			</div>
		</form>
		
	</section>
	<div class="editor-modal hide">
		<div class="editor-moda-dialog">
			<div class="editor-modal-content">
				<button type="button" class="close">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
				<form action="" method="post" id="form-link-submit">
					<label for="">Link</label>
					<input type="url" class="form-control url-show">
					<button type="button" class="geturl">Get URL</button>
				</form>
			</div>
		</div>
	</div>
	<div class="editor-backdrop hide"></div>
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
 				let command = element.dataset['element'];
 				if (command == 'insertImage') {
 					var url = prompt('Enter your URL:','');
 					document.execCommand(command,false,url);
 				}else if(command == 'createLink'){
 					var url = document.querySelector('#createlink_url').value;
 					document.execCommand(command,false,url);
 				}else{
 					document.execCommand(command,false,null);
 				}
 				// console.log(command);
 				
 			});

		});
		var fonts = document.querySelectorAll('.fonts');
		fonts.forEach(element=>{
			element.addEventListener('change',()=>{
				let choose = element.dataset['element'];
				let values = element.value;
				document.execCommand(choose,false,values);
			});
		});

		var colors = document.querySelectorAll('.showcolors');
		colors.forEach(element=>{
			element.addEventListener('change',()=>{
				let choose = element.dataset['element'];
				let values = element.value;
				document.execCommand(choose,false,values);
			});
		});

		var createlink = document.querySelector('.createlink');
		createlink.addEventListener('click',()=>{
			document.querySelector('.editor-modal').classList.add('show');
			document.querySelector('.editor-modal').classList.remove('hide');
			document.querySelector('.editor-backdrop').classList.add('show');
			document.querySelector('.editor-backdrop').classList.remove('hide');
			document.querySelector('body').classList.add('modal-open');
			
		});
		var close = document.querySelector('.close');
		close.addEventListener('click',()=>{
			document.querySelector('.editor-modal').classList.add('hide');
			document.querySelector('.editor-modal').classList.remove('show');
			document.querySelector('.editor-backdrop').classList.add('hide');
			document.querySelector('.editor-backdrop').classList.remove('show');
			document.querySelector('body').classList.remove('modal-open');
			
		});
		var geturl = document.querySelector('.geturl');
		geturl.addEventListener('click',()=>{
			document.querySelector('.editor-modal').classList.add('hide');
			document.querySelector('.editor-modal').classList.remove('show');
			document.querySelector('.editor-backdrop').classList.add('hide');
			document.querySelector('.editor-backdrop').classList.remove('show');
			document.querySelector('body').classList.remove('modal-open');
			document.querySelector('#createlink_url').value = document.querySelector('.url-show').value
			document.querySelector('#form-link-submit').reset();
			
		});
		


	</script>
</body>
</html>
