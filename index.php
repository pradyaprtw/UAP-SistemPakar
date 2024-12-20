<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Medical Diagnosis</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #153097;
            background-image: url('img/background.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-family: Arial, sans-serif;
            color: #ffffff;
        }

        .container {
            text-align: left;
            max-width: 800px;
            padding: 20px;
            margin-left:100px;
        }

        h1 {
            color: #044451;
            font-size: 2.5rem;
            margin: 0;
            font-weight: bold;
        }

        h3 {
            color: #4f94dd;
            font-size: 1.5rem;
            margin: 10px 0;
        }

        p {
            color: #044451;
            line-height: 1.8;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            background-color: #044451;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #036368;
        }

        .bi-arrow-right {
            margin-left: 8px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            h3 {
                font-size: 1.2rem;
            }

            p {
                font-size: 0.9rem;
            }

            a {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Penyakit Jantung</h1>
        <h3>Aplikasi Web Diagnosis</h3>
        <p>Sistem pakar berbasis web ini dirancang untuk membantu pengguna menganalisis
            gejala penyakit jantung secara cepat dan memberikan diagnosa awal yang akurat
            berdasarkan data medis yang telah teruji, sehingga dapat menjadi alat pendukung
            yang efektif bagi masyarakat dalam mengambil langkah awal penanganan dan
            konsultasi lebih lanjut dengan tenaga medis profesional.
        </p>
        <a href="user/">Get started <span class="bi bi-arrow-right">&#8594;</span></a>
    </div>
</body>
</html>
