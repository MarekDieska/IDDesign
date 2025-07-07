<form id="service-form" action="{{ route('service-request.store') }}" method="POST" class="max-w-xl mx-auto p-6 space-y-6 text-left bg-white rounded shadow">
    @csrf

    <div>
        <label for="name" class="block font-semibold mb-1">Meno</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500" />
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="address" class="block font-semibold mb-1">Adresa</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500" />
        @error('address')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="email" class="block font-semibold mb-1">E-mail</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500" />
        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="phone" class="block font-semibold mb-1">Telefón</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500" />
        @error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <fieldset>
        <legend class="font-semibold mb-1">Služba</legend>
        @php
            $services = [
                'tepelne_cerpadlo' => 'Tepelné čerpadlo',
                'klimatizacia' => 'Klimatizácia',
                'fotovoltika' => 'Fotovoltika',
                'servis' => 'Servis',
                'nabijacia_stanica' => 'Nabíjacia stanica',
                'ine' => 'Iné',
            ];
        @endphp
        <div class="flex flex-wrap gap-4">
            @foreach ($services as $key => $label)
                <label class="inline-flex items-center space-x-2">
                    <input type="checkbox" name="{{ $key }}" {{ old($key) ? 'checked' : '' }} class="rounded" />
                    <span>{{ $label }}</span>
                </label>
            @endforeach
        </div>
        @if (
            $errors->any() &&
            request()->routeIs('service-request.store') &&
            collect(['tepelne_cerpadlo','klimatizacia','fotovoltika','servis','nabijacia_stanica','ine'])->every(fn($s) => !old($s))
        )
                    <p class="text-red-600 text-sm mt-1">Prosím, vyberte aspoň jednu službu.</p>
        @endif

    </fieldset>

    <div>
        <label for="message" class="block font-semibold mb-1">Informácie</label>
        <textarea name="message" id="message" rows="4"
                  class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">{{ old('message') }}</textarea>
        @error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded">
            Odoslať
        </button>
    </div>

    @if(session('success'))
        <p class="text-green-600 font-semibold mt-4">{{ session('success') }}</p>
    @endif
</form>
