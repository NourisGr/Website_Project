DROP DATABASE shop;
CREATE DATABASE shop;

use shop;

create table Users(
    UserId int not NULL AUTO_INCREMENT,
    UserName VARCHAR(30) UNIQUE,
    PRIMARY KEY (UserId)
);


INSERT into Users(UserName) VALUES ("Dan");
INSERT into Users(UserName) VALUES ("Franchesco");
INSERT into Users(UserName) VALUES ("Fanouris");

CREATE TABLE Products (
    PID int not null AUTO_INCREMENT,
    ProductsName varchar(30),
    PRIMARY KEY (PID),
    img VARCHAR(255),
    ProductsPrice Integer (3)
);

INSERT into Products (ProductsName,img,ProductsPrice) VALUE("Techincal Support","products1.png",150);
INSERT into Products (Productsname,img,ProductsPrice) VALUE("Netflix Promo Code","products2.png",-100);
INSERT into Products (Productsname,img,ProductsPrice) VALUE("Philips 499P4 49","products3.png", 859);
INSERT into Products (Productsname,img,ProductsPrice) VALUE("PC Master","products4.png",-200);

CREATE TABLE Languages(
    LanguageID int not null AUTO_INCREMENT,
    LanguageName VARCHAR(20),
    PRIMARY KEY(LanguageID)
);



INSERT INTO Languages (LanguageName) VALUES("English");
INSERT INTO Languages (languageName) VALUES("Greek");

CREATE TABLE Descriptions(
    DescID INT NOT NULL AUTO_INCREMENT,
    PrdsName VARCHAR(200),
    PID int NOT NULL,
    LID int NOT NULL,
    DescText VARCHAR(500),
    PRIMARY KEY (DescID),
    
    FOREIGN KEY (PID) REFERENCES Products(PID),
    FOREIGN KEY (LID) REFERENCES LANGUAGES(LanguageID)
);

INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Techincal Support",1,1,"We are providing you Hardware / Software Support at any type of Computer, Laptop, Server Station or other mobile devices.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Netflix Promo Code",2,1,"We would like to thank you for your Support, so we are offering a promo code to get a discount in your next payment.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Philips 499P9",3,1,"The Philips Brilliance 499P9H offers a winning combination of a gigantic, ultra-wide curved screen—shining with a bright, vivid image—and extras like a Windows Hello-compatible webcam and a built-in KVM switch.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("PC Master",4,1,"We take over to make your Dream PC build true. We cooperate directly with big names in the PC industry such as ASUS, NVIDIA, Coolermaster, Corsair");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Τεχνική Υποστήριξη",1,2,"Σας παρέχουμε υποστήριξη Hardware / Software σε οποιοδήποτε τύπο υπολογιστή, φορητού υπολογιστή, διακομιστή ή άλλες κινητές συσκευές.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Κωδικός προσφοράς Netflix",2,2,"Θα θέλαμε να σας ευχαριστήσουμε για την υποστήριξή σας, οπότε προσφέρουμε έναν κωδικό προσφοράς για να λάβετε έκπτωση στην επόμενη πληρωμή σας.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("Philips 499P9",3,2,"Η Philips Brilliance 499P9H προσφέρει έναν συνδυασμό μιας γιγαντιαίας, εξαιρετικά ευρείας καμπύλης οθόνης που λάμπει με μια φωτεινή, ζωντανή εικόνα και πρόσθετες λειτουργίες, όπως μια κάμερα Web συμβατή με Hello Windows και ενσωματωμένο διακόπτη KVM.");
INSERT INTO Descriptions (PrdsName,PID,LID,DescText) VALUES("PC Master",4,2,"Αναλαμβάνουμε να κάνουμε πραγματικότητα την κατασκευή του Dream PC σας. Συνεργαζόμαστε απευθείας με μεγάλα ονόματα του κλάδου των υπολογιστών όπως ASUS, NVIDIA, Coolermaster, Corsair");