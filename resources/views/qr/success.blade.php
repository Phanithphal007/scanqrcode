<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow-lg text-center">
        <h1 class="text-3xl font-bold mb-4">Submission Successful</h1>
        <p class="text-gray-700 mb-6">Thank you! Your information has been submitted successfully.</p>
        <a href="{{ route('qr.generate') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition">Generate Another QR</a>
    </div>
</body>
</html>
