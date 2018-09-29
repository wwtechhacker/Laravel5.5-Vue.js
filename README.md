---
description: Setup Local Environment
---

# Getting Started

## Install

Run the following bash commands on the terminal :

```
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ npm install
```

{% hint style="info" %}
 Prod &gt; Dev &gt; local Database
{% endhint %}

create .env file:

```text
APP_NAME= $name
APP_ENV= $env
APP_KEY=base64:5rcY8fdbCgLFXkV8ReyoVWLG8LAvVTEt8nziwCH19Tk=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= $Database Name
DB_USERNAME= $SQL_Username
DB_PASSWORD= $SQL_Password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

GOOGLE_API = 'Google api key'
FACEBOOK_ID = ''
```



