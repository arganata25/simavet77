<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-500 p-4 text-white font-bold text-lg">
        SIAKAD SMK Veteran 1 Tulungagung
    </div>

    <!-- CONTENT -->
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl flex overflow-hidden">

            <!-- LEFT (ILUSTRASI) -->
            <div class="w-1/2 bg-gray-50 flex items-center justify-center p-6">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
                     alt="Ilustrasi Login" class="w-80">
            </div>

            <!-- RIGHT (FORM LOGIN) -->
            <div class="w-1/2 p-8">

                <h2 class="text-2xl font-bold text-purple-700 mb-6">Login</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- USERNAME / EMAIL -->
                    <div class="mb-4">
                        <label class="block text-orange-500 mb-1">Username</label>
                        <div class="flex items-center border rounded px-3 py-2">
                            <span class="mr-2 text-gray-400">👤</span>
                            <input type="text" name="email"
                                   placeholder="Username / Email / NIK / NPM"
                                   class="w-full outline-none">
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">
                        <label class="block text-orange-500 mb-1">Password</label>
                        <div class="flex items-center border rounded px-3 py-2">
                            <span class="mr-2 text-gray-400">🔑</span>
                            <input type="password" name="password"
                                   placeholder="Password / No. Voucher"
                                   class="w-full outline-none">
                        </div>
                    </div>

                    <!-- LOGIN BUTTON -->
                    <div class="flex items-center justify-between mt-6">
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">
                            Login
                        </button>

                        <a href="#" class="text-gray-500 hover:underline">
                            Lupa Password?
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>