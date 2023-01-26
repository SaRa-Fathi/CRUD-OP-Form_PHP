CREATE TABLE Users(
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(25) NOT NULL,
    E_mail VARCHAR(50) UNIQUE NOT NULL,
    Gender ENUM('Female', 'Male'),
    Mail_Status ENUM('Yes', 'No')
);