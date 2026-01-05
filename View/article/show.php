<?php require_once __DIR__ . '/../layout/header.php'; ?>

<main>
    <h1>Articles du Blog</h1>

    <section class="articles">

        <article class="article-card">
            <h2>Premier article</h2>
            <p class="meta">
                Par <strong>Author</strong> • 05 Janvier 2026
            </p>

            <p class="excerpt">
                Ceci est un exemple de contenu d’article. 
                Il sera remplacé plus tard par les données venant de la base de données.
            </p>

            <a href="#" class="read-more">Lire la suite</a>
        </article>

        <article class="article-card">
            <h2>Deuxième article</h2>
            <p class="meta">
                Par <strong>Author</strong> • 04 Janvier 2026
            </p>

            <p class="excerpt">
                Exemple d’un second article pour montrer la structure de la page.
            </p>

            <a href="#" class="read-more">Lire la suite</a>
        </article>

    </section>
</main>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
