<x-layout>
    <main class="py-10">
        <h1>
            Registre-se
        </h1>

        <section class="mt-4">
            <form action="/signup" method="POST">
                <input type="name" name="name" placeholder="Digite seu nome" class="bg-white p-2 border-2"> 
                <input type="email" name="email" placeholder="Digite seu email" class="bg-white p-2 border-2"> 
                <input type="password" name="password" placeholder="Digite sua senha" class="bg-white p-2 border-2">
                <input type="password" name="password_confirmation" placeholder="Confirme sua senha" class="bg-white p-2 border-2">
                <button type="submit" class="bg-white border-2 p-2">Confirmar</button>
            </form>

            @if (session('error'))
                <h3 class="color: red">{{ session('error') }}</h3>
            @endif
        </section>
    </main> 
</x-layout>
