CREATE DATABASE bank;

USE bank;
CREATE TABLE account(
	id INT PRIMARY KEY AUTO_INCREMENT,
    customerName VARCHAR(100) NOT NULL,
    balance FLOAT
);

CREATE TABLE SavingsAccount(
	accountID INT PRIMARY KEY AUTO_INCREMENT,
    interest FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);

CREATE TABLE currentAccount(
	accountID INT PRIMARY KEY AUTO_INCREMENT,
    overdraftLimit FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);

CREATE TABLE businessAccount(
	accountID INT PRIMARY KEY AUTO_INCREMENT,
    transactionFee FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);