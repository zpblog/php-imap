# php-imap

PHP使用IMAP收取邮件并提取指定内容

使用IMAP而不是POP3，因为POP3收件时当邮箱邮件比较多时，执行会很慢，动不动还会超时。IMAP好像默认只接收最近几百份邮件，不会全部遍历整个邮箱邮件。对我来说这样挺好。

博文地址：http://zpblog.cn/other/php_imap.html
