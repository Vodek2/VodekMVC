<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<h1>Welcome</h1>
<p>Hello <?php echo htmlspecialchars($name); ?>!</p>

<ol>
    <?php foreach ($colours as $colour): ?>
        <li><?php echo htmlspecialchars($colour); ?></li>
    <?php endforeach; ?>
</ol>
</body>
</html>