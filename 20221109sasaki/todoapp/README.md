# Todo List
Todoをシンプルに管理できるアプリです。</br>
![screenshot-index](https://raw.githubusercontent.com/YunaSasaki/garage/main/221109sasaki/screenshot-index.png)
![screenshot-find](https://raw.githubusercontent.com/YunaSasaki/garage/main/221109sasaki/screenshot-find.png)

## 作成した目的
laravelの練習で作成しました。

## 機能一覧
| No. | 機能 |
| ---: | :--- |
| 1 | ユーザーログイン |
| 2 | ユーザー登録 |
| 3 | ユーザーログアウト |
| 4 | Todo一覧取得 |
| 5 | Todo作成 |
| 6 | Todo更新 |
| 7 | Todo削除 |
| 8 | Todo検索 |
| 9 | タグ一覧取得 |
| 10 | タグ選択 |

## 使用技術（実行環境）
Laravel 9.37.0</br>
Laravel Breeze </br>
Node.js

## テーブル設計
### todosテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| :--- | :--- | :---: | :---: | :---: | :---: |
| id | unsigned bigint | 〇 |  | 〇 |  |
| content | varchar(255) |  |  | 〇 |  |
| created_at | timestamp |  |  |  |  |
| updated_at | timestamp |  |  |  |  |
| user_id | unsigned bigint |  |  | 〇 | id(users) |
| tag_id | unsigned bigint |  |  | 〇 | id(tags) |

### usersテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| :--- | :--- | :---: | :---: | :---: | :---: |
| id | unsigned bigint | 〇 |  | 〇 |  |
| name | varchar(255) |  |  | 〇 |  |
| email | varchar(255) |  | 〇 | 〇 |  |
| password | varchar(255) |  |  | 〇 |  |
| created_at | timestamp |  |  |  |  |
| updated_at | timestamp |  |  |  |  |

### tagsテーブル
| カラム名 | 型 | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
| :--- | :--- | :---: | :---: | :---: | :---: |
| id | unsigned bigint | 〇 |  | 〇 |  |
| content | varchar(255) |  |  | 〇 |  |
| created_at | timestamp |  |  |  |  |
| updated_at | timestamp |  |  |  |  |

## ER図
![todo-initiation](https://raw.githubusercontent.com/YunaSasaki/garage/main/221109sasaki/todo-initiation.png)