<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>500 - Internal Server Error</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

        body {
            margin: 0;
            background: #121212;
            color: #b50000;
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
            font-size: 10rem;
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
            background: #d43752;
            color: #121212;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: background 0.3s ease;
            box-shadow: 0 5px 15px rgba(233, 69, 96, 0.4);
        }

        a:hover {
            background: #d43752;
            box-shadow: 0 8px 25px rgba(212, 55, 82, 0.7);
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
                    0 0 5px #e94560,
                    0 0 10px #e94560,
                    0 0 20px #e94560,
                    0 0 40px #e94560;
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
        <h1>500</h1>
        <h2>Internal Server Error</h2>
        <a href="/">Back to Home</a>
    </div>
</body>

</html>
