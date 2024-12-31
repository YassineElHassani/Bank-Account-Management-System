# Bank Account Management System

## 📘 Project Overview

The **Bank Account Management System** is a web application designed to manage customer bank accounts efficiently using object-oriented programming (OOP) principles. It provides a complete CRUD (Create, Read, Update, Delete) functionality for various types of accounts such as savings, current, and business accounts.

This project is a part of NeoBank's modernization initiative, aimed at improving the IT system for better account management.

---

## 🎯 Features

### General Features:
- Add new bank accounts with specific details.
- View all accounts in a user-friendly interface.
- Edit account details, including account type-specific fields.
- Delete accounts while maintaining database consistency.

### Account Types:
1. **Savings Account**:
   - Includes an interest rate.
   - Allows applying interest to the balance.
2. **Current Account**:
   - Includes an overdraft limit.
   - Manages withdrawals within the overdraft limit.
3. **Business Account**:
   - Charges a transaction fee for each operation.

---

## 🛠️ Technologies Used

### Backend:
- **PHP**: Implements OOP principles for the application logic.
- **MySQL**: Manages the relational database.

### Frontend:
- **HTML/CSS**: Designs the user interface.
- **TailwindCSS**: Enhances the UI design with utility classes.

### Tools:
- **LARAGON**: Local development environment.
- **Jira**: Task management and tracking.

---

## 🗂️ Project Structure

### Database Schema
- `account` (Parent table): Contains general account information.
- `savingsAccount`, `currentAccount`, `businessAccount`: Child tables with account type-specific fields.

```
### Code Structure
├── config/
│   └── db_conn.php      # Database connection
├── classes/
│   ├── account.php      # Base Account class
│   ├── accountManager.php # CRUD operations manager
│   ├── savingsAccount.php  # Savings account implementation
│   ├── currentAccount.php  # Current account implementation
│   └── businessAccount.php # Business account implementation
├── addBankAccount.php   # Form for adding accounts
├── editBankAccount.php  # Form for editing accounts
├── deleteBankAccount.php  # Form for deleting accounts
├── index.php            # Main interface to display accounts
└── README.md            # Documentation
```
