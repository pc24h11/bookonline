
CKEDITOR.editorConfig = function( config ) {
	config.language = 'vi';
	config.height	= 200;
	config.toolbar = [
  		//{ name: 'document'		, items: [ 'Source', 'Preview'] },
  		{ name: 'basicstyles'	, items: [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
  		{ name: 'colors'		, items: [ 'TextColor','BGColor' ] },
  		{ name: 'paragraph'		, items: [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
  		{ name: 'tools'			, items: [ 'Maximize' ] }
  	];
};
