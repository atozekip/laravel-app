# Laravel CRUD App (AWS EC2)

AWS EC2 上で動作する Laravel の CRUD アプリケーションです。  
ユーザーの登録・一覧表示・編集・削除ができます。

---

## 🚀 機能

- ユーザー登録（Create）
- ユーザー一覧表示（Read）
- ユーザー編集（Update）
- ユーザー削除（Delete）
- 入力バリデーション

---

## 🛠 使用技術

- PHP 8.x
- Laravel 13.x
- SQLite
- Nginx
- AWS EC2
- Git / GitHub

---

## 📸 画面イメージ

※必要なら後でスクショ追加

---

## ⚙️ セットアップ方法

### 1. リポジトリ取得

```bash
git clone https://github.com/atozekip/laravel-app.git
cd laravel-app

### 2. 依存関係インストール

```bash
composer install

### 3. 環境ファイル作成

```bash
cp .env.example .env
php artisan key:generate

### 4. データベース設定（SQLite）

```bash
touch database/database.sqlite

.env を編集：
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

### 5. マイグレーション

```bash
php artisan migrate

### 6. サーバ起動

```bash
php artisan serve

### アクセス

http://localhost:8000

### 学習ポイント

Laravelの基本構造（Route / View / Model）
CRUD処理の実装
バリデーション
AWS EC2へのデプロイ
GitHubによるコード管理


