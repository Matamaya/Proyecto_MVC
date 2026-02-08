<?php
// Break out of the container opened in header.php if needed (usually header closes its own if not fluid)
// But assuming layout, we might need to close a div or start fresh.
// Based on previous files, header often leaves a container open or we want full width.
// The home.php started with closure.
?>
<?php include __DIR__ . '/../layout/header.php'; ?>
</div><!-- Close the container from header.php if it exists, to allow full width hero -->

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

    @keyframes pulse-glow {

        0%,
        100% {
            opacity: 0.5;
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.5);
        }

        50% {
            opacity: 1;
            box-shadow: 0 0 40px rgba(6, 182, 212, 0.8);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 3s infinite;
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

    .delay-500 {
        animation-delay: 500ms;
    }
</style>

<!-- HERO SECTION: SPLIT LAYOUT (OBELISK STYLE) -->
<div class="relative w-full min-h-[90vh] bg-black flex flex-col lg:flex-row overflow-hidden">

    <!-- LEFT PANEL: TYPOGRAPHY -->
    <div
        class="w-full lg:w-1/2 relative bg-black flex flex-col justify-center px-8 sm:px-12 md:px-20 lg:px-24 py-20 z-10 border-r border-white/5">
        <div
            class="absolute top-8 left-8 sm:left-12 flex space-x-6 text-xs font-mono text-gray-500 uppercase tracking-widest">
            <span>Explora</span>
            <span>Tecnología</span>
            <span>Futuro</span>
            <span>Comunidad</span>
        </div>

        <div class="animate-enter">
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-bold text-white tracking-tighter leading-[0.9] mb-8">
                Where <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">innovation</span><br>
                meets reality.
            </h1>
            <p class="text-gray-400 text-lg sm:text-xl max-w-lg mb-12 font-light leading-relaxed">
                Posee, controla y explora el futuro de la robótica y la realidad virtual.
                Construido para pioneros, coleccionistas y visionarios de la Web3.
            </p>

            <div class="flex items-center gap-4 group">
                <a href="#catalogo"
                    class="relative overflow-hidden bg-transparent border border-white/30 text-white px-8 py-4 text-sm font-bold tracking-widest uppercase hover:bg-white hover:text-black transition-all duration-300">
                    <span class="relative z-10 flex items-center gap-2">
                        Entrar al Catálogo
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                </a>

                <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'writer'])): ?>
                    <a href="index.php?action=create_post"
                        class="relative overflow-hidden bg-blue-600 border border-blue-500 text-white px-8 py-4 text-sm font-bold tracking-widest uppercase hover:bg-blue-500 transition-all duration-300">
                        <span class="relative z-10 flex items-center gap-2">
                            Crear Post
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div
            class="absolute bottom-8 left-8 sm:left-12 flex space-x-12 text-xs text-gray-600 uppercase tracking-wider font-mono">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 bg-cyan-500 rounded-full animate-pulse"></div>
                Zero-Latency VR
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                    </path>
                </svg>
                AI Drone Fleet
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL: VISUALS -->
    <div
        class="w-full lg:w-1/2 relative bg-gradient-to-b from-slate-900 to-black overflow-hidden flex items-center justify-center min-h-[500px]">
        <!-- Background Image with Blue Tint -->
        <div class="absolute inset-0">
            <img src="/public/img/bg02.jpg" alt="Future Tech"
                class="w-full h-full object-cover opacity-40 mix-blend-luminosity">
            <div class="absolute inset-0 bg-blue-900/40 mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/80"></div>
        </div>

        <!-- Glowing Orb/Planet Centerpiece -->
        <div
            class="relative z-10 w-64 h-64 sm:w-80 sm:h-80 rounded-full bg-black shadow-[0_0_100px_rgba(6,182,212,0.3)] flex items-center justify-center animate-float">
            <div class="absolute inset-0 rounded-full border border-cyan-500/20 animate-pulse-glow"></div>
            <div class="w-full h-full rounded-full overflow-hidden relative">
                <img src="/public/img/bg04.jpg" alt="Orb"
                    class="w-full h-full object-cover opacity-60 mix-blend-hard-light hover:scale-110 transition-transform duration-[5s]">
                <div class="absolute inset-0 bg-gradient-to-tr from-cyan-900/50 to-blue-900/20"></div>
            </div>

            <!-- Floating Data Points -->
            <div class="absolute -top-12 text-center">
                <span class="text-[10px] text-cyan-300 font-mono uppercase tracking-widest block mb-1">Network</span>
                <span class="text-white font-bold text-sm">Neural Link v2.0</span>
            </div>

            <div class="absolute -right-24 text-center">
                <span class="text-[10px] text-cyan-300 font-mono uppercase tracking-widest block mb-1">Status</span>
                <span class="text-white font-bold text-sm">Online</span>
            </div>

            <div class="absolute -left-20 text-center">
                <span class="text-[10px] text-cyan-300 font-mono uppercase tracking-widest block mb-1">Sync</span>
                <span class="text-white font-bold text-sm">99.9%</span>
            </div>
        </div>

        <div class="absolute top-8 right-8 text-right">
            <button
                class="text-xs font-bold text-white border border-white/20 px-4 py-2 uppercase tracking-widest hover:bg-white hover:text-black transition-colors">
                Connect Wallet
            </button>
        </div>
    </div>
</div>

<!-- Categories Strip (Updated to Blue/Cyan) -->
<div class="bg-black py-12 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="flex justify-between items-center overflow-x-auto gap-8 pb-4 scrollbar-hide animate-enter delay-100">
            <?php
            $categories = [
                ['name' => 'Mini', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
                ['name' => 'Mini 2', 'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
                ['name' => 'Mavic 3', 'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                ['name' => 'Air 2S', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                ['name' => 'FPV', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
                ['name' => 'Inspire', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
            ];
            foreach ($categories as $cat): ?>
                <div class="group flex flex-col items-center cursor-pointer min-w-[80px]">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-2xl bg-neutral-900 text-gray-500 group-hover:text-cyan-400 group-hover:bg-black group-hover:shadow-[0_0_20px_rgba(6,182,212,0.2)] group-hover:border group-hover:border-cyan-500/30 transition-all duration-300 transform group-hover:-translate-y-2">
                        <svg class="h-8 w-8 transition-transform duration-300 group-hover:scale-110" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="<?= $cat['icon'] ?>" />
                        </svg>
                    </div>
                    <span
                        class="mt-3 text-xs font-bold uppercase tracking-widest text-neutral-600 group-hover:text-white transition-colors"><?= $cat['name'] ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16 space-y-20 bg-black" id="catalogo">

    <?php
    $carousel_posts = $posts;
    // Duplicate posts if not enough for carousel effect (only if we have posts)
    if (!empty($carousel_posts)) {
        while (count($carousel_posts) < 8) {
            $carousel_posts = array_merge($carousel_posts, $posts);
        }
        $carousel_posts = array_slice($carousel_posts, 0, 8);
    }
    ?>

    <!-- Novedades Carousel (Spectrum Style) -->
    <div class="animate-enter delay-200">
        <div class="flex justify-between items-end mb-12 px-2">
            <div>
                <span class="text-cyan-400 font-mono tracking-[0.2em] uppercase text-xs">Innovation Hub</span>
                <h2 class="text-5xl md:text-7xl font-black text-white mt-2 uppercase tracking-tighter leading-none">
                    Recent<br><span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Drops</span>
                </h2>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <span class="text-xs font-mono text-gray-500">SCROLL TO EXPLORE</span>
                <div class="w-24 h-[1px] bg-white/20"></div>
            </div>
        </div>

        <?php if (empty($posts)): ?>
            <div class="text-center py-20 bg-neutral-900/50 rounded-lg border border-neutral-800 border-dashed">
                <p class="text-xl text-gray-400">No hay publicaciones disponibles.</p>
            </div>
        <?php else: ?>
            <div class="flex overflow-x-auto gap-8 pb-16 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
                <?php foreach ($carousel_posts as $index => $post): ?>
                    <div class="snap-center shrink-0 w-[85vw] md:w-[400px]">
                        <div
                            class="group relative h-[550px] overflow-hidden bg-black border border-white/10 hover:border-cyan-500/50 transition-all duration-500">

                            <!-- Abstract Background Beams (CSS) -->
                            <div class="absolute inset-0 opacity-40 group-hover:opacity-60 transition-opacity duration-700">
                                <!-- Gradient Mesh -->
                                <div
                                    class="absolute top-[-50%] left-[-50%] w-[200%] h-[200%] bg-[conic-gradient(from_90deg_at_50%_50%,#00000000_50%,#0f172a_50%),radial-gradient(circle_at_50%_50%,#1e293b_0%,#000000_50%)]">
                                </div>

                                <!-- Color Beams -->
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-purple-900/10 to-black">
                                </div>

                                <!-- Dynamic Beam -->
                                <div
                                    class="absolute -top-[100%] right-0 w-[200%] h-[200%] bg-gradient-to-b from-transparent via-cyan-500/5 to-transparent transform rotate-45 translate-x-1/2 transition-transform duration-1000 group-hover:translate-x-0">
                                </div>
                            </div>

                            <!-- Product Image Layer -->
                            <div
                                class="absolute inset-0 mix-blend-overlay opacity-30 group-hover:opacity-50 transition-all duration-700 pointer-events-none">
                                <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'placeholder.jpg' ?>"
                                    class="w-full h-full object-cover grayscale contrast-125 group-hover:scale-105 transition-transform duration-[2s]"
                                    alt="Background Art">
                            </div>

                            <!-- Content Overlay -->
                            <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">

                                <!-- ID / Badge -->
                                <div class="absolute top-6 left-6 flex items-center gap-3">
                                    <span
                                        class="font-mono text-[10px] text-cyan-300 border border-cyan-900/50 bg-cyan-950/30 px-2 py-1">
                                        /// NO. 0<?= $index + 1 ?>
                                    </span>
                                    <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></div>
                                </div>

                                <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="absolute inset-0 z-30">
                                    <span class="sr-only">View Post</span>
                                </a>

                                <!-- Text Content -->
                                <div
                                    class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <h3
                                        class="text-3xl md:text-4xl font-bold text-white leading-tight mb-4 uppercase tracking-tighter">
                                        <?= htmlspecialchars($post['title']) ?>
                                    </h3>

                                    <p
                                        class="text-gray-400 text-sm line-clamp-2 mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                        <?= htmlspecialchars(substr($post['content'] ?? 'Advanced technology integration for modern applications.', 0, 100)) ?>...
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Banner Split Section -->
    <div class="relative overflow-hidden bg-black h-[600px] group border-t border-b border-white/5">
        <video autoplay loop muted playsinline
            class="absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-30 transition-opacity duration-700">
            <source src="/public/img/drone_view.mp4" type="video/mp4">
        </video>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-transparent"></div>

        <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-24 max-w-7xl mx-auto z-10">
            <span class="text-cyan-500 font-mono text-sm tracking-[0.3em] uppercase mb-4">/// System Override</span>
            <h2 class="text-6xl md:text-9xl font-black text-white mb-8 tracking-tighter leading-[0.8]">
                RECUVA<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-200 to-slate-600">NEO</span>
            </h2>
            <div class="flex items-center gap-8 border-l-2 border-cyan-500 pl-8">
                <p class="text-gray-400 text-lg md:text-xl max-w-md font-light">
                    Precisión más allá de la visión humana. Únete a la revolución de la vigilancia autónoma.
                </p>
                <button
                    class="hidden md:block w-12 h-12 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
            </div>
        </div>
    </div>
</div>

<!-- NEW DECORATIVE SECTION: Deep Atmosphere -->
<div class="relative py-32 bg-slate-900 overflow-hidden">
    <!-- Background Asset -->
    <div class="absolute inset-0">
        <img src="/public/img/bg03.jpg" class="w-full h-full object-cover opacity-10 mix-blend-lighten scale-110">
        <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,theme(colors.blue.900/0.2),transparent_70%)]">
        </div>
    </div>

    <div class="relative z-10 container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            <!-- Left: Big Text -->
            <div>
                <h2
                    class="text-5xl md:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-white to-slate-500 tracking-tighter mb-8 leading-tight">
                    THE DEEP<br>PROTOCOL
                </h2>
                <p class="text-cyan-200/60 text-xl font-light leading-relaxed max-w-xl">
                    Imagina un mundo donde la latencia es cero y la realidad se fusiona con lo digital.
                    Nuestros sistemas de enfriamiento líquido cuántico permiten un procesamiento de datos sin
                    precedentes.
                </p>

                <div class="mt-12 grid grid-cols-2 gap-8">
                    <div>
                        <span class="text-4xl font-mono text-white block mb-2">8.2<span
                                class="text-sm text-cyan-500 align-top">TB/s</span></span>
                        <span class="text-xs uppercase tracking-widest text-slate-500">Bandwidth</span>
                    </div>
                    <div>
                        <span class="text-4xl font-mono text-white block mb-2">
                            <0.1<span class="text-sm text-cyan-500 align-top">ms
                        </span></span>
                        <span class="text-xs uppercase tracking-widest text-slate-500">Latency</span>
                    </div>
                </div>
            </div>

            <!-- Right: Visual Cards (Dummy) -->
            <div class="relative">
                <div
                    class="absolute -inset-4 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg opacity-20 blur-xl animate-pulse">
                </div>
                <div
                    class="bg-black/50 backdrop-blur-md border border-white/10 p-8 rounded-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-50">
                        <svg class="w-8 h-8 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl text-white font-bold mb-4">Neural Architecture</h3>
                    <div class="space-y-4">
                        <div class="h-2 bg-slate-800 rounded overflow-hidden">
                            <div class="h-full bg-cyan-500 w-3/4"></div>
                        </div>
                        <div class="h-2 bg-slate-800 rounded overflow-hidden">
                            <div class="h-full bg-purple-500 w-1/2"></div>
                        </div>
                        <div class="h-2 bg-slate-800 rounded overflow-hidden">
                            <div class="h-full bg-blue-500 w-5/6"></div>
                        </div>
                    </div>
                    <p class="mt-6 text-sm text-slate-400 font-mono">
                        > System_Check: STATUS_OK<br>
                        > Cooling_Core: ACTIVE<br>
                        > Uplink: ESTABLISHED
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Más Vendidos Carousel (Minimal Grid) -->
<div class="animate-enter delay-300 py-24 px-4 container mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
        <div>
            <span class="text-purple-400 font-bold tracking-widest uppercase text-xs mb-2 block">Exclusive
                Access</span>
            <h2 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tight">Top Sellers</h2>
        </div>
        <a href="#"
            class="text-sm font-bold text-white border-b border-white pb-1 hover:text-cyan-400 hover:border-cyan-400 transition-colors">VIEW
            ALL COLLECTION</a>
    </div>

    <?php if (empty($carousel_posts)): ?>
        <p class="text-gray-500">No products available.</p>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($carousel_posts as $post): ?>
                <div
                    class="group relative rounded-[2rem] p-4 hover:bg-white/5 transition-all duration-300 border border-transparent hover:border-white/10 flex flex-col h-full">
                    <a href="index.php?action=show_post&id=<?= $post['id'] ?>" class="absolute inset-0 z-30"><span
                            class="sr-only">Ver</span></a>

                    <div class="relative aspect-square mb-6 overflow-hidden rounded-2xl bg-neutral-900 border border-white/5">
                        <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'placeholder.jpg' ?>"
                            alt="<?= htmlspecialchars($post['title']) ?>"
                            class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-110 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>

                    <div class="flex-grow flex flex-col px-2">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-xs font-mono text-gray-500">#EF-0<?= $post['id'] ?></span>
                            <span class="text-xs font-bold text-cyan-500 uppercase">In Stock</span>
                        </div>

                        <h3 class="text-xl font-bold text-white leading-tight mb-2 group-hover:text-cyan-400 transition-colors">
                            <?= htmlspecialchars($post['title']) ?>
                        </h3>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
</div>

<!-- Info Strip (Corrected) -->
<div class="container mx-auto px-4 pb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-12 border-t border-white/10">
        <div class="p-8 group hover:bg-neutral-900/50 rounded-2xl transition-colors">
            <div class="text-cyan-500 mb-4 opacity-70 group-hover:opacity-100 transition-opacity">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <h3 class="font-bold text-lg text-white mb-2 uppercase tracking-wide">Global Shipping</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Delivery to 190+ countries. Customs handled via blockchain
                verification.</p>
        </div>
        <div class="p-8 group hover:bg-neutral-900/50 rounded-2xl transition-colors">
            <div class="text-cyan-500 mb-4 opacity-70 group-hover:opacity-100 transition-opacity">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                </svg>
            </div>
            <h3 class="font-bold text-lg text-white mb-2 uppercase tracking-wide">Secure Warranty</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Smart contract based warranties. Immutable and transferable
                ownership.</p>
        </div>
        <div class="p-8 group hover:bg-neutral-900/50 rounded-2xl transition-colors">
            <div class="text-cyan-500 mb-4 opacity-70 group-hover:opacity-100 transition-opacity">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <h3 class="font-bold text-lg text-white mb-2 uppercase tracking-wide">24/7 Support</h3>
            <p class="text-gray-500 text-sm leading-relaxed">AI-powered concierge available instantly. Human experts on
                standby.</p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>