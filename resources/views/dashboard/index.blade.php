<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pet Adoption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-card {
            box-shadow: 0 4px 8px rgba(0,0,0,.05);
            transition: transform 0.2s;
            text-align: center;
            padding: 30px 15px;
            border-radius: 10px;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,.1);
        }
        .card-icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Dashboard Menu Pet Adoption</h1>
        <div class="row justify-content-center">

            <div class="col-md-4 mb-4">
                <div class="dashboard-card bg-light">
                    <div class="card-icon">🐾</div>
                    <h2>Hewan</h2>
                    <p>Kelola data anjing dan kucing yang tersedia untuk adopsi.</p>
                    <a href="{{ route('hewan.index') }}" class="btn btn-primary mt-2">Go to Hewan</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="dashboard-card bg-light">
                    <div class="card-icon">🏷️</div>
                    <h2>Kategori</h2>
                    <p>Kelola kategori hewan (Anjing, Kucing).</p>
                    <a href="{{ route('kategori.index') }}" class="btn btn-success mt-2">Go to Kategori</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="dashboard-card bg-light">
                    <div class="card-icon">🏡</div>
                    <h2>Adopsi</h2>
                    <p>Proses adopsi hewan</p>
                    <a href="{{ route('adopsi.index') }}" class="btn btn-info mt-2">Go to Adopsi</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
