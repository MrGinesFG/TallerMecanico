<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monkey Motors | Taller Mecánico</title>
    <meta name="description"
        content="Monkey Motors - Taller mecánico integral. Mecánica general, frenos, diagnóstico computarizado y más.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --green: #2E6F47;
            --green-dark: #1F4D32;
            --brown: #6B4A35;
            --brown-dark: #4A3327;
            --cream: #FBF8F2;
            --cream-2: #F1EBDD;
            --yellow: #F2B705;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream);
            color: var(--brown-dark);
            line-height: 1.5;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        .display {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            color: var(--green-dark);
            line-height: 1.1;
        }

        .mono {
            font-family: 'IBM Plex Mono', monospace;
            letter-spacing: 0.03em;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        :focus-visible {
            outline: 3px solid var(--yellow);
            outline-offset: 3px;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Signature element: brand-colored caution stripe (nod to workshop hazard tape, in Monkey Motors green/cream instead of yellow/black) */
        .stripe {
            height: 14px;
            width: 100%;
            background: repeating-linear-gradient(-45deg,
                    var(--green) 0px, var(--green) 26px,
                    var(--cream) 26px, var(--cream) 52px);
        }

        .stripe--thin {
            height: 8px;
        }

        /* Top auth bar (login/register, like Laravel's default welcome.blade.php) */
        .topbar {
            background: var(--brown-dark);
            padding: 8px 0;
        }

        .topbar__inner {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
        }

        .topbar__link {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.8rem;
            color: var(--brown-dark);
            opacity: 0.9;
            transition: opacity 0.2s ease;
        }

        .topbar__link:hover {
            opacity: 1;
        }

        .topbar__link--cta {
            background: var(--yellow);
            color: var(--brown-dark) !important;
            opacity: 1;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 600;
        }

        .topbar__link--cta:hover {
            background: #d9a604;
        }

        /* Header */
        header {
            background: var(--cream);
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid var(--cream-2);
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 24px;
        }

        .nav__brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav__brand img {
            height: 46px;
            width: auto;
        }

        .nav__brand span {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--brown-dark);
        }

        .nav__links {
            display: flex;
            gap: 32px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav__links a {
            position: relative;
            padding: 4px 0;
            transition: color 0.2s ease;
        }

        .nav__links a:hover {
            color: var(--green);
        }

        .nav__cta {
            background: var(--green);
            color: var(--white) !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.2s ease, transform 0.2s ease;
            white-space: nowrap;
        }

        .nav__cta:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        .nav__toggle {
            display: none;
        }

        /* Hero */
        .hero {
            padding: 72px 0 56px;
        }

        .hero__grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 48px;
            align-items: center;
        }

        .eyebrow {
            font-family: 'IBM Plex Mono', monospace;
            color: var(--green);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 16px;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 4.2vw, 3.4rem);
            margin-bottom: 20px;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--brown);
        }

        .hero p {
            font-size: 1.08rem;
            max-width: 46ch;
            margin-bottom: 32px;
            color: #5b4638;
        }

        .btn-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.98rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn--primary {
            background: var(--green);
            color: var(--white);
            box-shadow: 0 4px 0 var(--green-dark);
        }

        .btn--primary:hover {
            box-shadow: 0 6px 0 var(--green-dark);
        }

        .btn--ghost {
            background: var(--white);
            color: var(--brown-dark);
            border: 2px solid var(--cream-2);
        }

        .btn--ghost:hover {
            border-color: var(--brown);
        }

        .hero__art {
            position: relative;
            background: var(--white);
            border-radius: 24px;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px -20px rgba(31, 77, 50, 0.25);
        }

        .hero__art::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 24px;
            padding: 3px;
            background: repeating-linear-gradient(-45deg, var(--green) 0 10px, transparent 10px 20px);
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.25;
        }

        .hero__art img {
            width: 100%;
            max-width: 340px;
        }

        /* Trust strip */
        .trust {
            background: var(--brown-dark);
            color: var(--cream);
            padding: 22px 0;
        }

        .trust__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
        }

        .trust__item .num {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--yellow);
            display: block;
        }

        .trust__item .label {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            opacity: 0.85;
        }

        /* Services */
        .services {
            padding: 88px 0;
        }

        .section-head {
            text-align: center;
            max-width: 640px;
            margin: 0 auto 56px;
        }

        .section-head h2 {
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            margin-bottom: 14px;
        }

        .section-head p {
            color: #5b4638;
            font-size: 1.05rem;
        }

        .services__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            padding: 32px 28px;
            border: 1px solid var(--cream-2);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -16px rgba(107, 74, 53, 0.25);
            border-color: var(--green);
        }

        .card__icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: var(--cream-2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            font-size: 1.4rem;
        }

        .card h3 {
            font-size: 1.15rem;
            margin-bottom: 8px;
        }

        .card p {
            color: #5b4638;
            font-size: 0.95rem;
        }

        /* About */
        .about {
            padding: 80px 0;
            background: var(--cream-2);
        }

        .about__grid {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 56px;
            align-items: center;
        }

        .about h2 {
            font-size: clamp(1.7rem, 3vw, 2.2rem);
            margin-bottom: 18px;
        }

        .about p {
            color: #5b4638;
            margin-bottom: 16px;
            font-size: 1.02rem;
        }

        .about__badge {
            background: var(--white);
            border-radius: 20px;
            padding: 36px;
            text-align: center;
            box-shadow: 0 16px 32px -20px rgba(31, 77, 50, 0.3);
        }

        .about__badge img {
            width: 160px;
            margin: 0 auto 16px;
        }

        .about__badge .mono {
            color: var(--green);
            font-size: 0.85rem;
        }

        /* Contact */
        .contact {
            padding: 88px 0;
        }

        .contact__grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .contact__card {
            background: var(--green-dark);
            color: var(--cream);
            border-radius: 20px;
            padding: 40px;
        }

        .contact__card h2 {
            color: var(--white);
            font-size: 1.7rem;
            margin-bottom: 24px;
        }

        .contact__row {
            display: flex;
            gap: 14px;
            margin-bottom: 20px;
            font-size: 0.98rem;
        }

        .contact__row .mono {
            color: var(--yellow);
            min-width: 90px;
        }

        .map-embed {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--cream-2);
            min-height: 320px;
        }

        .map-embed iframe {
            width: 100%;
            height: 100%;
            min-height: 320px;
            border: 0;
        }

        /* Footer */
        footer {
            background: var(--brown-dark);
            color: var(--cream);
            padding: 32px 0;
            text-align: center;
            font-size: 0.9rem;
        }

        footer .mono {
            opacity: 0.7;
            font-size: 0.8rem;
            margin-top: 6px;
        }

        @media (max-width: 860px) {
            .nav__links {
                display: none;
            }

            .hero__grid,
            .about__grid,
            .contact__grid {
                grid-template-columns: 1fr;
            }

            .hero__art {
                order: -1;
            }

            .services__grid {
                grid-template-columns: 1fr;
            }

            .trust__grid {
                grid-template-columns: repeat(2, 1fr);
                row-gap: 24px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

    <header>
        <nav class="nav container">
            <a href="#" class="nav__brand">
                <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Monkey Motors">
                <span>Monkey Motors</span>
            </a>
            <ul class="nav__links">
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
            @if (Route::has('login'))

                <div class="container topbar__inner">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="topbar__link topbar__link--cta">Ir al panel</a>
                    @else
                        <a href="{{ route('login') }}" class="topbar__link">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="topbar__link topbar__link--cta">Registrarse</a>
                        @endif
                    @endauth
                </div>

            @endif
        </nav>
    </header>

    <div class="stripe"></div>

    <section class="hero">
        <div class="container hero__grid">
            <div>
                <span class="eyebrow">Taller mecánico integral</span>
                <h1>Tu auto, en manos <em>expertas</em>.<br>Sin vueltas, sin sorpresas.</h1>
                <p>En Monkey Motors diagnosticamos, reparamos y ponemos a punto tu vehículo con la misma seriedad de
                    siempre — y un poco menos de solemnidad.</p>
                <div class="btn-row">
                    <a href="https://wa.me/5493705044257" class="btn btn--primary" target="_blank"
                        rel="noopener">Escribinos por WhatsApp</a>
                    <a href="#servicios" class="btn btn--ghost">Ver servicios</a>
                </div>
            </div>
            <div class="hero__art">
                <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Logo Monkey Motors">
            </div>
        </div>
    </section>

    <div class="trust">
        <div class="container trust__grid">
            <div class="trust__item">
                <span class="num">+10</span>
                <span class="label">Años de experiencia</span>
            </div>
            <div class="trust__item">
                <span class="num">100%</span>
                <span class="label">Diagnóstico computarizado</span>
            </div>
            <div class="trust__item">
                <span class="num">6</span>
                <span class="label">Meses de garantía</span>
            </div>
            <div class="trust__item">
                <span class="num">+2.000</span>
                <span class="label">Autos atendidos</span>
            </div>
        </div>
    </div>

    <section class="services" id="servicios">
        <div class="container">
            <div class="section-head">
                <h2>Qué hacemos</h2>
                <p>Servicio completo para que tu auto salga del taller andando mejor de lo que entró.</p>
            </div>
            <div class="services__grid">
                <div class="card">
                    <div class="card__icon">🔧</div>
                    <h3>Mecánica general</h3>
                    <p>Motor, transmisión y mantenimiento preventivo para que no tengas sorpresas en la ruta.</p>
                </div>
                <div class="card">
                    <div class="card__icon">🛞</div>
                    <h3>Frenos y suspensión</h3>
                    <p>Revisión y cambio de pastillas, discos y amortiguadores con repuestos de calidad.</p>
                </div>
                <div class="card">
                    <div class="card__icon">💻</div>
                    <h3>Diagnóstico computarizado</h3>
                    <p>Escaneo de fallas con equipo digital para encontrar el problema real, sin adivinar.</p>
                </div>
                <div class="card">
                    <div class="card__icon">🛢️</div>
                    <h3>Cambio de aceite y filtros</h3>
                    <p>Service completo con los tiempos y aceites recomendados por el fabricante.</p>
                </div>
                <div class="card">
                    <div class="card__icon">📐</div>
                    <h3>Alineación y balanceo</h3>
                    <p>Para que el volante no tire y los neumáticos duren lo que tienen que durar.</p>
                </div>
                <div class="card">
                    <div class="card__icon">🎨</div>
                    <h3>Chapa y pintura</h3>
                    <p>Reparación de golpes y pintura con acabado de fábrica.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="stripe stripe--thin"></div>

    <section class="about" id="nosotros">
        <div class="container about__grid">
            <div class="about__badge">
                <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Monkey Motors">
                <span class="mono">DESDE 2014</span>
            </div>
            <div>
                <h2>Nuestro mono también sabe de motores</h2>
                <p>Monkey Motors nació de la idea de que un taller de confianza no tiene por qué ser un lugar frío.
                    Nuestro equipo de mecánicos certificados combina experiencia real con equipamiento moderno para
                    diagnosticar y resolver lo que tu auto necesita.</p>
                <p>Trabajamos con transparencia: te mostramos qué encontramos, qué hace falta y cuánto sale, antes de
                    tocar una tuerca.</p>
                <a href="#contacto" class="btn btn--primary">Conocé el taller</a>
            </div>
        </div>
    </section>

    <section class="contact" id="contacto">
        <div class="container contact__grid">
            <div class="contact__card">
                <h2>Vení a visitarnos</h2>
                <div class="contact__row">
                    <span class="mono">DIR.</span>
                    <span>Av. 25 de Mayo 533, Formosa, Argentina</span>
                </div>
                <div class="contact__row">
                    <span class="mono">TEL.</span>
                    <span>+54 9 370 504-4257</span>
                </div>
                <div class="contact__row">
                    <span class="mono">MAIL</span>
                    <span>contacto@monkeymotors.com</span>
                </div>
                <div class="contact__row">
                    <span class="mono">LUN-VIE</span>
                    <span>8:00 - 18:00 hs</span>
                </div>
                <div class="contact__row">
                    <span class="mono">SÁB.</span>
                    <span>8:00 - 13:00 hs</span>
                </div>
                <div class="btn-row" style="margin-top: 28px;">
                    <a href="https://wa.me/5493705044257" class="btn btn--primary" target="_blank" rel="noopener"
                        style="background: var(--yellow); color: var(--brown-dark); box-shadow: 0 4px 0 #c99400;">WhatsApp</a>
                </div>
            </div>
            <div class="map-embed">
                <iframe src="https://www.google.com/maps?q=Formosa,Argentina&output=embed" loading="lazy"
                    title="Ubicación Monkey Motors"></iframe>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div>© {{ date('Y') }} Monkey Motors. Todos los derechos reservados.</div>
            <div class="mono">Hecho con grasa, café y cariño 🐒🔧</div>
        </div>
    </footer>

</body>

</html>