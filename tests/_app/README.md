Create test db and migrations
==============================

* Create database.
* Before starting migrations past configs to db.php or db.local.php

To create user table migrations run in root *module* folder:
```
php tests/_app/yii.php migrate/up --interactive=0 --migrationPath=@testmigrations
```

To create rbac migrations run in root *module* folder:
```
php tests/_app/yii.php migrate/up --interactive=0 --migrationPath=@yii/rbac/migrations
```

To create hit-counter table run migration:
```
php tests/_app/yii.php migrate/up --interactive=0 --migrationPath=@modulemigrations
```


Now all tebles for tests mast be set as well. =)
