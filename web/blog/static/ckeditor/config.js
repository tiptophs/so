/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		/*{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },*/
        { name: 'styles' },		//样式
        { name: 'colors' },		//普通
        { name: 'links' },		//链接
		/*{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },*/	//拼写检查
		{ name: 'insert' },		//描点
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },	//段落
        /*{ name: 'about' }*/
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	//config.filebrowserImageUploadUrl = HTTP_ROOT_PATH+'/blog/article/ckUpload'; // 图片上传路径
	config.removeDialogTabs = 'image:advanced;image:Link'; // 移除图片上传页面的'高级','链接'页签
	config.image_previewText = ' '; // 图片信息面板预览区内容的文字内容，默认显示CKEditor自带的内容
	
	//添加插件，多个插件用逗号隔开
	config.extraPlugins = 'codesnippet,divarea';
	//使用zenburn的代码高亮风格样式 PS:zenburn效果就是黑色背景
    //如果不设置着默认风格为default
    codeSnippet_theme: 'zenburn';
};
