<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-md mx-auto py-10 px-4">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Editar Usuario</h3>
            
            <form action="index.php?action=admin_update_user&id=<?= $user['id'] ?>" method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" value="<?= htmlspecialchars($user['username']) ?>" disabled
                           class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm sm:text-sm p-2 border">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" value="<?= htmlspecialchars($user['email']) ?>" disabled
                           class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm sm:text-sm p-2 border">
                </div>

                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-gray-700">Rol del Sistema</label>
                    <select name="role" id="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="subscriber" <?= $user['role'] === 'subscriber' ? 'selected' : '' ?>>Subscriber (Lector)</option>
                        <option value="writer" <?= $user['role'] === 'writer' ? 'selected' : '' ?>>Writer (Autor)</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin (Total)</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="index.php?action=admin_users" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>