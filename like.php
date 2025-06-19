<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articleId = intval($_POST['id']);
    $articles = file('articles.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $articleData = json_decode($articles[$articleId], true);

    $articleData['likes'] += 1;
    $articles[$articleId] = json_encode($articleData);
    file_put_contents('articles.txt', implode(PHP_EOL, $articles) . PHP_EOL);

    echo json_encode(['likes' => $articleData['likes']]);
}
?>
