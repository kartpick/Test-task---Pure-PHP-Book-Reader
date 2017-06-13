# Installation

1. Import `test_books.sql` db to your database.
2. Set your db settings in `./system/db.php`.
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
