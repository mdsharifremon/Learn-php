<?php 
$to = 'sharifwds@gmail.com';
$subject = 'Test email from php';
$body = "<DOCTYPE html><html><head><meta charset='UTF-8'></head><body><h1 style='color:red;'>This is a simple email</h1><p style='color:blue;'>This is paragraph</p><br><a href='https://sharifwds.me'>This is a link</a></body></html>";
$header = [
             "MIME-Version : 1.0",
             "Content-Type : html/text; Charset=utf8",
             "From : sharif@sharifwds.me",
             "Cc: sharif4career@gmail.com",
];
$header = implode("\r\n", $header);
echo $header;
if(mail($to, $subject, $body, $header)){
    echo "Mail has been send to $to";
}else{
    echo "Email sending failed";
};
