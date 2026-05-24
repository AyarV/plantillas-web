<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Plantillas Web</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
            background: #0f0f1e;
        }
        
        .app {
            display: flex;
            height: 100%;
        }
        
        /* Barra lateral */
        .sidebar {
            width: 300px;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 100;
            box-shadow: 4px 0 15px rgba(0,0,0,0.3);
        }
        
        .sidebar.hidden {
            width: 0;
            overflow: hidden;
            padding: 0;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.2);
        }
        
        .sidebar-header h4 {
            margin: 0;
            color: white;
            font-weight: 600;
        }
        
        .sidebar-header h4 i {
            color: #00b4db;
            margin-right: 8px;
        }
        
        .sidebar-header p {
            margin: 8px 0 0;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
        }
        
        .stats-mini {
            padding: 12px 20px;
            background: rgba(0, 180, 219, 0.1);
            margin: 15px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid rgba(0, 180, 219, 0.2);
        }
        
        .stats-mini .number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00b4db;
        }
        
        .stats-mini .label {
            font-size: 0.7rem;
            opacity: 0.7;
        }
        
        .template-list {
            flex: 1;
            overflow-y: auto;
            padding: 10px 0;
            margin: 0;
            list-style: none;
        }
        
        .template-list li {
            padding: 12px 20px;
            margin: 4px 12px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.9rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .template-list li:hover {
            background: rgba(0, 180, 219, 0.15);
            transform: translateX(5px);
        }
        
        .template-list li.active {
            background: linear-gradient(135deg, rgba(0, 180, 219, 0.25), rgba(0, 131, 176, 0.25));
            border: 1px solid rgba(0, 180, 219, 0.4);
        }
        
        .template-list li i {
            font-size: 1.1rem;
            color: #00b4db;
        }
        
        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.7rem;
            text-align: center;
            color: rgba(255,255,255,0.5);
        }
        
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #f5f7fb;
            transition: all 0.3s;
        }
        
        .toolbar {
            padding: 10px 20px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .current {
            font-size: 0.85rem;
            color: #6c757d;
            background: #f8f9fa;
            padding: 6px 12px;
            border-radius: 8px;
        }
        
        .current span {
            color: #00b4db;
            font-weight: 600;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #00b4db, #0083b0);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #0095b3, #006d94);
        }
        
        .iframe-container {
            flex: 1;
            background: white;
        }
        
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .empty-state {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 64px;
            margin-bottom: 15px;
        }
        
        .fab {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00b4db, #0083b0);
            color: white;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            cursor: pointer;
        }
        
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1a1a2e;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #00b4db;
            border-radius: 3px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                height: 100%;
                z-index: 1050;
            }
            .fab {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4><i class="bi bi-grid-3x3-gap-fill"></i> TemplateHub</h4>
                <p>Mis plantillas web</p>
            </div>
            
            <div class="stats-mini">
                <div class="number" id="totalCount">0</div>
                <div class="label">Plantillas disponibles</div>
            </div>
            
            <!-- 🔥 LISTA DE PLANTILLAS - ESCRIBES TUS PLANTILLAS AQUÍ 🔥 -->
            <ul class="template-list" id="templateList">
                <!-- 👇 AGREGAR NUEVAS PLANTILLAS ACÁ 👇 -->
                <li onclick="loadTemplate('acuas-1.0.0/index.html', 'Acuas')" data-id="acuas">
                    <i class="bi bi-filetype-html"></i> Acuas
                </li>
                <li onclick="loadTemplate('AgriCulture-1.0.0/index.html', 'AgriCulture')" data-id="agriculture">
                    <i class="bi bi-filetype-html"></i> AgriCulture
                </li>
                <li onclick="loadTemplate('gardener-1.0.0/index.html', 'Gardener')" data-id="gardener">
                    <i class="bi bi-filetype-html"></i> Gardener
                </li>
                <li onclick="loadTemplate('Presento-1.0.0/index.html', 'Presento')" data-id="presento">
                    <i class="bi bi-filetype-html"></i> Presento
                </li>
                <!-- 👆 AGREGAR MÁS PLANTILLAS ARRIBA 👆 -->
            </ul>
            
            <div class="sidebar-footer">
                <i class="bi bi-info-circle"></i> Click en plantilla → se abre y oculta menú
            </div>
        </div>
        
        <div class="main-content">
            <div class="toolbar">
                <div class="current">
                    <i class="bi bi-eye"></i> Actual: <span id="currentName">Ninguna</span>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-secondary" onclick="toggleSidebar()">
                        <i class="bi bi-layout-sidebar"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="copiarEnlace()">
                        <i class="bi bi-clipboard"></i> <span class="d-none d-sm-inline">Copiar</span>
                    </button>
                    <button class="btn btn-sm btn-primary" onclick="abrirCompleta()">
                        <i class="bi bi-box-arrow-up-right"></i> <span class="d-none d-sm-inline">Completa</span>
                    </button>
                </div>
            </div>
            
            <div class="iframe-container" id="iframeContainer">
                <div class="empty-state">
                    <div>
                        <i class="bi bi-collection-play"></i>
                        <h5>Bienvenido</h5>
                        <p>Selecciona una plantilla de la lista</p>
                        <small class="mt-2 d-block opacity-75">Al hacer click, el menú se ocultará automáticamente</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <button class="fab" onclick="toggleSidebar()">
        <i class="bi bi-list fs-4"></i>
    </button>

    <script>
        // 📋 CONFIGURACIÓN DE PLANTILLAS
        // Cada plantilla necesita: ruta, nombre y id
        const templates = [
            { ruta: 'acuas-1.0.0/index.html', nombre: 'Acuas', id: 'acuas' },
            { ruta: 'AgriCulture-1.0.0/index.html', nombre: 'AgriCulture', id: 'agriculture' },
            { ruta: 'gardener-1.0.0/index.html', nombre: 'Gardener', id: 'gardener' },
            { ruta: 'Presento-1.0.0/index.html', nombre: 'Presento', id: 'presento' }
            // 🔥 AGREGAR NUEVAS PLANTILLAS AQUÍ 🔥
            // Ejemplo: { ruta: 'mi-plantilla/index.html', nombre: 'Mi Plantilla', id: 'miplantilla' },
        ];
        
        let currentTemplate = null;
        let sidebarVisible = true;
        
        function init() {
            document.getElementById('totalCount').innerText = templates.length;
            
            const urlParams = new URLSearchParams(window.location.search);
            const templateId = urlParams.get('template');
            if (templateId) {
                const template = templates.find(t => t.id === templateId);
                if (template) {
                    loadTemplateByObject(template);
                }
            }
            
            if (window.innerWidth <= 768) {
                hideSidebar();
            }
        }
        
        // Esta función se llama desde los <li> onclick
        function loadTemplate(ruta, nombre) {
            const template = templates.find(t => t.ruta === ruta);
            if (template) {
                loadTemplateByObject(template);
            } else {
                // Fallback directo
                currentTemplate = { ruta: ruta, nombre: nombre, id: ruta };
                document.getElementById('currentName').innerText = nombre;
                document.getElementById('iframeContainer').innerHTML = `<iframe src="${ruta}" title="${nombre}"></iframe>`;
                
                const url = new URL(window.location);
                url.searchParams.set('template', ruta);
                window.history.pushState({}, '', url);
                
                hideSidebar();
            }
        }
        
        function loadTemplateByObject(template) {
            currentTemplate = template;
            
            document.querySelectorAll('.template-list li').forEach(li => {
                li.classList.remove('active');
                if (li.getAttribute('data-id') === template.id) {
                    li.classList.add('active');
                }
            });
            
            document.getElementById('currentName').innerText = template.nombre;
            document.getElementById('iframeContainer').innerHTML = `<iframe src="${template.ruta}" title="${template.nombre}"></iframe>`;
            
            const url = new URL(window.location);
            url.searchParams.set('template', template.id);
            window.history.pushState({}, '', url);
            
            hideSidebar();
        }
        
        function toggleSidebar() {
            if (sidebarVisible) {
                hideSidebar();
            } else {
                showSidebar();
            }
        }
        
        function hideSidebar() {
            document.getElementById('sidebar').classList.add('hidden');
            sidebarVisible = false;
        }
        
        function showSidebar() {
            document.getElementById('sidebar').classList.remove('hidden');
            sidebarVisible = true;
        }
        
        function copiarEnlace() {
            if (!currentTemplate) {
                alert('⚠️ Primero selecciona una plantilla');
                return;
            }
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('✅ Enlace copiado:\n' + window.location.href);
            });
        }
        
        function abrirCompleta() {
            if (!currentTemplate) {
                alert('⚠️ Primero selecciona una plantilla');
                return;
            }
            window.open(currentTemplate.ruta, '_blank');
        }
        
        window.addEventListener('popstate', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const templateId = urlParams.get('template');
            if (templateId) {
                const template = templates.find(t => t.id === templateId);
                if (template) loadTemplateByObject(template);
            } else {
                location.reload();
            }
        });
        
        init();
    </script>
</body>
</html>