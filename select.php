<!DOCTYPE HTML>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta http-equiv='content-type'
              content='application/xhtml+xml; charset=utf-8' />
        <meta http-equiv='content-language' content='en-us' />
        <meta charset='utf-8' />
        <title>WYSIWYG Editor 3</title>
        <link href='Example 22-3.css' rel='stylesheet' />
        <script src="jquery/jquery-2.1.3.js" type="text/javascript"></script>
        <script type='text/javascript' >
                    $(document).ready(
                    function()
                    {
                    $('div#container').focus();
                            $('button.toolbar-btn').click(
                            function()
                            {
                            var data = this && $(this).data && $(this).data();
                                    if (data && data.format && document.execCommand)
                            {
                            document.execCommand(data.format, false, null);
                                    $('div#container').focus();
                            }
                            }
                    );
                            $('select.toolbar-ddl').change(
                            function()
                            {
                            var data = this && $(this).data && $(this).data();
                                    if (data && data.format && document.execCommand)
                            {
                            document.execCommand(data.format, false,
                                    this[this.selectedIndex].value);
                                    this.selectedIndex = 0;
                                    $('div#container').focus();
                            }
                            }
                    );
                            $('button#btnCreateSelection').click(
                            function()
                            {
                            var container = document.getElementById('container');
                                    container.innerHTML = 'Here is some sample text for
                                    selection';
                                    var range = document.createRange();
                                    range.setStart(container.firstChild, 5);
                                    range.setEnd(container.firstChild, 17);
                                    setSelectionRange(range);
                            }
                    );
                            $('button#btnStoreSelection').click(
                            function()
                            {
                            window.selectedRange = getSelectionRange();
                            }
                    );
                            $('button#btnRestoreSelection').click(
                            function()
                            {
                            if (window.selectedRange)
                            {
                            setSelectionRange(window.selectedRange);
                            }
                            }
                    );
                    }
            );
                    function getSelectionRange()
                    {
                    if (window.getSelection)
                    {
                    var sel = window.getSelection();
                            if (sel.getRangeAt && sel.rangeCount)
                    {
                    return sel.getRangeAt(0);
                    }
                    else // Safari
                    {
                    var range = document.createRange();
                            range.setStart(sel.anchorNode, sel.anchorOffset);
                            range.setEnd(sel.focusNode, sel.focusOffset);
                            return range;
                    }
                    }
                    return null;
                    }f
                    unction setSelectionRange(range)
            {
            if (range && window.getSelection)
            {
            var sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
            }
            }
        </script>
    </head>
    <body>
        <div id='toolbar'>
            <button class='toolbar-btn bold' data-format='bold'>B</button>
            <button class='toolbar-btn italic' data-format='italic'>I</button>
            <button class='toolbar-btn underline' dataformat='
                    underline'>U</button>
            <select class='toolbar-ddl fontname' data-format='fontname'>
                <option value="></option>
                        <option value='Arial'>Arial</option>
                        <option value='Courier New'>Courier New</option>
                        <option value='Times New Roman'>Times New Roman</option>
                        </select>
                        <select class='toolbar-ddl fontsize' data-format='fontsize'>
                        <option value="></option>
                <option value='2'>Small</option>
                <option value='3'>Normal</option>
                <option value='4'>Big</option>
                <option value='5'>Bigger</option>
            </select>
            <button id='btnCreateSelection'>Create Selection</button>
            <button id='btnStoreSelection'>Store Selection</button>
            <button id='btnRestoreSelection'>Restore Selection</button>
        </div>
        <div id='container' contenteditable='true'>
        </div>
    </body>
</html>
