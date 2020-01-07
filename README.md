# nuxt-wp-laravel

Nuxt×WP×Laravel is used site. but, I can't deploy

## Description

このプロジェクトはWordPressでコンテンツを管理します。WordPressのREST APIを活用し、それをNuxtやLaravelで加工しサイトとして表示します。

## Environment

- Nuxt 2.11
- WordPress 5.3
- Laravel 6.X

## 公開方法

### WordPress設定

このアプリケーションはWordPressのAPIを拡張するために以下のプラグインを使っています。  

[WUXT Headless WordPress API Extensions](https://wordpress.org/plugins/wuxt-headless-wp-api-extensions/)

また、APIを確認する手段として、以下のプラグインを使うと簡単に確認できます。  

[WP REST API Controller](https://ja.wordpress.org/plugins/wp-rest-api-controller/)

### Nuxt設定

このプロジェクトでは、サーバー内でnpmが使え、pm2.js(常駐ソフト)が使える必要があります。

~~ 後で書く。 ~~ 

```
npm i -g pm2
npm run build
npm run start
```

## Nuxt 機能

~~ 後で書く。 ~~ 

## Laravel 機能

### パンくずリストの作成

WordPressのAPIからカテゴリーとタグを抽出し、パンくずリストを作成します。

### サイトマップ用のjson作成

WordPressのAPIをいろいろ叩いて、サイトマップ用のjsonを作成します。これを加工して、nuxtでサイトマップを作成しました。
