Library Management System

Introduction

This Laravel project assignment, "Building a Comprehensive Library Management System," is designed to demonstrate the core features of Laravel, including routing, controllers, models, form requests, views, migrations, seeders, and more. The project leverages Laravel Jetstream as the starter kit, using Livewire as the Jetstream stack within this PHP framework. The system allows users to manage books, authors, publishers, and borrowers efficiently. It supports two distinct user roles: admin user and general user, each with specific functionalities and permissions assigned to their roles.

Aims and objective

The main aim of this project is to create a library management system where user can manage books, authors, publishers and borrowers with distinct users, that are admin and a user.

Some objectives of this project are:

- To perform CRUD operations in books, authors, publishers and borrowers.
- To properly implement the database relations between the tables.
- To implement search, pagination and filter facility.

Design

MVC Architecture Pattern

Mode-View-Controller (MVC) is a software architecture pattern that separates the development of project in main three components like: Model, View and Controller

Model: In development process the component model component is responsible for managing rules/logic and data.

View: The component view is responsible to display the (UI) user interfaces to the user.

Controller: The controller component acts as a bridge between model and view.

Database

Skeleton table



Authors

|Column Name|Datatype|Attributes|
| :- | :- | :- |
|id|bigint(20)|PRIMARY KEY|
|name|varchar(255)|NOT NULL|
|created\_at|timestamp||
|updated\_at|timestamp||

Books

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|name|varchar(255)|NOT NULL|
|isbn|varchar(255)|NOT NULL|
|description|text||
|available\_copies|int(11)||
|publisherID|bigint(20)|FOREIGN KEY|
|image|varchar(255)||
|created\_at|timestamp||
|updated\_at|timestamp||
|published\_date|date||
|total\_pages|int(10)||
|language|varchar(50)||
|featured|enum('yes','no')|NOT NULL |

book\_authors

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|bookID|varchar(255)|NOT NULL|
|authorID|varchar(255)|NOT NULL|
|created\_at|timestamp||
|updated\_at|timestamp||





book\_genres

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|book\_id|bigint(20)|FOREIGN KEY|
|genre\_id|bigint(20)|FOREIGN KEY|
|created\_at|timestamp||
|updated\_at|timestamp||

Genres

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|name|varchar(255)|NOT NULL|
|created\_at|timestamp||
|updated\_at|timestamp||


Publishers

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|name|varchar(255)|NOT NULL|
|created\_at|timestamp||
|updated\_at|timestamp||


Borrow

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|Primary KEY|
|user\_id|bigint(20)|FOREIGN KEY|
|book\_id|bigint(20)|FOREIGN KEY|
|request|enum||
|status|enum||
|borrow\_date|date||
|return\_date|date||
|created\_at|timestamp||
|updated\_at|timestamp||

Ratings

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|UNSIGNED, NOT NULL|
|user\_id|bigint(20)||
|book\_id|bigint(20)||
|rating|int(11)||
|created\_at|timestamp||
|updated\_at|timestamp||


Reviews

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|Primary KEY|
|user\_id|bigint(20)|FOREIGN KEY|
|book\_id|bigint(20)|FOREIGN KEY|
|review|text||
|created\_at|timestamp||
|updated\_at|timestamp||

Wishlists

|**Column Name**|**Data Type**|**Attributes**|
| :-: | :-: | :-: |
|id|bigint(20)|PRIMARY KEY|
|user\_id|bigint(20)|FOREIGN KEY|
|book\_id|bigint(20)|FOREIGN KEY|
|created\_at|timestamp|NULL DEFAULT NULL|
|updated\_at|timestamp|NULL DEFAULT NULL|



Relationship:

Authors to Book\_authors : One to Many (1:N)

`	`One author can be associated with multiple books though book\_author table.

Books to Book\_authors : One to Many (1:N)

`	`One book can be associated with multiple authors though book\_author table.

Books to book\_genre : One to many(1:N)

`	`One book can be associated with multiple genres though book\_ genre table.

Genres to book\_genre : One to many(1:N)

`	`One genre can be associated with multiple books though book\_ genre table.

Publishers to Book: One to many(1:N)

`	`One publisher can publish multiple books

Users to Borrow: One to many(1:N)

`	`User can borrow many books through borrow table

Users to review: One to many(1:N)

`	`One user can have multiple review through review table.

User to Wishlist: One to many(1:N)

`	`One user can add multiple books in his Wishlist.

Books to review: One to many(1:N)

`	`One book can have multiple reviews done by multiple users

Books to Wishlist: One to many(1:N)

`	`One book can be added in wishlist of multiple users

;
