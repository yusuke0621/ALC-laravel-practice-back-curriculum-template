# 概要

Laravelで作成されたECサイト用APIの改修・機能追加の課題です。  
ユーザ登録・ログイン、商品閲覧、カートへの追加・購入など、簡易的なECサイトとしての機能が実装されています。  
frontendディレクトリには基本的にはgit submoduleとして [laravel-practice-front-curriculum-template](https://github.com/ALCHEMY-curriculum/laravel-practice-front-curriculum-template) を指定して進めるよ良いですが、自身で実装したNext.jsやNuxt.jsなどを利用しても良いです。
また、frontendを使わずにpostman等で開発を進めても問題ありません。

## 環境構築

### git clone

```
> git clone --recursive [url]
> cd [directory]
```

### .envを作成

`.env.example` をコピーして `.env` ファイルを作成してください。
基本的にはコピーするだけで大丈夫なはずです。

```
> cp .env.example .env
```

### composer install

Sailを起動したいですが、Sail自身もcomposerで管理されているためそのままでは起動できません。  
ローカルPCにComposerをインストールしても良いですが、せっかくDocker上で環境構築できるのに勿体ないですし環境依存を避けたいのでできるだけインストールしたくないです。  
そこで、下記を実行しましょう。

```
> docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

PHPとComposerを含む最小のDockerコンテナを使用し、composer installします。  
ローカルにcomposerが無くても大丈夫なうえ、ローカルにcomposerを入れなくて済みます。  

### バックエンドの立ち上げと初期設定

```
> ./vendor/bin/sail up -d
> ./vendor/bin/sail artisan key:generate
> ./vendor/bin/sail artisan migrate
> ./vendor/bin/sail artisan db:seed
```

サーバ起動
```
> ./vendor/bin/sail artisan serve
```

※ サーバを落とすときは下記2つを行ってください
* `sail artisan serve` しているターミナル上で `control + C`
* `./vendor/bin/sail stop`

### フロントを立ち上げ

フロントのインストールと起動は必須ではありません。  
バックエンド課題なので、postmanなどのツールを使用しても問題ないです。

---

#### 個別に立ち上げる場合
[laravel-practice-front-curriculum-template](https://github.com/ALCHEMY-curriculum/laravel-practice-front-curriculum-template) または個人用にコピーしたリポジトリをcloneし、

```
> yarn install  (または npm install)
> yarn dev      (または npm run dev)
```

※ 止めるとき
* `yarn dev` (またが `npm run dev` )しているターミナル上で `control + C`

#### dockerで立ち上げる場合
※ もしも、バックエンドのgit clone時に `--recursive` をつけ忘れた場合(frontendディレクトリが空の場合)は↓を実行してください

```
> git submodule update --init --recursive
```

frontendに正しくnext.jsがgit submoduleで追加されていれば、バックエンドの立ち上げ( `./vendor/bin/sail up -d` )を実行したときに既に起動しているばずです。
http://localhost:3000 をブラウザで開き、正しく表示されるか確認してください。

起動していない場合、何かしらのエラーが発生している可能性があるので、デタッチモードではなく `-d` を外した `./vendor/bin/sail up` で起動してログを確認してみてください。
