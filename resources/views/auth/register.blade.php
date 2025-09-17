<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Perpustakaan - Register</title>
    <link rel="stylesheet" href="https://themewagon.github.io/windster/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50">
    <main class="bg-gray-50">
        <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8">
            <a href="{{ url('/') }}" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
                <img src="https://themewagon.github.io/windster/images/logo.svg" class="h-10 mr-4" alt="Logo">
                <span class="self-center text-2xl font-bold whitespace-nowrap">Gym HerFlo</span>
            </a>

            <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
                <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                        Create your account
                    </h2>
                    <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="John Doe" required>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="name@company.com" required>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    required>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    required>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Nomor HP</label>
                                <input type="text" name="no_hp" id="no_hp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="08123456789" required>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-900 block mb-2">Alamat</label>
                                <textarea name="alamat" id="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    rows="3" required></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                            Register
                        </button>
                        <div class="text-sm font-medium text-gray-500">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-teal-500 hover:underline">
                                Login here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    {{-- SweetAlert Messages --}}
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });

    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            showConfirmButton: true,
        });

    </script>
    @endif

    @if ($errors->any())
    <script>
        let errors = '';
        @foreach($errors->all() as $error)
        errors += '<li>{{ $error }}</li>';
        @endforeach
        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal!',
            html: `<ul style="text-align: left; list-style-position: inside;">${errors}</ul>`,
            showConfirmButton: true,
        });

    </script>
    @endif
</body>

</html>
