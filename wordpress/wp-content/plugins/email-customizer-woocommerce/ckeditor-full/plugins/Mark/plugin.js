CKEDITOR.plugins.add('Mark',
    {
        init: function (editor) {
            var pluginName = 'Mark';
            editor.ui.addButton('Mark',
                {
                    label: 'Insert Signature',
                    command: 'OpenWindow2',
                    width : '100px',
                    icon: CKEDITOR.plugins.getPath('Mark') + 'sign.png'
                });
            var cmd2 = editor.addCommand('OpenWindow2', { exec: showMyDialog2 });
        }
    });
    function showMyDialog2(f) {
    var value2 = document.getElementById("swcm_signature_location").value;
       f.insertHtml('<img id="content" alt="Not Found" src="'+value2+'" style="height:33px; width:163px" />');

      
       }
