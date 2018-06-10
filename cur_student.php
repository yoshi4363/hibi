<?php  
    
    require("dbconnect.php");

    $sql = "SELECT `f`.`picture`,`f`.`created`,`u`.`account_name` FROM `feeds` AS `f` LEFT JOIN `users` AS `u` ON `f`.`user_id`=`u`.`id` WHERE 1  ORDER BY `f`.`created` DESC LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while (true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
            break;
        }
    }

    // ページネーション処理
    $page = ''; //ページ番号が入る変数
    $page_row_number = 16; //1ページあたりに表示するデータの数

    if (isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      //get送信されてるページ数がない場合、1ページめとみなす
      $page = 1;
    }

    if ($page < 0) {
        $page = 1;
    }

    // max:カンマ区切りで羅列された数字の中から最大の数を返す
    $page = max($page,1);

    // データの件数から、最大ページ数を計算する
    $sql_count = "SELECT COUNT(*) AS `cnt` FROM `feeds`";

    //SQL実行
    $stmt_count = $dbh->prepare($sql_count);
    $stmt_count->execute();
    $record_cnt = $stmt_count->fetch(PDO::FETCH_ASSOC);

    //ページ数計算
    // ceil 小数点の切り上げができる関数 2.1 -> 3に変換できる
    $all_page_number = ceil($record_cnt['cnt'] / $page_row_number);
    

    // min:カンマ区切りの数字の中から最小の数値を取得する関数
    $page = min($page,$all_page_number);

    // データを取得する開始番号を計算
    $start = ($page -1)*$page_row_number;
    // ページネーション処理終了
?>

<!doctype html>
<html lang="ja">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/alumnus.css">

    
    <title>日々</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 sidebar1">
          <div class="logo">
            <img src="assets/img/hibilog.png" class="hibilogo" alt="Logo">
          </div><!--logo-->
            <br>
          <div class="left-navigation">
             <ul class="list">
              <li><a href="view.php" >はじめに</a></li>
              <li><a href="signin.php" >サインイン</a></li>
              <li><a href="private.php">ネクシード生の日々</a></li>
              <li><a href="alumnus.php" >卒業生の日々</a></li>
              <li><a href="theme.php" >今週のお題</a></li>
              <li><a href="my_page.php" >マイページ</a></li>
            </ul>
          </div><!--left-navigation-->
        </div><!--sidebar1-->
        <div class="col-md-2"></div>
        <!--ここから本文をかけるよ-->
        <div class="col-md-10 main-content">
          <div class="row">
            <div class="col-md-12 ">

            </div>
          </div>
          <div class="row concept">
            <div class="col-md-12">
              <h1 class="h1">NexSeed生の日々をのぞいてみよう</h1> 
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-md-offset-1 col-md-10"> -->
              <div class="col-md-10 ">
              <div class="row">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 today_hibi">
              </h5>
              <div class="row">
              <div class="col-md-3" >
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>toshiki123</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
                <div class="col-md-3">
                  <li class="post-load-index">
              <div class="contents-list-inner">
                
                <div class="text contents-list-text">
                  <p class="text-ellipsis multiline">
                  </p>
                </div>
              </div>
            </li>
                  <img src="assets/img/LRG_DSC05227.jpg" class="contents-hibi_pic">
                  <p>kodai333</p>
                  <p>朝のパンって美味しいな〜</p>
                </div>
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05046.jpg" class="hibi_pic">
                  <p>emily888</p>
                  <p>今日のナイトマーケット</p>
                </div>
                <!-- <div class="row"> -->
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>amibanana1</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
              </div>  <!-- rowの -->
          <div class="row">
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>toshiki123</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05227.jpg" class="hibi_pic">
                  <p>kodai333</p>
                  <p>朝のパンって美味しいな〜</p>
                </div>
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05046.jpg" class="hibi_pic">
                  <p>emily888</p>
                  <p>今日のナイトマーケット</p>
                </div>
                <!-- <div class="row"> -->
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>amibanana1</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>toshiki123</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05227.jpg" class="hibi_pic">
                  <p>kodai333</p>
                  <p>朝のパンって美味しいな〜</p>
                </div>
               <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05046.jpg" class="hibi_pic">
                  <p>emily888</p>
                  <p>今日のナイトマーケット</p>
                </div>
                <!-- <div class="row"> -->
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>amibanana1</p>
                  <p>俺のHTML最高っしょ</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>toshiki123</p>
                  <p>俺のHTML最高っしょ</p>
                 </div>
                 <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05227.jpg" class="hibi_pic">
                  <p>kodai333</p>
                  <p>朝のパンって美味しいな〜</p>
                 </div>
                <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05046.jpg" class="hibi_pic">
                  <p>emily888</p>
                  <p>今日のナイトマーケット</p>
                 </div>
                <!-- <div class="row"> -->
                 <div class="col-md-3" id="imgbox">
                  <img src="assets/img/LRG_DSC05296.jpg" class="hibi_pic">
                  <p>amibanana1</p>
                  <p>俺のHTML最高っしょ</p>
                 </div>
                </div>
                <div aria-label="Page navigation">
               <ul class="pager">


      
            <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span>前の日々</a></li>
          

            <li class="next disabled"><a href="#"><span aria-hidden="true">&rarr;</span>次の日々</a></li>
          
          </ul>
        </div>
      </div>
    </div>
  </div>
         

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>