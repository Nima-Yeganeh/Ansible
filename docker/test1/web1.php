<!DOCTYPE html>
<html>
<head>
    <title>Website Visit Counter</title>
</head>
<body>
    <h1>Website Visit Counter</h1>

    <?php
    // Define a file to store the visit count
    $visitCountFile = 'data/visit_count.txt';

    // Check if the visit count file exists
    if (file_exists($visitCountFile)) {
        // Read the current visit count from the file
        $visitCount = intval(file_get_contents($visitCountFile));

        // Increment the visit count
        $visitCount++;

        // Write the updated visit count back to the file
        file_put_contents($visitCountFile, $visitCount);
    } else {
        // If the visit count file doesn't exist, initialize it with 1
        $visitCount = 1;
        file_put_contents($visitCountFile, $visitCount);
    }
    ?>

    <p>This website has been visited <?php echo $visitCount; ?> times.</p>
</body>
</html>
