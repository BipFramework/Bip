<?php

$projectName = str_split(htmlspecialchars($_queryArray[1], ENT_QUOTES, 'UTF-8'),32)[0];

echo "Bot not found ! <br />
Hint : You must create ($projectName) directory in bip/bots <br />
Then add (bip/bots/$projectName/main.php) for entry point of your project.";