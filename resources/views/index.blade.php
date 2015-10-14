<!-- resources/views/index.php -->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body ng-app="authApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<!-- Application Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.4.6/angular-locale_en-us.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.12.5/satellizer.min.js"></script>

<!-- Application Scripts -->
<script src="scripts/app.js"></script>
<script src="scripts/authController.js"></script>
<script src="scripts/userController.js"></script>
</html>