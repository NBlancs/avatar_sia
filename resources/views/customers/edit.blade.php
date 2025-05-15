<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
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

        .btn-update {
            background-color: var(--success-color);
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

        /* Form styles */
        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-color);
            border-radius: 5px;
            padding: 0.6rem 1rem;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: var(--accent-color);
            color: var(--text-color);
            box-shadow: none;
        }

        .form-select {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-color);
            border-radius: 5px;
            padding: 0.6rem 1rem;
        }

        .form-select:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: var(--accent-color);
            color: var(--text-color);
            box-shadow: none;
        }

        .alert-danger {
            background-color: rgba(231, 76, 60, 0.2);
            border-color: var(--warning-color);
            color: var(--warning-color);
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
                <a href="{{ route('purchases.index') }}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i> Purchases
                </a>
                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>                                
            </div>
        </nav>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Edit Customer</h2>
            <a class="btn-action btn-primary-custom" href="{{ route('customers.index') }}">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> Please check the form fields.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" placeholder="Customer Name">
                    </div>
                </div>
                
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Customer Address">{{ $customer->address }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="{{ $customer->dob }}">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn-action btn-update">
                        <i class="fas fa-save"></i> Update Customer
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>