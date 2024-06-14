<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sidebar admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/pepicase/public/css/admin-sidebar.css">
    <link rel="stylesheet" href="/pepicase/public/css/fonts.css">
</head>
<body>
    <div class = "d-flex flex-row justify-content-center">
        <div class="card border-end shadow bg-gray rounded">    
            <div class="card-header">pepicase</div>

            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item nav_active">
                        <img src="/pepicase/public/pics/product-icon.svg" alt="">
                        <b class="title">Product</b>
                    </li>
                    <li class="nav-item">
                        <img src="/pepicase/public/pics/order-icon.svg" alt="">
                        <b class="title">Orders</b>
                    </li>
                </ul>

                <div class="d-flex flex-column" style="margin-right: 5%; margin-left: 5%; margin-top: 90%;">
                    <hr class = "sidebar-hr">
                    <div style="padding-bottom: 10%; text-align: center;">
                        <b class="title">pepicase</b>
                        <text class="title">pepicase@hello</text>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-warning">Log out</button>
            </div>
        </div>
