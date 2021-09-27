<?php
$targetFolder = '/home/himsiuna/laravel/storage/app/public';

$linkFolder = '/home/himsiuna/public_html/storage';

symlink($targetFolder, $linkFolder);

echo 'Done!'
?>