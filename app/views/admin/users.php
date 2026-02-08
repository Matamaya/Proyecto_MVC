<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-black text-white tracking-tight">Gestión de Usuarios</h1>
        <a href="index.php?action=admin_dashboard" class="text-gray-400 hover:text-white transition-colors">&larr;
            Volver al panel</a>
    </div>

    <div class="bg-neutral-900 shadow-2xl overflow-hidden border border-neutral-800 sm:rounded-2xl">
        <table class="min-w-full divide-y divide-neutral-800">
            <thead class="bg-neutral-950">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Usuario
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Rol</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                <?php foreach ($users as $user): ?>
                    <tr class="hover:bg-neutral-800/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">
                            <?= $user['id'] ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-bold text-white"><?= htmlspecialchars($user['username']) ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            <?= htmlspecialchars($user['email']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php
                            $roleClass = match ($user['role']) {
                                'admin' => 'bg-purple-900/30 text-purple-300 border border-purple-500/30',
                                'writer' => 'bg-blue-900/30 text-blue-300 border border-blue-500/30',
                                default => 'bg-gray-800 text-gray-300 border border-gray-600'
                            };
                            ?>
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full <?= $roleClass ?>">
                                <?= htmlspecialchars(ucfirst($user['role'])) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="index.php?action=admin_edit_user&id=<?= $user['id'] ?>"
                                class="text-blue-400 hover:text-white mr-4 transition-colors">Editar Rol</a>
                            <a href="index.php?action=admin_delete_user&id=<?= $user['id'] ?>"
                                class="text-red-500 hover:text-red-400 transition-colors font-bold"
                                onclick="return confirm('¿Eliminar usuario permanentemente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>