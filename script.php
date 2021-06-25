<?php
require_once("./Tree.class.php");
require_once("./Database.class.php");
require_once("./config.php");

use app\tree\Tree;

$tree = new Tree();

isset($_GET['add']) && $tree->addNode($_GET['add'], $_GET['name']);
isset($_GET['del']) && $tree->deleteNode($_GET['del']);
isset($_GET['update_parent']) && $tree->updateNode($_GET['update_parent'], $_GET['update_id']);
function createTree(&$list, $parent)
{
    $tri = array();
    foreach ($parent as $k => $l) {
        if (isset($list[$l['id']])) {
            $l['state'] = [
                'opened' => true,
                'selected' => true,
            ];

            $l['children'] = createTree($list, $list[$l['id']]);
        }
        $tri[] = $l;
    }
    return $tri;
}
$arr = $tree->getAllItems();

$new = array();
foreach ($arr as $a) {
    $new[$a['parent_id']][] = $a;
}
$tri = createTree($new, array($arr[0]));
echo json_encode($tri);
