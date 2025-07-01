<section class="relative">
    <img
        alt="fotka firmy"
        src="{{ asset('storage/images/firma_main.webp')}}"
        srcset="
        {{ asset('storage/images/firma_main-600.webp') }} 600w,
        {{ asset('storage/images/firma_main-1200.webp') }} 1200w,
        {{ asset('storage/images/firma_main.webp') }} 1920w"
        sizes="(max-width: 600px) 100vw, (max-width: 1280px) 100vw, 100vw"
        class="object-cover h-[550px] w-full brightness-[0.4] grayscale-[0.5]"
    >

    <div class="absolute inset-0 flex flex-col justify-center items-center md:items-start md:max-w-[50%] md:p-10 p-4 text-center md:text-left">
        <h1 class="text-gray-50 font-extrabold text-3xl px-4">
            Kompletné riešenia v oblasti alternatívnych zdrojov energie
        </h1>
        <button class="bg-blue-800 text-white rounded-3xl w-32 h-12 mt-20 text-xl font-bold mx-auto md:mx-0">
            Služby
        </button>
    </div>
</section>
