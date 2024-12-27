# Introduction to OOP


## Description
This project is a simple implementation designed to understand Object-Oriented Programming (OOP) principles. It showcases CRUD (Create, Read, Update, Delete) operations for managing players, with data displayed in a table using [DataTables.net](https://datatables.net). The project is structured with a clear separation of concerns, featuring organized folders for configuration, database, and classes.

## Features
- **Object-Oriented Design**: Core functionalities encapsulated in well-structured classes.
- **CRUD Operations**: Create, read, update, and delete player data.
- **Database Integration**: Interacts with a MySQL database using prepared statements to ensure security and efficiency.
- **Dynamic Table Display**: Uses DataTables.net to display players in a searchable and sortable table.
- **Easy Configuration**: Centralized database configuration in `config/db.php`.

## Project Structure
```
project/
├── config/
│   └── db.php       # Database connection and query methods generator
├── classes/
│   └── Player.php   # Player class for CRUD operations
├── database/
│   └── schema.sql   # Database schema file
└── index.php        # Main file for player manipulation and table rendering
```

## Introduction to OOP

### What is Object-Oriented Programming (OOP)?
Object-Oriented Programming (OOP) is a programming paradigm that organizes code into classes and objects. It promotes code reuse, modularity, and scalability by leveraging concepts such as encapsulation, inheritance, and polymorphism.

### Key OOP Concepts
1. **Encapsulation**:
   - Bundling data (attributes) and methods (functions) that operate on the data into a single unit (class).
   - Example: The `Player` class encapsulates player attributes (e.g., `name`, `age`) and methods (e.g., `create`, `update`).

2. **Inheritance**:
   - Allows a class to inherit properties and methods from another class.
   - Although not implemented in this project, inheritance is useful for creating hierarchies like `AdminPlayer` inheriting from `Player`.

3. **Polymorphism**:
   - Enables a single method or function to behave differently based on the context.
   - Example: Overriding a method like `display()` in a subclass.

4. **Abstraction**:
   - Hiding implementation details and exposing only the necessary functionalities.
   - Example: Methods like `create` and `update` abstract the underlying SQL queries from the user.

### Benefits of OOP in This Project
- **Reusability**: The `Player` class can be extended or reused in other projects.
- **Maintainability**: Encapsulation ensures code is easier to debug and maintain.
- **Scalability**: New features can be added without disrupting the existing codebase.

## How to Use
1. Import the database schema from `database/schema.sql` into your MySQL server.
2. Configure your database credentials in `config/db.php`.
3. Open `index.php` in a browser to view, add, update, or delete player data and see it rendered dynamically in a DataTables table.


