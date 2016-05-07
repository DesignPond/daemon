<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@Designpond | Cindy Leschaud">
    <meta name="description" content="Documentation">
    <title>Documentation</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/style.css'); ?>">

</head>
<body>

<div class="page js-page login-page">
    <div class="login">
        <div class="login-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Contenu -->
                        @yield('content')
                        <!-- Fin contenu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo asset('frontend/js/all.js');?>"></script>
<script src="<?php echo asset('frontend/js/custom.js');?>"></script>

</body>
</html>