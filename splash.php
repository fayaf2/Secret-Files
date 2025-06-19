<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE SECRET FILES</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
        }
        .container {
            margin-top: 20px;
        }
        .article {
            position: relative;
            border: 1px solid #444;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #333;
            border-radius: 15px;
        }
        .article::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 15px;
            background: linear-gradient(45deg, #00FFFF, #00FF00, #FF00FF, #0000FF);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            z-index: -1;
        }
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .article img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }
        .article audio {
            display: block;
            margin-top: 10px;
        }
        .navbar-brand img {
            height: 40px;
        }
        .like-button {
            background-color: #003366;
            color: white;
            border: none;
        }
        .like-button:hover {
            background-color: #002244;
        }
        #rulesModal .modal-dialog {
            max-width: 800px;
        }
        #rulesModal .modal-body {
            max-height: 400px;
            overflow-y: auto;
            color: black;
        }
        #rulesModal .modal-title,
        #rulesModal .modal-body p,
        #rulesModal .modal-body ul,
        #rulesModal .modal-body li {
            color: black;
        }
        .chat-input {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            padding: 10px;
            display: flex;
            align-items: center;
            border-top: 1px solid #444;
        }
        .chat-input form {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .chat-input input[type="text"] {
            background-color: #444;
            color: white;
            border: 1px solid #555;
            border-radius: 5px;
            margin-right: 5px;
            padding: 5px 10px;
            flex: 1;
            max-width: 150px;
            box-sizing: border-box;
            height: 40px;
        }
        .chat-input button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 0 5px;
            height: 40px;
            width: 40px;
            background-size: cover;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #0056b3;
        }
        .upload-logo {
            background: url('image.png') no-repeat center center;
            background-size: contain;
        }
        .record-logo {
            background: url('voice.png') no-repeat center center;
            background-size: contain;
        }
        .audio-preview {
            margin-top: 10px;
            width: 100%;
        }
        #file-input {
            display: none;
        }
        @media (max-width: 576px) {
            .chat-input input[type="text"],
            .chat-input button {
                font-size: 0.8em;
                padding: 5px;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="logo.png" alt="Logo"> THE SECRET FILES
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="crimestory.html">Real Crime Story</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cyber.html">Complaint Register</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="text-center">THE SECRET FILES</h1>
    <div class="articles">
        <!-- Articles will be loaded here -->
    </div>
</div>

<div class="modal fade" id="rulesModal" tabindex="-1" role="dialog" aria-labelledby="rulesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rulesModalLabel">Rules and Guidelines</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Here are the rules and guidelines for posting on THE SECRET FILES:</p>
                <ul>
                    <li>No hate speech, bullying, or harassment.</li>
                    <li>No illegal activities or content.</li>
                    <li>Respect others' privacy.</li>
                    <li>Do not post false information or spam.</li>
                    <li>Use appropriate language and be respectful.</li>
                    <li>Do not share personal information.</li>
                </ul>
                <p>By posting, you agree to follow these rules and guidelines. Violating these rules may result in your post being removed and/or account being banned.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="chat-input">
    <form id="upload-form" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title (Optional)">
        <button type="button" class="upload-logo" id="upload-logo-button"></button>
        <input type="file" name="image" id="file-input" accept="image/*">
        <button type="button" class="record-logo" id="record-logo-button"></button>

        <button type="submit" class="btn post-button">Post</button>
    </form>
    <div class="audio-preview"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Load articles
        function loadArticles() {
            $.get('articles.txt', function(data) {
                $('.articles').empty();
                data.trim().split('\n').forEach(function(line) {
                    let article = JSON.parse(line);
                    let articleHtml = `
                        <div class="article" data-id="${$('.articles').children().length}">
                            ${article.title ? `<h2>${article.title}</h2>` : ''}
                            ${article.image ? `<img src="uploads/${article.image}" alt="Image">` : ''}
                            ${article.voice ? `<audio controls><source src="uploads/${article.voice}" type="audio/wav">Your browser does not support the audio element.</audio>` : ''}
                            <button class="like-button" data-article-id="${$('.articles').children().length}">Like (<span class="like-count">${article.likes}</span>)</button>
                            <div class="comments">
                                ${article.comments.map(comment => `<li>${comment}</li>`).join('')}
                            </div>
                            <form class="comment-form" data-article-id="${$('.articles').children().length}">
                                <input type="text" class="comment-input" placeholder="Add a comment">
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                    `;
                    $('.articles').prepend(articleHtml);
                });
            });
        }

        loadArticles();

        // Handle likes
        $(document).on('click', '.like-button', function() {
            var articleId = $(this).data('article-id');
            $.post('upload.php', { like: true, article_id: articleId }, function(response) {
                var data = JSON.parse(response);
                $('.article[data-id="' + articleId + '"] .like-count').text(data.likes);
            });
        });

        // Handle comments
        $(document).on('submit', '.comment-form', function(e) {
            e.preventDefault();
            var articleId = $(this).data('article-id');
            var comment = $(this).find('.comment-input').val();
            if (comment.trim() !== '') {
                $.post('upload.php', { comment: comment, article_id: articleId }, function(response) {
                    var data = JSON.parse(response);
                    var commentsList = $('.article[data-id="' + articleId + '"] .comments');
                    commentsList.empty();
                    data.comments.forEach(function(comment) {
                        commentsList.append('<li>' + comment + '</li>');
                    });
                });
            }
        });

        let isRecording = false;
        let mediaRecorder;
        let audioChunks = [];
        let audioBlob;

        // Start/Stop Recording
        $('#record-logo-button').click(function() {
            if (!isRecording) {
                startRecording();
            } else {
                stopRecording();
            }
        });

        // Preview audio
        $('.preview-button').click(function() {
            if (audioBlob) {
                const audioUrl = URL.createObjectURL(audioBlob);
                const audio = new Audio(audioUrl);
                audio.controls = true;
                $('.audio-preview').html(audio);
            }
        });

        // Start recording
        function startRecording() {
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    isRecording = true;
                    $('#record-logo-button').css('background-image', 'url(record-logo-recording.png)');

                    mediaRecorder.addEventListener('dataavailable', event => {
                        audioChunks.push(event.data);
                    });

                    mediaRecorder.addEventListener('stop', () => {
                        audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                        audioChunks = [];
                        isRecording = false;
                        $('#record-logo-button').css('background-image', 'url(record-logo.png)');
                        const audioUrl = URL.createObjectURL(audioBlob);
                        const audio = new Audio(audioUrl);
                        audio.controls = true;
                        $('.audio-preview').html(audio);
                    });
                });
        }

        // Stop recording
        function stopRecording() {
            mediaRecorder.stop();
        }

        // Handle post submission
        $('#upload-form').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (audioBlob) {
                formData.append('voice', audioBlob, 'voice.wav');
            }
            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        // Display new item
                        let articleHtml = `
                            <div class="article" data-id="${$('.articles').children().length}">
                                ${data.article.title ? `<h2>${data.article.title}</h2>` : ''}
                                ${data.article.image ? `<img src="uploads/${data.article.image}" alt="Image">` : ''}
                                ${data.article.voice ? `<audio controls><source src="uploads/${data.article.voice}" type="audio/wav">Your browser does not support the audio element.</audio>` : ''}
                                <button class="like-button" data-article-id="${$('.articles').children().length}">Like (<span class="like-count">${data.article.likes}</span>)</button>
                                <div class="comments">
                                    ${data.article.comments.map(comment => `<li>${comment}</li>`).join('')}
                                </div>
                                <form class="comment-form" data-article-id="${$('.articles').children().length}">
                                    <input type="text" class="comment-input" placeholder="Add a comment">
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        `;
                        $('.articles').prepend(articleHtml);
                        $('#upload-form')[0].reset();
                        $('.audio-preview').empty();
                    }
                }
            });
        });

        // Handle image logo button click
        $('#upload-logo-button').click(function() {
            $('#file-input').click();
        });
    });
</script>
</body>
</html>
