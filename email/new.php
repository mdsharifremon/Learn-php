
 <?php 
                        $email = 'sharifwds@gmail.com';
                        $subject = 'This is a test email';
                        $body = "Hi, This is test email send by PHP Script";
                        $headers = "From: sharifuddinremon@gmail.com";
                        if (mail($email, $subject, $body, $headers)) {
                            echo "Email successfully sent to $email...";
                        } else {
                            echo "Email sending failed...";
                        };