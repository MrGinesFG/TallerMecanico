<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;align-items:center;gap:15px;">

            <div>
                <h2 style="
                    margin:0;
                    font-family:font-semibold,sans-serif;
                    color:#1F4D32;
                    font-size:20px;
                    font-weight:500;">
                    Mi Perfil</br>
                </h2>
            </div>
        </div>
    </x-slot>

    <style>
        body {
            background: #FBF8F2;
        }

        .profile-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 40px 20px;
        }

        .profile-banner {

            background: linear-gradient(135deg, #2E6F47, #1F4D32);

            color: white;

            border-radius: 20px;

            padding: 40px;

            margin-bottom: 35px;

            display: flex;

            align-items: center;

            gap: 25px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);

        }

        .profile-avatar {

            width: 100px;

            height: 100px;

            border-radius: 50%;

            background: white;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 50px;

        }

        .profile-banner h1 {

            margin: 0;

            font-size: 34px;

            font-family: Poppins, sans-serif;

        }

        .profile-banner p {

            margin-top: 8px;

            font-size: 16px;

            opacity: .9;

        }

        .card-profile {

            background: white;

            border-radius: 18px;

            padding: 35px;

            margin-bottom: 30px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);

            border-left: 8px solid #2E6F47;

        }

        .card-profile h3 {

            margin-bottom: 20px;

            color: #1F4D32;

            font-family: Poppins, sans-serif;

            font-size: 24px;

        }
    </style>

    <div class="profile-wrapper">

        <div class="profile-banner">

            <div class="profile-avatar">
                👤
            </div>

            <div>

                <h1>
                    {{ Auth::user()->name }}
                </h1>

                <p>
                    {{ Auth::user()->email }}
                </p>

                <p>
                    Bienvenido nuevamente a Monkey Motors.
                </p>

            </div>

        </div>

        <div class="card-profile">

            <h3>
                Información personal
            </h3>

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card-profile">

            <h3>
                Cambiar contraseña
            </h3>

            @include('profile.partials.update-password-form')

        </div>

        <div class="card-profile">

            <h3 style="color:#b91c1c;">
                Zona peligrosa
            </h3>

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</x-app-layout>