<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'articles.txt';

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
        $image = basename($_FILES['image']['name']);
    } else {
        $image = '';
    }

    if (isset($_FILES['voice']) && $_FILES['voice']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['voice']['name']);
        move_uploaded_file($_FILES['voice']['tmp_name'], $uploadFile);
        $voice = basename($_FILES['voice']['name']);
    } else {
        $voice = '';
    }

    // Handle new post
    if (isset($_POST['title'])) {
        $title = htmlspecialchars($_POST['title']);
        $articleData = [
            'title' => $title,
            'content' => '', // Content is removed
            'image' => $image,
            'voice' => $voice,
            'likes' => 0,
            'comments' => []
        ];

        $articles = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $articles[] = json_encode($articleData);
        file_put_contents($filename, implode("\n", $articles));

        echo json_encode(['status' => 'success', 'article' => $articleData]);
        exit;
    }

    // Handle likes and comments
    if (isset($_POST['like']) || isset($_POST['comment'])) {
        $articles = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $articleId = intval($_POST['article_id']);
        $articleData = json_decode($articles[$articleId], true);

        if (isset($_POST['like'])) {
            $articleData['likes']++;
        } elseif (isset($_POST['comment']) && !empty($_POST['comment'])) {
            $articleData['comments'][] = htmlspecialchars($_POST['comment']);
        }

        $articles[$articleId] = json_encode($articleData);
        file_put_contents($filename, implode("\n", $articles));

        echo json_encode($articleData);
        exit;
    }
}
?>
