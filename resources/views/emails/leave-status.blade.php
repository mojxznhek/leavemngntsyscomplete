<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Status Notification</title>
</head>
<body>
    <h2>Hello {{ $leave->user->name }},</h2>
    <p>This is to inform you that your leave application has been reviewed.</p>

    <p><strong>Remarks:</strong> {{ $leave->remarks }}</p>
    <p><strong>Details:</strong> {{ $leave->details }}</p>

    <p>Submitted on: {{ $leave->created_at->format('F j, Y') }}</p>

    <br>
    <p>Thank you!</p>
</body>
</html>
