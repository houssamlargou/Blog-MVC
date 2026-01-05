-- =========================
-- Base de données BLOG MVC
-- =========================

CREATE DATABASE IF NOT EXISTS blog_mvc
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE blog_mvc;

-- =========================
-- Table USERS (abstraite)
-- =========================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('READER', 'AUTHOR', 'ADMIN') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Table ARTICLES
-- =========================
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NULL,

    CONSTRAINT fk_article_author
        FOREIGN KEY (author_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

-- =========================
-- Table CATEGORIES
-- =========================
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Table ARTICLE_CATEGORY (N:N)
-- =========================
CREATE TABLE article_category (
    article_id INT NOT NULL,
    category_id INT NOT NULL,

    PRIMARY KEY (article_id, category_id),

    CONSTRAINT fk_ac_article
        FOREIGN KEY (article_id)
        REFERENCES articles(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_ac_category
        FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON DELETE CASCADE
);

-- =========================
-- Table COMMENTS
-- =========================
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    article_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_comment_article
        FOREIGN KEY (article_id)
        REFERENCES articles(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_comment_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

-- =========================
-- Table LIKES
-- =========================
CREATE TABLE likes (
    user_id INT NOT NULL,
    article_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (user_id, article_id),

    CONSTRAINT fk_like_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_like_article
        FOREIGN KEY (article_id)
        REFERENCES articles(id)
        ON DELETE CASCADE
);
