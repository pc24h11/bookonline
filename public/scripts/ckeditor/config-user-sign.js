
CKEDITOR.editorConfig = function( config ) {
	config.language = 'vi';
	config.height	= 100;
	config.toolbar = [
  		//{ name: 'document'		, items: [ 'Source', 'Preview'] },
  		{ name: 'basicstyles'	, items: [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
  		{ name: 'colors'		, items: [ 'TextColor','BGColor' ] },
  	];
};
