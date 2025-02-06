
<?php
session_start();

require_once './common/db.inc.php';

$page = 'index';

if(isset($_REQUEST['page'])){
    if(file_exists('controllers/'.$_REQUEST['page'].'.php')){
        $page = $_REQUEST['page'];
    }
}

require 'controllers/'.$page.'.php';

?>