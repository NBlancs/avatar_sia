<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
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

        .btn-add {
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

        /* Customer Table Styles */
        .customers-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
            color: var(--text-color);
        }

        .customers-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .customers-table td {
            padding: 1rem;
            vertical-align: middle;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .customers-table tr:hover td {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .customers-table tr td:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .customers-table tr td:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .action-btn {
            border-radius: 50px;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-right: 5px;
            border: none;
        }

        .action-btn.view {
            background-color: var(--accent-color);
            color: white;
        }

        .action-btn.edit {
            background-color: #f39c12;
            color: white;
        }

        .action-btn.delete {
            background-color: var(--warning-color);
            color: white;
        }

        .pagination-container {
            margin-top: 1.5rem;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 5px;
        }

        .page-item {
            width: 36px;
            height: 36px;
        }

        .page-link {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color);
            text-decoration: none;
        }

        .page-item.active .page-link {
            background-color: var(--accent-color);
        }

        .alert-success {
            background-color: rgba(46, 204, 113, 0.2);
            border-color: var(--success-color);
            color: var(--success-color);
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
            <h2>Customer Management</h2>
            <a href="{{ route('customers.create') }}" class="btn-action btn-add">
                <i class="fas fa-plus"></i> Add New Customer
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="customers-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>GENDER</th>
                    <th>DATE OF BIRTH</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->dob }}</td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                            <a class="action-btn view" href="{{ route('customers.show', $customer->id) }}">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a class="action-btn edit" href="{{ route('customers.edit', $customer->id) }}">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this customer?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination-container">
            {{ $customers->links() }}
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>