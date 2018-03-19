<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Mot de passe oublié</h2>

<div>
         Veuillez suivre le lien ci-dessous pour change votre mot de passe
    {{ URL::to('password/reset/' . $confirmation_code) }}.<br/>
</div>

</body>
</html>