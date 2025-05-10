<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/News.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $result = [];
        $newsArr = [];
        $news = new News($connection);
        $newsArr = $news->getAllNews();

        foreach ($newsArr as $news){
            $result[] = [
                'NewsID' => $news->getNewsID(),
                'Title' => $news->getTitle(),
                'Content' => $news->getContent(),
                'PublishedAt' => $news->getPublishedAt(),
                'Media' => $news->getMedia(),
                'Author' => $news->getAuthor()
            ];
        }

        header('Content-Type: application/json');
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }

?>