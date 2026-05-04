<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Safety') }}</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #020617;
            color: #fff;
        }

        .page {
            min-height: 100vh;
            padding: 4rem 1.5rem;
        }

        .container {
            max-width: 64rem;
            margin: 0 auto;
        }

        .eyebrow {
            color: #67e8f9;
            font-size: 0.875rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(2.5rem, 7vw, 4.5rem);
            line-height: 1.1;
            margin: 1rem 0;
        }

        p {
            max-width: 42rem;
            color: #cbd5e1;
            font-size: 1.125rem;
            line-height: 1.7;
        }

        code {
            background: #1e293b;
            border-radius: 0.375rem;
            color: #a5f3fc;
            padding: 0.2rem 0.5rem;
        }
    </style>
</head>
<body>
    <main class="page">
        <div class="container">
            <p class="eyebrow">HMVC Laravel</p>
            <h1>
                Project ini sekarang memakai struktur modular.
            </h1>
            <p>
                Route, controller, view, migration, translation, dan config bisa dipisah per modul di folder
                <code>Modules/*</code>.
            </p>
        </div>
    </main>
</body>
</html>
