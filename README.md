<div id="top"></div>

## 主な使用技術

<!-- シールド一覧 -->
<p style="display: inline">
  <!-- バックエンドのフレームワーク一覧 -->
  <img src="https://img.shields.io/badge/-Laravel-E74430.svg?logo=laravel&style=for-the-badge">
  <!-- バックエンドの言語一覧 -->
  <img src="https://img.shields.io/badge/-Php-777BB4.svg?logo=php&style=for-the-badge">
  <!-- フロントエンドのフレームワーク一覧 -->
  <img src="https://img.shields.io/badge/-TailwindCSS-000000.svg?logo=tailwindcss&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Javascript-F7DF1E.svg?logo=javascript&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Node.js-000000.svg?logo=node.js&style=for-the-badge">
  <!-- ミドルウェア一覧 -->
  <img src="https://img.shields.io/badge/-Mysql-4479A1.svg?logo=mysql&style=for-the-badge">
  <!-- インフラ一覧 -->
  <img src="https://img.shields.io/badge/-Git-F05032.svg?logo=git&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Github-181717.svg?logo=github&style=for-the-badge">
  <img src="https://img.shields.io/badge/-Amazon%20aws-232F3E.svg?logo=amazon-aws&style=for-the-badge">
  <!-- IDE一覧 -->
  <img src="https://img.shields.io/badge/-Visualstudiocode-007ACC.svg?logo=visualstudiocode&style=for-the-badge">
</p>

## はじめに
この度はご訪問いただき、誠にありがとうございます。<br />
こちらは、わたしがWebエンジニアへ転職を目指す過程で作成した、自作アプリのリポジトリです。

実際に使用してみていただくことも可能です。<br />
下記「[使い方](#使い方)」をご参照の上、是非お試しください。

## 目次

1. [アプリについて](#アプリについて)
2. [使い方](#使い方)
3. [使用技術](#使用技術)
4. [データベース設計](#基本設計)
5. [振り返り](#振り返り)
6. [このアプリを作成した背景](#このアプリを作成した背景)
7. [今後の課題](#今後の課題)

<!-- アプリ名を記載 -->

## :pushpin: アプリについて

### アプリ名
未定

### URL
http://15.168.224.85

### アプリの概要
複数人のユーザー間で本の貸し借りを管理したり、その本の感想を共有したりできるアプリです。<br />
1人で使用する場合も、蔵書目録として活用できます。

（ごく私的な目的で作成したアプリのため、用途の意図がわかりにくいかもしれません。もしお時間がございましたら、下記「[このアプリを作成した背景](#このアプリを作成した背景)」をお読みいただけますと幸いです。）


### 機能一覧
- 本の登録・管理機能（CRUD）
- 本の貸し借り管理機能
- コメント投稿機能
- 蔵書の検索機能
- レスポンシブデザイン
- 認証機能（Breeze, Filament）

### 作成期間
要件定義〜デプロイ<br />
延42日間（作業時間：110h程度）

<p align="right">(<a href="#top">トップへ</a>)</p>

## :pushpin: 使い方
上記の[URL](#URL)にて、「本棚検索」はログインせずにご利用いただけます。<br />
また、蔵書の個々の詳細ページ（検索結果の各項目にカーソルを合わせ、クリックしていただくと表示される「図書情報」）も、ログインせずにご覧いただけます。

本の登録や貸し借り機能、コメント機能もお試しいただけます。<br />
ゲスト用のアカウント（ゲストユーザー）を用意しておりますので、こちらのアカウントにログインの上、お試しください。<br />
ゲストユーザーのログイン時は、下記をご参照ください。<br />
| ログイン情報     |                    |
| :----------    | :----------        |
| メールアドレス：  | guest@exmaple.com  |
| パスワード：     | guest              |

<p align="right">(<a href="#top">トップへ</a>)</p>

## :pushpin: 使用技術

ローカルにて、MAMP環境で開発しました。

### フロントエンド     　　　 
- Tailwind CSS 3.1.0
- Javascript
- Node.js 22.2.0
### バックエンド
- PHP 8.2.0
- Laravel 11.23.5

### ミドルウェア
- MySQL 5.7.39

### インフラ
- Git/Github
- AWS EC2(Amazon Linux 2023)
- Apache

### その他
- Visual Studio Code
- Google Sheets
- Google Document
- Mac OS

<p align="right">(<a href="#top">トップへ</a>)</p>

## :pushpin: データーベース設計

### ER図
IDEF1X記法で、簡易的に作成しています。<br />
![ER図](https://github.com/user-attachments/assets/cb1c833b-d192-41c5-9975-4a35ddab5d0f)

### テーブル定義
#### typesテーブル
![typesテーブル](https://github.com/user-attachments/assets/8c674dfa-9668-4fba-ab17-5bc7169d421f)
#### usersテーブル
![usersテーブル](https://github.com/user-attachments/assets/628cebd0-f168-49cf-b89b-bf9e44ae7fac)
#### booksテーブル
![booksテーブル](https://github.com/user-attachments/assets/eb7214cf-6989-4b74-96c1-7146c6b747e4)
#### lendingsテーブル
![lendingsテーブル](https://github.com/user-attachments/assets/1aec06b7-300c-42c5-85c3-11e71afc2976)
#### commentsテーブル
![commentsテーブル](https://github.com/user-attachments/assets/532c2187-4e97-46e6-8573-df2c1675351f)

<p align="right">(<a href="#top">トップへ</a>)</p>

## :pushpin: 振り返り
### 工夫した点

### 苦労した点

<p align="right">(<a href="#top">トップへ</a>)</p>

## :paperclip: このアプリを作成した背景
### 要約
以前、友人・知人間で、直接顔を合わせなくても本の貸し借りができる「共有本棚」を設置・運用したことがありました。<br />
その際、本棚に置いている各々の本と、貸し借りの状況を把握できた方が良いだろうと思い、それに適したアプリがほしい（作れるものなら自分で作れたらよかった）と思ったことがありました。<br />
**今回作成したアプリは、その、当時自分が「ほしい」と思っていたアプリです。**

### 詳述
「共有本棚」の要旨は次のとおりです。
1. **各人に貸したい・貸しても構わないといった本などを、1つの本棚に置いておく。また、その本棚にあるものは、各々借りてよい**
2. **貸し手と借り手は、直接会わなくても貸し借りができる。また、好きなときに借りられる**

このアイデアの発想は、ロンドンやベルリンで使われなくなった公衆電話ボックスが、「公共本棚」として、住民間で不要になった本の交換の場として活用されているという話から来ています。

#### 共有本棚の発案
わたしは5年ほど前、新型コロナウイルスのパンデミックがはじまる直前のころ、長野県の山間部に移住しました。<br />
この地域には図書館や書店がなく、最寄りのそれらを訪ねるには、車で40分ほどの市街地まで行かなければなりません（そしていずれも小規模なものです）。<br />
一方で、移住後に知り合った地域の方々には、日頃から本に親しんでいたり、図書館や書店を求めていたりする方が少なくないように見受けられました。

長引く行動制限下で、図書館や書店のような「空間」や本との「偶然の出会い」に対する”飢え”を覚えていた中、上述の公衆電話ボックスの話を思い出しました。<br />
地域の友人・知人それぞれの志向・関心が一所に集う様子はおもしろいのではないかという見込みもあり、2年半ほど前、友人2名に声をかけ、「共有本棚」を設置しました。

#### 本棚の設置
本棚は、友人宅の玄関の一隅に設置しました。<br />
また、わたしたちの場合は以下の2点を鑑み、メンバーシップ制としました。
1. 本は貸し出されたものである（持ち主あり）
2. 人の家のスペースを借りている

安全面の対策として、ナンバーロック式の頑丈なキーボックスに、本棚を設置した友人宅の合鍵を収納しました。キーボックスは友人宅の敷地内に設置し、キーボックスの在り処と解除ナンバーを、メンバー間に限って共有しました。

1ヶ月ほどの試験運用の後、他の顔見知りにも声をかけつつ、最終的にはメンバーは16名ほどに利用していただき、1年ほど運用しました。

#### アプリ作成
この本棚を準備・運用する中で、本棚にあるものや貸し借りの状況を把握する必要がありました。
実際には専用ファイルや用紙など文房具を用いて管理しました。しかし同時に、この管理をデジタル化してもいいし、適したアプリはないか、あるいは自分で作れたらいいのに…などと考えたりもしました。

わたしは最近、職業訓練校の「プログラマー・システムエンジニア養成科」を修了しました。今の自分であれば、当時の自分の気持ちに応えられるのではないかと思い、訓練で学んだ技術の復習も兼ね、このアプリを作成することにしました。

<p align="right">(<a href="#top">トップへ</a>)</p>

## :pushpin: 今後課題
### 課題

### アプリの改善点
- まとめて借りる/返却する機能（カート機能）
