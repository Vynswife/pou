<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Toko</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        .profile-info input[type="text"], .profile-info input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .profile-info img {
            max-width: 100%;
            margin-top: 10px;
            display: block;
            border-radius: 5px;
        }
        .btn-warning {
            background-color: #f39c12;
            border: none;
            color: #fff;
            font-weight: bold;
        }
        .btn-warning:hover {
            background-color: #e67e22;
        }
        .btn-sm {
            padding: 8px 12px;
        }
    </style>
</head>
<body>
    <form id="settingForm" novalidate action="<?= base_url('home/aksietoko/')?>" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h1>Edit Toko</h1>
            <div class="profile-info">
                <label for="name">Nama Toko:</label>
                <input name="nama" type="text" class="form-control" id="nama" value="<?= isset($jes[0]->nama_toko) ? $jes[0]->nama_toko : '' ?>" required>
            </div>
            <div class="profile-info">
                <label for="logo">Logo:</label>
                <input name="foto" type="file" class="form-control" id="foto" onchange="previewImage()">
                <input name="id" type="hidden" class="form-control" id="id" value="<?= isset($jes[0]->id_toko) ? $jes[0]->id_toko : '' ?>">
                <!-- Cek apakah $jes[0]->logo ada -->
                <?php if (isset($jes[0]->logo) && !empty($jes[0]->logo)): ?>
                    <img id="preview" src="<?= base_url('images/' . $jes[0]->logo) ?>" alt="Preview Image">
                <?php else: ?>
                    <img id="preview" src="<?= base_url('images/default_logo.png') ?>" alt="Preview Image">
                <?php endif; ?>
            </div>
            <button class="btn btn-warning btn-sm" type="submit">Save Edit</button>
        </div>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function previewImage() {
            const fileInput = document.getElementById('foto');
            const preview = document.getElementById('preview');
            
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }
                
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</body>
</html>

