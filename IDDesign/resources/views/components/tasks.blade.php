<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tabulka kde su zaznamenane poziadane sluzby a ich stav">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Požiadané služby</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 p-6 text-gray-100">

<h1 class="text-2xl font-bold mb-4">Požiadané služby</h1>

<form method="GET" class="mb-6 bg-gray-800 p-4 rounded shadow flex flex-wrap gap-4">
    @php
        $fields = [
            'tepelne_cerpadlo' => 'TČ',
            'klimatizacia' => 'K',
            'fotovoltika' => 'F',
            'nabijacia_stanica' => 'N',
            'servis' => 'Servis',
            'ine' => 'Iné',
        ];
    @endphp

    @foreach ($fields as $field => $label)
        <div class="flex items-center space-x-2">
            <input
                type="checkbox"
                name="{{ $field }}"
                value="1"
                id="{{ $field }}"
                {{ request($field) ? 'checked' : '' }}
                class="h-4 w-4 text-blue-500 bg-gray-700 border-gray-600 focus:ring-blue-400"
            >
            <label for="{{ $field }}" class="text-sm text-gray-300">{{ $label }}</label>
        </div>
    @endforeach

    <button type="submit" class="bg-orange-700 text-white hover:bg-orange-600 border-2 border-orange-700 px-2 flex items-center justify-center">
        Filtrovať
    </button>
    <button type="button"
            onclick="window.location.href='{{ route('service-requests.tasks') }}'"
            class="bg-gray-700 text-white hover:bg-gray-600 border-2 border-gray-700 px-2 flex items-center justify-center">
        Reset
    </button>
</form>
<form method="POST" action="{{ route('logout') }}" class="mb-4">
    @csrf
    <button type="submit"
            class="bg-red-700 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded">
        Odhlásiť
    </button>
</form>

@if ($requests->count())
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 shadow rounded-lg overflow-hidden ml-0">
            <thead class="bg-gray-700 text-gray-300 text-left text-sm uppercase">
            <tr>
                <th class="px-2 py-2">Meno</th>
                <th class="pe-2 py-2">Email</th>
                <th class="pe-2 py-2">Mobil</th>
                <th class="pe-2 py-2">Adresa</th>
                @foreach ($fields as $field => $label)
                    <th class="pe-2 py-2">{{ $label }}</th>
                @endforeach
                <th class="pe-2 py-2">Poznámka</th>
            </tr>
            </thead>
            <tbody class="text-sm">
            @foreach ($requests as $request)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="px-2 py-2">{{ $request->name }}</td>
                    <td class="pe-2 py-2">{{ $request->email }}</td>
                    <td class="pe-2 py-2">{{ $request->phone }}</td>
                    <td class="pe-2 py-2">{{ $request->address }}</td>
                    @foreach ($fields as $field => $label)
                        <td class="pe-2 py-2">
                            {{ $request->$field ? '✓' : '—' }}
                        </td>
                    @endforeach
                    <td class="pe-2 py-2" id="message-cell-{{ $request->id }}">
                    <span onclick="startEdit({{ $request->id }})" id="message-text-{{ $request->id }}" class="cursor-pointer">
                        {{ $request->message ?? '—' }}
                    </span>

                        <input type="text"
                               id="message-input-{{ $request->id }}"
                               class="hidden border border-gray-600 bg-gray-700 px-1 py-0.5 text-sm w-full text-gray-200"
                               value="{{ $request->message }}"
                               onblur="submitEdit({{ $request->id }})"
                               onkeydown="if(event.key === 'Enter') this.blur()"
                        >
                        <div class="flex space-x-1 mt-1 text-xs">
                            <button onclick="startEdit({{ $request->id }})" class="bg-blue-800 text-white p-2 hover:underline">Upraviť</button>
                            <button onclick="confirmComplete({{ $request->id }})" class="bg-green-700 text-white p-2 hover:underline">Dokončiť</button>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Tabuľka je prázdna</p>
@endif

</body>
</html>

