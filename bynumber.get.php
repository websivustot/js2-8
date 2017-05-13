<?php
define('BOOKS_PER_PAGE', 10);
$json = file_get_contents('books.json');
$books = json_decode($json);
$books_count = count($books);
$pages_count = ceil($books_count / BOOKS_PER_PAGE);


$number = isset($_GET['number']) ? (int) $_GET['number'] : null;

if ($number) {
    $result = [];
    foreach(array_keys($books) as $key) {
        if ($books[$key]->id === $number) { 
            $result[] = $books[$key];            
        }        
    }    
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
