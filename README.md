# Thread Land

## 概要
Laravelで作った簡単な掲示板アプリです。

## 使用技術
- PHP
- Laravel
- MySQL

## 環境構築
### 各種パッケージの導入
※以下はMacOSにおける手順
1. Homebrewをインストール
	```
	$ /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
	```
	ターミナルを閉じて再度開く
	```
	$ brew -v
	Homebrew 4.2.16
	```

2. PHPをインストール(結構時間がかかる)
	```
	$ brew install php

	$ php -v
	HP 8.3.4 (cli) (built: Mar 12 2024 23:42:26) (NTS)
	```

3. Composerをインストール
	```
	$ brew install composer

	$ composer --version
	Composer version 2.7.2 2024-03-11 17:12:18
	```

4. MySQLをインストール
	```
	$ brew install mysql

	$ mysql --version
	mysql  Ver 8.3.0 for macos14.2 on arm64 (Homebrew)
	```

### データベース側の設定
1. データベースを作成
	```
	$ mysql.server start

	$ mysql -uroot

	mysql> create database thread_land;

	mysql> show databases;
	+--------------------+
	| Database           |
	+--------------------+
	| information_schema |
	| mysql              |
	| performance_schema |
	| sys                |
	| thread_land        |
	+--------------------+
	5 rows in set (0.00 sec)
	```

2. MySQLのパスワードを設定
	```
	mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY 'secret';
	Query OK, 0 rows affected (0.00 sec)

	mysql> exit;

	$ mysql.server restart

	$ mysql -uroot -p
	Enter password: secret
	Welcome...
	```

3. MySQLの認証プラグインを変更
	```
	mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secret';
	```

### Laravelプロジェクト側の設定
1. `.env.example`を参考にして、`.env`ファイルを作成する
	```
	...
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=thread_land #データベース名にする
	DB_USERNAME=root
	DB_PASSWORD=secret   #設定したパスワードにする
	...
	```

2. プロジェクトに必要なパッケージをインストール
	```
	$ composer install
	$ npm i
	```

3. sessionsテーブルを追加
	```
	$ php artisan session:table
	```

4. migrateコマンドを実行して、データベースに必要なテーブルを追加
	```
	$ php artisan migrate
	```

5. App Keyを作成
	```
	$ php artisan key:generate
	```

6. Viteのビルドファイルを生成
	```
	$ npm run dev
	```

## 実行
1. データベースを起動
	```
	$ mysql.server start

	$ mysql.server stop
	```

2. 開発サーバーを起動
	```
	$ php artisan serve

	INFO  Server running on [http://127.0.0.1:8000]. 
	```

3. [任意]Tailwind CSSのビルドプロセスを開始
	```
	$ npm run dev
	```
