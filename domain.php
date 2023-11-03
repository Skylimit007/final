<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="images/logo.ico">
<style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/background.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            text-align: center;
        }

        h2 {
            font-size: 50px;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"] {
            width: 50%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        nav {
            background-color: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .nav-link {
            color: #333;
            font-size: 18px;
            font-weight: 500;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.html">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="client.html">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Check Domain Availability</h2>
    <form action="" method="post">
        <input type="text" name="domain" placeholder="Enter Domain Name (e.g., example.com)" required><br><br>
        <input type="submit" name="submit" value="Check Availability">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $apiKey = 'gHzWS8LMQcB9_FL5x8z4iV2Ze1PD41oHVNP';
        $apiSecret = 'B85cic89fXh19f8EasrwpJ';
        $domain = $_POST['domain'];

        $headers = [
            'Authorization: sso-key ' . $apiKey . ':' . $apiSecret,
            'Content-Type: application/json'
        ];

        $url = 'https://api.godaddy.com/v1/domains/available?domain=' . $domain;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if($data['available'] === true){
            echo "<p>Domain $domain is available!</p>";
        } else {
            echo "<p>Domain $domain is not available.</p>";
        }
    }
    ?>

</div>

</body>
</html>
