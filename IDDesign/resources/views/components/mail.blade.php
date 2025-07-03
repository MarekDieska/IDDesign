<section id="for">
    <p class="text-4xl pt-5 font-extrabold">Neváhajte nás kontaktovať!</p>
    <br>
    <section>
        <div class="max-w-3xl mx-auto p-6">

            <form action="{{route('service-request.store')}}" method="POST" class="space-y-6">
                @csrf
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Meno</label>
                    <input type="text" name="name" id="name" required placeholder="Zadajte svoje meno"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Adresa</label>
                    <input type="text" name="address" id="address" required placeholder="Zadajte svoju adresu"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" name="email" id="email" required placeholder="Zadajte svoj e-mail"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefón</label>
                    <input type="tel" name="phone" id="phone" required placeholder="Zadajte svoje telefónne číslo"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Services -->
                <fieldset class="space-y-2">
                    <legend class="text-sm font-semibold text-gray-700">Služba</legend>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="tepelne_cerpadlo">
                            <span>Tepelné čerpadlo</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="klimatizacia">
                            <span>Klimatizácia</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="fotovoltika">
                            <span>Fotovoltika</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="servis">
                            <span>Servis</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="nabijacia_stanica">
                            <span>Nabíjacia stanica</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="nabijacia_stanica">
                            <span>Iné</span>
                        </label>
                    </div>
                </fieldset>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Informácie</label>
                    <textarea name="message" id="message" rows="4" placeholder="Tu môžete zadať stručné informácie o požadovanej službe"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <button type="submit" class="w-52 bg-blue-600 text-white font-semibold py-3 px-6 rounded-3xl hover:bg-blue-700 transition">
                        Odoslať
                    </button>
                </div>
                @if(session('success'))
                    <div class="mt-4 text-green-600 font-semibold">{{ session('success') }}</div>
                @endif
            </form>
        </div>
    </section>
    <br>
</section>
