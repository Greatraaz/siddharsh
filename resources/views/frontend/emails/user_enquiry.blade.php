<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Enquiry</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #038a6b;
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .content {
            padding: 40px 30px;
        }
        .content h2 {
            color: #038a6b;
            margin-top: 0;
            font-size: 22px;
        }
        .content p {
            margin-bottom: 20px;
            color: #555;
            font-size: 16px;
        }
        .summary-box {
            background-color: #f9fbfb;
            border-left: 4px solid #038a6b;
            padding: 20px;
            margin: 25px 0;
            border-radius: 4px;
        }
        .summary-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .summary-text {
            font-style: italic;
            color: #666;
            margin: 0;
        }
        .footer {
            padding: 30px;
            background-color: #fafafa;
            border-top: 1px solid #eeeeee;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
            font-size: 14px;
            color: #888;
        }
        .footer strong {
            color: #038a6b;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #038a6b;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Enquiry Received</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $enquiry->name }},</h2>
            <p>Thank you for reaching out to us. We have successfully received your enquiry regarding <strong>{{ $enquiry->product ? $enquiry->product->name : 'our products' }}</strong>.</p>
            <p>Our dedicated team is already looking into your request. You can expect a detailed response from one of our specialists within the next 24 hours.</p>
            
            <div class="summary-box">
                <div class="summary-title">Your Message Summary</div>
                <p class="summary-text">"{{ $enquiry->message }}"</p>
            </div>
            
            <p>In the meantime, feel free to browse more of our solutions on our website.</p>
            <a href="{{ config('app.url') }}" class="btn">Visit Our Website</a>
        </div>
        <div class="footer">
            <p>Best Regards,</p>
            <p><strong>Siddharsh Systems and Solutions</strong></p>
            <p style="font-size: 12px; margin-top: 20px;">This is an automated response. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>
