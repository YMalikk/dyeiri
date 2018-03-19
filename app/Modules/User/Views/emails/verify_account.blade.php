<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Activer votre compte</h2>

<div>
    Merci de créer un compte.<br/>
         Veuillez suivre le lien ci-dessous pour vérifier votre email
    {{ URL::to('/user/verify/' . $confirmation_code) }}.<br/>
</div>

</body>
</html>