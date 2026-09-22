C:\Users\clair\OneDrive\Documents\it30a\backups

1. CREATE DATABASE <database_name?;
2. SHOW DATABESES;
3. CONNECT <database_name>;
4. CREATE TABLE <table_name_in_prural> ();
5. INSERT INTO <table_name_in_prural>
(columns)
VALUES(values);
UTILITY commands
\! cls 
mysqldump -u root -p --databases library_db > C:\Users\clair\OneDrive\Documents\it30a\backups\08182026_library_db.sql 

mysqldump -u root -p --databases library_db > C:\Users\clair\OneDrive\Documents\it30a\backups\%date:~-4%_%date:~4,2%_%date:~7,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%_library_db.sql