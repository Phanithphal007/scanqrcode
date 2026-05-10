<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your QR Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Your QR Code is Ready</h1>

        <div class="flex justify-center mb-6">
            <div class="bg-white p-6 rounded-3xl shadow-sm">
                <img src="data:image/svg+xml;base64,{{ $qrBase64 }}" alt="QR Code" class="w-80 h-80" />
            </div>
        </div>

        <p class="text-center text-gray-700 mb-4">Scan the QR code or open this link:</p>
        <p class="break-all text-center text-blue-600 font-medium mb-8">{{ $url }}</p>

        <div class="flex justify-center gap-4">
            <a href="{{ $url }}" class="px-6 py-3 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition">Open Form</a>
            <a href="{{ route('qr.generate') }}" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-2xl hover:bg-gray-300 transition">Refresh QR</a>
        </div>
    </div>
</body>
</html>
