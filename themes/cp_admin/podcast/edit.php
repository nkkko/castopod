<?php declare(strict_types=1);

?>

<?= $this->extend('_layout') ?>

<?= $this->section('title') ?>
<?= lang('Podcast.edit') ?>
<?= $this->endSection() ?>

<?= $this->section('pageTitle') ?>
<?= lang('Podcast.edit') ?>
<?= $this->endSection() ?>

<?= $this->section('headerRight') ?>
<x-Button variant="primary" type="submit" form="podcast-edit-form"><?= lang('Podcast.form.submit_edit') ?></x-Button>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form id="podcast-edit-form" action="<?= route_to('podcast-edit', $podcast->id) ?>" method="POST" enctype='multipart/form-data' class="flex flex-col items-start justify-end gap-4 xl:flex-row-reverse">
<?= csrf_field() ?>


<div class="z-40 flex flex-col w-full max-w-xs overflow-hidden shadow-sm xl:sticky bg-elevated border-3 border-subtle top-24 rounded-xl">
    <?php if ($podcast->banner_id !== null): ?>
        <a href="<?= route_to('podcast-banner-delete', $podcast->id) ?>" class="absolute p-1 text-red-700 bg-red-100 border-2 rounded-full hover:text-red-900 border-contrast top-2 right-2" title="<?= lang('Podcast.form.banner_delete') ?>" data-tooltip="bottom"><?= icon('delete-bin-fill') ?></a>
    <?php endif; ?>
    <img src="<?= get_podcast_banner_url($podcast, 'small') ?>" alt="" class="w-full aspect-[3/1] bg-header" loading="lazy" />
    <div class="flex px-4 py-2">
        <img src="<?= $podcast->cover->thumbnail_url ?>" alt="<?= esc($podcast->title) ?>"
            class="w-16 h-16 mr-4 -mt-8 rounded-full ring-2 ring-background-elevated aspect-square" loading="lazy" />
        <div class="flex flex-col">
            <p class="font-semibold leading-none"><?= esc($podcast->title) ?></p>
            <p class="text-sm text-skin-muted">@<?= esc($podcast->handle) ?></p>
        </div>
    </div>
</div>

<div class="flex flex-col w-full max-w-xl gap-y-6">

<x-Forms.Section
    title="<?= lang('Podcast.form.identity_section_title') ?>"
    subtitle="<?= lang('Podcast.form.identity_section_subtitle') ?>" >

<x-Forms.Field
    name="cover"
    label="<?= esc(lang('Podcast.form.cover')) ?>"
    helper="<?= esc(lang('Podcast.form.cover_size_hint')) ?>"
    type="file"
    accept=".jpg,.jpeg,.png" />

<x-Forms.Field
    name="title"
    label="<?= esc(lang('Podcast.form.title')) ?>"
    value="<?= esc($podcast->title) ?>"
    isRequired="true" />

<x-Forms.Field
    as="MarkdownEditor"
    name="description"
    label="<?= esc(lang('Podcast.form.description')) ?>"
    value="<?= esc($podcast->description_markdown) ?>"
    isRequired="true"
    disallowList="header,quote" />

<fieldset>
    <legend><?= lang('Podcast.form.type.label') ?></legend>
    <div class="flex gap-2">
        <x-Forms.RadioButton
            value="episodic"
            name="type"
            hint="<?= esc(lang('Podcast.form.type.episodic_hint')) ?>"
            isChecked="<?= $podcast->type === 'episodic' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.type.episodic') ?></x-Forms.RadioButton>
        <x-Forms.RadioButton
            value="serial"
            name="type"
            hint="<?= esc(lang('Podcast.form.type.serial_hint')) ?>"
            isChecked="<?= $podcast->type === 'serial' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.type.serial') ?></x-Forms.RadioButton>
    </div>
</fieldset>
<fieldset>
    <legend><?= lang('Podcast.form.medium.label') ?><x-Hint class="ml-1"><?= lang('Podcast.form.medium.hint') ?></x-Hint></legend>
    <div class="flex gap-2">
        <x-Forms.RadioButton
            value="podcast"
            name="medium"
            hint="<?= esc(lang('Podcast.form.medium.podcast_hint')) ?>"
            isChecked="<?= $podcast->medium === 'podcast' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.medium.podcast') ?></x-Forms.RadioButton>
        <x-Forms.RadioButton
            value="music"
            name="medium"
            hint="<?= esc(lang('Podcast.form.medium.music_hint')) ?>"
            isChecked="<?= $podcast->medium === 'music' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.medium.music') ?></x-Forms.RadioButton>
        <x-Forms.RadioButton
            value="audiobook"
            name="medium"
            hint="<?= esc(lang('Podcast.form.medium.audiobook_hint')) ?>"
            isChecked="<?= $podcast->medium === 'audiobook' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.medium.audiobook') ?></x-Forms.RadioButton>
    </div>
</fieldset>
</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.classification_section_title') ?>"
    subtitle="<?= lang('Podcast.form.classification_section_subtitle') ?>" >

    <x-Forms.Field
        as="Select"
        name="language"
        label="<?= esc(lang('Podcast.form.language')) ?>"
        selected="<?= $podcast->language_code ?>"
        options="<?= esc(json_encode($languageOptions)) ?>"
        isRequired="true" />

    <x-Forms.Field
        as="Select"
        name="category"
        label="<?= esc(lang('Podcast.form.category')) ?>"
        selected="<?= $podcast->category_id ?>"
        options="<?= esc(json_encode($categoryOptions)) ?>"
        isRequired="true" />
    
    <x-Forms.Field
        as="MultiSelect"
        name="other_categories[]"
        label="<?= esc(lang('Podcast.form.other_categories')) ?>"
        data-max-item-count="2"
        selected="<?= esc(json_encode($podcast->other_categories_ids)) ?>"
        options="<?= esc(json_encode($categoryOptions)) ?>" />

    <fieldset class="mb-4">
        <legend><?= lang('Podcast.form.parental_advisory.label') ?><x-Hint class="ml-1"><?= lang('Podcast.form.parental_advisory.hint') ?></x-Hint></legend>
        <div class="flex gap-2">
            <x-Forms.RadioButton
                value="undefined"
                name="parental_advisory"
                isChecked="<?= $podcast->parental_advisory === null ? 'true' : 'false' ?>" ><?= lang('Podcast.form.parental_advisory.undefined') ?></x-Forms.RadioButton>
            <x-Forms.RadioButton
                value="clean"
                name="parental_advisory"
                isChecked="<?= $podcast->parental_advisory === 'clean' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.parental_advisory.clean') ?></x-Forms.RadioButton>
            <x-Forms.RadioButton
                value="explicit"
                name="parental_advisory"
                isChecked="<?= $podcast->parental_advisory === 'explicit' ? 'true' : 'false' ?>" ><?= lang('Podcast.form.parental_advisory.explicit') ?></x-Forms.RadioButton>
        </div>
    </fieldset>
</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.author_section_title') ?>"
    subtitle="<?= lang('Podcast.form.author_section_subtitle') ?>" >

<x-Forms.Field
    name="owner_name"
    label="<?= esc(lang('Podcast.form.owner_name')) ?>"
    value="<?= esc($podcast->owner_name) ?>"
    hint="<?= esc(lang('Podcast.form.owner_name_hint')) ?>"
    isRequired="true" />

<x-Forms.Field
    name="owner_email"
    type="email"
    label="<?= esc(lang('Podcast.form.owner_email')) ?>"
    value="<?= esc($podcast->owner_email) ?>"
    hint="<?= esc(lang('Podcast.form.owner_email_hint')) ?>"
    isRequired="true" />

<x-Forms.Toggler class="mt-2" name="is_owner_email_removed_from_feed" isChecked="<?= $podcast->is_owner_email_removed_from_feed ? 'true' : 'false' ?>" hint="<?= esc(lang('Podcast.form.is_owner_email_removed_from_feed_hint')) ?>">
    <?= lang('Podcast.form.is_owner_email_removed_from_feed') ?></x-Forms.Toggler>

<x-Forms.Field
    name="publisher"
    label="<?= esc(lang('Podcast.form.publisher')) ?>"
    value="<?= esc($podcast->publisher) ?>"
    hint="<?= esc(lang('Podcast.form.publisher_hint')) ?>" />

<x-Forms.Field
    name="copyright"
    label="<?= esc(lang('Podcast.form.copyright')) ?>"
    value="<?= esc($podcast->copyright) ?>" />

</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.fediverse_section_title') ?>" >

<div class="flex flex-col">
    <x-Forms.Label for="handle" hint="<?= esc(lang('Podcast.form.handle_hint')) ?>"><?= lang('Podcast.form.handle') ?></x-Forms.Label>
    <div class="relative">
        <?= icon('at-line', [
            'class' => 'absolute inset-0 h-full text-xl opacity-40 left-3',
        ]) ?>
        <x-Forms.Input name="handle" value="<?= $podcast->handle ?>" class="w-full pl-8" isRequired="true" isReadonly="true" />
    </div>
</div>

<x-Forms.Field
    name="banner"
    label="<?= esc(lang('Podcast.form.banner')) ?>"
    helper="<?= esc(lang('Podcast.form.banner_size_hint')) ?>"
    type="file"
    accept=".jpg,.jpeg,.png" />

</x-Forms.Section>

<x-Forms.Section title="<?= lang('Podcast.form.premium') ?>">
    <x-Forms.Toggler class="mt-2" name="premium_by_default" isChecked="<?= $podcast->is_premium_by_default ? 'true' : 'false' ?>" hint="<?= esc(lang('Podcast.form.premium_by_default_hint')) ?>">
        <?= lang('Podcast.form.premium_by_default') ?></x-Forms.Toggler>
</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.op3') ?>"
    subtitle="<?= lang('Podcast.form.op3_hint') ?>">

    <a href="https://op3.dev" target="_blank" rel="noopener noreferrer" class="inline-flex self-start text-xs font-semibold underline gap-x-1 text-skin-muted hover:no-underline"><?= icon('link', [
        'class' => 'text-sm',
    ]) ?>op3.dev</a>
    <x-Forms.Toggler name="enable_op3" isChecked="<?= service('settings')
            ->get('Analytics.enableOP3', 'podcast:' . $podcast->id) ? 'true' : 'false' ?>" hint="<?= esc(lang('Podcast.form.op3_enable_hint')) ?>"><?= lang('Podcast.form.op3_enable') ?></x-Forms.Toggler>
</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.location_section_title') ?>"
    subtitle="<?= lang('Podcast.form.location_section_subtitle') ?>" >

<x-Forms.Field
    name="location_name"
    label="<?= esc(lang('Podcast.form.location_name')) ?>"
    value="<?= esc($podcast->location_name) ?>"
    hint="<?= esc(lang('Podcast.form.location_name_hint')) ?>" />

</x-Forms.Section>

<x-Forms.Section
    title="<?= lang('Podcast.form.advanced_section_title') ?>"
    subtitle="<?= lang('Podcast.form.advanced_section_subtitle') ?>" >

<x-Forms.Field
    as="XMLEditor"
    name="custom_rss"
    label="<?= esc(lang('Podcast.form.custom_rss')) ?>"
    hint="<?= esc(lang('Podcast.form.custom_rss_hint')) ?>"
    content="<?= esc($podcast->custom_rss_string) ?>"
    rows="8" />

<x-Forms.Field
    as="Textarea"
    name="verify_txt"
    label="<?= esc(lang('Podcast.form.verify_txt')) ?>"
    hint="<?= esc(lang('Podcast.form.verify_txt_hint')) ?>"
    helper="<?= esc(lang('Podcast.form.verify_txt_helper')) ?>"
    value="<?= esc($podcast->verify_txt) ?>"
    rows="5" />

<x-Forms.Field
name="new_feed_url"
type="url"
label="<?= esc(lang('Podcast.form.new_feed_url')) ?>"
hint="<?= esc(lang('Podcast.form.new_feed_url_hint')) ?>"
value="<?= esc($podcast->new_feed_url) ?>"
/>

<x-Forms.Toggler class="mb-2" name="lock" isChecked="<?= $podcast->is_locked ? 'true' : 'false' ?>" hint="<?= esc(lang('Podcast.form.lock_hint')) ?>">
    <?= lang('Podcast.form.lock') ?>
</x-Forms.Toggler>
<x-Forms.Toggler class="mb-2" name="block" isChecked="<?= $podcast->is_blocked ? 'true' : 'false'  ?>" hint="<?= esc(lang('Podcast.form.block_hint')) ?>">
    <?= lang('Podcast.form.block') ?>
</x-Forms.Toggler>
<x-Forms.Toggler name="complete" isChecked="<?= $podcast->is_completed ? 'true' : 'false' ?>">
    <?= lang('Podcast.form.complete') ?>
</x-Forms.Toggler>

</x-Forms.Section>

</div>

</form>
<?php // @icon('delete-bin-fill')?>
<x-Button class="mt-8" variant="danger" uri="<?= route_to('podcast-delete', $podcast->id) ?>" iconLeft="delete-bin-fill"><?= lang('Podcast.delete') ?></x-Button>

<?= $this->endSection() ?>
