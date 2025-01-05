<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel & MysqlDB</title>
</head>
<body>
   <?php
use Illuminate\Support\Facades\DB;

try {
    if (DB::connection()->getPdo()) {
        echo "Successfully connected to the database.";
    }
} catch (\Exception $e) {
    echo "Could not connect to the database. Error: " . $e->getMessage();
}
?>

</body>
</html>