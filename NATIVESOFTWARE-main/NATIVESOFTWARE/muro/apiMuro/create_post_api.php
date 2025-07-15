<?php
// Ensure these files are in the same directory or adjust paths
require_once('publicacion_class.php');
require_once('Database.class.php'); // Required for Publicacion class to work

// Set content type to JSON for responses
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required POST parameters are set
    // Using $_POST as the HTML form sends data via POST
    if (isset($_POST['correo']) && isset($_POST['contenido']) &&
        isset($_POST['fechaPublicacion']) && isset($_POST['nombre']) &&
        isset($_POST['links'])) {

        // Sanitize inputs (basic example, consider more robust sanitization)
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $contenido = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);
        $fechaPublicacion = filter_var($_POST['fechaPublicacion'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $links = filter_var($_POST['links'], FILTER_SANITIZE_URL);

        // Call the static method to create the publication
        $success = Publicacion::create_publicacion(
            $correo,
            $contenido,
            $fechaPublicacion,
            $nombre,
            $links
        );

        if ($success) {
            // Publicacion::create_publicacion already sets the HTTP header,
            // but we also send a JSON response for client-side handling.
            http_response_code(201); // Created
            echo json_encode(['message' => 'Publicación creada correctamente']);
        } else {
            http_response_code(401); // Unauthorized or specific error
            echo json_encode(['message' => 'La publicación no se ha creado correctamente.']);
        }
    } else {
        // Not all required parameters were provided
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'Datos incompletos para crear la publicación.']);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Handle GET requests for fetching all publications
    // This is an example to show how you might fetch data
    $publicaciones = Publicacion::get_all_publicaciones();
    if ($publicaciones !== false) { // Check if get_all_publicaciones returned an array
        http_response_code(200); // OK
        echo json_encode($publicaciones);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['message' => 'Error al obtener las publicaciones.']);
    }
} else {
    // If the request method is not POST or GET
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Método no permitido. Solo se aceptan POST y GET.']);
}
?>
