<section class="bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900 text-white py-8">
    <h2 class="text-4xl font-extrabold mb-8 text-center">Dokončené projekty</h2>

    <div class="overflow-hidden w-full h-52 relative">
        <div class="flex animate-carousel whitespace-nowrap pt-5">
            @for ($j = 0; $j < 3; $j++)
                @for ($i = 1; $i < 13; $i++)
                    <img src="{{ asset('storage/images/img' . $i . '.jpg') }}"
                         alt="obrazok{{ $i }}"
                         class="w-40 h-40 object-cover inline-block mx-2 shrink-0 rounded-lg">
                @endfor
            @endfor
        </div>
    </div>
</section>

<style>
    @keyframes carousel {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(calc(-176px * 13));
        }
    }

    .animate-carousel {
        animation: carousel 50s linear infinite;
    }
</style>
