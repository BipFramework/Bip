<?php
echo "webhook";
if(isset($_queryArray[1]) && in_array('bots/'.$_queryArray[1],glob('bots/*',GLOB_ONLYDIR))){
    if(is_file('bots/'.$_queryArray[1].'/main.php'))
        require('bots/'.$_queryArray[1].'/main.php');
    else
    throw new Exception('File : bots/'.$_queryArray[1].'/main.php not found - main.php is entry point of any bip project !');
}elseif(isset($_queryArray[1])){
    require(__DIR__.'/view.botNotFound.php');
}else{
    require(__DIR__.'/view.invalidWebhookParam.php');
}