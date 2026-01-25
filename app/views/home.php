<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>
      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Robótica avanzada para</span>
            <span class="block text-blue-600 xl:inline">un futuro automatizado</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Descubre la próxima generación de robots industriales, educativos y domésticos. Potencia tu productividad y aprendizaje con nuestra tecnología de vanguardia.
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                Get Started
              </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="<?= BASE_URL ?>/public/about" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10">
                Learn More
              </a>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80" alt="Robot Arm">
  </div>
</div>

<!-- Categories Section -->
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Compra por Categorías</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="relative rounded-lg overflow-hidden group cursor-pointer h-64">
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Industrial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h3 class="text-white text-2xl font-bold">Industrial</h3>
                </div>
            </div>
            <div class="relative rounded-lg overflow-hidden group cursor-pointer h-64">
                <img src="https://images.unsplash.com/photo-1530893609608-32a9af3aa95c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Educational" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h3 class="text-white text-2xl font-bold">Educational</h3>
                </div>
            </div>
            <div class="relative rounded-lg overflow-hidden group cursor-pointer h-64">
                <img src="https://images.unsplash.com/photo-1589254065878-42c9da997008?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Home" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h3 class="text-white text-2xl font-bold">Home</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Productos Destacados</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach(array_slice($posts, 0, 3) as $post): ?>
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'https://placehold.co/600x400?text=No+Image' ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?= htmlspecialchars($post['title']) ?>
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Robotics Series X</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$<?= number_format($post['price'], 2) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- New Products Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Novedades</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach(array_slice($posts, 0, 3) as $post): ?>
                 <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                    <div class="h-48 overflow-hidden">
                        <img src="<?= !empty($post['image_url']) ? htmlspecialchars($post['image_url']) : 'https://placehold.co/600x400?text=No+Image' ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900"><?= htmlspecialchars($post['title']) ?></h3>
                        <p class="mt-2 text-sm text-gray-500 line-clamp-2"><?= htmlspecialchars($post['content']) ?></p>
                         <div class="mt-4 flex justify-between items-center">
                            <span class="text-blue-600 font-bold">$<?= number_format($post['price'], 2) ?></span>
                            <a href="<?= BASE_URL ?>/public/post/show/<?= $post['id'] ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver más &rarr;</a>
                         </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Overview Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Overview</h2>
            <h1 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                ¿Por qué elegir Robotics Store?
            </h1>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                Ofrecemos más que solo hardware. Somos tu socio en la innovación.
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <!-- Heroicon name: globe-alt -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Envíos Globales</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Llegamos a cualquier parte del mundo con nuestra red logística de primera clase.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <!-- Heroicon name: scale -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Garantía de Calidad</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Todos nuestros productos pasan por rigurosos controles de calidad antes de ser enviados.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <!-- Heroicon name: lightning-bolt -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Soporte 24/7</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Nuestro equipo de ingenieros está disponible para resolver tus dudas en cualquier momento.
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<section class="py-12 bg-gray-50 overflow-hidden md:py-20 lg:py-24">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative">
            <img class="mx-auto h-8" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-text.svg" alt="Workcation">
            <blockquote class="mt-10">
                <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900">
                    <p>
                        &ldquo;Robotics Store ha transformado completamente nuestra línea de producción. La calidad de sus brazos robóticos y el soporte técnico son inigualables en la industria.&rdquo;
                    </p>
                </div>
                <footer class="mt-8">
                    <div class="md:flex md:items-center md:justify-center">
                        <div class="md:flex-shrink-0">
                            <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                            <div class="text-base font-medium text-gray-900">Judith Black</div>
                            <svg class="hidden md:block mx-1 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 0h3L9 20H6l5-20z" />
                            </svg>
                            <div class="text-base font-medium text-gray-500">CEO, Workcation</div>
                        </div>
                    </div>
                </footer>
            </blockquote>
        </div>
    </div>
</section>