/**
 * Native Social Media - Aplicación Principal
 * Funcionalidades comunes y utilidades
 */

class App {
    constructor() {
        this.currentPage = window.location.pathname.split('/').pop() || 'index.html';
        this.init();
    }

    /**
 * Genera imagen por defecto basada en las iniciales del usuario
 */
    getDefaultAvatar(name, size = 50) {
        if (!name) {
            name = 'U'; // Usuario por defecto
        }

        const initials = this.getInitials(name);
        const colors = [
            '#6366f1', '#ec4899', '#10b981', '#f59e0b', '#ef4444',
            '#8b5cf6', '#06b6d4', '#84cc16', '#f97316', '#6b7280'
        ];

        const colorIndex = this.hashCode(name) % colors.length;
        const bgColor = colors[colorIndex];

        // Usar el formato correcto de placehold.co con parámetros text= y font=
        // Usar fuente Poppins que es más moderna y legible para avatares
        return `https://placehold.co/${size}x${size}/${bgColor.replace('#', '')}/ffffff?text=${initials}&font=poppins`;
    }

    /**
     * Extrae las iniciales de un nombre
     */
    getInitials(name) {
        const initials = name
            .split(' ')
            .map(word => word.charAt(0).toUpperCase())
            .join('')
            .substring(0, 2);

        // Si no hay iniciales, usar la primera letra del nombre
        return initials || name.charAt(0).toUpperCase();
    }

    /**
     * Genera un hash simple para seleccionar colores consistentes
     */
    hashCode(str) {
        let hash = 0;
        for (let i = 0; i < str.length; i++) {
            const char = str.charCodeAt(i);
            hash = ((hash << 5) - hash) + char;
            hash = hash & hash; // Convertir a entero de 32 bits
        }
        return Math.abs(hash);
    }

    /**
 * Aplica imagen por defecto a elementos de imagen
 */
    setupDefaultAvatars() {
        const avatarImages = document.querySelectorAll('img[data-user-name]');

        avatarImages.forEach((img, index) => {
            const userName = img.getAttribute('data-user-name');

            // Siempre aplicar avatar por defecto si tiene data-user-name
            if (userName) {
                const size = img.width || 50;
                const avatarUrl = this.getDefaultAvatar(userName, size);

                // Aplicar la URL directamente
                img.src = avatarUrl;

                // Manejar errores de carga de imagen
                img.onerror = () => {
                    // Fallback simple con iniciales en texto
                    img.style.display = 'none';
                    const fallbackDiv = document.createElement('div');
                    fallbackDiv.className = 'avatar-fallback';
                    fallbackDiv.textContent = this.getInitials(userName);
                    fallbackDiv.style.cssText = `
                        width: ${size}px;
                        height: ${size}px;
                        border-radius: 50%;
                        background: var(--primary-color);
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: bold;
                        font-size: ${size * 0.4}px;
                    `;
                    img.parentNode.insertBefore(fallbackDiv, img);
                };
            }
        });
    }

    init() {
        this.setupNavigation();
        this.setupAnimations();
        this.setupFormValidation();
        this.setupChat();

        // Asegurar que los avatares se configuren después de que el DOM esté listo
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                this.setupDefaultAvatars();
            });
        } else {
            this.setupDefaultAvatars();
        }
    }

    /**
     * Configura la navegación activa
     */
    setupNavigation() {
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.getAttribute('href') === this.currentPage) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Configura animaciones de entrada
     */
    setupAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observar elementos que deben animarse
        document.querySelectorAll('.card, .form-container, .chat-container').forEach(el => {
            observer.observe(el);
        });
    }

    /**
     * Configura validación de formularios
     */
    setupFormValidation() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => this.handleFormSubmit(e));
        });
    }

    /**
     * Maneja el envío de formularios
     */
    handleFormSubmit(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        // Validación básica
        let isValid = true;
        const inputs = form.querySelectorAll('input[required]');

        inputs.forEach(input => {
            if (!input.value.trim()) {
                this.showError(input, 'Este campo es requerido');
                isValid = false;
            } else {
                this.clearError(input);
            }
        });

        if (isValid) {
            this.showSuccess('Formulario enviado correctamente');
            // Aquí iría la lógica de envío real
            setTimeout(() => {
                if (form.id === 'loginForm') {
                    window.location.href = 'index.html';
                }
            }, 1000);
        }
    }

    /**
     * Muestra mensaje de error
     */
    showError(element, message) {
        const errorDiv = element.parentNode.querySelector('.error-message') ||
            document.createElement('div');
        errorDiv.className = 'error-message text-danger mt-1';
        errorDiv.textContent = message;

        if (!element.parentNode.querySelector('.error-message')) {
            element.parentNode.appendChild(errorDiv);
        }

        element.classList.add('is-invalid');
    }

    /**
     * Limpia mensaje de error
     */
    clearError(element) {
        const errorDiv = element.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.remove();
        }
        element.classList.remove('is-invalid');
    }

    /**
     * Muestra mensaje de éxito
     */
    showSuccess(message) {
        const toast = this.createToast(message, 'success');
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    /**
     * Crea un toast de notificación
     */
    createToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type} fade-in`;
        toast.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      background: var(--background-card);
      border: 1px solid var(--border-color);
      border-radius: var(--border-radius);
      padding: 1rem;
      color: var(--text-primary);
      z-index: 1000;
      box-shadow: var(--shadow-lg);
    `;
        toast.textContent = message;
        return toast;
    }

    /**
     * Configura funcionalidad del chat
     */
    setupChat() {
        const chatContainer = document.querySelector('.chat-container');
        if (!chatContainer) return;

        const messageInput = chatContainer.querySelector('input[type="text"]');
        const sendButton = chatContainer.querySelector('button:last-child');
        const messagesContainer = chatContainer.querySelector('.chat-messages');

        if (sendButton && messageInput) {
            sendButton.addEventListener('click', () => this.sendMessage(messageInput, messagesContainer));
            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.sendMessage(messageInput, messagesContainer);
                }
            });
        }
    }

    /**
     * Envía mensaje en el chat
     */
    sendMessage(input, container) {
        const message = input.value.trim();
        if (!message) return;

        const messageElement = document.createElement('div');
        messageElement.className = 'message sent fade-in';
        messageElement.textContent = message;

        container.appendChild(messageElement);
        input.value = '';

        // Auto-scroll al último mensaje
        container.scrollTop = container.scrollHeight;

        // Simular respuesta automática
        setTimeout(() => {
            const responseElement = document.createElement('div');
            responseElement.className = 'message received fade-in';
            responseElement.textContent = 'Mensaje recibido correctamente';
            container.appendChild(responseElement);
            container.scrollTop = container.scrollHeight;
        }, 1000);
    }

    /**
     * Utilidad para mostrar/ocultar elementos
     */
    toggleElement(selector) {
        const element = document.querySelector(selector);
        if (element) {
            element.style.display = element.style.display === 'none' ? 'block' : 'none';
        }
    }

    /**
     * Utilidad para cambiar tema
     */
    toggleTheme() {
        document.body.classList.toggle('light-theme');
        localStorage.setItem('theme', document.body.classList.contains('light-theme') ? 'light' : 'dark');
    }
}

// Clase para manejar el estado de la aplicación
class AppState {
    constructor() {
        this.user = null;
        this.theme = localStorage.getItem('theme') || 'dark';
        this.loadState();
    }

    loadState() {
        const savedUser = localStorage.getItem('user');
        if (savedUser) {
            this.user = JSON.parse(savedUser);
        }

        if (this.theme === 'light') {
            document.body.classList.add('light-theme');
        }
    }

    setUser(userData) {
        this.user = userData;
        localStorage.setItem('user', JSON.stringify(userData));
    }

    logout() {
        this.user = null;
        localStorage.removeItem('user');
        window.location.href = 'login.html';
    }

    isAuthenticated() {
        return this.user !== null;
    }
}

// Clase para manejar la API
class ApiService {
    constructor() {
        this.baseUrl = '/api'; // Cambiar según tu backend
    }

    async request(endpoint, options = {}) {
        const url = `${this.baseUrl}${endpoint}`;
        const config = {
            headers: {
                'Content-Type': 'application/json',
                ...options.headers
            },
            ...options
        };

        try {
            const response = await fetch(url, config);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return await response.json();
        } catch (error) {
            console.error('API Error:', error);
            throw error;
        }
    }

    async login(credentials) {
        return this.request('/auth/login', {
            method: 'POST',
            body: JSON.stringify(credentials)
        });
    }

    async getProfile() {
        return this.request('/user/profile');
    }

    async updateProfile(data) {
        return this.request('/user/profile', {
            method: 'PUT',
            body: JSON.stringify(data)
        });
    }
}

// Inicializar la aplicación cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.app = new App();
    window.appState = new AppState();
    window.apiService = new ApiService();
});

// Exportar clases para uso en otros módulos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { App, AppState, ApiService };
}

