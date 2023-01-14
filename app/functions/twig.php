<?php
$file_exists = new \Twig\TwigFunction('file_exists', function($file){
    return file_exists($file);
});

$echo = new \Twig\TwigFunction('echo', function($msg){
    echo $msg;
});

return [
    $file_exists,
    $echo
];

?>
