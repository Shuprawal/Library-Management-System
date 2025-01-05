Library Management System

1 Introduction

This Laravel project assignment, "Building a Comprehensive Library Management System," is designed to demonstrate the core features of Laravel, including routing, controllers, models, form requests, views, migrations, seeders, and more. The project leverages Laravel Jetstream as the starter kit, using Livewire as the Jetstream stack within this PHP framework. The system allows users to manage books, authors, publishers, and borrowers efficiently. It supports two distinct user roles: admin user and general user, each with specific functionalities and permissions assigned to their roles.

2 Aims and objective

The main aim of this project is to create a library management system where user can manage books, authors, publishers and borrowers with distinct users, that are admin and a user.

Some objectives of this project are:

- To perform CRUD operations in books, authors, publishers and borrowers.
- To properly implement the database relations between the tables.
- To implement search, pagination and filter facility.

3 Design
3.1 MVC Architecture Pattern

Mode-View-Controller (MVC) is a software architecture pattern that separates the development of project in main three components like: Model, View and Controller. This project follows MVC architecture pattern. 
Model: In development process the component model component is responsible for managing rules/logic and data.
View: The component view is responsible to display the (UI) user interfaces to the user.
Controller: The controller component acts as a bridge between model and view.


4 Installation steps

Before setting up the project the following tools must be installed in the device:

- PHP
- Composer
- Node.js and npm
- MySQL

After installing the tools create a new project from terminal:
![Creating new project](<public/screenshots/Screenshot 2025-01-05 140741.png>)

After creating project navigate inside that project and setup database from .env file:
![database env file](public/screenshots/env.png)

Install the npm dependencies:
![install npm](<public/screenshots/npm install.png>)
![run npm](<public/screenshots/npm dev.png>)

Start the deployment server
![Starting server](<public/screenshots/artisan serve.png>)
or 
![starting from localhost](public/screenshots/localhost.png)










5 Brief usage guide

The library management system allows users to manage books, authors, publishers and borrower efficiently. This system has two user roles with a different functionality:
User: Can view books, borrow them, leave the revie, rate the book, author and publisher and watch borrow history
Admin: Have the full access to manage all resources.

5.1 Roles and permission for admin panel:
Features:
Manage Books: Add, edit, delete view books and feature a book to display in home page.

Manage Authors: Add, edit, delete and view authors.

Manage Publishers: Add, edit, delete and view publishers.

Manage Genres: Add, edit, delete and view genres.

Manage Users: Delete and view users.

Manage Borrowers: View borrow request, accept or decline the request, view borrowed books, make sure if they have returned or not and view the history of returned books.

Admin Interface

# Admin Panel User Guide

## Admin Interface Overview

Upon logging in, the admin is directed to the home page. The navigation bar at the top includes the following buttons:

- **Home**
- **Category** (dropdown with options: Authors, Publishers, Users, Borrow, Genre, Book)
- **Genre**
- **Contact Us**
- **Search Bar**
- **Profile**

### Navigation and Features

#### Category Dropdown Options
- **Authors**: Navigate to the authors page to view a list of authors with options to edit or delete. A button at the bottom allows adding a new author.
- **Publishers**: Navigate to the publishers page to view a list of publishers with their addresses and options to edit or delete. A button at the bottom allows adding a new publisher.
- **Users**: Navigate to the users page to view a list of users with an option to delete users.
- **Genre**: Navigate to the genre page to view a list of genres with options to edit or delete. A button at the bottom allows adding a new genre.
- **Book**: Navigate to the book list page to view a list of books with options to edit or delete. A button at the bottom allows adding new books.

#### Borrow Page
From the borrow page, the admin can:
- View a list of borrow requests.
- Accept or deny borrow requests.
- View lists of borrowed and returned books.

#### Genre Section
The genre option in the navigation bar displays a list of genres and an "All Books" option. Clicking these options shows a list of books belonging to the selected genre.

### Home Page Features

#### Header Section
- Displays an image of the featured book.
- Includes a "Remove Featured" button for removing the featured book.

#### Summary Boxes
Below the navigation bar, summary boxes display:
- Total number of books.
- Total number of users.
- Total books borrowed.
- Total number of authors.

#### Book List
Below the summary boxes, a list of available books is displayed with the following options:
- **Read More**: Redirects to the book's details page.
- **Wishlist**: Adds the book to the wishlist.

### Book Details Page
When redirected to the book details page, the admin can:
- View detailed information about the book.
- Edit, delete, or feature the book.
- Access the comments section to view and manage comments.
- Rate the publishers and authors.
- View a list of books by the same author.







5.2 Roles and permission for user panel:

View Books: View the list of books with details.

Manage Wishlist: Add and remove the book from Wishlist.

Borrow Request: Request to borrow available books.

Manage Review: Add, delete and view review.

Manage Rating: Add rating for books, authors and publishers.








6 Functionality

|SN|Function|Description|Implementation|
| :- | :- | :- | :- |
|1|Login|Admin and user can login into the system from login page after entering correct email and password.|Yes|
|2|Register|New user can register into the system by entering name, unique email and password. |Yes|
|3|CRUD operation for books|Admin can perform CRUD operations for books.|Yes|
|4|CRUD operation for authors|Admin can perform CRUD operations for authors.|Yes|
|5|CRUD operation for publishers|Admin can perform CRUD operations for publishers.|Yes|
|6|CRUD operation for genres|Admin can perform CRUD operations for genres.|Yes|
|7|Borrowers|User can request to borrow books. Admin can accept or decline request and make sure if book is returned or not. Admin can also see returned books history.|Yes|
|8|Search books|User can search books by book title, ISBN number, authors or publishers.|Yes|
|9|Filter books|User can filter books based on genre.|Yes|
|10|Pagination|Pagination is implemented.|Yes|
|11|Responsive|Bootstrap is used to make website responsive.|Yes|
|12|Wishlist|Users can add and remove books from their Wishlist. |Yes|
|13|Review|User can leave a comment in the books.|Yes|
|14|Rating|Users can give a rating for books, authors and publishers.|Yes|
|15|Feature book|Admin can feature books to display them in a header image of home page and also can remove them.|Yes|


7 Database

7.1 Singleton tables:

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



7.2 Relationship:

Rating to Books, Authors, Publishers: Polymorphic One to Many(1:N)

`	`Rating can belong to a book, author or publisher through a polymorphic relation.

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


8 Screen shots of pages:
Homepage
![homepage](public/screenshots/homepage1.png)
![homepage](public/screenshots/homepage2.png)
![homepage](public/screenshots/homepage3.png)
![homepage](public/screenshots/homepage4.png)


Bookpage
![bookpage](public/screenshots/book1.png)
![bookpage](public/screenshots/book2.png)
![bookpage](public/screenshots/book3.png)
![bookpage](public/screenshots/book4.png)

All book page
![AllBook](public/screenshots/allbooklist.png)
![AllBook](public/screenshots/allbooklist2.png)

Pagination
![pagination](public/screenshots/pagination.png)

Search
![search](public/screenshots/search.png)

Filter by genre
![genre](public/screenshots/listingbugenre1.png)
![genre](public/screenshots/listingbugenre2.png)
![genre](public/screenshots/listingbugenre3.png)

User Borrow page
![borrow](public/screenshots/userBorrowRequest.png)
![borrow](public/screenshots/userborrowRequest2.png)

User Profile page
![profile](public/screenshots/profile1.png)
![profile](public/screenshots/profile2.png)

Wishlist page
![wishlist](public/screenshots/wishlist1.png)
![wishlist](public/screenshots/wishlist2.png)


Author list
![authorlist](public/screenshots/adminauthorlist.png)
![authorlist](public/screenshots/adminAuthorlist2.png)

Add Author page
![addAuthor](public/screenshots/addnewAuthor.png)

Edit Author page
![editAuthor](public/screenshots/editAuthor.png)

Publisher list
![publisher](public/screenshots/publisherlist1.png)
![publisher](public/screenshots/publisherlist2.png)

Add Publisher page
![addPublisher](public/screenshots/addPublisher.png)

Edit Publisher page
![editPublisher](public/screenshots/editPublisher.png)

Genre list
![genre](public/screenshots/genrelist.png)

Add Genre page
![addGenre](public/screenshots/addGenre.png)

Edit Genre page
![editGenre](public/screenshots/editGenre.png)

Admin Borrow page
![borrow](public/screenshots/adminborrowrequest.png)
![borrow](public/screenshots/adminacceptedrequest.png)
![borrow](public/screenshots/adminborrowreturned.png)














