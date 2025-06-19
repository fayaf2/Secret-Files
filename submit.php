<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = '';
    $voice = '';

    // Check if the uploads directory exists, if not, create it
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = basename($_FILES['image']['name']);
        $uploadPath = 'uploads/' . $image;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            echo 'Failed to upload image.';
            exit;
        }
    }

    if (isset($_FILES['voice']) && $_FILES['voice']['error'] == 0) {
        $voice = basename($_FILES['voice']['name']);
        $uploadPath = 'uploads/' . $voice;

        if (!move_uploaded_file($_FILES['voice']['tmp_name'], $uploadPath)) {
            echo 'Failed to upload voice recording.';
            exit;
        }
    }

    $article = [
        'title' => $title,
        'content' => $content,
        'image' => $image,
        'voice' => $voice,
        'likes' => 0,
        'comments' => []
    ];

    file_put_contents('articles.txt', json_encode($article) . PHP_EOL, FILE_APPEND);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Submit a Post</h1>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="voice">Voice Recording</label>
            <div>
                <button type="button" class="btn btn-secondary" id="recordButton">Record Voice</button>
                <button type="button" class="btn btn-danger" id="stopButton" disabled>Stop Recording</button>
            </div>
            <input type="file" class="form-control-file" id="voice" name="voice" style="display: none;">
            <audio id="audioPlayback" controls style="display: none;"></audio>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    let mediaRecorder;
    let audioChunks = [];

    document.getElementById('recordButton').addEventListener('click', async () => {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            return;
        }

        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.addEventListener('dataavailable', event => {
            audioChunks.push(event.data);
        });

        mediaRecorder.addEventListener('stop', () => {
            const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
            const audioUrl = URL.createObjectURL(audioBlob);
            const audio = document.getElementById('audioPlayback');
            const voiceInput = document.getElementById('voice');

            audio.src = audioUrl;
            audio.style.display = 'block';

            const file = new File([audioBlob], 'voice.wav', { type: 'audio/wav' });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            voiceInput.files = dataTransfer.files;

            audioChunks = [];
        });

        mediaRecorder.start();
        document.getElementById('stopButton').disabled = false;
        document.getElementById('recordButton').textContent = 'Recording...';
    });

    document.getElementById('stopButton').addEventListener('click', () => {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            document.getElementById('stopButton').disabled = true;
            document.getElementById('recordButton').textContent = 'Record Voice';
        }
    });
</script>
</body>
</html>
