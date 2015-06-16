tinyMCE.init({
    // General options
    mode: "textareas",
    editor_selector : "mceEditor",
    theme: "advanced",
    plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,fullpage",
    // Theme options
    theme_advanced_buttons1: "styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",    
    theme_advanced_buttons3: "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
    theme_advanced_buttons4: "hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons5: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|attribs,|,visualchars,nonbreaking,visualblocks",
    theme_advanced_buttons6: "tablecontrols,|,pastetext,pasteword,|,fullpage",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "right",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,
    // Example content CSS (should be your site CSS)
   // content_css: "css/content.css",
    // Drop lists for link/image/media/template dialogs
    //template_external_list_url: "lists/template_list.js",
    external_link_list_url: "plugins/tiny/lists/link_list.js",
    external_image_list_url: "plugins/tiny/lists/image_list.js",
    media_external_list_url: "plugins/tiny/js/media_list.js",
    // Style formats
    style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
});

