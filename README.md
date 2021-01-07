<h1>獨協大学放送研究会Webサイト</h1>

  <a target="_blank">https://dokkyobc.tk<br></a>
 <p>記事投稿機能、スクレイピングによる動的な生成によって<br>部活の情報を発信するWebサイトです。</p>

<h2>機能一覧</h2>

<ul>
  <li>スクレイピング(Puppeteer, YouTube Data API)</li>
  <img width="700" alt="dbc_scraping" src="https://user-images.githubusercontent.com/67939683/103884245-a2adc580-5121-11eb-9b44-3bf01fe3ac73.png">
  <p>AWS LambdaでPuppeteer, YouTube Data APIを定期実行し、<br>部活のブログ, YouTubeが更新された際、当サイトの更新情報を動的に生成します。</p>
  <li>記事投稿、削除</li>
  <li>画像投稿</li>
  <li>ページネーション</li>
  <li>セッションを用いたログイン、ログアウト</li>
  <p>
    ユーザー名:<br>
    パスワード:
  </p>
</ul>

<h3></h3>

<h2>使用技術</h2>

<h3>言語</h3>
<ul>
  <li>JavaScript</li>
  <li>PHP</li>
  <li>MySQL</li>
</ul>

<h3>外部API, ライブラリなど</h3>
<ul>
  <li>YouTube Data API</li>
  <li>Puppeteer(Node.js)</li>
  <li>swiper(JavaScript)</li>
</ul>


<h3>開発環境</h3>
<ul>
  <li>Docker, docker-compose</li>
</ul>


<h3>本番環境</h3>
<img width="500" alt="dbc_scraping" src="https://user-images.githubusercontent.com/67939683/103926433-41efae80-515c-11eb-9447-521a91bce748.png">
<ul>
  <li>AWS (ECS, EC2, RDS, Lambda, ALB, Route53, Certificate Manager)</li>
  <li>CircleCI(自動デプロイのみ)</li>
</ul>
