<?php
date_default_timezone_set("Asia/Shanghai");
$mailServer="imap.126.com"; //IMAP主机
$mailLink="{{$mailServer}:143}INBOX" ; //imagp连接地址：不同主机地址不同
$mailUser = '******@126.com'; //邮箱用户名
$mailPass = '********'; //邮箱密码
$mbox = imap_open($mailLink,$mailUser,$mailPass); //开启信箱imap_open
$totalrows = imap_num_msg($mbox); //取得信件数
for ($i=$totalrows;$i>$totalrows-50;$i--){        //我这边只取最近50封
    $headers = imap_fetchheader($mbox, $i); //获取信件标头
        $Subjects = preg_match_all('/\bSubject:(.*?)[\n\r]/s', $headers,$Subject);  //提取邮件的标题
        $alifahuo = "Subject: =?GBK?B?sKLA77DNsM3M4dDRxPqjusL0vNLS0b6tt6K79aOh?=";   //阿里巴巴提醒您：卖家已经发货！
        $sub1 = trim($Subject[0][1]);
        $sub2 = trim($alifahuo);
         //我只需要发货的邮件内容
        if($sub1 == $sub2){ 
                $mailBody = imap_fetchbody($mbox, $i, 1);  //获取信件正文
                preg_match_all('/<td[^>]+>\s+([0-9A-Z]{2,})\s+<\/td>/isx',$mailBody,$odnum);   //提取订单号运单号
                echo $odnum[1][0];
                echo "<br/>\r\n";
                echo $odnum[1][1];
        }
        echo "<br/> ---------------------- <br/>\r\n";
}
imap_close($mbox);
echo date("Y-m-d H:i:s");
?>
