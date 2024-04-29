<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Approved</title>
</head>

<body>
    <h1>Your Leave Request Has Been Approved</h1>
    <p>
        Your leave request has been approved. Please review the details below:
    </p>

    <!-- Include leave request details here -->
    <p>
        Type: {{ $leaveRequest->type }}<br>
        Start Date: {{ $leaveRequest->start_date }}<br>
        End Date: {{ $leaveRequest->end_date }}<br>
        Reason: {{ $leaveRequest->reason }}
    </p>
</body>

</html>
