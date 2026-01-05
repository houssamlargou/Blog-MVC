<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog MVC</title>
    <style>
body {
    font-family: Arial, sans-serif;
    max-width: 900px;
    margin: auto;
    padding: 20px;
}

nav a {
    margin-right: 15px;
    text-decoration: none;
    color: #333;
}

h1 {
    margin-bottom: 20px;
}

.articles {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.article-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 6px;
}

.meta {
    font-size: 0.9em;
    color: #666;
}

.read-more {
    display: inline-block;
    margin-top: 10px;
    color: #0066cc;
}
</style>

</head>
<body>

<nav>
    <a href="index.php">Accueil</a>
    <a href="index.php?controller=article&action=show">Articles</a>
</nav>

<hr>
