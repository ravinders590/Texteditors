var toolbar = {
	bold: "fa-bold",
	underline: "fa-underline",
	italic: "fa-italic",
	insertOrderedList: "fa-list-ol",
	insertUnorderedList: "fa-list-ul",
	justifyCenter: "fa-align-center",
	justifyFull: "fa-align-justify",
	justifyLeft: "fa-align-left",
	justifyRight: "fa-align-right",
	cut: "fa-scissors",
	indent: "fa-indent",
	outdent: "fa-dedent",
	insertParagraph: "fa-paragraph",
	strikeThrough: "fa-strikethrough",
	subscript: "fa-subscript",
	superscript: "fa-superscript",
	redo: "fa-repeat",
	undo: "fa-undo",
	insertImage: "fa-picture-o",
	createLink: "fa-link",
	unlink: "fa-chain-broken",
}

var selectedFont = {
	Arial:'Arial',
	Poppins:'Poppins',
	Courier_New:'Courier New',
	OpenSans:'Open+Sans',
	Lato:'Lato',
}

var headingTags = {
	H1:'H1',
	H2:'H2',
	H3:'H3',
	H4:'H4',
	H5:'H5',
	H6:'H6',
}

var selectOption = document.createElement('select');
var selectHeading = document.createElement('select');
var selectSize = document.createElement('select');
var select;
function $(selector){
	const self = {
		
		element:document.querySelector(selector),
		html:()=>{
			self.element	
		},
		chooseFont:()=>{

			let html = `<option value="">Select Fonts</option>`;
			for (var selectedFonts in selectedFont) {

				let datas = `${selectedFont[selectedFonts]}`;
				html+=`<option value="${datas}">${datas}</option>`;
			}	
			return html;
		},
		headingTag:()=>{

			let html = `<option value="">Select Heading</option>`;
			for (let selectedHeadings in headingTags) {

				let datas = `${headingTags[selectedHeadings]}`;
				html+=`<option value="${datas}">${datas}</option>`;
			}	
			return html;
		},
		fontSize:()=>{
			let selectedHeadings=120;
			let i=1;
			let html = `<option value="">Select Font Size</option>`;
			for (let i=1; i <=120; i++) { 
				html+=`<option value="${i}">${i}</option>`;
			}
			
			return html;
		},
		/*Start Text Editor */
		texteditor: ()=>{
			self.element.style.display="none";
			
			/*create div element*/
			let d = document.createElement('div');
			d.classList.add('content');
			d.setAttribute('contenteditable',true);


			/*parent class*/
			let p_ele = document.createElement('div');
			p_ele.classList.add('text-editors-info');

			let p_ele_01 = document.createElement('div');
			p_ele_01.classList.add('text-editors-wrapper');

			let p_ele_02 = document.createElement('section');
			p_ele_02.classList.add('text-editors');

			let link_tag = document.createElement('div');
			link_tag.classList.add('font-link-tag');
			

			document.querySelector('body').prepend(p_ele_02);
			document.querySelector('body').prepend(link_tag);
			document.querySelector('.text-editors').append(p_ele_01);
			document.querySelector('.text-editors-wrapper').append(p_ele);


			selectOption.classList.add('form-control','fonts','choose-font');
			selectOption.setAttribute('id','choose-fonts');
			selectOption.setAttribute('data-element','fontName');

			selectHeading.classList.add('form-control','heading','fonts-heading');
			selectHeading.setAttribute('id','choose-heading');
			selectHeading.setAttribute('data-element','formatBlock');

			selectSize.classList.add('form-control','font_size','choose-size');
			selectSize.setAttribute('id','choose-size');
			selectSize.setAttribute('data-element','fontSize');
			/*end*/

			/*Create Fonts*/
			var fonts_data = self.chooseFont();
			var heading_data = self.headingTag();
			var font_size_data = self.fontSize();
			
			p_ele.append(selectOption);
			document.getElementById('choose-fonts').innerHTML = fonts_data;

			p_ele.append(selectHeading);
			document.getElementById('choose-heading').innerHTML = heading_data;

			p_ele.append(selectSize);
			document.getElementById('choose-size').innerHTML = font_size_data;
			/*end*/
			
			/*create button element*/
			for (let toolbar_data in toolbar) {
			    let datas = `fa ${toolbar[toolbar_data]}`;
				
				let bt = document.createElement('button');
				bt.classList.add('btn');
				bt.setAttribute('type','button');
				bt.setAttribute('data-element',toolbar_data);
			    
			    let fonts = document.createElement('i');
			    let split_data = datas.split(' ');
				fonts.classList.add(split_data[0],split_data[1]);

			    bt.append(fonts);
			    p_ele.append(bt);
			    
			}

			var btn = document.querySelectorAll('.btn');
			btn.forEach(element=>{
	 			
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


			var fonts = document.querySelector('.fonts');
			fonts.addEventListener('change',()=>{
				let choose = fonts.dataset['element'];
				let values = fonts.value;
				let font_link = `<link href="https://fonts.googleapis.com/css2?family=${values}:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">`;
				document.querySelector('.font-link-tag').innerHTML = font_link;
				document.execCommand(choose,false,values);
			});

			var fonts_heading = document.querySelector('.fonts-heading');
			fonts_heading.addEventListener('change',()=>{
				let choose = fonts_heading.dataset['element'];
				let values = fonts_heading.value;
				document.execCommand(choose,false,values);
			});

			var font_size = document.querySelector('.font_size');
			font_size.addEventListener('change',()=>{
				let choose = font_size.dataset['element'];
				let values = font_size.value;
				document.execCommand(choose,false,values);
			});

			self.element.parentElement.setAttribute('id','f-submit');
			document.querySelector('#f-submit').append(d);
			document.querySelector('#f-submit').addEventListener('submit',function(){
				self.element.value = document.querySelector('.content').getInnerHTML();	
			});
			document.querySelector('.text-editors-wrapper').append(document.querySelector('#f-submit'));

			
		}

	}
	return self;
}
// console.log(toolbar);
