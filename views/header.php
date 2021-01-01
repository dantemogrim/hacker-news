<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title -->
    <title><?php echo $config['title']; ?></title>
        <!-- General CSS insertion. -->
    <link rel="stylesheet" href="../assets/styles/app.css">
        <!-- @font-face insertion. -->
    <link rel="stylesheet" href="../assets/styles/fonts.css">
        <!-- Media queries insertion. -->
    <link rel="stylesheet" href="../assets/styles/media.css">
        <!-- Modern-Normalize CSS insertion. -->
    <link rel="stylesheet" href="../assets/styles/modern-normalize.css">
        <!-- Favicon -->
    <link rel="icon" type="images/png" href="../media/faviconTest.ico">
</head>

<body>
<header>
    <img class="header-img" src="./resources/media/headerTest.svg">
    <h1><?php echo $config['title']; ?></h1>
</header>

    <?php require __DIR__ . '/navigation.php'; ?>

    <div class="container py-5">
