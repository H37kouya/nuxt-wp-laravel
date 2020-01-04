# nuxt-wp-laravel

Nuxt×WP×Laravel is used site. but, I can't deploy

## Description

このプロジェクトはWordPressでコンテンツを管理します。WordPressのREST APIを活用し、それをNuxtやLaravelで加工しサイトとして表示します。

## Environment

- Nuxt 2.11
- WordPress 5.3
- Laravel 6.X

## 問題点

このプロジェクトはレンタルサーバー(Xserver)では、アドセンス広告が通りません。しっかり検証していないので、長く動かせば通るかも。  
それ以外はNuxtの機能でトップページ(https://over-hk.netのようなページ)がバグります。なぜだかわかりません。  
そもそもトップページのみnuxtのMiddlewareを通過しませんので、Nuxtプロジェクト内部でリダイレクトが貼れません。

## 公開方法

### WordPress設定

### Nuxt設定
このプロジェクトでは、サーバー内でnpmが使え、pm2.js(常駐ソフト)が使える必要があります。

~~ 後で書く。 ~~ 



## Nuxt 機能

## Laravel 機能
