<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .email-content {
            padding: 20px 0;
            color: #333333;
            line-height: 1.6;
        }

        .email-footer {
            text-align: center;
            color: #777777;
            font-size: 13px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 20px;
            background-color: #3490dc;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Order Confirmation</h2>
        </div>

        <div class="email-content">
            {!! $msg !!}
        </div>

        <div class="email-footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
