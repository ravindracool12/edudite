<?php
if(isset($_POST['send_btn'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message_s=$_POST['message'];
}

$to = "edudite1@gmail.com";


$message = "
<html>
<head>
<title>Client Mail</title>
</head>
<body>
<p>Client Mail</p>
<table>
<tr>
<th>Firstname</th>
<th>Email</th>
<th>Subject </th>
</tr>
<tr>
<td><?php echo $name; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $subject; ?></td>
<td><?php echo $message_s; ?></td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$email.' '. "\r\n";


$meail=mail($to,$subject,$message,$headers);
if($meail){
    echo'<script>alert("Successfully send mail");window.location.href="https://swifnix.com/works/Demo/EDUDITE/index.html"</script>';
}
?>