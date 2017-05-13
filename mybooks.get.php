<?php
define('BOOKS_PER_PAGE', 10);
$json = file_get_contents('books.json');
$books = json_decode($json);
$books_count = count($books);
$pages_count = ceil($books_count / BOOKS_PER_PAGE);


$user = isset($_GET['user']) ? (int) $_GET['user'] : null;

if ($user) {
    $result = [];
    foreach(array_keys($books) as $key) {
        if ($books[$key]->taken_by === $user) { 
            $result[] = $books[$key];            
        }        
    }
    $result = array ('books'=>$result,'pages'=>$pages_count);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
