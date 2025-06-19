<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['accepted_terms'] = true;
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Rules and Guidelines</title>
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
    <h1 class="text-center">Website Rules and Guidelines</h1>
    <div class="mt-4">
        <h2>Welcome to our website!</h2>
        <p>Our platform is designed to allow you to share your thoughts, experiences, and information anonymously. To ensure a safe and respectful environment for everyone, please adhere to the following guidelines:</p>
        <h3>General Guidelines</h3>
        <ul>
            <li>Respectful Communication: Engage in respectful and constructive conversations. Avoid offensive language, hate speech, or personal attacks.</li>
            <li>Anonymity Protection: Your anonymity is our priority. Do not disclose personal information such as phone numbers, addresses, email addresses, or financial details (e.g., bank details, credit card information). This includes your own information and that of others.</li>
            <li>No Links: Refrain from posting any links to external websites, including but not limited to social media profiles, personal websites, and other online resources.</li>
            <li>No Pornographic Content: Explicit or pornographic content is strictly prohibited. This includes images, videos, or text descriptions.</li>
            <li>No Illegal Content: Any content that promotes or engages in illegal activities, including drug use, violence, or any form of criminal behavior, is forbidden.</li>
            <li>No Copyrighted Material: Do not share copyrighted material without proper authorization. This includes text, images, videos, music, and software.</li>
            <li>No Spamming: Avoid posting repetitive content or advertisements. Spamming disrupts the user experience and will not be tolerated.</li>
            <li>No Harassment: Harassment, stalking, or any form of bullying is strictly prohibited. Respect other users' privacy and boundaries.</li>
            <li>Sensitive and Personal Topics: We understand that some users may want to share personal experiences, such as instances of violence or harassment. You are welcome to share these experiences anonymously, but please do so respectfully and without revealing personal identities.</li>
            <li>Report Violations: If you encounter any content that violates these guidelines, please report it to the website moderators for review.</li>
        </ul>
        <h3>Posting Guidelines</h3>
        <ul>
            <li>Anonymity: You can post anonymously without creating an account. However, ensure your content adheres to the guidelines mentioned above.</li>
            <li>Content Quality: Strive to post meaningful and well-thought-out content. Avoid posting low-quality or irrelevant material.</li>
            <li>Respect Intellectual Property: Give credit where it is due. If you reference someone else's work, provide proper attribution.</li>
            <li>Language: Use appropriate language. Avoid slang, abbreviations, or text speak that may be unclear to other users.</li>
            <li>Stay on Topic: Keep your posts relevant to the discussion or category you are posting in. Off-topic posts may be removed.</li>
        </ul>
        <h3>Enforcement</h3>
        <ul>
            <li>Content Moderation: Our moderators review all posts to ensure compliance with these guidelines. Posts that violate the rules may be removed without notice.</li>
            <li>Warnings and Bans: Users who repeatedly violate the guidelines may receive warnings or temporary/permanent bans from posting.</li>
            <li>Appeals: If you believe your content was removed in error, you may contact the moderators to appeal the decision.</li>
        </ul>
        <p>Thank you for adhering to these guidelines and contributing to a positive online community. Enjoy your time on our website!</p>
    </div>
    <form method="post">
        <button type="submit" class="btn btn-primary btn-block">I Accept</button>
    </form>
</div>
</body>
</html>
