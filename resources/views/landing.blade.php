<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andrei Mira WEB</title>
    <!-- Agrega el enlace al archivo CSS de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo o título del sitio -->
            <a href="#" class="text-lg font-semibold">Andrei Mira</a>
            <!-- Nombre de usuario y opción de cerrar sesión -->
            @auth
                <div class="flex items-center">
                    <span class="mr-2">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white">Cerrar Sesión</button>
                    </form>
                </div>
            @endauth

        </div>
    </nav>

    <!-- Contenido de la página -->
    <div class="container mx-auto mt-8 flex justify-center items-center h-full">
        <div class="text-center">
            <h2 class="text-2xl font-bold mb-6">Contenido Dinámico</h2>
            <!-- Contenedor de la frase -->
            <div id="contenedorFrase" class="text-center mb-6">
                <!-- Aquí se mostrará la frase -->
                <p id="frase" class="text-gray-700">Haz clic en el botón para ver una frase</p>
            </div>
            <!-- Botón para cambiar la frase -->
            <button id="cambiarFraseBoton"
                class="mx-auto bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Cambiar
                Frase</button>
        </div>
    </div>

    <!-- Agrega el enlace al archivo JavaScript de Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <script>
        // Array con las frases
        const frases = [
            "La vida es como una bicicleta, para mantener el equilibrio debes seguir adelante. - Albert Einstein",
            "El único modo de hacer un gran trabajo es amar lo que haces. - Steve Jobs",
            "El éxito es la suma de pequeños esfuerzos repetidos un día sí y otro también. - Robert Collier",
            "La diferencia entre lo ordinario y lo extraordinario es ese pequeño extra. - Jimmy Johnson",
            "Haz hoy lo que otros no quieren, vive mañana como otros no pueden. - Jerry Rice",
            "La mejor venganza es un éxito masivo. - Frank Sinatra",
            "Cuanto más difícil es el trabajo, más gloriosa es la victoria. - Pele",
            "El futuro pertenece a quienes creen en la belleza de sus sueños. - Eleanor Roosevelt",
            "Nunca te rindas en aquello que realmente te importa. - Winston Churchill",
            "El secreto del éxito está en hacer lo que te gusta. - Brian Tracy"
        ];

        // Función para cambiar la frase
        function cambiarFrase() {
            const indiceFrase = Math.floor(Math.random() * frases.length);
            const elementoFrase = document.getElementById('frase');
            elementoFrase.textContent = frases[indiceFrase];
        }

        // Asignar el evento al botón
        const cambiarFraseBoton = document.getElementById('cambiarFraseBoton');
        cambiarFraseBoton.addEventListener('click', cambiarFrase);
    </script>
</body>

</html>
