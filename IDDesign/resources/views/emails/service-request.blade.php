<p><strong>Meno:</strong> {{ $request->name }}</p>
<p><strong>Adresa:</strong> {{ $request->address }}</p>
<p><strong>Email:</strong> {{ $request->email }}</p>
<p><strong>Telefón:</strong> {{ $request->phone }}</p>

<p><strong>Služby:</strong></p>
<ul>
    @if($request->tepelne_cerpadlo) <li>Tepelné čerpadlo</li> @endif
    @if($request->klimatizacia) <li>Klimatizácia</li> @endif
    @if($request->fotovoltika) <li>Fotovoltika</li> @endif
    @if($request->servis) <li>Servis</li> @endif
    @if($request->nabijacia_stanica) <li>Nabíjacia stanica</li> @endif
    @if($request->ine) <li>Iné</li> @endif
</ul>

<p><strong>Správa:</strong> {{ $request->message }}</p>
