<?php
echo "\nHello world";

include 'app/persistences/blogPostData.php';
$value = lastBlogPosts($pdo);
echo '<pre>';
print_r($value) ;
echo '</pre>';