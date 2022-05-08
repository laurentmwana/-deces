-- création de la table category
CREATE TABLE category (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    categorie VARCHAR(40) NOT NULL,
    type VARCHAR(40) NOT NULL,
    content TEXT NOT NULL,
    dateCreate Datetime NOT NULL,
    dateUpdate Datetime NOT NULL,
    PRIMARY KEY(id)
)