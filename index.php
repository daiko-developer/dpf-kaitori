<?php
$title = 'DPFラクラク買取 | カンタンで便利！';
$description = 'どこよりもカンタンで便利なDPFラクラク買取';
$keywords = 'DPF買取,ラクラク,便利';
$is_home = true;  //ホーム（トップページ）の判定用の変数を定義（header.php で使用）
$path = './';  //追加（カレントディレクトリを表す ./ ）
include_once $path .'common/components/head.php'; //変更（$path. を追加）
?>
  <link rel="stylesheet" href="<?php echo $path; ?>css/slick-theme.css">
  <link rel="stylesheet" href="<?php echo $path; ?>css/slick.css">
  <script src="<?php echo $path; ?>js/slick.min.js"></script>
  <script src="<?php echo $path; ?>js/slick_option.js"></script>
</head>

<body>
  <div id="wrapper" class="wrapper home">
    <?php include_once $path .'common/components/header.php'; ?>

    <!-- メインコンテンツ -->
    <main id="main" class="main">
      <div class="homevisual">
        <div class="box box01">
          <div class="boxin inner1500">
            <div class="img01"><a href="#satei"><img class="img01-1" src="<?php echo $path; ?>images/home/home-slide-box01-txt03.png" alt="どこよりも早く！！０秒見積もり！！"><img class="img01-2" src="<?php echo $path; ?>images/home/home-slide-box01-txt03-hover.png" alt="どこよりも早く！！０秒見積もり！！今すぐ査定"></a></div>
            <div class="right">
              <div class="img02"><img src="<?php echo $path; ?>images/home/home-slide-box01-txt01.png" alt="どこよりもカンタン・便利なラクラク買取"></div>
              <div class="img03"><img src="<?php echo $path; ?>images/home/home-slide-box01-txt02.png" alt="古くても、汚れていても、詰まっていてもOK"></div>
              <p class="txt">DPF, DPD, DPR, インジェクター, 触媒のみの買取もOK</p>
            </div>
          </div>
        </div>
        <div class="box box02">
          <div class="boxin inner1500">
            <div class="block-txt">
              <div class="txt01"><span class="maker"><img src="<?php echo $path; ?>images/home/home-slide-box02-txt.png" alt="FUSOキャンター触媒"></span><span class="txt03">買取強化中！</span></div>
              <div class="txt02">今なら！<span class="price01"><span class="price">80,000</span><span class="unit">円</span></span></div>
            </div>
            <div class="img"><img src="<?php echo $path; ?>images/home/home-slide-box02-img.png" alt="FUSOキャンター触媒"></div>
          </div>
        </div>
        <div class="box box02">
          <div class="boxin inner1500">
            <div class="block-txt">
              <div class="txt01"><span class="maker"><img src="<?php echo $path; ?>images/home/home-slide-box03-txt.png" alt="FUSOキャンター触媒"></span><span class="txt03">買取強化中！</span></div>
              <div class="txt02">今なら！<span class="price01"><span class="price">50,000</span><span class="unit">円</span></span></div>
            </div>
            <div class="img"><img src="<?php echo $path; ?>images/home/home-slide-box03-img.png" alt="FUSOキャンター触媒"></div>
          </div>
        </div>
        <div class="box box02">
          <div class="boxin inner1500">
            <div class="block-txt">
              <div class="txt01"><span class="maker"><img src="<?php echo $path; ?>images/home/home-slide-box04-txt.png" alt="FUSOキャンター触媒"></span><span class="txt03">買取強化中！</span></div>
              <div class="txt02">今なら！<span class="price01"><span class="price">80,000</span><span class="unit">円</span></span></div>
            </div>
            <div class="img"><img src="<?php echo $path; ?>images/home/home-slide-box04-img.png" alt="FUSOキャンター触媒"></div>
          </div>
        </div>
        <div class="box box03">
          <div class="boxin inner1500">
            <div class="txt">LINEでの<br>買取申込<br>見積りも<br>可能です</div>
            <div class="img"><img class="" src="<?php echo $path; ?>images/home/img04.png" alt="ラクラク買取LINE画面"></div>
            <div class="friend-link">
              <div class="qr"><img src="https://qr-official.line.me/gs/M_969goccg_GW.png"></div>
              <a href="https://lin.ee/OiumxOV"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
            </div>
          </div>
        </div>
      </div>

      <section id="news" class="home-news area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">お知らせ</h2>
          <ul class="list list-home-news">
            <li class="item">
              <time class="time">2023/05/XX</time>
              <p class="head">サイトOPEN記念キャンペーン実施中！</p>
            </li>
            <li class="item">
              <time class="time">2023/05/XX</time>
              <p class="head">サイトを公開しました！</p>
            </li>
          </ul>
        </div>
      </section>

      <section id="point" class="home-point area">
          <div class="inner1500">
            <h2 class="ttl ttl-cmn01">ラクラク買取！安心信頼 <span class="ttlin01">3</span>つのポイント！</h2>
          </div>
          <ul class="list list-home-point">
            <li class="item item03">
              <div class="itemin inner1500">
                <div class="block-img"><img src="<?php echo $path; ?>images/home/img04.png" alt="LINEによる簡単見積り"></div>
                <div class="block-txt">
                  <h3 class="head">０秒見積り</h3>
                  <p class="txt">LINE/WEBによる即時見積り<br>いつでもどこでも見積りが可能！</p>
                </div>
              </div>
            </li>
            <li class="item item01">
              <div class="itemin inner1500">
                <div class="block-img"><img src="<?php echo $path; ?>images/home/img02.png" alt="送料無料"></div>
                <div class="block-txt">
                  <h3 class="head">送料無料！<br>着払いで送るだけ！</h3>
                  <p class="txt">離島からの発送など、送料が5,000円を上回る場合、買取価格から超過分を相殺させていただきます。</p>
                </div>
              </div>
            </li>
            <li class="item item02">
              <div class="itemin inner1500">
                <div class="block-img"><img src="<?php echo $path; ?>images/home/img03.png" alt="スピード入金"></div>
                <div class="block-txt">
                  <h3 class="head">スピード入金<br>
                    最短翌日振り込み！</h3>
                  <p class="txt">商品が届き次第、翌営業日までに査定いたします。<br>
                    お客様に査定額を連絡し、ご確認いただけましたら翌営業日に振り込みいたします。</p>
                </div>
              </div>
            </li>
          </ul>
      </section>

      <section id="price" class="kaitori-price area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">買取の限界に挑戦！<br>高価買取リスト（2023/5/XX最新版）</h2>
          <div class="list table-kaitori-price">
            <div class="wrap">
              <table class="table">
                <thead class="thead">
                  <tr class="item">
                    <th class="datattl01">分類</th>
                    <th class="datattl01">車種</th>
                    <th class="datattl01">エンジン型式</th>
                    <th class="datattl01">パーツ</th>
                    <th class="datattl01">買取価格</th>
                  </tr>
                </thead>
                <tbody id="price-table-body" class="tbody"></tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <section id="case" class="home04 area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">買取事例</h2>
          <ul class="slick01">
            <li class="item up-adb up-mx-10 up-mx-5@sp">
              <div class="img"><img src="<?php echo $path; ?>images/home/img05.png" alt=""></div>
              <div class="block">
                <h3 class="head">三菱ふそう　キャンター</h3>
                <div class="model">4M50</div>
                <div class="price"><span class="pricein">¥</span>60,000</div>
              </div>
            </li>
            <li class="item up-adb up-mx-10 up-mx-5@sp">
              <div class="img"><img src="<?php echo $path; ?>images/home/img06.png" alt=""></div>
              <div class="block">
                <h3 class="head">日野・トヨタ　デュトロ</h3>
                <div class="model">XZC605</div>
                <div class="price"><span class="pricein">¥</span>50,000</div>
              </div>
            </li>
            <li class="item up-adb up-mx-10 up-mx-5@sp">
              <div class="img"><img src="<?php echo $path; ?>images/home/img07.png" alt=""></div>
              <div class="block">
                <h3 class="head">三菱ふそう ファイター</h3>
                <div class="model">6M60</div>
                <div class="price"><span class="pricein">¥</span>80,000</div>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <section id="flow" class="home-flow area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">申込から入金までの流れ</h2>
          <div class="tab-area">
            <input class="tab-input" type="radio" name="tab_name" id="tab1" checked>
            <label class="tab-label" for="tab1">買取依頼書で申し込む場合</label>
            <div class="tab-block">
              <ul class="list list-home-flow">
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">申込</h3>
                      <p class="txt">
                        買取依頼書をダウンロードして必要事項ご記入してください。また合わせて本人確認書類もご用意ください。<br>
                        ※個人のお客様は本人確認書類が初回お取引時に必要です。<br><br>
                        買取依頼書は<a class="link" href="https://drive.google.com/uc?id=17BahxJcsY3ZqYa7RlqkqGk0GL2vGOBfV" target="_blank">こちら</a>から
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img13.jpg" alt="書類準備"></div>
                  </div>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">お客様から発送</h3>
                      <p class="txt">
                        買取依頼書と本人確認書類を同梱頂き、DPFを下記まで着払いでご発送下さい。<br><br>
                        〒590-0121<br>
                        大阪府堺市南区片蔵486-1<br>
                        リビルトワールド DPFラクラク買取宛<br>
                        TEL <a href="tel:0723493548">072-349-3548</a>
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img10.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・ヤマト運輸・佐川急便をご利用ください。配送料は弊社が負担させていただきますので着払いでお送りください（ヤマト運輸・佐川急便以外で送った場合は送料無料の対象外になります）。<br>
                    ・ダンボール1個あたりの送料が5,000円を超える場合は、超過分を買取金額から引かせていただきます。1個当たりの送料が5000円を超えない限り、何口でも当社にて送料負担いたします。<br>
                    ・発送前に可能な限りセンサー・ブラケット類を取り外してご発送ください。<br>
                    ・梱包はダンボールで220サイズ程度に収めていただき、センサーや差圧パイプが破損しないようしっかりと梱包してください。<br>
                    ・お客様のご都合による返送（誤配送・買取不可DPF等の返送など）は当社での送料負担は致しかねます。<br>
                    ・SCR付きDPFユニットや、大型DPFユニットでの発送はお断りしております。DPF（DOCとDPFが一体となっているものを含む）のみに分解の上、DPFのみでご発送ください。<br>
                    ・パレットやコンテナなどの荷姿での発送はご遠慮ください。
                  </p>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">査定</h3>
                      <p class="txt">
                        到着したDPFの状態を確認後、査定価格をお知らせいたします。
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img11.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・DPF内の詰まりがひどい場合は、追加でお時間いただく場合がございます。
                  </p>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">お振込み</h3>
                      <p class="txt">
                        査定価格に同意頂けましたら、即日、ご指定の口座にお振り込みいたします。
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img12.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・DPFが再使用できる場合と、そうでない場合では買取価格に差が出ます。あくまでも、買取価格表は再使用可能なDPFの買取価格です。<br>
                    ・振込み手数料はお客様ご負担にてお願いしております。
                  </p>
                </li>
              </ul>
            </div>
            <input class="tab-input" type="radio" name="tab_name" id="tab2">
            <label class="tab-label" for="tab2">WEB/LINEで申し込む場合</label>
            <div class="tab-block">
              <ul class="list list-home-flow">
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">申込</h3>
                      <p class="txt">
                        <a href="<?php echo $path; ?>pages/purchase" class="link">買取申込フォーム</a>もしくは<a href="#line" class="link">LINE</a>の買取申込ページから申込を行ってください。<br><br>
                        ※個人のお客様は本人確認書類が初回お取引時に必要です。買取申込フォームで本人確認書類をアップロードしてください。<br>
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img09.png" alt="書類準備"></div>
                  </div>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">お客様から発送</h3>
                      <p class="txt">
                        DPFを下記まで着払いでご発送下さい。<br>
                        他に特に同封するものはございませんので、DPFのみお送りください。<br><br>
                        〒590-0121<br>
                        大阪府堺市南区片蔵486-1<br>
                        リビルトワールド DPFラクラク買取宛<br>
                        TEL <a href="tel:0723493548">072-349-3548</a>
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img10.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・ヤマト運輸・佐川急便をご利用ください。配送料は弊社が負担させていただきますので着払いでお送りください（ヤマト運輸・佐川急便以外で送った場合は送料無料の対象外になります）。<br>
                    ・ダンボール1個あたりの送料が5,000円を超える場合は、超過分を買取金額から引かせていただきます。1個当たりの送料が5000円を超えない限り、何口でも当社にて送料負担いたします。<br>
                    ・発送前に可能な限りセンサー・ブラケット類を取り外してご発送ください。<br>
                    ・梱包はダンボールで220サイズ程度に収めていただき、センサーや差圧パイプが破損しないようしっかりと梱包してください。<br>
                    ・お客様のご都合による返送（誤配送・買取不可DPF等の返送など）は当社での送料負担は致しかねます。<br>
                    ・SCR付きDPFユニットや、大型DPFユニットでの発送はお断りしております。DPF（DOCとDPFが一体となっているものを含む）のみに分解の上、DPFのみでご発送ください。<br>
                    ・パレットやコンテナなどの荷姿での発送はご遠慮ください。
                  </p>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">査定</h3>
                      <p class="txt">
                        到着したDPFの状態を確認後、査定価格をお知らせいたします。
                      </p>
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img11.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・DPF内の詰まりがひどい場合は、追加でお時間いただく場合がございます。
                  </p>
                </li>
                <li class="item">
                  <div class="itemin">
                    <div class="block-txt">
                      <h3 class="head">お振込み</h3>
                      <p class="txt">
                        査定価格に同意頂けましたら、即日、ご指定の口座にお振り込みいたします。
                    </div>
                    <div class="img"><img class="" src="<?php echo $path; ?>images/home/img12.png" alt="書類準備"></div>
                  </div>
                  <p class="attention">
                    【注意事項】<br>
                    ・DPFが再使用できる場合と、そうでない場合では買取価格に差が出ます。あくまでも、買取価格表は再使用可能なDPFの買取価格です。<br>
                    ・振込み手数料はお客様ご負担にてお願いしております。
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="faq" class="home06 area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">よくあるご質問</h2>
          <dl class="list-home06">
            <div class="item">
              <dt class="head">DPFとは何ですか？</dt>
              <dd class="data">ディーゼルパティキュレートフィルターというマフラーで、排気ガスに含まれるPMを捕集し、除去を目的としています。</dd>
            </div>
            <div class="item">
              <dt class="head">見積り料金は発生しますか？</dt>
              <dd class="data">見積りは無料です。 見積りは<a href="<?php echo $path; ?>pages/estimate_form.php">こちら</a>から</dd>
            </div>
            <div class="item">
              <dt class="head">破損やオイル漏れがある場合でも買取できますか？</dt>
              <dd class="data">買取可能ですが、状態によって減額になる場合があります。</dd>
            </div>
            <div class="item">
              <dt class="head">運送会社に指定はありますか？</dt>
              <dd class="data">
                ヤマト運輸・佐川急便をご利用ください。配送料は弊社が負担させていただきますので着払いでお送りください（ヤマト運輸・佐川急便以外で送った場合は送料無料の対象外になります）。ただし、ダンボール1個あたりの送料が5,000円を超える場合は、超過分を買取金額から引かせていただきます。
              </dd>
            </div>
            <div class="item">
              <dt class="head">買取してもらったDPFを返してもらうことはできますか？</dt>
              <dd class="data">
                申し訳ございません、返却はできませんのでご了承ください。
              </dd>
            </div>
          </dl>
        </div>
      </section>

      <section id="satei" class="home-satei area">
        <div class="inner900">
          <h2 class="ttl ttl-cmn01">どこよりも早く！<br><span class="ttlin01">０</span>秒見積り！</h2>
          <?php include_once $path .'common/components/zero_estimate.php'; ?>
          <div class="txt">上記の選択肢に無い場合や、より詳細なお見積りをご希望の方は<br>写真お見積りをご利用ください。</div>
          <div class="btn btn-cmn01 -white"><a href="<?php echo $path; ?>pages/estimate">写真お見積りはコチラ</a></div>
        </div>
      </section>

      <section id="application" class="home-application area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">買取申込</h2>
          <p class="txt01">古くても、汚れていても、詰まっていても、OK！<br>まずは着払いでお送りください！</p>
          <div class="block-btn">
            <div class="btn btn-cmn02 -form-paper"><a href="https://drive.google.com/uc?id=17BahxJcsY3ZqYa7RlqkqGk0GL2vGOBfV" target="_blank">買取依頼書で申込</a></div>
            <div class="btn btn-cmn02 -form-web"><a href="<?php echo $path; ?>pages/purchase">WEBフォームで申込</a></div>
          </div>
          <p class="txt01">以下のような状態の場合は減額になることがあります。<br>予めご了承ください。</p>
          <ul class="block-img">
            <li class="item">
              <div class="img01"><img src="<?php echo $path; ?>images/home/img17.png" alt="コアの状態から加工されたもの"></div>
              <p class="label">コアの状態から加工されたもの</p>
            </li>
            <li class="item">
              <div class="img01"><img src="<?php echo $path; ?>images/home/img19.png" alt="オイルが混入しているもの"></div>
              <p class="label">オイルが混入しているもの</p>
            </li>
            <li class="item">
              <div class="img01"><img src="<?php echo $path; ?>images/home/img18.png" alt="破損しているもの"></div>
              <p class="label">破損しているもの</p>
            </li>
          </ul>
          <div id="line" class="line-contact area">
            <h3 class="ttl">スマホで完結！<br>LINEで買取・見積り申込も可能</h3>
            <div class="block">
              <div class="img"><img src="<?php echo $path; ?>images/home/line01.png" alt="ラクラク買取LINE画面"></div>
              <div class="friend-link">
                <div class="qr"><img src="https://qr-official.line.me/gs/M_969goccg_GW.png"></div>
                <a href="https://lin.ee/OiumxOV"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="company" class="home08 area">
        <div class="inner1500">
          <h2 class="ttl ttl-cmn01">会社情報</h2>
          <dl class="list-home08">
            <div class="item">
              <dt class="datattl">会社名</dt>
              <dd class="data">
                株式会社リック・ジャパン
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">住所</dt>
              <dd class="data">
                大阪府堺市三宝町四丁272番地の4
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">TEL</dt>
              <dd class="data">
                <a href="tel:0723493548">072-349-3548</a>
              </dd>
            </div>
            <div class="item">
              <dt class="datattl">古物営業法の規定<span class="ttlin">に基づく表示</span></dt>
              <dd class="data">
                大阪府公安委員会<br>
                第62207R056806号
              </dd>
            </div>
          </dl>
        </div>
      </section>
    </main>

    <?php include_once $path .'common/components/footer.php'; ?>
  </div>
  <script src="<?php echo $path; ?>js/price.js"></script>
</body>

</html>
