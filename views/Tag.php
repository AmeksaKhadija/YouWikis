<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .container-fluid {
            display: flex;
            height: 95vh;
        }

        .aside {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        aside li a {
            text-decoration: none;
            color: white;
        }

        aside li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: .3s;
        }

        aside li:hover {
            background-color: white;
        }

        aside li:hover a {
            color: black;
        }
    </style>
</head>

<body>

    <header class="bg-light p-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h4>Wiki™</h4>
            </div>

            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logique/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <aside class="col-md-2 bg-dark text-light p-4 aside">
            <ul class="list-unstyled">
                <li><h5>dashboard</h5></li>
                <li><a href="http://localhost/youwikis/views/Tag.php">TAGS</a></li>
                <li><a href="#">WIKIS</a></li>
                <li><a href="#">ARCHIVER</a></li>
                <li><a href="http://localhost/youwikis/views/Categorie.php">CATEGORIES</a></li>
                <li><a href="#">STATISTIQUES</a></li>
            </ul>
        </aside>

        <div class="content">
        <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Tag Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                       
                  
                       
                    </tbody>
                </table>
        </div>
    </div>

</body>

</html>
