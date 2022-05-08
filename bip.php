 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


//echo $_GET["data"]."\n\n";
if(!isset($argv[0])){
    $method = strtolower(explode('/',$_GET["data"])[0]);

    if($method == 'webhook')
    require('core/boot/init/init.php');
    elseif($method == 'install')
    require('core/boot/install/install.php');
    else
    require('core/boot/web/index.php');

}else{
    echo "Running With Console\n";
    var_dump($argv[0]);
}
 ?>
 