<?php
$web_title="XEM PHIM HAY, JACKPOT MỖI NGÀY - VuiHD.com";
$web_des="Tham gia miễn phí, trúng thưởng mỗi ngày, MEGA JACKPOT, trọn vẹn niềm vui!";
$web_keywords="XEM PHIM HAY, JACKPOT MỖI NGÀY - VuiHD.com";

$q = $mysql->query("SELECT * FROM ".$tb_prefix."config WHERE cf_id = 1");
$cf = $q->fetch(PDO::FETCH_ASSOC);
$links=explode(PHP_EOL, $cf['cf_share_link']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/upanh/logos/favicon.png" type="image/x-icon">
    <meta http-equiv="content-language" content="vi" />
    <title><?=$web_title;?></title>
    <meta name="description" content="<?=$web_des;?>"/>
    <meta name="keywords" content="<?=$web_keywords;?>"/>
    <meta property="og:site_name" content="<?=$web_title;?>"/>

    <link rel="canonical" href="<?=WEB_URL.'/account/lotery'?>" />
    <meta itemprop="url" content="<?=WEB_URL.'/account/lotery'?>" />
    <meta itemprop="image" content="<?=WEB_URL.'/statics/defaultv2/images/jackpot.png'?>" />
    <meta property="og:title" content="<?=$web_title;?>" />
    <meta property="og:description" content="<?=$web_des;?>" />
    <meta property="og:url" content="<?=WEB_URL.'/account/lotery'?>" />
    <meta property="og:image" content="<?=WEB_URL.'/statics/defaultv2/images/jackpot.png';?>" />
    <? require_once("styles.php");?>
    <link rel="stylesheet" href="/statics/defaultv2/css/lotery.css">
</head>

<body>

<? require_once("header.php");?>
<div id="body-wrapper ">
    <div class="ad_location container desktop hidden-sm hidden-xs" style="padding-top: 0px; margin-bottom: 15px;">

    </div>
    <div class="ad_location container mobile hidden-lg hidden-md" style="padding-top: 0px; margin-bottom: 15px;">

    </div>
    <div class="content-wrapper lotery">

        <div class="container fit">
            <div class="main col-lg-12 col-md-12 col-sm-12">

                <div class="lotery-banner">
                    <img src="/statics/defaultv2/images/lotery-banner.png">
                    <div class="caption">
                        <div class="desc">Giá trị giải JACKPOT ngày <span><?php echo getCurentDates()?></span> </div>
                        <div class="value"><?php echo number_format($cf['cf_lottery_price'])?> <span>đồng</span></div>
                        <div class="coundown-container">
                            <div id="countdown" class="countdown-wrapper" style="display: block;">
                                <div class="countdown">
                                    <div class="countdown-title">ĐẾM NGƯỢC</div>
                                    <div class="timer-holder">
                                        <div class="timer-slot">
                                            <div id="CountDownDays" class="timer-time"> </div>
                                            <div class="timer-title"> Ngày </div>
                                        </div>
                                        <div class="timer-slot">
                                            <div id="CountDownHours" class="timer-time"> </div>
                                            <div class="timer-title"> Giờ </div>
                                        </div>
                                        <div class="timer-slot">
                                            <div id="CountDownMinutes" class="timer-time"> </div>
                                            <div class="timer-title"> Phút </div>
                                        </div>
                                        <div class="timer-slot">
                                            <div id="CountDownSeconds" class="timer-time"> </div>
                                            <div class="timer-title"> Giây </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div id="showMsg" style="font-size: 54px; display: none;"> Time Up !!</div>
                        </div>
                    </div>
                </div>

                <div class="banner-text">
                    <span>XEM PHIM HAY, <span class="color-j">JACKPOT</span> MỖI NGÀY, TRỌN VẸN NIỀM VUI  <span class="color-h">CHỈ CÓ TẠI VUIHD.COM</span> HOÀN TOÀN MIỄN PHÍ.<br> XEM TRỰC TIẾP QUAY SỐ MAY MẮN 20H MỖI NGÀY TẠI <a href="https://www.facebook.com/hoinhungnguoimephimhay" target="blank">FANPAGE HỘI NHỮNG NGƯỜI MÊ PHIM</a></span>.
                </div>
            </div>
        </div>
        <div class="container fit">
            <div class="main col-lg-7 col-md-7 lotery-result">
                <div class="result">
                    <div class="result-text">KẾT QUẢ NGÀY <?php echo getPrevDates()?></div>
                    <div class="result-number">
                        <?php
                        $rs=getLoteryResult(getPrevDates('Y-m-d'));
                        if($rs!==false){
                            ?>
                            <span><?php echo numberStyle($rs['uvr_number1'])?></span>
                            <span><?php echo numberStyle($rs['uvr_number2'])?></span>
                            <span><?php echo numberStyle($rs['uvr_number3'])?></span>
                        <?php
                        }else{
                            echo "<p>Không có kết quả</p>";
                        }
                        ?>
                    </div>
                    <div class="result-desc">
                        <span>Các con số may mắn phải trùng với kết quả và KHÔNG CẦN theo đúng thứ tự</span>
                    </div>
                </div>
                <div class="yesterday-won-list"  style="font-size: 15px">
                    <div class="content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>Giải thưởng</td>
                                <td>Trùng khớp</td>
                                <td>Giá trị</td>
                                <td>Thành viên</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $users=getWinnerYesterday();?>
                            <?php
                            /*if(count($users)<0 or $users[0]['win_type'] !=1){
                                    */?><!--
                                            <tr>
                                                <td>Jackpot</td>
                                                <td style="text-align: center">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">
                                                </td>
                                                <td><?php /*echo number_format($cf['cf_lottery_price'])*/?> </td>
                                                <td style=""><span style="color: #fdc613; font-weight: bold">Chưa có chủ nhân</span></td>

                                            </tr>
                                            --><?php
                            /*                                    }*/
                            ?>
                            <?php foreach($users as $item){
                                ?>
                                <tr>
                                    <td><?php if($item['win_type']==1) echo 'Jackpot'; else if($item['win_type']==2) echo 'May mắn'?></td>
                                    <td style="text-align: center">
                                        <?php
                                        if($item['win_type']==1){
                                            echo '<img src="/statics/defaultv2/images/ico_rating.png">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">';
                                        }else{
                                            '<img src="/statics/defaultv2/images/ico_rating.png">
                                                    <img src="/statics/defaultv2/images/ico_rating.png">';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo number_format($item['win_price'])?></td>
                                    <td><a style="color: #c21d32;" href="https://facebook.com/<?php echo $item['user']['user_fb_oauth_uid']?>"><?php echo $item['user']['user_name']?></a></td>

                                </tr>
                            <?php
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="lotery-introduction">
                    <p>
                        Trường hợp không tìm được Chủ Nhân giải JACKPOT, tổng giá trị JACKPOT của ngày tiếp theo = JACKPOT ngày hôm trước + 100.000 cho đến khi có thành viên may mắn trúng giải, giải JACKPOT sẽ quay về 200.000 đồng mặc định.
                    </p>
                    <p>
                        VUIHD sẽ chủ động liên hệ thành viên trúng giải qua Inbox Facebook hoặc thành viên trúng giải chủ động PM Fanpage VUIHD tại: <a href="https://www.facebook.com/hoinhungnguoimephimhay" target="blank">HỘI NHỮNG NGƯỜI MÊ PHIM</a>
                    </p>
					<p>
							CƠ CẤU GIẢI THƯỞNG MỖI NGÀY:<br>
							- JACKPOT = giá trị JACKPOT ngày hôm trước + 100.000 cho đến khi có thành viên may mắn trúng giải. Mặc định Jackpot là 200.000 VND<br>
							- 2 giải MAY MẮN: 50.000 VND.<br>
							Xem thêm thể lệ và hướng dẫn tại đây: <a href="http://vuihd.com/tin-tuc/xem-phim-hay-jackpot-mi-ngay-153.html" target="blank">CLICK HERE</a>
					</p>
                </div>
            </div>
            <div class="main col-lg-5 col-md-5 my-numbers">
                <div class="numbers">
                    <?php
                    if(isset($_SESSION['user_id']) && $_SESSION['user_id']){
                        $shared=checkShared($_SESSION['user_id']);
                        if($shared===false){
                            ?>
                            <div class="get-numbers">
                                <a class="btn-get-numbers" href="javascript:void(0)">NHẬN DÃY SỐ MAY MẮN</a>
                                <div class="get-numbers-desc">
                                    <span>Nhấp chuột vào nút trên để nhận dãy số may mắn HOÀN TOÀN MIỄN PHÍ. Mỗi ngày sau 21h tối, bạn có thể nhận dãy số may mắn mới. Chúc bạn may mắn.</span>
                                </div>
                            </div>
                        <?php
                        }
                        else{
                            if($shared['number1'] OR $shared['number2'] OR $shared['number3']){
                               ?>
                                <div class="number-exist">
                                    <div class="numbers-text">Dãy số may mắn của bạn ngày hôm nay</div>
                                    <div class="result-number">
                                        <span><?php echo numberStyle($shared['number1'])?></span>
                                        <span><?php echo numberStyle($shared['number2'])?></span>
                                        <span><?php echo numberStyle($shared['number3'])?></span>
                                    </div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="get-numbers">
                                    <a class="btn-update-numbers" href="javascript:void(0)">NHẬN DÃY SỐ MAY MẮN</a>
                                    <div class="get-numbers-desc">
                                        <span>Nhấp chuột vào nút trên để nhận dãy số may mắn HOÀN TOÀN MIỄN PHÍ. Mỗi ngày sau 21h tối, bạn có thể nhận dãy số may mắn mới. Chúc bạn may mắn.</span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        <?php
                        }
                    }else{
                        ?>
                        <div class="get-numbers">
                            <a class="btn-login-facebook" href="http://vuihd.com/account/login/facebook/?tranfer=%2Faccount%2Flotery">NHẬN DÃY SỐ MAY MẮN</a>
                            <div class="get-numbers-desc">
                                <span>Nhấp chuột vào nút trên để nhận dãy số may mắn HOÀN TOÀN MIỄN PHÍ. Mỗi ngày sau 20h tối, bạn có thể nhận dãy số may mắn mới. Chúc bạn may mắn.</span>
                            </div>
                        </div>
                    <?php
                    }

                    ?>



                </div>
                <div class="won-list">
                    <div class="title">DANH SÁCH THÀNH VIÊN TRÚNG JACKPOT</div>
                    <div class="content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>THÀNH VIÊN</td>
                                <td>GIÁ TRỊ</td>
                                <td>NGÀY MỞ THƯỞNG</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $users=getWinners();?>
                            <?php foreach($users as $item){
                                ?>
                                <tr>
                                    <td><a target="_blank" href="https://facebook.com/<?php echo $item['user']['user_fb_oauth_uid']?>"><?php echo $item['user']['user_name']?></a></td>
                                    <td><?php echo number_format($item['win_price'])?></td>
                                    <td><?php echo date('d/m/Y',$item['uv_time'])?></td>
                                </tr>
                            <?php
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="pop-up-share-film" class="white-popup mfp-hide">
                <p>Nhấn nút CHIA SẺ PHIM HAY VUIHD bên dưới giới thiệu bộ phim hay lên Facebook (yêu cầu chế độ công khai) với bạn bè của mình và nhận được dãy số may mắn ngày hôm nay.</p>
                <p>Mỗi thành viên chỉ có thể nhận 1 dãy số / 1 ngày để tham gia quay số may mắn.</p>
                <a class="btn-share-facebook" data-share="<?php echo $links[array_rand($links)];?>" href="javascript:void(0)">CHIA SẺ PHIM HAY VUIHD</a>
            </div>
            <div id="pop-up-add-numbers" class="white-popup mfp-hide">
                <div class="list-number">
                    <span><div><input id="number1" name="nummber1" type="number" max="75" min="1" onkeypress="validate(event)"></div></span>
                    <span><div><input id="number2" name="nummber2" type="number" max="75" min="1" onkeypress="validate(event)"></div></span>
                    <span><div><input id="number3" name="nummber3" type="number" max="75" min="1" onkeypress="validate(event)"></div></span>
                </div>
                <div class="row" style="padding-top: 15px">
                    <div class="col-md-8 col-lg-8 col-xs-8">
                        <p>- Tự chọn và điền 3 số may mắn KHÁC NHAU từ 01-75.</p>
                        <p>- Không thể thay đổi khi đã nhấn nút xác nhận</p>
                        <p>- Mỗi thành viên được chọn 1 dãy số/1 ngày</p>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <a class="btn-add-number" href="javascript:void(0)">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/pl.notie.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/pl.public.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/plfilter.js" type="text/javascript"></script>
<script src="<?=STATIC_URL;?>/<?=$CurrentSkin;?>/js/jquery.cookie.js" type="text/javascript"></script>
<? require_once("footer.php");?>
<script type="text/javascript">
    var dateNow = new Date();

    var countdown_date = new Date('<?php echo date('Y-m-d H:i:s',getNextDate())?>');
    var days, hours, minutes, seconds;

    // update every 1 second
                      var timer = setInterval(function () {CountdownTimer()}, 1000);
    function CountdownTimer() {
    // calculate difference between now and countdown date
    var current_date = new Date().getTime();
        var seconds_left = (countdown_date - current_date) / 1000;

    // calculations
    days = parseInt(seconds_left / 86400);
        seconds_left = seconds_left % 86400;

        hours = parseInt(seconds_left / 3600);
        seconds_left = seconds_left % 3600;

        minutes = parseInt(seconds_left / 60);
        seconds = parseInt(seconds_left % 60);

        document.getElementById("CountDownDays").innerHTML = (days);
        document.getElementById("CountDownHours").innerHTML = (hours);
        document.getElementById("CountDownMinutes").innerHTML = (minutes);
        document.getElementById("CountDownSeconds").innerHTML = (seconds);

    if(seconds_left <= 0)
    {
        clearInterval(timer);
            document.getElementById("showMsg").style.display = "block";
            document.getElementById("countdown").style.display = "none";
        }
    }
    (function ($) {
        $(function () {
            $('.btn-get-numbers').click(function () {
                $.ajax({
                    url:'/ajax.php',
                    type:'POST',
                    dataType:'json',
                    data:{action:'validatetime'},
                    success:function (response) {
                        if(response.success){
                            $.magnificPopup.open({
                                items: {
                                    src: '#pop-up-share-film',
                                    type: 'inline'
                                }
                            });
                        }else{
                            alert("Hãy quay lại sau 21h để chọn số. Xin cảm ơn!")
                        }
                    }
                })

            })
            $("body").on("click", ".btn-share-facebook", function (event) {
                var target = $(this).attr('data-share');
                FB.ui({
                    method: 'share',
                    display: 'popup',
                    href: target,
                }, function (response) {
                    if (typeof response === 'undefined') {
                        // Your variable is undefined
                        $.magnificPopup.close();
                        alert('Bạn chưa chia sẻ liên kết!');
                    }else{
                        $.magnificPopup.close();
                        $.ajax({
                            url:'/ajax.php',
                            type:'POST',
                            dataType:'html',
                            data:{action:'shared'},
                            success:function (response) {
                                $.magnificPopup.open({
                                    items: {
                                        src: '#pop-up-add-numbers',
                                        type: 'inline'
                                    }
                                });
                            }
                        })

                    }

                });
            });
            $('body').on('click','.btn-update-numbers',function () {
                $.magnificPopup.open({
                    items: {
                        src: '#pop-up-add-numbers',
                        type: 'inline'
                    }
                });
            })
            $("body").on('click','.btn-add-number',function(){
                var number1=parseInt($('#number1').val());
                var number2=parseInt($('#number2').val());
                var number3=parseInt($('#number3').val());
                if(!isNaN(number1) && !isNaN(number2) && !isNaN(number3) &&  number1>0 && number1<=75 && number2>0 && number2<=75 && number3>0 && number3<=75 && number1!=number2 && number1!=number3 && number2!=number3){
                    $.ajax({
                        url:'/ajax.php',
                        type:'POST',
                        dataType:'json',
                        data:{action:'addNumber',number1:number1,number2:number2,number3:number3},
                        success:function (response) {
                            if(response.success){
                                alert(response.message);
                                window.location.href='/account/lotery';
                            }else{
                                alert(response.message);
                            }
                        }
                    })
                }else{
                    alert('Dãy số không hợp lệ')
                }
            })


        })
    })(jQuery)

    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
</body>

</html>