<article class="flex flex-col p-4 rounded-xl relative bg-elevated border-3 <?= $plugin->isActive() ? 'border-accent-base' : 'border-subtle' ?>">
    <div class="self-end -mb-6">
    <?php if($plugin->isActive()): ?>
        <x-Pill variant="success" icon="check-fill" class="lowercase" size="small"><?= lang('Plugins.active') ?></x-Pill>
    <?php else: ?>
        <x-Pill variant="default" icon="close-fill" class="lowercase" size="small"><?= lang('Plugins.inactive') ?></x-Pill>
    <?php endif; ?>
    </div>
    <img class="rounded-full min-w-16 max-w-16 aspect-square" src="<?= $plugin->getIconSrc() ?>">
    <div class="flex flex-col items-start mt-2">
        <h2 class="flex items-center text-xl font-bold font-display gap-x-2"><a href="<?= route_to('plugins-view', $plugin->getKey()) ?>" class="hover:underline decoration-accent"><?= $plugin->getName() ?></a></h2>
        <p class="inline-flex font-mono text-xs">
            <span class="inline-flex tracking-wide bg-gray-100">
                <a href="<?= route_to('plugins-vendor', $plugin->getVendor()) ?>" class="underline underline-offset-2 decoration-2 decoration-dotted hover:decoration-solid decoration-accent"><?= $plugin->getVendor() ?></a>
                <span>/</span>
                <a class="underline underline-offset-2 decoration-2 decoration-dotted hover:decoration-solid decoration-accent" href="<?= route_to('plugins-view', $plugin->getKey()) ?>"><?= $plugin->getPackage() ?></a></span>
            <span class="mx-1">•</span><span class="px-1 font-mono text-xs"><?= $plugin->getVersion() ?></span>
        </p>
        <p class="mt-2 text-gray-600"><?= $plugin->getDescription() ?></p>
    </div>
    <footer class="flex items-center justify-between mt-6">
        <div class="flex gap-x-2">
            <?php if ($plugin->getHomepage()): ?>
                <?php // @icon('earth-fill')?>
                <x-IconButton glyph="earth-fill" uri="<?= $plugin->getHomepage() ?>" isExternal="true"><?= lang('Plugins.website') ?></x-IconButton>    
            <?php endif; ?>
            <?php if ($plugin->getRepository()): ?>
                <?php // @icon('git-repository-fill')?>
                <x-IconButton glyph="git-repository-fill" uri="<?= $plugin->getRepository()->url ?>" isExternal="true"><?= lang('Plugins.repository') ?></x-IconButton>    
            <?php endif; ?>
        </div>
        <div class="flex gap-x-2">
        <?php if($plugin->isActive()): ?>
            <form class="flex justify-end" method="POST" action="<?= route_to('plugins-deactivate', $plugin->getKey()) ?>">
                <?= csrf_field() ?>
                <x-Button type="submit" variant="danger" size="small"><?= lang('Plugins.deactivate') ?></x-Button>
            </form>
        <?php else: ?>
            <form class="flex flex-col items-end justify-end gap-2" method="POST" action="<?= route_to('plugins-activate', $plugin->getKey()) ?>">
                <?= csrf_field() ?>
                <x-Button type="submit" variant="secondary" size="small"><?= lang('Plugins.activate') ?></x-Button>
            </form>
        <?php endif; ?>
            <?php if ($plugin->getSettings() !== []): ?>
                <?php // @icon('equalizer-fill')?>
                <x-IconButton uri="<?= route_to('plugins-general-settings', $plugin->getKey()) ?>" glyph="equalizer-fill"><?= lang('Plugins.settings') ?></x-IconButton>
            <?php endif; ?>
            <button class="p-2 rounded-full" id="more-dropdown-<?= $plugin->getKey() ?>" data-dropdown="button" data-dropdown-target="more-dropdown-<?= $plugin->getKey() ?>-menu" aria-haspopup="true" aria-expanded="false" title="<?= lang('Common.more') ?>"><?= icon('more-2-fill') ?></button>
            <?php $items = [
                [
                    'type'  => 'link',
                    'title' => lang('Plugins.view'),
                    'uri'   => route_to('plugins-view', $plugin->getKey()),
                ],
                [
                    'type' => 'separator',
                ],
                [
                    'type'  => 'link',
                    'title' => icon('delete-bin-fill', [
                        'class' => 'text-gray-500',
                    ]) . lang('Plugins.uninstall'),
                    'uri'   => route_to('plugins-uninstall', $plugin->getKey()),
                    'class' => 'font-semibold text-red-600',
                ],
            ]; ?>
            <x-DropdownMenu id="more-dropdown-<?= $plugin->getKey() ?>-menu" labelledby="more-dropdown-<?= $plugin->getKey() ?>" placement="bottom-end" offsetY="-32" items="<?= esc(json_encode($items)) ?>" />
        </div>
    </footer>
</article>