<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .logo {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
<img src="logo.png" alt="Logo" class="logo">
<script>
    setTimeout(function() {
        window.location.href = "splash.php";
    }, 3000); // Adjust time as needed (in milliseconds)
</script>
</body>
</html>
