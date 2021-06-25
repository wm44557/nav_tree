<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<body>
    <div id="using_json"></div>
    <div id="options" style="margin-top: 1rem; display:none;">
        <button id="add_button" style="background-color: green; color:white;">ADD_NODE</button>
        <button id="delete_button" style="background-color: red; color:white;">DELETE_NODE</button>
        <button id="edit_button">EDIT_NODE</button>
    </div>
    <div id="dialog" title="add" style="display: none;">
        <input type="text" id='name'>
        <button id="add">add</button>
    </div>
</body>
<script type="module">
    import {
        addFunction,
        readyFunction,
        deleteFunction
    } from './events.js';
    let currId;
    let currParent;
    $(document).ready(readyFunction);

    $('#using_json').on("select_node.jstree", function(e, data) {
        $("#options").show();
        dialog = $("#dialog").dialog({
            autoOpen: false,
            height: 200,
            width: 350,
            modal: true,
            buttons: {
                Cancel: function() {
                    dialog.dialog("close");
                }
            },
        });
        currId = data.node.id;
        currParent = data.node.parent;
    });
    $("#add_button").button().on("click", function() {
        dialog.dialog("open");
    });
    $("#delete_button").button().click(function(event) {
        deleteFunction(currId, currParent)
    });
    $("#edit_button").button().click(function(event) {
        alert('Just drag and drop 🥳')
    });
    $("#add").button().on("click", function(e, name) {
        name = String($("#name").val());
        [...$("a")].forEach(element => element.textContent === name && alert('Field must be unique 🤯'));
        addFunction(currId, name);
        $("#name").val('');
        dialog.dialog("close");

    });
    $('html').click(function(e) {
        if (e.target == this) {
            $("#options").hide();
        }
    });
</script>