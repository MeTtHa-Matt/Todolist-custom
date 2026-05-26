<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="css/style.css">
    <link rel="icon" type="image/png" href="/todolist/images/todolist_logo.png">
    <style>
        * { box-sizing: border-box; }

        html, body {
            margin: 0; padding: 0;
            width: 100%; height: 100%;
            background: #f5f6fa;
            color: #1a1a2e;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        /* ── Layout racine ── */
        .page-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
            padding-top: 86px; /* hauteur navbar */
        }

        /* ── Sidebar ── */
        .sidebar {
            width: 220px;
            flex-shrink: 0;
            position: fixed;
            top: 86px;
            left: 0;
            height: calc(100vh - 86px);
            overflow-y: auto;
            background: #fff;
            border-right: 1px solid #dee2e6;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 16px 12px;
            transition: transform .3s ease;
        }

        /* ── Contenu principal ── */
        .main-content {
            flex: 1;
            min-width: 0;           /* empêche le dépassement flex */
            margin-left: 220px;
            width: calc(100% - 220px);
            min-height: calc(100vh - 86px);
        }

        /* ── Grid background ── */
        .grid-bg {
            position: absolute; inset: 0; pointer-events: none;
            background-image:
                linear-gradient(rgba(59,91,219,.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59,91,219,.06) 1px, transparent 1px);
            background-size: 36px 36px;
            mask-image: radial-gradient(ellipse 90% 70% at 50% 0%, black 20%, transparent 100%);
        }

        /* ── Hero ── */
        .hero {
            position: relative;
            padding: 56px 48px 48px;
            display: flex;
            gap: 48px;
            align-items: center;
            flex-wrap: wrap;
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            width: 100%;
        }
        .hero-left { flex: 1; min-width: 280px; }

        .badge-live {
            display: inline-flex; align-items: center; gap: 8px;
            background: #eef2ff; border: 1px solid #c5d0fa;
            border-radius: 100px; padding: 5px 14px;
            font-size: 12px; font-weight: 600; color: #3b5bdb;
            margin-bottom: 24px;
        }
        .badge-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #40c057; animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%,100% { opacity:1; transform:scale(1); }
            50%      { opacity:.4; transform:scale(.7); }
        }

        .hero h1 {
            font-size: clamp(32px, 4.5vw, 54px);
            font-weight: 900; letter-spacing: -2px; line-height: 1.05;
            color: #1a1a2e; margin-bottom: 16px;
        }
        .hero h1 span { color: #3b5bdb; }
        .hero p { font-size: 15px; color: #6c757d; line-height: 1.75; max-width: 420px; margin-bottom: 28px; }

        .cta-row { display: flex; gap: 10px; flex-wrap: wrap; }

        .btn-hero-primary {
            background: #3b5bdb; color: #fff; border: none;
            border-radius: 10px; padding: 11px 22px;
            font-size: 14px; font-weight: 600; text-decoration: none;
            display: inline-flex; align-items: center; gap: 7px; transition: all .2s;
        }
        .btn-hero-primary:hover { background: #364fc7; transform: translateY(-1px); color: #fff; }

        .btn-hero-ghost {
            background: #fff; color: #495057;
            border: 1px solid #dee2e6; border-radius: 10px; padding: 11px 22px;
            font-size: 14px; font-weight: 500; text-decoration: none;
            display: inline-flex; align-items: center; gap: 7px; transition: all .2s;
        }
        .btn-hero-ghost:hover { border-color: #adb5bd; color: #1a1a2e; }

        /* ── Preview card ── */
        .preview-card {
            background: #fff; border: 1px solid #e9ecef;
            border-radius: 16px; padding: 18px;
            min-width: 270px; max-width: 320px; flex-shrink: 0;
            box-shadow: 0 4px 24px rgba(59,91,219,.07);
        }
        .preview-bar { display: flex; gap: 6px; margin-bottom: 14px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; }

        .t-list { display: flex; flex-direction: column; gap: 6px; }
        .t-item {
            display: flex; align-items: center; gap: 10px;
            background: #f8f9fa; border: 1px solid #f1f3f5;
            border-radius: 8px; padding: 9px 11px; transition: all .2s;
        }
        .t-item:hover { background: #eef2ff; border-color: #c5d0fa; transform: translateX(3px); }
        .t-check {
            width: 16px; height: 16px; border-radius: 4px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center; font-size: 10px;
        }
        .t-done .t-check { background: #40c057; color: #fff; }
        .t-prog .t-check  { background: #fab005; color: #fff; }
        .t-todo .t-check  { border: 1.5px solid #ced4da; }
        .t-text { font-size: 13px; font-weight: 500; flex: 1; color: #212529; }
        .t-done .t-text   { color: #adb5bd; text-decoration: line-through; }
        .t-tag  { font-size: 11px; padding: 2px 9px; border-radius: 100px; font-weight: 600; white-space: nowrap; }
        .tag-blue   { background: #dbe4ff; color: #3b5bdb; }
        .tag-green  { background: #d3f9d8; color: #2f9e44; }
        .tag-amber  { background: #fff3bf; color: #e67700; }
        .tag-red    { background: #ffe3e3; color: #c92a2a; }

        .progress-wrap { margin-top: 12px; }
        .progress-label { display: flex; justify-content: space-between; font-size: 11px; color: #adb5bd; margin-bottom: 5px; }
        .progress-bar-bg { height: 5px; background: #e9ecef; border-radius: 100px; overflow: hidden; }
        .progress-fill { height: 100%; border-radius: 100px; background: linear-gradient(90deg,#3b5bdb,#40c057); transition: width 1.2s ease; }

        /* ── Stats ── */
        .stats-row {
            display: flex;
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            width: 100%;
        }
        .stat-item {
            flex: 1; padding: 24px 32px;
            border-right: 1px solid #e9ecef;
        }
        .stat-item:last-child { border-right: none; }
        .stat-n { font-size: 24px; font-weight: 800; color: #1a1a2e; }
        .stat-l { font-size: 12px; color: #9ca3af; margin-top: 3px; }

        /* ── Features ── */
        .features { padding: 48px 48px 40px; width: 100%; }
        .section-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: 3px; color: #3b5bdb; text-transform: uppercase; margin-bottom: 8px; }
        .section-title { font-size: clamp(22px, 3vw, 32px); font-weight: 800; letter-spacing: -.5px; margin-bottom: 28px; color: #1a1a2e; }

        .feat-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 12px; }
        .feat-card {
            background: #fff; border: 1px solid #e9ecef;
            border-radius: 14px; padding: 20px; transition: all .2s;
        }
        .feat-card:hover { border-color: #c5d0fa; box-shadow: 0 4px 20px rgba(59,91,219,.08); transform: translateY(-2px); }
        .feat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; margin-bottom: 12px; }
        .ic-blue  { background: #eef2ff; }
        .ic-green { background: #ebfbee; }
        .ic-amber { background: #fff9db; }
        .ic-red   { background: #fff5f5; }
        .feat-card h3 { font-size: 14px; font-weight: 700; margin-bottom: 5px; color: #1a1a2e; }
        .feat-card p  { font-size: 12px; color: #9ca3af; line-height: 1.6; margin: 0; }

        /* ── CTA ── */
        .cta-section { padding: 32px 48px 56px; width: 100%; }
        .cta-box {
            background: #eef2ff; border: 1px solid #c5d0fa;
            border-radius: 18px; padding: 36px 28px; text-align: center;
        }
        .cta-box h2 { font-size: 24px; font-weight: 800; letter-spacing: -.3px; margin-bottom: 8px; color: #1a1a2e; }
        .cta-box p  { color: #6c757d; margin-bottom: 20px; font-size: 14px; }

        /* ── Overlay sidebar mobile ── */
        .sidebar-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,.35); z-index: 99;
        }
        .sidebar-overlay.active { display: block; }

        .sidebar-toggle {
            display: none; background: none; border: none;
            font-size: 22px; cursor: pointer; padding: 0 8px; color: #1a1a2e;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 200;
            }
            .sidebar.open { transform: translateX(0); }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar-toggle { display: inline-flex; align-items: center; }

            .hero { padding: 32px 20px 28px; flex-direction: column; gap: 28px; }
            .hero-left { min-width: unset; width: 100%; }

            .preview-card { min-width: unset; max-width: 100%; width: 100%; }

            .stats-row { overflow-x: auto; }
            .stat-item  { padding: 16px 20px; min-width: 120px; }

            .features   { padding: 32px 20px 24px; }
            .cta-section { padding: 20px 20px 40px; }
        }

        @media (max-width: 480px) {
            .hero h1 { letter-spacing: -1px; }
            .stat-n  { font-size: 20px; }
            .feat-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>

<body>

    <?php include "includes/navbar.php" ?>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div class="page-wrapper">

        <!-- Sidebar -->
        <div class="sidebar" id="mainSidebar">
            <ul class="nav flex-column gap-1 mb-5">
                <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/todolist.php">📝 Tableau</a></li>
                <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/list.php">📋 Liste</a></li>
                <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/calendar.php">📅 Calendrier</a></li>
                <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/statistics.php">✅ Stats</a></li>
            </ul>
            <p class="text-uppercase text-muted small fw-semibold mb-2">Projets</p>
            <ul class="nav flex-column gap-1">
                <li class="nav-item">
                    <a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#">
                        <span style="width:10px;height:10px;border-radius:50%;background:#0d6efd;display:inline-block;"></span>Dev perso
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#">
                        <span style="width:10px;height:10px;border-radius:50%;background:#198754;display:inline-block;"></span>Maison
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#">
                        <span style="width:10px;height:10px;border-radius:50%;background:#ffc107;display:inline-block;"></span>Freelance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#">
                        <span style="width:10px;height:10px;border-radius:50%;background:#dc3545;display:inline-block;"></span>Études
                    </a>
                </li>
            </ul>
            <div class="mt-auto">
                <a class="nav-link nb text-dark rounded" href="#">⚙️ Paramètres</a>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">

            <!-- Hero -->
            <section class="hero">
                <div class="grid-bg"></div>
                <div class="hero-left">
                    <div class="badge-live">
                        <span class="badge-dot"></span>
                        Bienvenue sur My Tasks
                    </div>
                    <h1>Tes tâches,<br>enfin <span>sous contrôle</span>.</h1>
                    <p>Un espace personnel pour organiser ta vie, suivre tes projets et ne plus jamais oublier ce qui compte.</p>
                    <div class="cta-row">
                        <a href="/todolist/php/todolist.php" class="btn-hero-primary">📝 Voir le tableau</a>
                        <a href="/todolist/php/list.php" class="btn-hero-ghost">📋 Vue liste</a>
                    </div>
                </div>

                <div class="preview-card">
                    <div class="preview-bar">
                        <div class="dot" style="background:#ff5f57"></div>
                        <div class="dot" style="background:#febc2e"></div>
                        <div class="dot" style="background:#28c840"></div>
                    </div>
                    <div style="font-size:10px;color:#adb5bd;margin-bottom:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;">Aujourd'hui</div>
                    <div class="t-list">
                        <div class="t-item t-done">
                            <div class="t-check">✓</div>
                            <div class="t-text">Structure BDD</div>
                            <span class="t-tag tag-blue">Dev</span>
                        </div>
                        <div class="t-item t-done">
                            <div class="t-check">✓</div>
                            <div class="t-text">Navbar Bootstrap</div>
                            <span class="t-tag tag-green">UI</span>
                        </div>
                        <div class="t-item t-prog">
                            <div class="t-check">→</div>
                            <div class="t-text">Intégrer le logo</div>
                            <span class="t-tag tag-amber">En cours</span>
                        </div>
                        <div class="t-item t-todo">
                            <div class="t-check"></div>
                            <div class="t-text">Mode sombre</div>
                            <span class="t-tag tag-blue">Dev</span>
                        </div>
                        <div class="t-item t-todo">
                            <div class="t-check"></div>
                            <div class="t-text">Déploiement</div>
                            <span class="t-tag tag-red">Urgent</span>
                        </div>
                    </div>
                    <div class="progress-wrap">
                        <div class="progress-label"><span>Progression</span><span>40%</span></div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" id="pbar" style="width:0%"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats -->
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-n">3 vues</div>
                    <div class="stat-l">Tableau · Liste · Calendrier</div>
                </div>
                <div class="stat-item">
                    <div class="stat-n">100%</div>
                    <div class="stat-l">Personnel &amp; privé</div>
                </div>
                <div class="stat-item">
                    <div class="stat-n">Stats</div>
                    <div class="stat-l">Suivi de productivité</div>
                </div>
            </div>

            <!-- Features -->
            <section class="features">
                <div class="section-eyebrow">Fonctionnalités</div>
                <h2 class="section-title">Tout ce dont tu as besoin,<br>rien de plus.</h2>
                <div class="feat-grid">
                    <div class="feat-card">
                        <div class="feat-icon ic-blue">📝</div>
                        <h3>Vue Tableau</h3>
                        <p>Glisse-dépose tes tâches entre les colonnes pour visualiser ton workflow.</p>
                    </div>
                    <div class="feat-card">
                        <div class="feat-icon ic-green">📋</div>
                        <h3>Vue Liste</h3>
                        <p>Toutes tes tâches d'un seul regard, filtrées et triées comme tu veux.</p>
                    </div>
                    <div class="feat-card">
                        <div class="feat-icon ic-amber">📅</div>
                        <h3>Calendrier</h3>
                        <p>Planifie sur le long terme et ne rate plus aucune échéance.</p>
                    </div>
                    <div class="feat-card">
                        <div class="feat-icon ic-red">✅</div>
                        <h3>Statistiques</h3>
                        <p>Analyse ta productivité semaine après semaine avec des graphiques clairs.</p>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section class="cta-section">
                <div class="cta-box">
                    <h2>Prêt à être productif ?</h2>
                    <p>Crée ta première tâche en quelques secondes.</p>
                    <a href="/todolist/php/todolist.php" class="btn-hero-primary" style="display:inline-flex;">
                        🚀 Accéder à l'app
                    </a>
                </div>
            </section>

        </div><!-- /.main-content -->
    </div><!-- /.page-wrapper -->

    <?php include "includes/add-task.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>
    <script>
        setTimeout(() => { const b = document.getElementById('pbar'); if(b) b.style.width='40%'; }, 400);
        document.querySelectorAll('.t-item').forEach((el, i) => {
            el.style.opacity = '0'; el.style.transform = 'translateX(-10px)';
            setTimeout(() => {
                el.style.transition = 'opacity .35s ease, transform .35s ease';
                el.style.opacity = '1'; el.style.transform = 'translateX(0)';
            }, 300 + i * 90);
        });

        function toggleSidebar() {
            document.getElementById('mainSidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }
    </script>

</body>
</html>