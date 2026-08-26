CREATE TABLE books ( 
    book_id INT AUTO_INCREMENT PRIMARY KEY ,
    book_title VARCHAR(50) NOT NULL,
    book_author VARCHAR(50) NOT NULL,
    book_category VARCHAR(50) NOT NULL,
    book_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO books (book_title,book_author,book_category) VALUES 
("BookWorm","Lex","Science FIction");
("Project Loki","Unknown","Mystery");
("Demon Slayer", "Koyoharu Gotouge", "Fiction");

CREATE TABLE borrow(borrow_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    borrow_return_date TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT fk_borrow_student FOREIGN KEY (student_id)
    REFERENCES students(student_id),
    CONSTRAINT fk_borrow_book FOREIGN KEY (book_id)
    REFERENCES books(book_id));

INSERT INTO borrow (student_id,book_id) VALUES (1,2),(2,1),(3,1);

SELECT
    br.borrow_id,

    s.student_id,
    CONCAT(
        s.student_first_name,
        ' ',
        s.student_last_name

    ) as student_name,
    s.student_course,
    b.book_title,
    b.book_author,
    b.book_category,
    br.borrow_date
FROM borrow br
JOIN students s on
        br.student_id = s.student_id
JOIN books b on
        br.book_id = b.book_id

WHERE br.borrow_return_date is NULL
ORDER BY br.borrow_date DESC;