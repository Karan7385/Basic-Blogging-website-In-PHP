# Blogging Website

This project is a full-fledged blogging platform where users can either join as **creators** to add blogs, news, tutorials, and top trending tools, or as **users** to explore and engage with the content. The platform is built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**.

## Features

### For Creators:
- **Sign Up / Log In**: Secure user registration and login system.
- **Create Posts**: Add new blogs, news, tutorials, and information about trending tools.

### For Users:
- **Sign Up / Log In**: Regular users can register and log in to view content.
- **Browse Blogs**: Users can view, search, and read content created by others.

## Technology Stack

### Frontend:
- **HTML**: Structure of web pages.
- **CSS**: Styling and layout of the website.
- **JavaScript**: Client-side scripting for interactivity (e.g., form validation, email, alerts).

### Backend:
- **PHP**: Server-side programming, handling user sessions, form processing, and communication with the database.

### Database:
- **MySQL**: Relational database for storing user information, blog content, etc.

## Project Structure

```bash
root/
│
├── index.php               # Home page displaying recent posts
├── login.php               # User login page
├── register.php            # User registration page
├── dashboard.php           # Creator dashboard for managing content
├── create_post.php         # Form for creators to add new blogs
├── view_post.php           # View a single blog post
├── edit_post.php           # Edit existing blog posts
├── assets/
│   ├── stylesheets/                # CSS files
│   └── javascript/                 # JavaScript files
│   ├── blogs/                # upload blog images
│   ├── images/                # upload website images images
│   ├── news/                # upload news images
│   ├── tools/                # upload tools images
│   ├── tutorials/                # upload tutorials videos
│   ├── uploads/                # upload users images
│   ├── helpers/                # directory for 
├── includes/
│   ├── db.php              # Database connection
│   ├── header.php          # Common header
│   ├── footer.php          # Common footer
├── uploads/                # Uploaded images and files
└── config.php              # Configuration file (e.g., DB credentials)
