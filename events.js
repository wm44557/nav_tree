export const refView = () => {
    $.ajax({
        type: "get",
        url: 'script.php',
        dataType: "JSON",
        success: function(data) {
            $('#using_json').jstree(true).settings.core.data = data;
            $('#using_json').jstree(true).refresh();
        }
    });
}

export const addFunction = (add,name) => {
        $.ajax({
            type: "GET",
            url: 'script.php',
            data: {
                add,
                name
            },
            success: function(html) {
                refView()
            }
        });
}
export const deleteFunction = (del,parent) => {
    if(parent === '#') return;
        $.ajax({
            type: "GET",
            url: 'script.php',
            data: {
                del
            },
            success: function() {
                refView()
            }
        });
}
const editFunction = (update_parent,update_id) => {
        $.ajax({
            type: "GET",
            url: 'script.php',
            data: {
                update_parent,
                update_id
            },
            success: function() {
                refView()
            }
        });
}
export const readyFunction = () => {
    $.ajax({
        type: "get",
        url: 'script.php',
        dataType: "JSON",
        success: function(data) {
        $('#using_json').jstree({
            "core" : {
            "animation" : 0,
            "check_callback" :  function (op, node, par, pos, more) {
                if ((op === "move_node" || op === "copy_node") && node.type && node.type == "root") {
                    return false;
                }
                if((op === "move_node" || op === "copy_node") && more && more.core && confirm('Are you sure ...')) {
                    editFunction(par.id,node.id,node,par)
                return false;
                }
                if(par.id === '#') return false;
                if(node.parent === '#') return false;

                return true;
            },
                data,
            },
            
            "plugins" : [
            "contextmenu", "dnd"
            ]
            });
}})}