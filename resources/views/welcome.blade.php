<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ياسمين - لارافيل</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: #ff2d20;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .status {
            padding: 15px 25px;
            border-radius: 8px;
            font-size: 1.2rem;
            margin-top: 20px;
        }
        .success {
            background-color: #1e4620;
            color: #4ade80;
            border: 1px solid #4ade80;
        }
        .danger {
            background-color: #4c1d1d;
            color: #f87171;
            border: 1px solid #f87171;
        }
    </style>
</head>
<body>

    <h1>أهلاً ياسمين! </h1>
   
    <div class="status <?php echo DB::connection()->getDatabaseName() ? 'success' : 'danger'; ?>">
        <?php
        try {
            DB::connection()->getPdo();
            echo "تم الاتصال بقاعدة البيانات بنجاح! اسم القاعدة: " . DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            echo "خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage();
        }
        ?>
    </div>

</body>
</html>
