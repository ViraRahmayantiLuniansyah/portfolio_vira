<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['site_title'] ?? 'VIRA R - Portfolio' }}</title>

    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dark-bg: #0a0e27;
            --darker-bg: #060920;
            --pastel-blue: #89b4f8;
            --light-blue: #a8c7fa;
            --accent-blue: #5b8ddb;
            --text-light: #e8eaf6;
            --text-gray: #b0b8c9;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(6, 9, 32, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(137, 180, 248, 0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, var(--pastel-blue), var(--accent-blue), #7b68ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { filter: hue-rotate(0deg); }
            50% { filter: hue-rotate(20deg); }
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(137, 180, 248, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-links a:hover::before {
            left: 100%;
        }

        .nav-links a:hover {
            color: var(--pastel-blue);
            background: rgba(137, 180, 248, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(137, 180, 248, 0.2);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--pastel-blue), var(--accent-blue));
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-links a:hover::after {
            width: 80%;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--pastel-blue);
            transition: all 0.3s;
            border-radius: 2px;
        }

        /* Sections */
        section {
            min-height: 100vh;
            padding: 100px 10%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Home Section */
        #home {
            background: linear-gradient(135deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
            position: relative;
            overflow: hidden;
        }

        #home::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(137, 180, 248, 0.1) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        .home-content {
            display: flex;
            align-items: center;
            gap: 4rem;
            z-index: 1;
        }

        .profile-pic {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 5px solid var(--pastel-blue);
            box-shadow: 0 0 50px rgba(137, 180, 248, 0.4);
            animation: pulse 3s ease-in-out infinite;
            object-fit: cover;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 50px rgba(137, 180, 248, 0.4); }
            50% { box-shadow: 0 0 80px rgba(137, 180, 248, 0.6); }
        }

        .home-text h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: slideInLeft 1s ease;
        }

        /* Enhanced home text styles */
        .home-text .intro {
            font-size: 2.4rem;
            line-height: 1.1;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            white-space: nowrap;
            overflow: visible;
        }

        .typewriter {
            font-weight: 700;
            background: linear-gradient(90deg, var(--pastel-blue), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.6rem;
        }

        .typewriter::after {
            content: '|';
            margin-left: 6px;
            color: var(--pastel-blue);
            animation: blink 0.8s steps(1) infinite;
        }

        @keyframes blink {
            50% { opacity: 0; }
        }

        .home-text .subtitle {
            font-size: 1.2rem;
            color: var(--light-blue);
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(6px);
            animation: fadeUp 0.9s ease 0.8s forwards;
        }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .home-text .bio {
            color: var(--text-gray);
            font-size: 1.05rem;
            margin-bottom: 1.6rem;
            max-width: 55ch;
            opacity: 0;
            transform: translateY(8px);
            animation: fadeUp 0.9s ease 1.1s forwards;
        }

        .home-text .cta { display:flex; gap:0.8rem; align-items:center; }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--accent-blue), var(--pastel-blue));
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: transform 0.25s, box-shadow 0.25s;
            animation: slideInLeft 1s ease 0.6s backwards;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover { transform: translateY(-4px) scale(1.02); box-shadow: 0 12px 30px rgba(91,141,219,0.18); }

        .btn.btn-outline {
            background: transparent;
            border: 1px solid rgba(137,180,248,0.18);
            color: var(--text-light);
        }

        .home-text h2 {
            font-size: 1.5rem;
            color: var(--pastel-blue);
            margin-bottom: 1rem;
            animation: slideInLeft 1s ease 0.2s backwards;
        }

        .home-text p {
            font-size: 1.1rem;
            color: var(--text-gray);
            margin-bottom: 2rem;
            animation: slideInLeft 1s ease 0.4s backwards;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--accent-blue), var(--pastel-blue));
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: slideInLeft 1s ease 0.6s backwards;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(137, 180, 248, 0.4);
        }

        /* Other Sections */
        .section-content {
            max-width: 1200px;
            width: 100%;
        }

        h2.section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--pastel-blue);
            position: relative;
        }

        h2.section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--pastel-blue), transparent);
        }

        /* About Section */
        #about {
            background: var(--darker-bg);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        /* Enhanced About styles */
        .about-left {
            background: linear-gradient(180deg, rgba(91,141,219,0.04), transparent);
            padding: 1.6rem;
            border-radius: 12px;
            border: 1px solid rgba(137,180,248,0.07);
            box-shadow: 0 8px 30px rgba(6,9,32,0.5);
            backdrop-filter: blur(4px);
        }

        .about-left .about-lead {
            color: var(--text-light);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .stats {
            display: flex;
            gap: 1rem;
            margin-top: 0.8rem;
            flex-wrap: wrap;
        }

        .stat {
            background: rgba(137,180,248,0.04);
            border: 1px solid rgba(137,180,248,0.08);
            padding: 0.8rem 1rem;
            border-radius: 10px;
            min-width: 120px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.4rem;
            color: var(--pastel-blue);
            font-weight: 700;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-gray);
        }

        .about-right {
            padding: 1.2rem;
            border-radius: 12px;
        }

        .details {
            list-style: none;
            padding: 0;
            margin: 0 0 1rem 0;
            display: grid;
            gap: 0.6rem;
        }

        .details li {
            display: flex;
            gap: 0.8rem;
            align-items: center;
            color: var(--text-light);
            font-size: 0.98rem;
        }

        .details iconify-icon { color: var(--pastel-blue); }


        .about-text p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-gray);
            margin-bottom: 1rem;
        }

        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: rgba(137, 180, 248, 0.05);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(137, 180, 248, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .skill-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(137, 180, 248, 0.2);
        }

        .skill-card iconify-icon {
            font-size: 40px;
        }

        .skill-card h3 {
            color: var(--pastel-blue);
            margin-bottom: 0.3rem;
        }

        .skill-card p {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        /* CERTIFICATE STYLE - RESPONSIVE & RAPI */
        #certificates {
            background: var(--darker-bg);
        }

        .cert-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-auto-rows: 1fr;
            gap: 2rem;
            justify-items: center;
            align-items: stretch;
            justify-content: center;
            width: 100%;
        }

        .cert-card {
            width: 100%;
            max-width: 20rem;
            height: 380px;
            background: rgba(137, 180, 248, 0.05);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(137, 180, 248, 0.2);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            margin: 0 auto;
        }

        /* Make the whole card clickable when wrapped in an anchor */
        .cert-card a,
        .cert-card a * {
            color: inherit;
            text-decoration: none;
        }

        .cert-card {
            cursor: pointer;
        }

        
        .cert-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(137, 180, 248, 0.3);
        }

        .cert-img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--pastel-blue);
            margin-bottom: 1rem;
        }

        .cert-info {
            width: 100%;
        }

        .cert-info h3 {
            margin: 0 0 0.5rem 0;
            color: var(--pastel-blue);
            font-size: 1.1rem;
        }

        .cert-info p {
            margin: 0.3rem 0;
            font-size: 0.9rem;
            color: var(--text-gray);
            line-height: 1.5;
        }

        .cert-info p:first-of-type {
            color: var(--light-blue);
            font-weight: 600;
        }

        .cert-info small {
            color: var(--text-gray);
            opacity: 0.8;
        }

        /* Project Section */
        #project {
            background: var(--darker-bg);
        }
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-auto-rows: 1fr;
            gap: 2rem;
            justify-items: center;
            align-items: stretch;
            justify-content: center;
            width: 100%;
        }

        .project-card {
            width: 100%;
            max-width: 20rem;
            height: 380px;
            background: rgba(137, 180, 248, 0.05);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(137, 180, 248, 0.2);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            margin: 0 auto;
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(137, 180, 248, 0.3);
        }

        /* Make project cards clickable when wrapped in an anchor */
        .project-link {
            display: block;
            color: inherit;
            text-decoration: none;
            width: 100%;
        }

        .cert-link {
            display: block;
            width: 100%;
        }

        .project-link .project-card,
        .cert-link .cert-card {
            cursor: pointer;
        }

        .project-img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--pastel-blue);
            margin-bottom: 1rem;
        }

        .project-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .project-info {
            width: 100%;
        }

        .project-info h3 {
            margin: 0 0 0.5rem 0;
            color: var(--pastel-blue);
            font-size: 1.1rem;
        }

        .project-info p {
            margin: 0.3rem 0;
            font-size: 0.9rem;
            color: var(--text-gray);
            line-height: 1.5;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
            justify-content: center;
        }

        .tech-tag {
            background: rgba(137, 180, 248, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.85rem;
        }

        /* Contact Section */
        #contact {
            background: var(--darker-bg);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            background: rgba(137, 180, 248, 0.05);
            border: 1px solid rgba(137, 180, 248, 0.2);
            border-radius: 8px;
            color: var(--text-light);
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Alert */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .alert.show {
            display: block;
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid #4caf50;
            color: #4caf50;
        }

        .alert-error {
            background: rgba(244, 67, 54, 0.2);
            border: 1px solid #f44336;
            color: #f44336;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                padding: 1rem 5%;
            }

            .logo {
                font-size: 1.5rem;
            }

            .nav-links {
                position: fixed;
                right: -100%;
                top: 70px;
                flex-direction: column;
                background: rgba(6, 9, 32, 0.98);
                backdrop-filter: blur(10px);
                width: 100%;
                padding: 2rem;
                transition: right 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                gap: 1rem;
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links a {
                padding: 1rem 1.5rem;
                margin: 0.5rem 0;
                border-radius: 12px;
                font-size: 1.1rem;
                text-align: center;
                backdrop-filter: blur(5px);
            }

            .nav-links a:hover {
                background: rgba(137, 180, 248, 0.1);
                transform: translateY(0);
                box-shadow: 0 4px 15px rgba(137, 180, 248, 0.15);
            }

            .hamburger {
                display: flex;
            }

            /* Home Section Mobile */
            .home-content {
                flex-direction: column;
                text-align: center;
                gap: 2rem;
            }

            .profile-pic {
                width: 200px;
                height: 200px;
            }

            .home-text h1 {
                font-size: 2rem;
            }

            .home-text .intro {
                font-size: 1.8rem;
            }

            .home-text .profession {
                font-size: 1.2rem;
            }

            .home-text p {
                font-size: 1rem;
            }

            .btn {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }

            /* About Section Mobile */
            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-text h2 {
                font-size: 2rem;
            }

            .about-text p {
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .stat-item {
                text-align: center;
                padding: 1rem;
            }

            .stat-value {
                font-size: 2rem;
            }

            .stat-label {
                font-size: 0.9rem;
            }

            /* Skills Section Mobile */
            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .skill-card {
                padding: 1.5rem;
                text-align: center;
            }

            .skill-card iconify-icon {
                font-size: 35px;
            }

            .skill-card h3 {
                font-size: 1rem;
            }

            .skill-card p {
                font-size: 0.85rem;
            }

            section {
                padding: 80px 5%;
                min-height: auto;
            }

            /* Responsive Certificates */
            .cert-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                align-items: stretch;
            }

            .cert-card {
                max-width: none;
                height: 320px;
                padding: 1.5rem;
                justify-content: space-between;
            }

            .cert-img {
                max-width: 200px;
                height: 150px;
            }

            .cert-info h3 {
                font-size: 1rem;
            }

            .cert-info p {
                font-size: 0.9rem;
            }

            /* Responsive Projects */
            .project-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                align-items: stretch;
            }

            .project-card {
                max-width: none;
                height: 320px;
                padding: 1.5rem;
                justify-content: space-between;
            }

            .project-img {
                max-width: 200px;
                height: 150px;
            }

            .project-info h3 {
                font-size: 1rem;
            }

            .project-info p {
                font-size: 0.9rem;
            }

            /* Contact Form Mobile */
            .contact-form {
                max-width: 100%;
                padding: 0 1rem;
            }

            .form-group input,
            .form-group textarea {
                padding: 14px;
                font-size: 1rem;
            }

            .btn {
                width: 100%;
                padding: 1rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 1rem 3%;
            }

            .logo {
                font-size: 1.3rem;
            }

            .hamburger span {
                width: 22px;
                height: 2.5px;
            }

            /* Home Section Extra Small */
            .profile-pic {
                width: 180px;
                height: 180px;
            }

            .home-text h1 {
                font-size: 1.8rem;
            }

            .home-text .intro {
                font-size: 1.5rem;
            }

            .home-text .profession {
                font-size: 1.1rem;
            }

            .home-text p {
                font-size: 0.95rem;
            }

            .btn {
                padding: 0.7rem 1.5rem;
                font-size: 0.95rem;
            }

            /* About Section Extra Small */
            .about-text h2 {
                font-size: 1.8rem;
            }

            .about-text p {
                font-size: 0.95rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .stat-value {
                font-size: 1.8rem;
            }

            .stat-label {
                font-size: 0.85rem;
            }

            /* Skills Section Extra Small */
            .skills-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .skill-card {
                padding: 1.2rem;
            }

            .skill-card iconify-icon {
                font-size: 30px;
            }

            .skill-card h3 {
                font-size: 0.95rem;
            }

            .skill-card p {
                font-size: 0.8rem;
            }

            section {
                padding: 60px 3%;
            }

            .section-title {
                font-size: 2rem;
            }

            /* Certificates Extra Small */
            .cert-card {
                padding: 1.2rem;
                height: 280px;
                justify-content: space-between;
            }

            .cert-img {
                max-width: 150px;
                height: 120px;
            }

            .cert-info h3 {
                font-size: 0.95rem;
            }

            .cert-info p {
                font-size: 0.85rem;
            }

            /* Projects Extra Small */
            .project-card {
                padding: 1.2rem;
                height: 280px;
                justify-content: space-between;
            }

            .project-img {
                max-width: 150px;
                height: 120px;
            }

            .project-info h3 {
                font-size: 0.95rem;
            }

            .project-info p {
                font-size: 0.85rem;
            }

            .tech-tag {
                font-size: 0.75rem;
                padding: 0.2rem 0.6rem;
            }

            /* Contact Form Extra Small */
            .contact-form {
                padding: 0 0.5rem;
            }

            .form-group input,
            .form-group textarea {
                padding: 12px;
                font-size: 0.95rem;
            }

            .btn {
                padding: 0.9rem;
                font-size: 1rem;
            }

            /* Footer Extra Small */
            footer {
                padding: 1.5rem 3%;
            }

            .footer-text {
                font-size: 0.8rem;
            }

            .social-links {
                gap: 0.8rem;
            }

            .social-link iconify-icon {
                width: 20px;
                height: 20px;
            }
        }

        /* Footer */
        footer {
            background: var(--darker-bg);
            padding: 2rem 5%;
            border-top: 1px solid rgba(137, 180, 248, 0.1);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-text {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
        }

        .social-link {
            color: var(--text-light);
            transition: color 0.3s, transform 0.3s;
            display: inline-block;
        }

        .social-link:hover {
            color: var(--pastel-blue);
            transform: translateY(-3px);
        }

        .social-link iconify-icon {
            width: 24px;
            height: 24px;
        }

        /* Large Screen Enhancements */
        @media (min-width: 1200px) {
            .home-content {
                gap: 6rem;
            }

            .profile-pic {
                width: 350px;
                height: 350px;
            }

            .home-text h1 {
                font-size: 3.5rem;
            }

            .home-text .intro {
                font-size: 2.8rem;
            }

            .skills-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .cert-grid,
            .project-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1600px) {
            .home-text h1 {
                font-size: 4rem;
            }

            .home-text .intro {
                font-size: 3.2rem;
            }

            .cert-grid,
            .project-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">{{ $settings['profile_name'] ?? 'Vira Rahmayanti' }}</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#certificates">Certificates</a></li>
            <li><a href="#project">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home">
        <div class="home-content">
            <img src="{{ asset('images/vira profile.jpeg') }}" alt="Profile" class="profile-pic">
            <div class="home-text">
                <h1 class="intro">
                    <span class="greeting">Hi, I'm</span>
                    <span id="typewriter-name" class="typewriter" aria-hidden="true"></span>
                </h1>
                <h2 class="subtitle">{{ $settings['profile_title'] ?? 'Web Developer & Data Analyst' }}</h2>
                <p class="bio">{{ $settings['profile_bio'] ?? 'Passionate about creating beautiful and functional websites while analyzing data to generate valuable insights. Specialized in Laravel development and data analysis.' }}</p>
                <div class="cta">
                    <a href="#contact" class="btn">Get In Touch</a>
                    <a href="#certificates" class="btn btn-outline">See Certificates</a>
                </div>
            </div>
        </div>
    </section>

  <!-- About Section -->
    <section id="about">
        <div class="section-content">
            <h2 class="section-title">About Me</h2>
            <div class="about-content">
                <div class="about-left">
                    <p class="about-lead">{{ $settings['about_text'] ?? 'Hello! I\'m Vira Rahmayanti Luniansyah, a passionate web developer and data analyst. I build responsive and accessible web apps, and turn data into actionable insights. I enjoy clean design, efficient code, and continuous learning.' }}</p>

                    <div class="stats">
                        <div class="stat">
                            <div class="stat-value" data-target="{{ intval($settings['experience_years'] ?? 2) }}">0</div>
                            <div class="stat-label">Years Experience</div>
                        </div>

                        <div class="stat">
                            <div class="stat-value" data-target="{{ $projects->count() ?? 12 }}">0</div>
                            <div class="stat-label">Projects</div>
                        </div>

                        <div class="stat">
                            <div class="stat-value" data-target="{{ intval($settings['clients_count'] ?? 8) }}">0</div>
                            <div class="stat-label">Clients</div>
                        </div>
                    </div>
                </div>

                <div class="about-right">
                    <ul class="details">
                        <li><iconify-icon icon="mdi:map-marker" width="20" height="20"></iconify-icon> <strong>Location:</strong>&nbsp;{{ $settings['location'] ?? 'Bogor, Indonesia' }}</li>
                        <li><iconify-icon icon="mdi:school" width="20" height="20"></iconify-icon> <strong>Education:</strong>&nbsp;{{ $settings['education'] ?? 'Software & Game Development' }}</li>
                        <li><iconify-icon icon="mdi:briefcase" width="20" height="20"></iconify-icon> <strong>Experience:</strong>&nbsp;{{ $settings['experience'] ?? '2+ Years' }}</li>
                        <li><iconify-icon icon="mdi:contact-mail" width="20" height="20"></iconify-icon> <strong>Freelance:</strong>&nbsp;{{ $settings['freelance'] ?? 'Open for Projects' }}</li>
                    </ul>

                    <a href="#contact" class="btn">Hire Me</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills">
        <div class="section-content">
            <h2 class="section-title">My Skills</h2>
            <div class="skills-grid">

                <div class="skill-card">
                    <iconify-icon icon="vscode-icons:file-type-html"></iconify-icon>
                    <div>
                        <h3>HTML</h3>
                        <p>100%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="vscode-icons:file-type-css"></iconify-icon>
                    <div>
                        <h3>CSS</h3>
                        <p>95%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="logos:tailwindcss-icon"></iconify-icon>
                    <div>
                        <h3>Tailwind</h3>
                        <p>90%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="logos:javascript"></iconify-icon>
                    <div>
                        <h3>JavaScript</h3>
                        <p>85%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="logos:php"></iconify-icon>
                    <div>
                        <h3>PHP</h3>
                        <p>90%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="logos:laravel"></iconify-icon>
                    <div>
                        <h3>Laravel</h3>
                        <p>90%</p>
                    </div>
                </div>

                <div class="skill-card">
                    <iconify-icon icon="logos:mysql"></iconify-icon>
                    <div>
                        <h3>MySQL</h3>
                        <p>85%</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section id="certificates">
        <div class="section-content">
            <h2 class="section-title">Certificates</h2>
            <div class="cert-grid">

                @foreach($certificates->take(9) as $cert)
                @php
                    // Prefer absolute certificate_url (e.g., Google Drive link). If not present, no link is added.
                    $link = $cert->certificate_url ?? null;
                @endphp
                @if($link)
                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="cert-link">
                    <div class="cert-card">
                        <img src="{{ asset('images/certificates/' . $cert->image_url) }}" alt="{{ $cert->title }}" class="cert-img">
                        <div class="cert-info">
                            <h3>{{ $cert->title }}</h3>
                            <p>{{ $cert->issuer }}</p>
                            <p><small>{{ $cert->formatted_issue_date }}</small></p>
                            <p>{{ $cert->description }}</p>
                        </div>
                    </div>
                </a>
                @else
                <div class="cert-card">
                    <img src="{{ asset('images/certificates/' . $cert->image_url) }}" alt="{{ $cert->title }}" class="cert-img">
                    <div class="cert-info">
                        <h3>{{ $cert->title }}</h3>
                        <p>{{ $cert->issuer }}</p>
                        <p><small>{{ $cert->formatted_issue_date }}</small></p>
                        <p>{{ $cert->description }}</p>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="project">
        <div class="section-content">
            <h2 class="section-title">My Projects</h2>
            <div class="project-grid">

                @foreach($projects->take(5) as $project)
                @php $plink = $project->project_url ?? null; @endphp
                @if($plink)
                <a href="{{ $plink }}" target="_blank" rel="noopener noreferrer" class="project-link">
                    <div class="project-card">
                        @if($project->image_url)
                        <img src="{{ asset('images/projects/' . $project->image_url) }}" alt="{{ $project->title }}" class="project-img">
                        @else
                        <div class="project-img">💼</div>
                        @endif

                        <div class="project-info">
                            <h3>{{ $project->title }}</h3>
                            <p>{{ $project->description }}</p>

                            @if($project->technologies)
                            <div class="project-tech">
                                @foreach($project->technologies_array as $tech)
                                <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @endif

                        </div>
                    </div>
                </a>
                @else
                <div class="project-card">
                    @if($project->image_url)
                    <img src="{{ asset('images/projects/' . $project->image_url) }}" alt="{{ $project->title }}" class="project-img">
                    @else
                    <div class="project-img">💼</div>
                    @endif

                    <div class="project-info">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>

                        @if($project->technologies)
                        <div class="project-tech">
                            @foreach($project->technologies_array as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif

                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="section-content">
            <h2 class="section-title">Get In Touch</h2>
            
            <div class="alert alert-success" id="successAlert"></div>
            <div class="alert alert-error" id="errorAlert"></div>
            
            <form class="contact-form" id="contactForm">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-text">
                <p>&copy; {{ $settings['profile_name'] ?? 'Vira Rahmayanti Luniansyah' }}.</p>
            </div>
            <div class="social-links">
                <a href="https://wa.me/6281293699595" target="_blank" rel="noopener noreferrer" class="social-link">
                    <iconify-icon icon="mdi:whatsapp" width="24" height="24"></iconify-icon>
                </a>
                <a href="https://www.instagram.com/virarahmayantii_?igsh=MXIwemY2eWpwb3pxbw==" target="_blank" rel="noopener noreferrer" class="social-link">
                    <iconify-icon icon="mdi:instagram" width="24" height="24"></iconify-icon>
                </a>
                <a href="https://tiktok.com/@virarahmayantiii_" target="_blank" rel="noopener noreferrer" class="social-link">
                    <iconify-icon icon="ic:baseline-tiktok" width="24" height="24"></iconify-icon>
                </a>
                <a href="https://www.linkedin.com/in/vira-rahmayanti-6216a8363" target="_blank" rel="noopener noreferrer" class="social-link">
                    <iconify-icon icon="mdi:linkedin" width="24" height="24"></iconify-icon>
                </a>
                <a href="https://github.com/ViraRahmayantiLuniansyah" target="_blank" rel="noopener noreferrer" class="social-link">
                    <iconify-icon icon="mdi:github" width="24" height="24"></iconify-icon>
                </a>
            </div>
        </div>
    </footer>

    <script>
        // Hamburger Menu
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Close menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Typewriter effect for name
        (function(){
            const name = @json($settings['profile_name'] ?? 'Vira Rahmayanti Luniansyah');
            const el = document.getElementById('typewriter-name');
            if (!el) return;
            let i = 0;
            el.textContent = '';
            function typeNext() {
                if (i < name.length) {
                    el.textContent += name.charAt(i);
                    i++;
                    const delay = (name.charAt(i-1) === ' ') ? 80 : 80; // adjust if needed
                    setTimeout(typeNext, delay);
                } else {
                    // remove caret after a short pause (optional)
                    setTimeout(()=>{ el.classList.remove('typewriter'); }, 800);
                }
            }
            // small delay before starting to feel natural
            setTimeout(typeNext, 400);
        })();

        // About counters animation (starts when #about enters viewport)
        (function(){
            const aboutSection = document.getElementById('about');
            if (!aboutSection) return;

            const counters = aboutSection.querySelectorAll('.stat-value');
            let started = false;

            function animateCounter(el) {
                const target = parseInt(el.getAttribute('data-target')) || 0;
                const duration = 1000; // ms
                const start = 0;
                const startTime = performance.now();

                function step(now) {
                    const progress = Math.min((now - startTime) / duration, 1);
                    el.textContent = Math.floor(progress * (target - start) + start);
                    if (progress < 1) requestAnimationFrame(step);
                    else el.textContent = target;
                }

                requestAnimationFrame(step);
            }

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !started) {
                        started = true;
                        counters.forEach(c => animateCounter(c));
                        observer.disconnect();
                    }
                });
            }, { threshold: 0.2 });

            observer.observe(aboutSection);
        })();

        // Form submission with AJAX
        document.getElementById('contactForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            const submitButton = e.target.querySelector('button[type="submit"]');
            
            // Hide alerts
            successAlert.classList.remove('show');
            errorAlert.classList.remove('show');
            
            // Disable button and show loading
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';

            try {
                const response = await fetch('{{ route("contact.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                
                if (result.success) {
                    successAlert.textContent = result.message;
                    successAlert.classList.add('show');
                    e.target.reset();
                } else {
                    // Handle validation errors
                    if (result.errors) {
                        const errorMessages = Object.values(result.errors).flat().join(', ');
                        errorAlert.textContent = errorMessages;
                    } else {
                        errorAlert.textContent = result.message || 'Terjadi kesalahan. Silakan coba lagi.';
                    }
                    errorAlert.classList.add('show');
                }
            } catch (error) {
                console.error('Error:', error);
                errorAlert.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                errorAlert.classList.add('show');
            } finally {
                // Re-enable button
                submitButton.disabled = false;
                submitButton.textContent = 'Send Message';
            }
        });
    </script>
</body>
</html>