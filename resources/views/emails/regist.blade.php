<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di Laksa Medika Internusa App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, {{ $name }}!</h1>
        <p>Terimakasih atas pendaftaran akun Anda di Laksa Medika Internusa. Kami sangat senang Anda bergabung dengan kami.</p>
        <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami.</p>
        <a href="www.laksamedical.com" class="button">Kunjungi Website Kami</a>
        <div class="footer">
            <p>© 2024 Laksa Medika Internusa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
