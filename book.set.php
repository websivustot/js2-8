<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$take_till = isset($_GET['take_till']) ? (int) $_GET['take_till'] : null;
$user = isset($_GET['user']) ? (int) $_GET['user'] : null;

if (!($id && $take_till && $user)) {
    header('HTTP/1.1 404 Not Found');
} else {

    $json = file_get_contents('books.json');
    $books = json_decode($json);

    foreach(array_keys($books) as $key) {
        if ($id === $book->id) {
            $books[$key]->taken = $take_till;
            $books[$key]->taken_by = $user;
            file_put_contents('books.json', json_encode($books, JSON_UNESCAPED_UNICODE));
            
            die();
        }
    }

    header('HTTP/1.1 404 Not Found');
}
