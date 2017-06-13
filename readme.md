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
* `./system/db.php` - Doctrine bootstrap, uses Singleton patern.
* `./system/controller.php` - root controller class. Handles actions.
* `./system/view.php` - root view class. Uses to render html views with context by some `method`.

> In previous version Model root was removed, because of Doctrine ORM. Controllers now have `EntityManager` to work with db (find models, CRUD by repositories, live updates and etc.). To know more check [Doctrine documentation](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/index.html).

# Database scheme

## Entities

* Book
* Chapter
* Page

### books

    * id INT(11) PRIMARY (auto increment)
    * title VARCHAR(255)
    * author VARCHAR(255)
    * language VARCHAR(2)

### chapters

    * id INT(11) PRIMARY (auto increment)
    * title VARCHAR(255)
    * book_id INT(11) fk -> books(id)

### pages

    * id INT(11) PRIMARY (auto increment)
    * chapter_id INT(11) fk -> chapter(id)
    * previous_id INT(11) fk -> pages(id)
    * next_id INT(11) fk -> pages(id)
    * data LONGTEXT
    * number INT(11)


