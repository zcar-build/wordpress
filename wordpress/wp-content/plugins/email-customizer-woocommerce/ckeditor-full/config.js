/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.extraPlugins = 'Mark';

    config.toolbar = 'MyToolbar';

    config.toolbar_MyToolbar =
    [   
        ['Source','Preview'],
        ['Cut','Copy','Paste','PasteText','-', 'SpellChecker', 'Scayt'],
        ['Undo','Redo','-','Find','Replace'],
        ['Link','Unlink'],
              
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Image','Table','HorizontalRule','SpecialChar'],
	
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['Styles','Format','Font','FontSize'],
        ['Maximize'],
        ['Mark']
        ,
    ];

	config.contentsCss = 'fonts.css'; 
	config.font_names = 'Agency FB;Antiqua;Architect;BankFuturistic;BankGothic;Blackletter;Blagovest;Calibri;Cursive;Decorative;Fantasy;Fraktur;Frosty;Garamond;Helvetica;Impact;Minion;Modern;Monospace;Open Sans;Palatino;Roman;Sans-serif;Serif;Script;Swiss;Times;Tw Cen MT' + config.font_names; 
};
