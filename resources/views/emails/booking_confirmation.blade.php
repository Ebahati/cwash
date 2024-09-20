<h1>Booking Confirmation</h1>
<p>Dear {{ $details['fullName'] }},</p>
<p>Your booking has been confirmed with the following details:</p>
<ul>
    <li>Package Type: {{ $details['packageType'] }}</li>
    <li>Washing Point: {{ $details['carWashPoint'] }}</li>
    <li>Wash Date: {{ $details['washDate'] }}</li>
    <li>Wash Time: {{ $details['washTime'] }}</li>
    <li>Message: {{ $details['message'] }}</li>
</ul>
<p>Thank you for choosing CarLux!</p>

