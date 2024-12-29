CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year_release INT,
    description TEXT,
    user_id INT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE movie_categories (
    movie_id INT,
    category_id INT,
    PRIMARY KEY (movie_id, category_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE ratings (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER,
    movie_id INTEGER,
    review TEXT,
    rating INTEGER,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);


-- populate
INSERT INTO movies (title, year_release, description, user_id, image)
VALUES ('Inception', 2010, 'A mind-bending thriller', 1, 'inception.jpg');

INSERT INTO categories (name) VALUES ('Action'), ('Sci-Fi'), ('Thriller');

INSERT INTO movie_categories (movie_id, category_id)
VALUES 
    (2, 1), -- 1: Action
    (2, 2), -- 2: Sci-Fi
    (2, 3); -- 3: Thriller

INSERT INTO users (name, email, password)
VALUES
('John Doe', 'john.doe@example.com', '123'),
('Jane Doe', 'jane.doe@example.com', '123');

