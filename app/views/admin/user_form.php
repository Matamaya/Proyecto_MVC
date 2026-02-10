<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-md mx-auto py-12 px-4 h-[60vh] mt-12">
    <div class="bg-neutral-900 shadow-2xl rounded-2xl overflow-hidden border border-neutral-800">
        <div class="px-8 py-8">
            <h3 class="text-2xl font-black text-white mb-6 tracking-tight">Editar Usuario</h3>

            <form action="index.php?action=admin_update_user&id=<?= $user['id'] ?>" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-400 uppercase tracking-wide mb-2">Usuario</label>
                    <input type="text" value="<?= htmlspecialchars($user['username']) ?>" disabled
                        class="block w-full bg-neutral-950 border border-neutral-800 rounded-lg shadow-sm sm:text-sm p-3 text-gray-500 cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-400 uppercase tracking-wide mb-2">Email</label>
                    <input type="text" value="<?= htmlspecialchars($user['email']) ?>" disabled
                        class="block w-full bg-neutral-950 border border-neutral-800 rounded-lg shadow-sm sm:text-sm p-3 text-gray-500 cursor-not-allowed">
                </div>

                <div>
                    <label for="role" class="block text-sm font-bold text-blue-500 uppercase tracking-wide mb-2">Rol
                        del Sistema</label>
                    <div class="relative">
                        <select name="role" id="role"
                            class="block w-full py-3 px-4 border border-neutral-700 bg-neutral-950 text-white rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm appearance-none cursor-pointer hover:border-blue-500 transition-colors">
                            <option value="subscriber" <?= $user['role'] === 'subscriber' ? 'selected' : '' ?>>Subscriber
                                (Lector)</option>
                            <option value="writer" <?= $user['role'] === 'writer' ? 'selected' : '' ?>>Writer (Autor)
                            </option>
                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin (Total)</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-4 border-t border-neutral-800 mt-6">
                    <a href="index.php?action=admin_users"
                        class="py-2 px-6 border border-neutral-700 rounded-full shadow-sm text-sm font-bold text-gray-400 hover:text-white hover:border-gray-500 transition-colors flex items-center">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-6 border border-transparent shadow-lg text-sm font-bold rounded-full text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:-translate-y-1">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>