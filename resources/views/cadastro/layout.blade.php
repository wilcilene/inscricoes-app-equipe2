<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e5e5e5;
            min-height: 100vh;
            padding: 40px 30px;
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #1a1a1a;
            letter-spacing: -1px;
        }

        .subtitle {
            color: #555;
            font-size: 0.95rem;
            margin-top: 4px;
            margin-bottom: 28px;
        }

        /* ---- Stepper ---- */
        .stepper-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .stepper {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .step-dot {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #aaa;
            flex-shrink: 0;
        }

        .step-dot.active  { background: #c0392b; }
        .step-dot.done    { background: #27ae60; }

        .step-line {
            width: 120px;
            height: 3px;
            background: #aaa;
        }

        .step-line.done   { background: #27ae60; }
        .step-line.active { background: #c0392b; }

        .btn-proximo {
            background: #27ae60;
            color: #fff;
            border: none;
            padding: 14px 40px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-proximo:hover { background: #219150; }

        /* ---- Card ---- */
        .card {
            background: #fff;
            border-radius: 6px;
            padding: 28px 32px 32px;
        }

        .card h2 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 22px;
            color: #1a1a1a;
        }

        /* ---- Grid ---- */
        .form-grid {
            display: grid;
            gap: 18px;
        }

        .col-1 { grid-template-columns: 1fr; }
        .col-2 { grid-template-columns: 1fr 1fr; }
        .col-3 { grid-template-columns: 1fr 1fr 1fr; }
        .col-4 { grid-template-columns: 1fr 1fr 1fr 1fr; }

        .field { display: flex; flex-direction: column; gap: 5px; }

        .field label {
            font-size: 0.85rem;
            color: #333;
            font-weight: 500;
        }

        .field input,
        .field select {
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
            background: #fff;
            transition: border-color 0.2s;
        }

        .field input:focus,
        .field select:focus {
            outline: none;
            border-color: #888;
        }

        .field input.is-invalid,
        .field select.is-invalid {
            border-color: #c0392b;
        }

        .error-msg {
            color: #c0392b;
            font-size: 0.78rem;
            margin-top: 2px;
        }

        /* ---- Rodapé do card ---- */
        .card-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 28px;
        }

        .btn-cancelar {
            background: #c0392b;
            color: #fff;
            border: none;
            padding: 12px 36px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-cancelar:hover { background: #a93226; }

        /* ---- Alertas ---- */
        .alert {
            padding: 12px 16px;
            border-radius: 5px;
            margin-bottom: 18px;
            font-size: 0.88rem;
        }

        .alert-danger { background: #fdecea; border-left: 4px solid #c0392b; color: #c0392b; }
        .alert-success { background: #eafaf1; border-left: 4px solid #27ae60; color: #1e8449; }

        @media (max-width: 768px) {
            .col-2, .col-3, .col-4 { grid-template-columns: 1fr; }
            .step-line { width: 60px; }
        }
    </style>
</head>
<body>

    <h1>CADASTRO</h1>
    <p class="subtitle">Certifique-se de que os dados estão corretos</p>

    @yield('content')

</body>
</html>
