<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    // Veritabanı bağlantı 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_registration";

    // Veritabanına bağlanma
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol etme
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Form verilerini al
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    // Form verilerini doğrulama

    // Veritabanına kullanıcı eklemek
    $sql = "INSERT INTO users (firstName, lastName, email, password, birthdate, gender) VALUES ('$firstName', '$lastName', '$email', '$password', '$birthdate', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Yeni kullanıcı başarıyla oluşturuldu</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Hata: ' . $sql . '<br>' . $conn->error . '</div>';
    }

    // Veritabanı bağlantısını kapatma
    $conn->close();
    ?>

    <!-- Bootstrap JavaScript dosyasını da ekleyelim -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-bYQN03t+Itwc5c9G40h+Gl5DwxZUtd8sBSqy6FwN4kz4XhDfZpKjsHrVoV1zkz7W" crossorigin="anonymous"></script>
</body>

</html>
