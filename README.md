# Library API

A modern REST API built with Laravel 12 for managing a digital library system with books and categories management.

## Features

- 📚 **Book Management** - Create, read, update, delete books with filtering and search capabilities
- 🏷️ **Category Management** - Organize books into categories
- 🔗 **Many-to-Many Relations** - Link books to multiple categories
- 🔐 **Authentication** - Secure endpoints with Laravel Sanctum
- 📄 **Pagination & Filtering** - Efficient data retrieval with sorting options
- ✅ **Input Validation** - Comprehensive validation with custom error messages

## Requirements

- PHP 8.2+
- Composer
- Laravel 12
- MySQL 8.0+ (or compatible)

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd library-api
```

### 2. Install dependencies

```bash
composer install
```

### 3. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure database

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_api
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Seed the database (optional)

```bash
php artisan db:seed
```

### 7. Start the application

```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

## Authentication

All endpoints (except login/register) require a valid authentication token.

### Login

```http
POST /api/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}
```

**Response (200):**
```json
{
  "token": "1|abcdefghijklmnop...",
  "message": "Logged in successfully"
}
```

### Register

```http
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### Logout

```http
POST /api/logout
Authorization: Bearer YOUR_TOKEN
```

## API Endpoints

### Books

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/books` | List all books (paginated) |
| POST | `/api/books` | Create a new book |
| GET | `/api/books/{id}` | Get a specific book |
| PUT | `/api/books/{id}` | Update a book |
| DELETE | `/api/books/{id}` | Delete a book |
| GET | `/api/books/search?query=...` | Search books by title or author |

### Book Categories

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/books/{id}/categories` | Get categories of a book |
| POST | `/api/books/{id}/categories` | Attach a category to a book |
| DELETE | `/api/books/{id}/categories` | Detach a category from a book |

### Categories

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/categories` | List all categories |
| POST | `/api/categories` | Create a new category |
| GET | `/api/categories/{id}` | Get a specific category |
| PUT | `/api/categories/{id}` | Update a category |
| DELETE | `/api/categories/{id}` | Delete a category |

## Usage Examples

### Get all books with pagination

```http
GET /api/books?per_page=10&page=1&sort_by=title&order=asc
Authorization: Bearer YOUR_TOKEN
```

**Query Parameters:**
- `per_page` (optional, default: 10) - Items per page
- `page` (optional, default: 1) - Page number
- `sort_by` (optional) - Sort field: `title`, `author`, or `year`
- `order` (optional, default: asc) - Sort order: `asc` or `desc`

### Create a book

```http
POST /api/books
Authorization: Bearer YOUR_TOKEN
Content-Type: application/json

{
  "title": "The Clean Code",
  "author": "Robert C. Martin",
  "year": 2008,
  "description": "A handbook of agile software craftsmanship"
}
```

**Validation Rules:**
- `title` - Required, minimum 3 characters
- `author` - Optional, string
- `year` - Optional, numeric, must be less than current year
- `description` - Optional, string

### Search books

```http
GET /api/books/search?query=clean
Authorization: Bearer YOUR_TOKEN
```

### Attach a category to a book

```http
POST /api/books/1/categories
Authorization: Bearer YOUR_TOKEN
Content-Type: application/json

{
  "category_id": 2
}
```

### Create a category

```http
POST /api/categories
Authorization: Bearer YOUR_TOKEN
Content-Type: application/json

{
  "name": "Fiction"
}
```

**Validation Rules:**
- `name` - Required, minimum 3 characters

## Error Handling

The API returns appropriate HTTP status codes:

- `200 OK` - Successful GET/PUT request
- `201 Created` - Successful POST request
- `204 No Content` - Successful DELETE request
- `400 Bad Request` - Invalid input
- `401 Unauthorized` - Missing or invalid token
- `404 Not Found` - Resource not found
- `422 Unprocessable Entity` - Validation error

### Example error response

```json
{
  "message": "The title field is required.",
  "errors": {
    "title": ["The title field is required."]
  }
}
```

## Project Structure

```
library-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BookController.php
│   │   │   ├── CategoryController.php
│   │   │   └── UserController.php
│   │   └── Requests/
│   └── Models/
│       ├── Book.php
│       ├── Category.php
│       └── User.php
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── routes/
│   └── api.php
└── README.md
```

## Database Schema

### Books Table

```sql
CREATE TABLE books (
  id BIGINT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255),
  year INT,
  description TEXT,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Categories Table

```sql
CREATE TABLE categories (
  id BIGINT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Book Category (Pivot Table)

```sql
CREATE TABLE book_category (
  id BIGINT PRIMARY KEY,
  book_id BIGINT NOT NULL,
  category_id BIGINT NOT NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (book_id) REFERENCES books(id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

## Testing

Run tests with:

```bash
php artisan test
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For issues or questions, please open an issue on the repository.

---

**Built with ❤️ using Laravel 12**
