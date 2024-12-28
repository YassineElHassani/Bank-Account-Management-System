CREATE DATABASE bank;

USE bank;
CREATE TABLE account(
	id INT PRIMARY KEY AUTO_INCREMENT,
    customerName VARCHAR(100) NOT NULL,
    balance FLOAT NOT NULL,
);

CREATE TABLE SavingsAccount(
	accountID INT NOT NULL,
    interest FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);

CREATE TABLE currentAccount(
	accountID INT NOT NULL,
    overdraftLimit FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);

CREATE TABLE businessAccount(
	accountID INT NOT NULL,
    transactionFee FLOAT,
    FOREIGN KEY (accountID) REFERENCES account(id)
);
