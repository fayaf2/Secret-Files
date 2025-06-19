# Secret-Files 🔐

A simple PHP-based web platform for submitting and displaying anonymous articles, cyber stories, and crime stories with user interactions like likes and comments.

## 🌐 Live Features

- 🔍 View public anonymous articles
- 📝 Submit your own article
- ❤️ Like and comment on others' stories
- 🔐 IP filtering via `accepted_ips.txt`
- 🕵️ Cyber and crime story pages
- 🎤 Voice interaction design (assets included)

## 📁 Project Structure

| File/Folder         | Purpose |
|---------------------|---------|
| `index.php`         | Main landing page |
| `submit.php`        | Handles article submission |
| `comment.php`       | Processes comment submissions |
| `like.php`          | Processes likes |
| `upload.php`        | Handles file uploads |
| `server.php`        | Core backend logic |
| `splash.php`        | Splash or welcome page |
| `cyber.html`        | Cyber security stories page |
| `crimestory.html`   | Crime stories listing |
| `articles.txt`      | Stores submitted articles |
| `accepted_ips.txt`  | IP whitelist for access control |
| `users.json`        | Stores user-related data |
| `signals.json`      | Likely used for internal state or analytics |
| `composer.json`     | PHP dependency manager (Composer) file |
| `composer.phar`     | Composer binary |
| `image.png`, `voice.png`, `logo.png`, `robot.png` | UI images/assets |

## ✅ Requirements

- PHP 7.x or above
- A web server (e.g., Apache or Nginx)
- Composer (for dependency management)

## 🚀 Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/fayaf2/Secret-Files.git
   cd Secret-Files
