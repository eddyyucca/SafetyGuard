<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Safety') }} | Dashboard</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        :root {
            --bg-app: #f4f7f2;
            --bg-sidebar-top: #0e2418;
            --bg-sidebar-bottom: #132f1f;
            --bg-card: #ffffff;
            --bg-card-soft: #f8fbf7;
            --line: #dce6dd;
            --text-main: #1a2d22;
            --text-soft: #667d6e;
            --green-900: #143725;
            --green-700: #1f6b43;
            --green-600: #2b8a56;
            --green-500: #39b56d;
            --green-100: #eaf7ee;
            --lime-500: #8bcf21;
            --blue-500: #2a6a99;
            --amber-500: #ca7b18;
            --red-500: #d94a4a;
            --shadow-soft: 0 16px 36px rgba(17, 40, 27, 0.06);
        }

        html, body {
            background: linear-gradient(180deg, #f8fbf7 0%, #eef4ee 100%);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
        }

        .wrapper,
        .content-wrapper,
        .main-header,
        .main-footer {
            background: transparent;
        }

        .main-sidebar {
            background: linear-gradient(180deg, var(--bg-sidebar-top) 0%, var(--bg-sidebar-bottom) 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 22px 0 44px rgba(9, 21, 14, 0.08);
        }

        .brand-link {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 1rem 1.1rem 1.15rem;
            overflow: hidden;
        }

        .brand-shell {
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 0;
            width: 100%;
        }

        .brand-logo {
            width: 4.25rem;
            height: 4.25rem;
            padding: 0.35rem;
            border-radius: 1.15rem;
            background:
                radial-gradient(circle at top left, rgba(57, 181, 109, 0.16), transparent 45%),
                rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.12));
        }

        .brand-title {
            color: #fff;
            font-size: 0.98rem;
            font-weight: 800;
            line-height: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.58);
            font-size: 0.64rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-top: 0.28rem;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .brand-copy {
            min-width: 0;
            overflow: hidden;
            flex: 1;
        }

        .brand-copy > div {
            white-space: nowrap;
        }

        .sidebar {
            padding: 0.9rem;
        }

        .user-panel {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 0.15rem 0.2rem 1rem;
            margin-bottom: 1rem;
        }

        .user-panel .info {
            padding-left: 0.85rem;
        }

        .user-avatar {
            width: 2.85rem;
            height: 2.85rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--green-500), var(--lime-500));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            box-shadow: 0 10px 20px rgba(57, 181, 109, 0.25);
        }

        .sidebar-label {
            padding: 0 0.7rem;
            margin: 1rem 0 0.8rem;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .sidebar-group {
            margin-bottom: 1.1rem;
        }

        .nav-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 1rem;
            padding: 0.95rem 1rem;
            font-weight: 600;
            margin-bottom: 0.34rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-sidebar .nav-link:hover,
        .nav-sidebar .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, rgba(57, 181, 109, 0.2), rgba(139, 207, 33, 0.14));
        }

        .nav-sidebar .nav-link.active {
            box-shadow: inset 3px 0 0 var(--lime-500);
        }

        .nav-sidebar .nav-icon {
            margin-right: 0.85rem;
        }

        .nav-text {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .nav-badge {
            min-width: 1.7rem;
            height: 1.7rem;
            padding: 0 0.45rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.72rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .content-wrapper,
        .main-header,
        .main-footer {
            margin-left: 290px;
        }

        .main-header {
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(10px);
        }

        .main-header .nav-link {
            color: var(--text-main) !important;
        }

        .header-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.62rem 0.95rem;
            border-radius: 999px;
            border: 1px solid #d6e8d9;
            background: var(--green-100);
            color: var(--green-700);
            font-size: 0.83rem;
            font-weight: 700;
        }

        .content-header {
            padding: 1.5rem 1.5rem 0;
        }

        .content {
            padding: 1.5rem;
        }

        .surface {
            background: var(--bg-card);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: var(--shadow-soft);
        }

        .page-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .page-kicker {
            color: var(--green-600);
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .page-title {
            margin: 0;
            font-size: 2rem;
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .page-copy {
            display: none;
        }

        .metric-card {
            height: 100%;
        }

        .metric-card .card-body {
            padding: 1.15rem 1.2rem;
        }

        .metric-layout {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 0.9rem;
        }

        .metric-label {
            color: var(--text-soft);
            font-size: 0.74rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 800;
        }

        .metric-value {
            margin-top: 0.55rem;
            font-size: 2.45rem;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .metric-meta {
            margin-top: 0.5rem;
            color: var(--text-soft);
            font-size: 0.92rem;
            line-height: 1.5;
        }

        .metric-icon {
            width: 3.15rem;
            height: 3.15rem;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
        }

        .tone-emerald { background: linear-gradient(135deg, var(--green-500), var(--green-700)); }
        .tone-green { background: linear-gradient(135deg, var(--green-600), var(--blue-500)); }
        .tone-lime { background: linear-gradient(135deg, var(--lime-500), var(--green-500)); }
        .tone-red { background: linear-gradient(135deg, var(--red-500), var(--amber-500)); }

        .mini-metrics {
            margin-bottom: 1rem;
        }

        .mini-card {
            background: var(--bg-card);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow-soft);
            padding: 1rem 1.05rem;
            height: 100%;
        }

        .mini-label {
            color: var(--text-soft);
            font-size: 0.73rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 800;
        }

        .mini-value {
            margin-top: 0.48rem;
            font-size: 1.95rem;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .mini-green { color: var(--green-600); }
        .mini-lime { color: #6f9d03; }
        .mini-blue { color: var(--blue-500); }
        .mini-dark { color: var(--text-main); }

        .section-card {
            height: 100%;
        }

        .section-card .card-body {
            padding: 1.2rem;
        }

        .section-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
        }

        .section-title {
            margin: 0;
            font-size: 1.08rem;
            font-weight: 800;
        }

        .section-copy {
            display: none;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.74rem;
            border-radius: 999px;
            background: var(--green-100);
            color: var(--green-700);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .chart-shell {
            position: relative;
            width: 100%;
            margin-top: 1rem;
        }

        .chart-lg { height: 330px; }
        .chart-md { height: 280px; }
        .chart-sm { height: 250px; }

        .visual-grid-note {
            margin-top: 0.9rem;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .visual-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.65rem;
            border-radius: 999px;
            background: var(--bg-card-soft);
            border: 1px solid var(--line);
            color: var(--text-soft);
            font-size: 0.74rem;
            font-weight: 700;
        }

        .visual-dot {
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 50%;
            display: inline-block;
        }

        .main-footer {
            border-top: 1px solid var(--line);
            color: var(--text-soft);
        }

        @media (max-width: 991.98px) {
            .content-wrapper,
            .main-header,
            .main-footer {
                margin-left: 0;
            }

            .page-head {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('home') }}" class="brand-link">
                <div class="brand-shell">
                    <div class="brand-logo">
                        <img src="{{ asset('images/logo-mark-transparent.png') }}" alt="Safety Guard">
                    </div>
                    <div class="brand-copy">
                        <div class="brand-title">Safety Guard</div>
                        <div class="brand-subtitle">Safety Intelligence</div>
                    </div>
                </div>
            </a>

            <div class="sidebar">
                <div class="user-panel d-flex">
                    <div class="image">
                        <div class="user-avatar">HSE</div>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-white">Safety Admin</a>
                        <span class="text-xs text-slate-300">Monitoring dashboard</span>
                    </div>
                </div>

                <div class="sidebar-group">
                    <div class="sidebar-label">Overview</div>
                    <nav>
                        <ul class="nav nav-pills nav-sidebar flex-column text-sm" role="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <span class="nav-text"><i class="nav-icon fas fa-chart-line"></i><p>Dashboard</p></span>
                                    <span class="nav-badge">4</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-clipboard-list"></i><p>Incident</p></span>
                                    <span class="nav-badge">7</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-list-check"></i><p>Action Tracking</p></span>
                                    <span class="nav-badge">9</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="sidebar-group">
                    <div class="sidebar-label">Operations</div>
                    <nav>
                        <ul class="nav nav-pills nav-sidebar flex-column text-sm" role="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-heart-pulse"></i><p>Fit To Work</p></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-truck"></i><p>P2H</p></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-triangle-exclamation"></i><p>Hazard</p></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-helmet-safety"></i><p>Inspection</p></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="nav-text"><i class="nav-icon fas fa-file-signature"></i><p>Permit To Work</p></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>

        <nav class="main-header navbar navbar-expand border-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item d-none d-md-block mr-3">
                    <div class="header-pill">{{ $context['shift'] }} | {{ $context['date'] }}</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-bell"></i>
                        <span class="ml-1 badge badge-success">7</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid px-0">
                    <div class="page-head">
                        <div>
                            <div class="page-kicker">Dashboard</div>
                            <h1 class="page-title">Safety Monitoring Overview</h1>
                        </div>
                        <div class="header-pill d-none d-lg-inline-flex">Updated {{ $context['date'] }}</div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid px-0">
                    <div class="row">
                        @foreach ($stats as $stat)
                            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                                <div class="card surface metric-card">
                                    <div class="card-body">
                                        <div class="metric-layout">
                                            <div>
                                                <div class="metric-label">{{ $stat['label'] }}</div>
                                                <div class="metric-value">{{ $stat['value'] }}</div>
                                                <div class="metric-meta">{{ $stat['meta'] }}</div>
                                            </div>
                                            <div class="metric-icon tone-{{ $stat['tone'] }}">
                                                <i class="{{ $stat['icon'] }}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mini-metrics">
                        @foreach ($quickFacts as $fact)
                            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                                <div class="mini-card">
                                    <div class="mini-label">{{ $fact['label'] }}</div>
                                    <div class="mini-value {{ $fact['tone'] === 'green' ? 'mini-green' : ($fact['tone'] === 'lime' ? 'mini-lime' : ($fact['tone'] === 'emerald' ? 'mini-blue' : 'mini-dark')) }}">{{ $fact['value'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Operational Trend</h3>
                                        </div>
                                        <span class="section-badge">Weekly</span>
                                    </div>
                                    <div class="chart-shell chart-lg">
                                        <canvas id="sitePerformanceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Risk Distribution</h3>
                                        </div>
                                        <span class="section-badge">Active</span>
                                    </div>
                                    <div class="chart-shell chart-md">
                                        <canvas id="riskDistributionChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Compliance Snapshot</h3>
                                        </div>
                                        <span class="section-badge">Today</span>
                                    </div>
                                    <div class="chart-shell chart-sm">
                                        <canvas id="complianceSnapshotChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Module Summary</h3>
                                            <p class="section-copy">Ringkasan cepat untuk supervisor, HSE, dan management tanpa harus membuka detail satu per satu.</p>
                                        </div>
                                        <span class="section-badge">Overview</span>
                                    </div>
                                    <div class="chart-shell chart-sm">
                                        <canvas id="moduleHealthChart"></canvas>
                                    </div>
                                    <div class="visual-grid-note">
                                        <span class="visual-chip"><span class="visual-dot" style="background:#2b8a56"></span>Stable</span>
                                        <span class="visual-chip"><span class="visual-dot" style="background:#8bcf21"></span>Watch</span>
                                        <span class="visual-chip"><span class="visual-dot" style="background:#d94a4a"></span>Low score</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Activity Volume</h3>
                                        </div>
                                        <span class="section-badge">Shift</span>
                                    </div>
                                    <div class="chart-shell chart-sm">
                                        <canvas id="activityVolumeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Area Focus</h3>
                                        </div>
                                        <span class="section-badge">Priority</span>
                                    </div>
                                    <div class="chart-shell chart-sm">
                                        <canvas id="areaFocusChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="card surface section-card">
                                <div class="card-body">
                                    <div class="section-head">
                                        <div>
                                            <h3 class="section-title">Action Aging</h3>
                                        </div>
                                        <span class="section-badge">Open</span>
                                    </div>
                                    <div class="chart-shell chart-sm">
                                        <canvas id="actionAgingChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer bg-transparent px-4 py-3 text-sm">
            <strong>Safety Guard Dashboard</strong>
            <span class="ml-2">Structured for fit to work, P2H, hazard, inspection, incident, and action monitoring.</span>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sitePerformance = @json($sitePerformance);
        const riskDistribution = @json($riskDistribution);
        const complianceSnapshot = @json($complianceSnapshot);
        const moduleHealth = @json($moduleHealth);
        const activityVolume = @json($activityVolume);
        const areaFocusChart = @json($areaFocusChart);
        const actionAging = @json($actionAging);

        const palette = {
            text: '#1a2d22',
            grid: 'rgba(102, 125, 110, 0.12)',
            green: '#2b8a56',
            greenLight: 'rgba(43, 138, 86, 0.12)',
            lime: '#8bcf21',
            limeLight: 'rgba(139, 207, 33, 0.14)',
            blue: '#2a6a99',
            blueLight: 'rgba(42, 106, 153, 0.10)',
            red: '#d94a4a',
        };

        const initCharts = () => {
            const trend = document.getElementById('sitePerformanceChart');
            const risk = document.getElementById('riskDistributionChart');
            const compliance = document.getElementById('complianceSnapshotChart');
            const moduleHealthCanvas = document.getElementById('moduleHealthChart');
            const activityVolumeCanvas = document.getElementById('activityVolumeChart');
            const areaFocusCanvas = document.getElementById('areaFocusChart');
            const actionAgingCanvas = document.getElementById('actionAgingChart');

            if (!trend || !risk || !compliance || !moduleHealthCanvas || !activityVolumeCanvas || !areaFocusCanvas || !actionAgingCanvas) {
                return;
            }

            ['trendChartInstance', 'riskChartInstance', 'complianceChartInstance', 'moduleHealthChartInstance', 'activityVolumeChartInstance', 'areaFocusChartInstance', 'actionAgingChartInstance'].forEach((key) => {
                if (window[key]) {
                    window[key].destroy();
                }
            });

            window.trendChartInstance = new Chart(trend, {
                type: 'line',
                data: {
                    labels: sitePerformance.labels,
                    datasets: [
                        {
                            label: 'Hazard',
                            data: sitePerformance.hazards,
                            borderColor: palette.lime,
                            backgroundColor: palette.limeLight,
                            fill: true,
                            tension: 0.35,
                            borderWidth: 2.5,
                            pointRadius: 3,
                            pointHoverRadius: 4,
                        },
                        {
                            label: 'P2H',
                            data: sitePerformance.p2h,
                            borderColor: palette.blue,
                            backgroundColor: palette.blueLight,
                            tension: 0.35,
                            borderWidth: 2.5,
                            pointRadius: 3,
                            pointHoverRadius: 4,
                        },
                        {
                            label: 'Fit To Work',
                            data: sitePerformance.fitToWork,
                            borderColor: palette.green,
                            backgroundColor: palette.greenLight,
                            tension: 0.35,
                            borderWidth: 2.5,
                            pointRadius: 3,
                            pointHoverRadius: 4,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    resizeDelay: 180,
                    animation: false,
                    plugins: {
                        legend: {
                            labels: { color: palette.text },
                        },
                    },
                    scales: {
                        x: {
                            ticks: { color: palette.text },
                            grid: { color: palette.grid },
                        },
                        y: {
                            ticks: { color: palette.text },
                            grid: { color: palette.grid },
                        },
                    },
                },
            });

            window.riskChartInstance = new Chart(risk, {
                type: 'doughnut',
                data: {
                    labels: riskDistribution.labels,
                    datasets: [{
                        data: riskDistribution.values,
                        backgroundColor: ['#2b8a56', '#39b56d', '#8bcf21', '#d94a4a'],
                        borderWidth: 0,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    resizeDelay: 180,
                    animation: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: palette.text,
                                padding: 14,
                            },
                        },
                    },
                    cutout: '68%',
                },
            });

            window.complianceChartInstance = new Chart(compliance, {
                type: 'bar',
                data: {
                    labels: complianceSnapshot.labels,
                    datasets: [{
                        data: complianceSnapshot.values,
                        backgroundColor: ['#2b8a56', '#39b56d', '#8bcf21', '#2a6a99', '#1f6b43'],
                        borderRadius: 12,
                        borderSkipped: false,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    resizeDelay: 180,
                    animation: false,
                    plugins: {
                        legend: { display: false },
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: palette.text,
                                maxRotation: 0,
                                minRotation: 0,
                            },
                            grid: { display: false },
                        },
                        y: {
                            suggestedMax: 100,
                            ticks: { color: palette.text },
                            grid: { color: palette.grid },
                        },
                    },
                },
            });

            window.moduleHealthChartInstance = new Chart(moduleHealthCanvas, {
                type: 'radar',
                data: {
                    labels: moduleHealth.labels,
                    datasets: [{
                        data: moduleHealth.values,
                        borderColor: palette.green,
                        backgroundColor: 'rgba(43, 138, 86, 0.14)',
                        pointBackgroundColor: palette.green,
                        pointRadius: 3,
                        borderWidth: 2,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        r: {
                            angleLines: { color: palette.grid },
                            grid: { color: palette.grid },
                            suggestedMin: 0,
                            suggestedMax: 100,
                            pointLabels: { color: palette.text, font: { size: 11 } },
                            ticks: { display: false },
                        },
                    },
                },
            });

            window.activityVolumeChartInstance = new Chart(activityVolumeCanvas, {
                type: 'bar',
                data: {
                    labels: activityVolume.labels,
                    datasets: [{
                        data: activityVolume.values,
                        backgroundColor: '#39b56d',
                        borderRadius: 10,
                        borderSkipped: false,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { ticks: { color: palette.text }, grid: { display: false } },
                        y: { ticks: { color: palette.text }, grid: { color: palette.grid } },
                    },
                },
            });

            window.areaFocusChartInstance = new Chart(areaFocusCanvas, {
                type: 'bar',
                data: {
                    labels: areaFocusChart.labels,
                    datasets: [{
                        data: areaFocusChart.values,
                        backgroundColor: ['#2b8a56', '#39b56d', '#8bcf21', '#d94a4a'],
                        borderRadius: 10,
                        borderSkipped: false,
                    }],
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: {
                            suggestedMax: 100,
                            ticks: { color: palette.text },
                            grid: { color: palette.grid },
                        },
                        y: {
                            ticks: { color: palette.text },
                            grid: { display: false },
                        },
                    },
                },
            });

            window.actionAgingChartInstance = new Chart(actionAgingCanvas, {
                type: 'doughnut',
                data: {
                    labels: actionAging.labels,
                    datasets: [{
                        data: actionAging.values,
                        backgroundColor: ['#39b56d', '#8bcf21', '#ca7b18', '#d94a4a'],
                        borderWidth: 0,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: false,
                    cutout: '62%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: palette.text,
                                padding: 12,
                            },
                        },
                    },
                },
            });
        };

        document.addEventListener('DOMContentLoaded', initCharts, { once: true });
    </script>
</body>
</html>
