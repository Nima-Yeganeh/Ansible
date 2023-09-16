<!DOCTYPE html>
<html>
<head>
    <title>Website Visit Counter</title>
</head>
<body>
    <h1>Website Visit Counter</h1>
    <?php
    // Local visit count file
    $localVisitCountFile = 'data/visit_count.txt';
    // Check if the local visit count file exists
    if (file_exists($localVisitCountFile)) {
        // Read the current local visit count from the file
        $localVisitCount = intval(file_get_contents($localVisitCountFile));
        $localVisitCount++;
        file_put_contents($localVisitCountFile, $localVisitCount);
    } else {
        $localVisitCount = 1;
        file_put_contents($localVisitCountFile, $localVisitCount);
    }
    // Redis configuration
    $redisHost = '192.168.244.170';
    $redisPort = 6379;
    try {
        // Attempt to connect to Redis
        $redis = new Redis();
        $connected = $redis->connect($redisHost, $redisPort);
        if (!$connected) {
            throw new Exception('Database is not available. Please try again later!');
        }
        // Redis global visit count key
        $globalVisitCountKey = 'global_visit_count';
        // Check if the global visit count key exists in Redis
        if ($redis->exists($globalVisitCountKey)) {
            // Increment the global visit count in Redis
            $globalVisitCount = $redis->incr($globalVisitCountKey);
        } else {
            // Initialize the global visit count in Redis if it doesn't exist
            $globalVisitCount = 1;
            $redis->set($globalVisitCountKey, $globalVisitCount);
        }
        // Close the Redis connection
        $redis->close();
    } catch (Exception $e) {
        // Handle the exception (Redis not available)
        // $errorMessage = $e->getMessage();
        $errorMessage = 'Database is not available. Please try again later!';
    }
    ?>
    <?php if (isset($errorMessage)) : ?>
        <p>Error: <?php echo $errorMessage; ?></p>
    <?php else : ?>
        <p>Local Visit Count: <?php echo $localVisitCount; ?></p>
        <p>Global Visit Count: <?php echo $globalVisitCount; ?></p>
    <?php endif; ?>
</body>
</html>
