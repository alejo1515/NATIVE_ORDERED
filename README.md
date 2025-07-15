# Native Social Media

Una plataforma social moderna para desarrolladores, construida con tecnologías web nativas y un diseño responsive.

## 🚀 Características

### ✨ Funcionalidades Principales
- **Sistema de Autenticación** - Login seguro con validación en tiempo real
- **Chat en Tiempo Real** - Sistema de mensajería con contactos dinámicos
- **Perfiles de Usuario** - Avatares automáticos con iniciales únicas
- **Diseño Responsive** - Optimizado para móviles, tablets y desktop
- **Tema Oscuro** - Interfaz moderna con gradientes y efectos visuales

### 🎨 Diseño y UX
- **Interfaz Moderna** - Diseño limpio con Bootstrap 5 y CSS personalizado
- **Animaciones Suaves** - Transiciones y efectos de entrada
- **Separación Visual** - Header y contenido bien diferenciados
- **Navegación Intuitiva** - Menú lateral responsive
- **Avatares Únicos** - Sistema automático de imágenes por defecto

## 📁 Estructura del Proyecto

```
Native Social Media/
├── index.html              # Página principal
├── login.html              # Página de autenticación
├── chat.html               # Sistema de chat
├── styles/
│   ├── main.css           # Estilos principales
│   └── bootstrap-overrides.css # Sobrescrituras de Bootstrap
├── js/
│   └── app.js             # Lógica principal de la aplicación
└── README.md              # Documentación
```

## 🛠️ Tecnologías Utilizadas

### Frontend
- **HTML5** - Estructura semántica
- **CSS3** - Estilos modernos con variables CSS
- **JavaScript ES6+** - Programación orientada a objetos
- **Bootstrap 5** - Framework CSS responsive
- **Bootstrap Icons** - Iconografía consistente

### Servicios Externos
- **Google Fonts** - Tipografía Inter
- **Placehold.co** - Generación de avatares por defecto

## 🎯 Funcionalidades Detalladas

### 1. **Sistema de Autenticación (login.html)**
- Formulario de login con validación en tiempo real
- Toggle de visibilidad de contraseña
- Botones de login social (Google, GitHub)
- Diseño centrado con efectos visuales
- Validación de campos requeridos

### 2. **Página Principal (index.html)**
- Dashboard con estadísticas de la comunidad
- Tarjeta de perfil destacado con avatar automático
- Acciones rápidas para navegación
- Publicaciones recientes
- Diseño responsive con grid system

### 3. **Sistema de Chat (chat.html)**
- Lista de contactos dinámica
- Chat en tiempo real con mensajes
- Indicadores de estado (en línea/desconectado)
- Contador de mensajes no leídos
- Interfaz de chat moderna

### 4. **Sistema de Avatares**
- Generación automática basada en iniciales
- 10 colores únicos asignados por usuario
- Fuente Poppins para mejor legibilidad
- Fallback visual en caso de error
- Integración con placehold.co

## 🎨 Sistema de Diseño

### Variables CSS
```css
:root {
    --primary-color: #6366f1;
    --primary-dark: #4f46e5;
    --secondary-color: #8b5cf6;
    --accent-color: #ec4899;
    --background-dark: #0f172a;
    --background-card: #1e293b;
    --text-primary: #f8fafc;
    --text-secondary: #cbd5e1;
    --border-color: #334155;
    --border-radius: 8px;
    --transition: all 0.3s ease;
}
```

### Características de Diseño
- **Tema Oscuro** - Fondo degradado con tarjetas semitransparentes
- **Separación Visual** - Líneas de separación entre header y contenido
- **Efectos Hover** - Transiciones suaves en elementos interactivos
- **Tipografía** - Fuente Inter para mejor legibilidad
- **Espaciado** - Sistema de márgenes y padding consistente

## 🚀 Instalación y Uso

### Requisitos
- Navegador web moderno
- Servidor web local (opcional)

### Instalación
1. Clona o descarga el proyecto
2. Abre `index.html` en tu navegador
3. ¡Listo para usar!

### Desarrollo Local
```bash
# Si tienes Python instalado
python -m http.server 8000

# Si tienes Node.js instalado
npx serve .

# Si tienes PHP instalado
php -S localhost:8000
```

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 480px
- **Tablet**: 480px - 768px
- **Desktop**: > 768px

### Características Responsive
- Menú lateral en móviles
- Grid adaptativo
- Imágenes responsivas
- Espaciado optimizado por dispositivo

## 🔧 Arquitectura JavaScript

### Clase Principal: App
```javascript
class App {
    constructor() {
        this.currentPage = window.location.pathname.split('/').pop() || 'index.html';
        this.init();
    }
    
    // Métodos principales
    setupNavigation()
    setupAnimations()
    setupFormValidation()
    setupChat()
    setupDefaultAvatars()
    getDefaultAvatar(name, size)
}
```

### Características de la Arquitectura
- **Programación Orientada a Objetos** - Código modular y reutilizable
- **Principio DRY** - Sin repetición de código
- **Principio KISS** - Código simple y mantenible
- **Separación de Responsabilidades** - Cada clase tiene una función específica

## 🎯 Funcionalidades Futuras

### Próximas Implementaciones
- [ ] Sistema de registro de usuarios
- [ ] Perfiles de usuario editables
- [ ] Publicaciones con imágenes
- [ ] Notificaciones en tiempo real
- [ ] Sistema de búsqueda
- [ ] Configuración de perfil
- [ ] Modo claro/oscuro
- [ ] Integración con APIs externas

## 🤝 Contribución

### Cómo Contribuir
1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Estándares de Código
- Usar indentación de 4 espacios
- Comentar funciones complejas
- Seguir principios SOLID
- Mantener consistencia en el nombramiento

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👨‍💻 Autor

**Native Social Media Team**
- Desarrollado con ❤️ por la comunidad de desarrolladores

## 🙏 Agradecimientos

- Bootstrap por el framework CSS
- Bootstrap Icons por la iconografía
- Google Fonts por la tipografía
- Placehold.co por el servicio de avatares

---

**¡Conecta con desarrolladores y encuentra las mejores oportunidades!** 🚀 