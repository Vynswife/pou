<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #d6d6d6;
        }
        .no-logs {
            text-align: center;
            color: #6c757d;
            font-style: italic;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Activity Log
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Activity</th>
                            <th>Description</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; // Initialize the counter variable
                        if (!empty($logs) && is_array($logs)): 
                        ?>
                            <?php foreach ($logs as $log): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($log['username']) ?></td>
                                    <td><?= esc($log['activity']) ?></td>
                                    <td><?= esc($log['description']) ?></td>
                                    <td><?= esc($log['timestamp']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="no-logs">No activity logs found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
