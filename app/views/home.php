<?php
// Break out of the container opened in header.php
?>
</div>

<style>
    /* Custom Utilities */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Animations */
    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-enter {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 100ms;
    }

    .delay-200 {
        animation-delay: 200ms;
    }

    .delay-300 {
        animation-delay: 300ms;
    }
</style>

<!-- Hero Section -->
<div class="relative overflow-hidden">
    <div class="w-full mx-auto">
        <div class="relative z-10 pb-8 bg-gradient-to-r from-cyan-100 via-white to-orange-100 sm:pb-16 md:pb-20 lg:w-full lg:pb-28 xl:pb-32 h-[700px] flex items-center">

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 w-full animate-enter">
                <div class="sm:text-center lg:text-left">
                    <span class="inline-block py-1 px-3 rounded-full text-gray-600 text-xs font-bold tracking-wider uppercase mb-4">Rebajas de invierno</span>
                    <h1 class="text-5xl tracking-tight font-extrabold text-gray-900 sm:text-6xl md:text-7xl">
                        <span class="block xl:inline">DESCUENTOS DE</span>
                        <span class="block text-gray-900 xl:inline bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">HASTA EL 51 %</span>
                    </h1>
                    <p class="mt-4 text-lg text-gray-500 sm:mt-5 sm:text-xl sm:max-w-xl sm:mx-auto md:mt-5 md:text-2xl lg:mx-0 font-light">
                        Obtén ofertas y regalos exclusivos en la tienda. Tecnología del futuro, hoy en tus manos.
                    </p>
                    <div class="mt-8 sm:mt-10 sm:flex sm:justify-center lg:justify-start gap-4">
                        <div class="rounded-full shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-gray-900 hover:bg-black md:text-lg md:px-12 transition-all duration-300 transform hover:-translate-y-1">
                                Comprar ahora
                            </a>
                        </div>
                        <!-- Optional Secondary Button -->
                        <div class="mt-3 sm:mt-0">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-4 border border-gray-200 text-base font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 md:text-lg md:px-10 transition-colors">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</div>

<!-- Categories Strip -->
<div class="bg-white py-12 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center overflow-x-auto gap-8 pb-4 scrollbar-hide animate-enter delay-100">
            <?php
            $categories = [
                ['name' => 'Mini', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
                ['name' => 'Mini 2', 'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
                ['name' => 'Mini SE', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                ['name' => 'Mavic 3', 'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                ['name' => 'Air 2S', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                ['name' => 'FPV', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
                ['name' => 'Inspire', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
            ];
            foreach ($categories as $cat): ?>
                <div class="flex flex-col items-center min-w-[80px] group cursor-pointer">
                    <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gray-50 text-gray-400 group-hover:text-gray-900 group-hover:bg-white group-hover:shadow-lg group-hover:ring-1 group-hover:ring-gray-200 transition-all duration-300 transform group-hover:-translate-y-1">
                        <svg class="h-8 w-8 transition-transform duration-300 group-hover:rotate-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="<?= $cat['icon'] ?>" />
                        </svg>
                    </div>
                    <span class="mt-3 text-sm font-medium text-gray-500 group-hover:text-gray-900 transition-colors"><?= $cat['name'] ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16 space-y-20">

    <?php
    // Data Preparation: Duplicate posts to simulate a full carousel if needed
    $carousel_posts = $posts;
    while (count($carousel_posts) < 8) {
        $carousel_posts = array_merge($carousel_posts, $posts);
    }
    // Limit to reasonable number
    $carousel_posts = array_slice($carousel_posts, 0, 8);
    ?>

    <!-- Novedades Carousel -->
    <div class="animate-enter delay-200">
        <div class="flex justify-between items-end mb-8 px-2">
            <div>
                <span class="text-blue-600 font-bold tracking-wide uppercase text-sm">Lo último</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-1">Novedades</h2>
            </div>
            <!-- Navigation hints -->
            <div class="hidden md:flex space-x-2">
                <div class="w-8 h-1 bg-gray-200 rounded-full"></div>
                <div class="w-2 h-1 bg-gray-900 rounded-full"></div>
                <div class="w-2 h-1 bg-gray-200 rounded-full"></div>
            </div>
        </div>

        <!-- Scrolling Wrapper -->
        <div class="flex overflow-x-auto gap-6 pb-12 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
            <?php foreach ($carousel_posts as $post): ?>
                <!-- Card Item -->
                <div class="snap-center shrink-0 w-[85vw] md:w-[350px] px-3">
                    <div class="group relative aspect-[4/5] mb-6 overflow-hidden rounded-3xl p-6 hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full flex flex-col" style="background-image: url('<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'placeholder.jpg' ?>'); background-size: cover; background-position: center;">
                        <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>" class="absolute inset-0 z-30">
                            <span class="sr-only">Ver detalles de <?= htmlspecialchars($post['title']) ?></span>
                        </a>

                        <div class="flex-grow flex flex-col px-2">
                            <!-- Category -->
                            <span class="flex-1 text-gray-400 font-bold text-xs uppercase tracking-wider mb-2">DRONES</span>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-slate-100 leading-tight mb-4"><?= htmlspecialchars($post['title']) ?></h3>

                            <!-- Separator -->
                            <div class="w-full h-px bg-slate-100 mb-4"></div>

                            <!-- Price & Action -->
                            <div class="mt-auto flex items-end justify-between">
                                <div>
                                    <p class="text-slate-500 text-[12px] uppercase tracking-wide mb-1">DESDE</p>
                                    <p class="text-3xl font-bold text-slate-100 leading-none"><?= number_format($post['price'], 0) ?> €</p>
                                </div>

                                <!-- Button (Unique interaction) -->
                                <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>" class="px-6 py-2 rounded-full font-bold text-white bg-slate-300/30 border border-white/30 hover:bg-slate-100/40 transition-colors relative z-40">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Banner Split Section -->
    <div class="relative rounded-[2.5rem] overflow-hidden bg-black h-[500px] md:h-[600px] group animate-enter delay-300">
        <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-60 group-hover:opacity-40 transition-opacity duration-700 group-hover:scale-105 transform">
            <source src="/public/img/drone_view.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
            <span class="inline-block py-1 px-4 rounded-full bg-white/10 backdrop-blur-md text-white border border-white/20 text-sm font-bold tracking-widest uppercase mb-6">
                Tecnología Autónoma
            </span>
            <h2 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight">Recuva Neo</h2>
            <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                El dron con IA más avanzado del mercado. Captura cada momento con precisión milimétrica y síguete a donde vayas sin control remoto.
            </p>
            <div class="flex flex-col md:flex-row gap-4">
                <button class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-gray-200 transition-all duration-300 transform hover:-translate-y-1 shadow-xl">
                    Comprar ahora — 239 €
                </button>
                <button class="px-10 py-4 rounded-full font-bold text-white border border-white/30 hover:bg-white/10 backdrop-blur-sm transition-all duration-300">
                    Ver características
                </button>
            </div>
        </div>
    </div>

    <!-- Más Vendidos Carousel -->
    <div class="animate-enter delay-300">
        <div class="flex justify-between items-end mb-8 px-2">
            <div>
                <span class="text-orange-500 font-bold tracking-wide uppercase text-sm">Favoritos</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-1">Más Vendidos</h2>
            </div>
        </div>

        <div class="flex overflow-x-auto gap-6 pb-12 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
            <?php foreach ($carousel_posts as $post): ?>
                <div class="snap-center shrink-0 w-[85vw] md:w-[350px]">
                    <div class="group relative rounded-3xl p-6 hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full flex flex-col bg-cover bg-center bg-no-repeat">
                        <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>" class="absolute inset-0 z-30">
                            <span class="sr-only">Ver detalles de <?= htmlspecialchars($post['title']) ?></span>
                        </a>

                        <!-- Image Container -->
                        <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-lg bg-gray-50 flex items-center justify-center">
                            <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'placeholder.jpg' ?>"
                                alt="<?= htmlspecialchars($post['title']) ?>"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="flex-grow flex flex-col px-1">
                            <!-- Category -->
                            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider mb-2">DRONES</span>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-4 group-hover:text-blue-700 transition-colors"><?= htmlspecialchars($post['title']) ?></h3>

                            <!-- Separator -->
                            <div class="w-full h-px bg-gray-200 mb-4"></div>

                            <!-- Price & Action -->
                            <div class="mt-auto flex items-end justify-between">
                                <div>
                                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-wide mb-1">PRECIO DESDE</p>
                                    <p class="text-3xl font-bold text-gray-900 leading-none"><?= number_format($post['price'], 0) ?> €</p>
                                </div>

                                <!-- Button (Visual only, link covers card) -->
                                <span class="bg-gray-900 text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg group-hover:bg-blue-600 transition-colors">
                                    Comprar
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modern Info Strip -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8">
        <div class="bg-blue-50/50 rounded-3xl p-8 text-center hover:bg-blue-50 transition-colors duration-300">
            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h3 class="font-bold text-xl text-gray-900 mb-2">Envío Gratuito Global</h3>
            <p class="text-gray-500 leading-relaxed">Recibe tu pedido en cualquier parte del mundo sin coste extra en compras superiores a 100€.</p>
        </div>
        <div class="bg-purple-50/50 rounded-3xl p-8 text-center hover:bg-purple-50 transition-colors duration-300">
            <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="font-bold text-xl text-gray-900 mb-2">Garantía Extendida</h3>
            <p class="text-gray-500 leading-relaxed">Disfruta de 2 años de cobertura completa y soporte técnico prioritario incluido con tu compra.</p>
        </div>
        <div class="bg-green-50/50 rounded-3xl p-8 text-center hover:bg-green-50 transition-colors duration-300">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <h3 class="font-bold text-xl text-gray-900 mb-2">Soporte Expertos 24/7</h3>
            <p class="text-gray-500 leading-relaxed">Nuestro equipo de ingenieros está disponible día y noche para resolver cualquier duda técnica.</p>
        </div>
    </div>
</div>

<div class="text-right py-6 px-8 animate-enter delay-300">
    <a href="#" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-gray-900 transition-colors group">
        Explorar todo el catálogo
        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path>
        </svg>
    </a>
</div>

<?php
// Structure continuity for footer
?>