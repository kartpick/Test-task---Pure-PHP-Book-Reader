# Description

This is a test task to show my qualifying skills as backend developer.<br/>
### Capabilities:<br/>

1. Page with list of books by choosen language.
2. Page with choosen book with list of chapters.
3. Page with simplest reading interface.

# Installation

1. Set your db settings in `./system/db.php`.
2. Run `vendor/bin/doctrine orm:schema-tool:create` to create scheme.
3. Run `composer install` and `composer dump-autoload` in terminal.

# Documentation

* `./index.php` uses to launch MVC-kernel.
* `./models/` - Models folder. `Models\` namespace.
* `./controllers/` - Controllers folder. `Controller\` namespace.
* `./views/` - Views folder. Supports folders for `Controller` by class-name. Files name are compared with `generate` method in View classes.
* `./config/` - Folder for configurational files, like language-array.


## System\ namespace
* `./system/kernel.php` - MVC kernel. Uses to parse routes, search controllers.
* `./system/db.php` - PDO decorator, uses Singleton patern.
* `./system/controller.php` - root controller class. Handles actions.
* `./system/view.php` - root view class. Uses to render html views with context by some `method`.
* `./system/model.php` - root model class. Simple query decorator. One model for one table entity.

# Database scheme

## Entities

* Books
* Chapter
* Pages

### books

    * id INT(10) UNSIGNED PRIMARY (auto increment)
    * title VARCHAR(255) UNIQUE
    * author VARCHAR(255)
    * language VARCHAR(2)

### chapter

    * id INT(10) UNSIGNED PRIMARY (auto increment)
    * name VARCHAR(255)
    * order_index INT(10) never-used
    * book INT(10) UNSIGNED fk -> books(id)

### pages

    * id INT(10) UNSIGNED PRIMARY (auto increment)
    * chapter INT(10) UNSIGNED fk -> chapter(id)
    * prev_page INT(10) UNSIGNED fk -> pages(id)
    * next_page INT(10) UNSIGNED fk -> pages(id)
    * data TEXT
    * number INT(10) UNSIGNED


