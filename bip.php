 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!isset($argv[0])){
    $_queryArray = explode('/',$_GET['data']);
    $_method     = strtolower($_queryArray[0]);

    if($_method == 'webhook')
    require('core/boot/init/init.php');
    elseif($_method == 'install')
    require('core/boot/install/install.php');
    else
    require('core/boot/web/index.php');

}else{
    echo "Running With Console\n";
    var_dump($argv[0]);
}
 ?>
 