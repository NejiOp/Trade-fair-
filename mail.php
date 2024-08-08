<?php
// Get data from form
$name = $_POST['name'];
$phone = $_POST['phone']; 
$email = $_POST['email'];
$event = $_POST['event'];
$message = $_POST['message'];

// Company email and subject
$to = "inquiries@weandyoudecor.com";
$subject = "Mail From Decor website";

// Email body to company
$txt = "Name = " . $name . "\r\nNumber = " . $phone . "\r\nEmail = " . $email . "\r\nEvent = " . $event . "\r\nMessage =" . $message;
$headers = "From: $email" . "\r\n" .
    "CC: askweandyouevents@gmail.com";

// Send email to company
if ($email != NULL) {
    mail($to, $subject, $txt, $headers);
}

// Email body to user with HTML
$to_user = $email;
$subject_user = "Registration Successful - Trade Fair";
$headers_user = "From: inquiries@weandyoudecor.com\r\n";
$headers_user .= "MIME-Version: 1.0\r\n";
$headers_user .= "Content-type: text/html; charset=UTF-8\r\n";

// HTML content
$txt_user = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { width: 80%; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h1 { color: #4CAF50; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Registration!</h1>
        <p>Dear ' . htmlspecialchars($name) . ',</p>
        <p>Thank you for registering for the trade fair. Below are your registration details:</p>
        <table>
            <tr>
                <th>Venue</th>
                <td>Shree Lakhamshi Napoo Hall, Matunga</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>27 Sep 2024 to 28 Sep 2024</td>
            </tr>
            <tr>
                <th>Time</th>
                <td>8:00 A.M. to 8:00 P.M.</td>
            </tr>
        </table>
        <p>Company Website: <a href="http://www.weandyoudecor.com">www.weandyoudecor.com</a></p>
        <p>Best regards,</p>
        <p>We and You Events Team</p>
        <img src="./We___You_black LOGO__.png" alt="Trade Fair">
    </div>
</body>
</html>
';

// Send email to user
mail($to_user, $subject_user, $txt_user, $headers_user);

// Thank you message
$message = "Thank You for Your Registration, Please Check you registered mail id for more details";
echo "<script>alert('$message'); window.location.href = 'contact.html';</script>";
?>
