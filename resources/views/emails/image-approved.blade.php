<!DOCTYPE html>
<html>
<head>
    <title>Image Approved</title>
</head>
<body>
<h2>Hello {{ $image->user->name }},</h2>
<p>Your generated image has been approved by the admin 🎉</p>

<p>Approved on: {{ $image->updated_at->format('Y-m-d H:i') }}</p>

<p>Thank you for using our platform!</p>
</body>
</html>
