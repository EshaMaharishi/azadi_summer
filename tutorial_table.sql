USE columbia;

CREATE TABLE upload (
textbook_file_id INT NOT NULL AUTO_INCREMENT,
textbook_file_name VARCHAR(30) NOT NULL,
textbook_file_type VARCHAR(30) NOT NULL,
textbook_file_size INT NOT NULL,
textbook_file_content LONGBLOB NOT NULL,
PRIMARY KEY(textbook_file_id)
);