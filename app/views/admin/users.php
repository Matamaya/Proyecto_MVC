<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Gestión de Usuarios</h1>
        <a href="index.php?action=admin_dashboard" class="text-gray-500 hover:text-gray-700">&larr; Volver al panel</a>
    </div>

    <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?= $user['id'] ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($user['username']) ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?= htmlspecialchars($user['email']) ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php 
                            $roleClass = match($user['role']) {
                                'admin' => 'bg-purple-100 text-purple-800',
                                'writer' => 'bg-blue-100 text-blue-800',
                                default => 'bg-gray-100 text-gray-800'
                            };
                        ?>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $roleClass ?>">
                            <?= htmlspecialchars(ucfirst($user['role'])) ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="index.php?action=admin_edit_user&id=<?= $user['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar Rol</a>
                        <a href="index.php?action=admin_delete_user&id=<?= $user['id'] ?>" 
                           class="text-red-600 hover:text-red-900" 
                           onclick="return confirm('¿Eliminar usuario permanentemente?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>