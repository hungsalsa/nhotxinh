var host = window.location.href; //backend
host = host.split("backend");



// tinymce.init({
//   selector: 'textarea',
//   height: 500,
//   theme: 'modern',
//   plugins: 'code print preview fullpage searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help responsivefilemanager',
//   toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
//   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview fullscreen code",
// // menubar: "tools",
//   filemanager_title:"Responsive Filemanager",
//     filemanager_crossdomain: true,
//     external_filemanager_path: host[0]+"filemanager/",
//     external_plugins: { 
//     	"filemanager" : host[0]+"filemanager/plugin.min.js"
//     },


//   image_advtab: true,
//   templates: [
//     { title: 'Test template 1', content: 'Test 1' },
//     { title: 'Test template 2', content: 'Test 2' }
//   ],
//   content_css: [
//     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
//     '//www.tinymce.com/css/codepen.min.css'
//   ]
//  });


tinymce.init({
  selector: "textarea.content",
    theme: "modern",
    width: "",
    height: 150,
    plugins: [
         "code advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager fullscreen"
   ],
   toolbar1: "code undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview fullscreen",
    menubar: false,
    toolbar_items_size: 'small',
    relative_urls: false,
    remove_script_host:false,

    filemanager_title:"Responsive Filemanager",
    // filemanager_crossdomain: true,
    external_filemanager_path: host[0]+"filemanager/",
    external_plugins: { "filemanager" : host[0]+"filemanager/plugin.min.js"},
    filemanager_access_key:"dfc78fb912939b31a2798211ae7e950c" ,
  
   image_advtab: true,

 });



 $(document).ready(function(){
	demo.initChartist();

	$.notify({
		icon: 'pe-7s-gift',
		message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

	},{
		type: 'info',
		timer: 4000
	});

	$('#product-start_sale').datepicker();
	$('#product-end_sale').datepicker();

  $("#imageFile").click(function (event) {
    $("#myModal").modal();
  })

});