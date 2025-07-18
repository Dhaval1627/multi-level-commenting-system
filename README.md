# Multi-Level Commenting System

A Laravel 11 project demonstrating:

- **Nested Comment System** with max depth limit
- **Livewire components** for dynamic comments/replies
- **Scheduled command** to delete empty comments
- **Bootstrap 5 styling**

---

## Features

- Posts with comments and nested replies (up to three levels deep as defined)
- Recursive display of comments using Livewire components
- Prevent replies beyond the third level
- Delete post with related comments (cascade delete)
- Scheduled command to remove empty comments
- Bootstrap 5 for UI

---

## Installation Steps

### 1. Clone the repository

```bash
git clone https://github.com/Dhaval1627/multi-level-commenting-system.git
cd multi-level-commenting-system
```

### 2. Install dependencies

```bash
composer install
```

### 3. Copy `.env` file & setup

```bash
cp .env.example .env
php artisan key:generate
```

Set your **database credentials** in `.env`:

```ini
DB_DATABASE=multi_level_commenting_system
DB_USERNAME=<your_username>
DB_PASSWORD=<your_password>
```

---

## Database Setup

### 4. Run Migrations

```bash
php artisan migrate
```

---

### 5. Seeding Fake Data (Optional)

You can manually create posts and comments using:

```bash
php artisan tinker

// Create a post
$post = \App\Models\Post::create([
    'title' => 'Test Post',
    'content' => 'This is a sample post.'
]);

// Create a comment
\App\Models\Comment::create([
    'post_id' => $post->id,
    'content' => 'First comment!',
    'depth' => 1
]);
```

---

## Running the Project

```bash
php artisan serve
```

Visit:  
**http://127.0.0.1:8000**

---

## Commenting System

- Add comments and replies (up to three levels deep)
- Livewire handles real-time updates
- Bootstrap 5 UI components for styling

---

## Scheduled Task: Delete Empty Comments

### Command to run manually:

```bash
php artisan comments:delete-empty
```

### Scheduler in `app/Console/Kernel.php`:

```php
$schedule->command('comments:delete-empty')->everyMinute();
```

---

### Run Scheduler (Manual Execution):

```bash
php artisan schedule:run
```

---

## Delete Post

- Deletes related comments automatically via **cascade delete**.
- Uses foreign key constraint for `ON DELETE CASCADE`.

---

## Tools & Versions

| Package   | Version |
|-----------|---------|
| Laravel   | 12.x    |
| PHP       | 8.2+    |
| Livewire  | Latest  |
| Bootstrap | 5.3     |
| MySQL     | 5.7/8+  |

---

## Project Structure

```
app/Livewire/          => Livewire Components (CommentForm, CommentsTree)
resources/views/       => Blade Templates & Components
app/Models/            => Post & Comment Models
app/Console/Commands/  => DeleteEmptyComments Artisan Command
routes/web.php         => Routes
```

---

### Author

Dhaval Parmar

---
