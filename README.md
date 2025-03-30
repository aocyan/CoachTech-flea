# CoachTech-flea(コーチテックフリマ)
## 〇　環境構築手順  
※(osはwindows11を使用しております。osがmacを使用の際は適宜環境構築お願いします。)
1. ubuntu内で　git clone git@github.com:aocyan/CoachTech-flea.git　を実行しクローンする。
2. DockerDesktopアプリを立ち上げる
3. ubuntu内で　docker-compose up -d --build　を実行する。(CoachTech-fleaディレクトリ内で実行する）
4. ubuntu上で　code .　を実行(CoachTech-fleaディレクトリ内で実行する）し、  
　"docker-compose.yml"ファイル内の  
    mysql:  
        image: mysql:8.0.26  
        environment:  
            MYSQL_ROOT_PASSWORD: root  
            MYSQL_DATABASE: laravel_db  
            MYSQL_USER: laravel_user  
            MYSQL_PASSWORD: laravel_pass  
であることを確認してください。
6. ubntu上で docker-compose exec php bash を実行し、PHPコンテナ上で  
　composer install　を実行する。
7. "6"に続いてPHPコンテナ上で  
　cp .env.example .env を実行し、.envファイルをコピーする
8. "6"でコピーした".env"ファイルと".yml"ファイルを同期する  
　.envファイルを  
     DB_HOST=mysql  
     DB_DATABASE=laravel_db  
     DB_USERNAME=laravel_user  
     DB_PASSWORD=laravel_pass  
 に設定を変更する。  
 ※'.env' を保存できませんでした。とエラーが出た場合は、ubuntu内CoachTech-fleaディレクトリ内で
   sudo chown ユーザ名:ユーザ名 ファイル名　でファイルを書き換える権限を付与させてください。  
   例：sudo chown aocyan:aocyan /home/aocyan/coachtech/laravel/mogitate-test/src/.env
9. http://localhost:8080 にデータベースが存在しているか確認する（laravel_dbがあるか確認してください）
10. ubuntu内PHPコンテナ上で
　php artisan key:generate　を実行し、アプリケーションキーを生成する。
12. ubuntu内PHPコンテナ上で  
  php artisan storage:link　を実行し、シンボリックリンクを作成する。   
13. ubuntu内PHPコンテナ上で  
  php artisan migrate　を実行し、マイグレーションする。  
14. ubuntu内PHPコンテナ上で  
　php artisan db:seed　を実行し、シーダファイルを挿入する。
15. http://localhost/ にアクセスする  
　注１）permissionエラーが出た際には、ubuntu内CoachTech-fleaディレクトリで、  
 　　sudo chmod -R 777 src/*　を実行してください。  
　注２）出品するときなどにchmod(): Operation not permittedエラーが出た際には、ubuntu内CoachTech-fleaディレクトリで  
　　 sudo chown -R www-data:www-data src/storage　を実行してください。  
15.Stripe導入手順  
　①　Stripe公式サイトにアクセスしてアカウントを作成する  
　②　公式サイトの左上にある≡をクリックして、メニュー下にある「開発者」をクリックする。  
　　 （このとき、左上に「テスト環境」と書かれていることを確認する。）  
　③　「APIキー」をクリックすると、「公開可能キー」と「シークレットキー」があることを確認する。  
　④　VSCode内LaravelのCoachTech-fleaで.envファイルを開き、  
　　　STRIPE_KEY=「Stripeの公開可能キーのトークン」  
　　　STRIPE_SECRET=「Stripeのシークレットキーのトークン」  
　　をそれぞれ挿入する。  
　⑤　VSCode内LaravelのCoachTech-fleaで、config/service.phpに  
　　　return [  
　　　　'stripe' => [  
    　　　　　　'secret' => env('STRIPE_SECRET'),  
    　　　　　　'public' => env('STRIPE_KEY'),  
    　　　　　　],  
    　　　　];  
# 〇　使用技術(実行環境)
* PHP：7.4.9
* Laravel：8.83.8
* MySQL：15.1
* ubuntu：24.04.1

# 〇　ER図
![CoachTechFlea](https://github.com/user-attachments/assets/7ac2e99f-c135-4bd4-949a-9c8e83701162)


# 〇　URL
* 開発環境：　http://localhost/
* phpMyAdmin：　http://localhost:8080/
