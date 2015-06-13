<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body style="padding: 20px;">
<h2 style="font-family: Arial, Helvetica, sans-serif; margin-bottom: 20px;">Demande de changement de mot de passe</h2>
<div style="font-family: Arial, Helvetica, sans-serif;">
    <p style="font-family: Arial, Helvetica, sans-serif; margin-bottom: 10px;">Cliquez ici pour réinitialiser votre mot de passe: {{ url('password/reset/'.$token) }}</p>
</div>
<p><a style="color: #444; font-size: 13px;" href="http://www.methodologie.ch">www.methodologie.ch</a></p>
</body>
</html>

