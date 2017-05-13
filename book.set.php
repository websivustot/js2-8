<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$take_till = isset($_GET['take_till']) ? $_GET['take_till'] : null;
$user = isset($_GET['user']) ? (int) $_GET['user'] : null;

if (!($id && $take_till && $user)) {
    header('HTTP/1.1 404 Not Found');
} else {

    $json = file_get_contents('books.json');
    $books = json_decode($json);    
    foreach(array_keys($books) as $key) {        
        if ($id === $books[$key]->id) {
            if (!$books[$key]->taken) {
                $books[$key]->taken = $take_till;
                $books[$key]->taken_by = $user;
            }
            else {
                $books[$key]->taken = false;
                $books[$key]->taken_by = null;
            }
            
            file_put_contents('books.json', json_encode($books, JSON_UNESCAPED_UNICODE));
            
            die();
        }
    }
    
    ?> { "status": "ok" }
    <?php
    
}
?>