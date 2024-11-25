<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Fix</title>
    <style>
        /* Reset and Global Styling */
        *
        
        .main-content {
            flex: 1; /* Makes the content area expand and push the footer down */
            background-color: #ffffff; /* Main content background color */
            padding: 20px;
            text-align: center;
        }

        .footer {
            background-color: #f9c8d6;
            color: #814c5e;
            text-align: center;
            padding: 20px 10px;
        }

        .footer h2 {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer .social-icons {
            margin: 20px 0;
        }

        .footer .social-icons a {
            margin: 0 10px;
        }

        .footer .social-icons img {
            width: 30px;
            height: 30px;
            transition: transform 0.3s ease;
        }

        .footer .social-icons img:hover {
            transform: scale(1.2);
        }

        .footer .credits {
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <!-- Main content goes here -->
            
        </div>
    </div>

    <footer class="footer">
        <h2><b>CURLYTOPS</b></h2>
        <p>
            Curlytops offering a wide range of trendy and high-quality apparel. This shop often features Thai designs, dress, <br> 
            footwear, casual attire, and even accessories. Known for affordable prices and unique styles.
        </p>
        <div class="social-icons">
            <a href="https://www.instagram.com/curlytops_live/">
                <img src="icons/instagram.png" alt="Instagram">
            </a>
            <a href="https://www.facebook.com/curlytopslive">
                <img src="icons/facebook.png" alt="Facebook">
            </a>
            <a href="https://www.tiktok.com/@curlytopslive?_t=8rf1P2iMZ84&_r=1">
                <img src="icons/tiktok.png" alt="TikTok">
            </a>
        </div>
        <div class="credits">
            © 2024, Curlytops Online Shop. All Rights Reserved.
        </div>
    </footer>
</body>
</html>










