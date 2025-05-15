<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #151a2f;
            --card-bg: #1c2240;
            --text-color: #f8f9fa;
            --accent-color: #3498db;
            --success-color: #2ecc71;
            --warning-color: #e74c3c;
            --border-color: #2c3e50;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-action {
            padding: 0.55rem 1.25rem;
            border-radius: 50px;
            font-weight: 500;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary-custom {
            background-color: var(--accent-color);
            color: white;
        }

        /* Navigation Bar Styles */
        .main-navbar {
            background-color: var(--card-bg);
            padding: 0.8rem 1.5rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link i {
            margin-right: 0.5rem;
        }

        /* Customer Detail Card */
        .detail-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .detail-header {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-body {
            padding: 1.5rem;
        }

        .detail-footer {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-row {
            padding: 0.75rem 0;
        }

        .detail-row:not(:last-child) {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <!-- Main Navigation -->
    <div class="container mt-4">
        <nav class="main-navbar">
            <div class="nav-links">
                <a href="{{ route('smart-lights.index') }}" class="nav-link">
                    <i class="fas fa-lightbulb"></i> Smart Lights
                </a>
                <a href="{{ route('customers.index') }}" class="nav-link active">
                    <i class="fas fa-users"></i> Customers
                </a>
            </div>
        </nav>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Customer Details</h2>
            <a class="btn-action btn-primary-custom" href="{{ route('customers.index') }}">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="detail-card">
            <div class="detail-header">
                <h4>{{ $customer->name }}</h4>
            </div>
            <div class="detail-body">
                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">ID:</span> {{ $customer->id }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Name:</span> {{ $customer->name }}
                    </div>
                </div>
                <div class="row detail-row">
                    <div class="col-md-12">
                        <span class="detail-label">Address:</span> {{ $customer->address }}
                    </div>
                </div>
                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">Gender:</span> {{ $customer->gender }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Date of Birth:</span> {{ $customer->dob }}
                    </div>
                </div>
                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">Created At:</span> {{ $customer->created_at->format('Y-m-d H:i:s') }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Updated At:</span> {{ $customer->updated_at->format('Y-m-d H:i:s') }}
                    </div>
                </div>
            </div>
            <div class="detail-footer">
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn-action btn-primary-custom">
                    <i class="fas fa-pen"></i> Edit Customer
                </a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>