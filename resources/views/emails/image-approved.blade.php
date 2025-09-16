<!DOCTYPE html>
<html>
<head>
    <title>Image Approved</title>
</head>
<body>
<h2>Hello {{ $image->user->name }},</h2>
<p>Your generated image has been approved by the admin 🎉</p>

<p>Image Preview:</p>
<img src="{{ $image->image_base64 }}" alt="Generated Image" width="200">

<p>Approved on: {{ $image->updated_at->format('Y-m-d H:i') }}</p>

<p>Thank you for using our platform!</p>
</body>
</html>
