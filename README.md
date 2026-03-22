# 🚀 PHP Mini MVC Skeleton
![PHP](https://img.shields.io/badge/PHP-8%2B-blue) ![Composer](https://img.shields.io/badge/Composer-required-brightgreen) ![License](https://img.shields.io/badge/License-MIT-green)

This is a simple, clean, and lightweight MVC (Model-View-Controller) starter kit built specifically for PHP 8+. It is perfect if you want to build a small-to-medium web project without the complexity or weight of a huge framework. It keeps things fast, organized, and easy to understand.



## 📑 Table of Contents
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Installation](#-installation)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [License](#-license)

---



## ✨ Features
- 🏗️ **Classic MVC Pattern**: Clear separation of concerns between logic, data, and presentation.
- 📦 **PSR-4 Autoloading**: Modern class loading using Composer.
- 🛣️ **Custom Router**: Lightweight URL routing with support for dynamic parameters (e.g., `/users/{id}`).
- 🗄️ **Base Model (PDO)**: Ready-to-use SQLite integration with common CRUD operations.
- 🛡️ **Error Handling**: Custom exception and error handling for cleaner debugging.
- ⚡ **Zero Bloat**: Extremely minimal codebase; perfect for rapid prototyping.

---



## 🛠️ Tech Stack
- **Language**: PHP 8+
- **Package Manager**: Composer
- **Database**: SQLite (default)
- **Architecture**: MVC

---



## 📥 Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/almhdy24/php-mini-mvc.git
   cd php-mini-mvc
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Start the local server:
   ```bash
   php -S localhost:8000 -t public
   ```

4. Access the application at `http://localhost:8000`.

---



## 💡 Usage



### Adding a New Route
Edit `routes/web.php` to map URLs to Controllers:
```php
$router->get('/profile', ['ProfileController', 'index'], 'profile');
```



### Creating a Controller
Create a new file in `app/Controllers/` extending `App\Core\Controller`:
```php
namespace App
aulControllers;
use App\Core\Controller;

class ProfileController extends Controller {
    public function index() {
        $this->view('profile', ['user' => 'John Doe']);
    }
}
```

---



## 📁 Project Structure
| Path | Description |
| :--- | :--- |
| `/app` | Core application logic (Controllers, Models, Views) |
| `/config` | Application configuration files |
| `/public` | Entry point of the application (index.php) |
| `/routes` | Route definitions |
| `/storage` | SQLite database file storage |

---



## 📜 License
Distributed under the MIT License. See `LICENSE` for more information.

---



## 🔗 Important Links
- [GitHub Repository](https://github.com/almhdy24/php-mini-mvc)

---

<footer>
<p>Built with ❤️ by almhdy24 | <a href="https://github.com/almhdy24/php-mini-mvc">View on GitHub</a></p>
<p>If you find this project useful, please consider giving it a star! 🌟</p>
</footer>
