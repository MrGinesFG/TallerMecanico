<section>

    <header style="margin-bottom:25px;">

        <p style="
            color:#6B4A35;
            margin-top:8px;
            line-height:1.7;">
            Si eliminas tu cuenta, toda la información relacionada con ella se borrará de forma permanente.
            Esta acción no podrá deshacerse.
        </p>
    </header>

    <div style="
        background:#FEF2F2;
        border-left:6px solid #DC2626;
        padding:25px;
        border-radius:12px;">




        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" style="
                background:#DC2626;
                color:white;
                border:none;
                padding:14px 28px;
                border-radius:10px;
                cursor:pointer;
                font-size:16px;
                font-weight:bold;
                transition:.3s;">

            Eliminar cuenta

        </button>

    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">

            @csrf
            @method('DELETE')

            <h2 style="
                color:#B91C1C;
                font-size:28px;
                font-family:Poppins,sans-serif;
                margin-bottom:20px;">

                Confirmar eliminación

            </h2>

            <p style="
                color:#6B4A35;
                line-height:1.7;
                margin-bottom:25px;">

                Esta acción eliminará definitivamente tu cuenta.
                Para confirmar, escribe tu contraseña.

            </p>

            <div style="margin-bottom:25px;">

                <label for="password" style="
                        display:block;
                        margin-bottom:8px;
                        color:#2E6F47;
                        font-weight:600;">

                    Contraseña

                </label>

                <input id="password" name="password" type="password" style="
                        width:100%;
                        padding:14px;
                        border-radius:10px;
                        border:2px solid #DDD;">

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

            </div>

            <div style="
                display:flex;
                justify-content:flex-end;
                gap:15px;">

                <button type="button" x-on:click="$dispatch('close')" style="
                        background:#E5E7EB;
                        color:#374151;
                        border:none;
                        padding:12px 24px;
                        border-radius:10px;
                        cursor:pointer;">

                    Cancelar

                </button>

                <button type="submit" style="
                        background:#DC2626;
                        color:white;
                        border:none;
                        padding:12px 24px;
                        border-radius:10px;
                        cursor:pointer;
                        font-weight:bold;">

                    Eliminar definitivamente

                </button>

            </div>

        </form>

    </x-modal>

</section>