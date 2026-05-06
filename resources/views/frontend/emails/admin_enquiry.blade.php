<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Enquiry</title>
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
            max-width: 650px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #038a6b;
            padding: 30px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 40px 30px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .info-table th, .info-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        .info-table th {
            width: 30%;
            background-color: #fafafa;
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        .info-table td {
            color: #333;
            font-weight: 500;
        }
        .message-box {
            background-color: #f9fbfb;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #eef2f2;
        }
        .message-title {
            font-weight: 700;
            margin-bottom: 15px;
            color: #038a6b;
            font-size: 14px;
            text-transform: uppercase;
        }
        .footer {
            padding: 20px;
            background-color: #fafafa;
            text-align: center;
            border-top: 1px solid #eeeeee;
        }
        .footer p {
            margin: 0;
            font-size: 13px;
            color: #999;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            background-color: #e6f4f1;
            color: #038a6b;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Enquiry Received</h1>
        </div>
        <div class="content">
            <p style="margin-top: 0; font-weight: 600;">You have received a new product enquiry from the website.</p>
            
            <table class="info-table">
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $enquiry->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><a href="mailto:{{ $enquiry->email }}" style="color: #038a6b; text-decoration: none;">{{ $enquiry->email }}</a></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $enquiry->phone }}</td>
                </tr>
                @if($enquiry->product)
                <tr>
                    <th>Product</th>
                    <td><span class="badge">{{ $enquiry->product->name }}</span></td>
                </tr>
                @endif
                <tr>
                    <th>Submitted At</th>
                    <td>{{ $enquiry->created_at->format('M d, Y h:i A') }}</td>
                </tr>
            </table>
            
            <div class="message-box">
                <div class="message-title">Customer Message</div>
                <div style="white-space: pre-line; color: #555;">{{ $enquiry->message }}</div>
            </div>
        </div>
        <div class="footer">
            <p>Sent from {{ config('app.url') }}</p>
        </div>
    </div>
</body>
</html>
