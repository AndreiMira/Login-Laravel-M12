
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Usuario</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Bienvenido a tu página de usuario</h1>
        @auth
           <h2><span class="text-success">{{ Auth::user()->name }}</span></h2>
        @endauth
    </header>
    <main class="container mt-4">
        <div class="random-content text-center">
            <p id="random-text" class="lead">Contenido aleatorio aparecerá aquí</p>
            <button id="generate-random" class="btn btn-primary">Generar Contenido</button>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-block mt-4">Cerrar Sesión</a>
    </main>
    <footer class="bg-primary text-white text-center py-2 mt-4">
        <p>&copy; 2023 Tu Empresa</p>
    </footer>
    <!-- Agrega el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const randomText = document.getElementById('random-text');
            const generateRandomButton = document.getElementById('generate-random');

            const randomContent = [
                '¡Hola, usuario!',
                'Bienvenido a tu página personalizada.',
                'Aquí tienes algo interesante: Esto es contenido aleatorio.',
                'Puedes agregar más contenido y características según tus necesidades.'
            ];

            generateRandomButton.addEventListener('click', () => {
                const randomIndex = Math.floor(Math.random() * randomContent.length);
                randomText.textContent = randomContent[randomIndex];
            });
        });
    </script>
</body>
</html>