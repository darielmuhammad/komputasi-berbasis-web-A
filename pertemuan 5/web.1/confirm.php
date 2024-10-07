<!doctype html>
<html lang="en">
<head>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="biodata.html">Biodata</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

<?php
// Database configuration
$host = 'localhost'; // Change if necessary
$dbname = 'kontak_db';
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
        $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);

        // Insert into the database
        $stmt = $pdo->prepare("INSERT INTO contacts (nama, email, jenis_kelamin, tanggal_lahir) VALUES (:nama, :email, :jenis_kelamin, :tanggal_lahir)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        
        if ($stmt->execute()) {
            echo "<h1>Data yang Diterima</h1>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
            echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
            echo "<p>Data berhasil disimpan!</p>";
        } else {
            echo "<p>Gagal menyimpan data.</p>";
        }
    } else {
        echo "<p>Tidak ada data yang dikirim.</p>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p>Author: dariel<br>
        <a href="https://upj.ac.id/" class="text-light">Universitas Pembangunan Jaya</a></p>
        <a href="https://g.co/kgs/fxcFEtg" class="text-light">Google</a> | 
        <a href="https://www.facebook.com/?locale=id_ID" class="text-light">Facebook</a>
    </footer>
</body>
</html>
