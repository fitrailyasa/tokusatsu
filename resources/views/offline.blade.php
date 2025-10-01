<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>400 - Bad Request</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

        body {
            margin: 0;
            background: #121212;
            color: #000fb5;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .container {
            max-width: 400px;
        }

        h1 {
            font-size: 5rem;
            margin: 0;
            animation: flicker 3s infinite;
        }

        h2 {
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0.5rem 0 2rem;
        }

        p {
            color: #eeeeee;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        a {
            text-decoration: none;
            background: #000fb5;
            color: #ffffff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: background 0.3s ease;
            box-shadow: 0 5px 15px rgba(49, 52, 251, 0.5);
        }

        a:hover {
            background: #000fb5;
            box-shadow: 0 8px 25px rgba(49, 52, 251, 0.5);
        }

        @keyframes flicker {

            0%,
            19%,
            21%,
            23%,
            25%,
            54%,
            56%,
            100% {
                opacity: 1;
                text-shadow:
                    0 0 5px #2046e0,
                    0 0 10px #2046e0,
                    0 0 20px #2046e0,
                    0 0 40px #2046e0;
                transform: scale(1);
            }

            20%,
            22%,
            24%,
            55% {
                opacity: 0.4;
                text-shadow: none;
                transform: scale(1.05);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Offline</h1>
        <h2>It seems your internet connection is down. Please try again later.</h2>
        <a href="/">Back to Home</a>
    </div>
</body>

</html>
