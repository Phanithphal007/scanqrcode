<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Your Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-3xl shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-8">Complete Your Data</h1>

        <form method="POST" action="{{ route('form', $tetsqr->id) }}">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Full Name</label>
                    <input type="text" name="name" value="{{ $tetsqr->name }}"
                           class="w-full px-5 py-4 border rounded-2xl focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Email Address</label>
                    <input type="email" name="email" value="{{ $tetsqr->email }}"
                           class="w-full px-5 py-4 border rounded-2xl focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Phone Number</label>
                    <input type="tel" name="phone" value="{{ $tetsqr->phone }}"
                           class="w-full px-5 py-4 border rounded-2xl focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Purpose</label>
                    <input type="text" name="purpose" value="{{ $tetsqr->purpose }}"
                           class="w-full px-5 py-4 border rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-5 rounded-2xl text-lg transition">
                    Submit Data
                </button>
            </div>
        </form>
    </div>
</body>
</html>
