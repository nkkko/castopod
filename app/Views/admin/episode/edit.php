<?= $this->extend('admin/_layout') ?>

<?= $this->section('title') ?>
<?= lang('Episode.edit') ?>
<?= $this->endSection() ?>

<?= $this->section('pageTitle') ?>
<?= lang('Episode.edit') ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?= form_open_multipart(route_to('episode-edit', $podcast->id, $episode->id), [
    'method' => 'post',
    'class' => 'flex flex-col',
]) ?>
<?= csrf_field() ?>

<div class="flex w-full mb-6">
    <?= form_input([
        'id' => 'enclosure',
        'name' => 'enclosure',
        'class' => 'form-enclosure-input',
        'type' => 'file',
        'accept' => '.mp3,.m4a',
    ]) ?>
    <label for="enclosure"><?= icon('upload', 'mr-2 text-') ?>
        <span><?= lang('Episode.form.enclosure') ?></span></label>
</div>

<?= form_section(
    lang('Episode.form.info_section_title'),
    lang('Episode.form.info_section_subtitle')
) ?>

<?= form_label(
    lang('Episode.form.image'),
    'image',
    [],
    lang('Episode.form.image_hint'),
    true
) ?>
<img
    src="<?= $episode->image->thumbnail_url ?>"
    alt="<?= $episode->title ?>"
    class="object-cover w-32 h-32"
/>
<?= form_input([
    'id' => 'image',
    'name' => 'image',
    'class' => 'form-input',
    'type' => 'file',
    'accept' => '.jpg,.jpeg,.png',
]) ?>
<small class="mb-4 text-gray-600"><?= lang(
    'Common.forms.image_size_hint'
) ?></small>

<?= form_label(
    lang('Episode.form.title'),
    'title',
    [],
    lang('Episode.form.title_hint')
) ?>
<?= form_input([
    'id' => 'title',
    'name' => 'title',
    'class' => 'form-input mb-4',
    'value' => old('title', $episode->title),
    'required' => 'required',
    'data-slugify' => 'title',
]) ?>

<?= form_label(
    lang('Episode.form.slug'),
    'slug',
    [],
    lang('Episode.form.slug_hint')
) ?>
<?= form_input([
    'id' => 'slug',
    'name' => 'slug',
    'class' => 'form-input mb-4',
    'value' => old('slug', $episode->slug),
    'required' => 'required',
    'data-slugify' => 'slug',
]) ?>

<div class="flex flex-col mb-4 gap-x-2 gap-y-4 md:flex-row">
    <div class="flex flex-col flex-1">
        <?= form_label(lang('Episode.form.season_number'), 'season_number') ?>
        <?= form_input([
            'id' => 'season_number',
            'name' => 'season_number',
            'class' => 'form-input w-full',
            'value' => old('season_number', $episode->season_number),
            'type' => 'number',
        ]) ?>
    </div>
    <div class="flex flex-col flex-1">
        <?= form_label(lang('Episode.form.episode_number'), 'episode_number') ?>
        <?= form_input([
            'id' => 'episode_number',
            'name' => 'episode_number',
            'class' => 'form-input w-full',
            'value' => old('episode_number', $episode->number),
            'required' => 'required',
            'type' => 'number',
        ]) ?>
    </div>
</div>

<?= form_fieldset('', ['class' => 'flex mb-4 gap-1']) ?>
    <legend>
    <?= lang('Episode.form.type.label') .
        hint_tooltip(lang('Episode.form.type.hint'), 'ml-1') ?>
    </legend>
    <?= form_radio(
        ['id' => 'full', 'name' => 'type', 'class' => 'form-radio-btn'],
        'full',
        old('type') ? old('type') === 'full' : $episode->type === 'full'
    ) ?>
    <label for="full" class="inline-flex items-center">
        <?= lang('Episode.form.type.full') ?>
    </label>
    <?= form_radio(
        ['id' => 'trailer', 'name' => 'type', 'class' => 'form-radio-btn'],
        'trailer',
        old('type') ? old('type') === 'trailer' : $episode->type === 'trailer'
    ) ?>
    <label for="trailer" class="inline-flex items-center">
        <?= lang('Episode.form.type.trailer') ?>
    </label>
    <?= form_radio(
        ['id' => 'bonus', 'name' => 'type', 'class' => 'form-radio-btn'],
        'bonus',
        old('type') ? old('type') === 'bonus' : $episode->type === 'bonus'
    ) ?>
    <label for="bonus" class="inline-flex items-center">
        <?= lang('Episode.form.type.bonus') ?>
    </label>
<?= form_fieldset_close() ?>

<?= form_section_close() ?>


<?= form_section(
    lang('Episode.form.show_notes_section_title'),
    lang('Episode.form.show_notes_section_subtitle')
) ?>

<div class="mb-4">
    <?= form_label(lang('Episode.form.description'), 'description') ?>
    <?= form_textarea(
        [
            'id' => 'description',
            'name' => 'description',
            'class' => 'form-textarea',
            'required' => 'required',
        ],
        old('description', $episode->description, false),
        'data-editor="markdown"'
    ) ?>
</div>

<div class="mb-4">
    <?= form_label(
        lang('Episode.form.description_footer'),
        'description_footer',
        [],
        lang('Episode.form.description_footer_hint')
    ) ?>
    <?= form_textarea(
        [
            'id' => 'description_footer',
            'name' => 'description_footer',
            'class' => 'form-textarea',
        ],
        old(
            'description_footer',
            $podcast->episode_description_footer ?? '',
            false
        ),
        'data-editor="markdown"'
    ) ?>
</div>

<?= form_section_close() ?>


<?= form_section(
    lang('Episode.form.publication_section_title'),
    lang('Episode.form.publication_section_subtitle')
) ?>

<?= form_fieldset('', ['class' => 'flex mb-4']) ?>
<legend><?= lang('Episode.form.published_at.label') ?></legend>
<div class="flex flex-col flex-1">
    <?= form_label(lang('Episode.form.publication_date'), 'publication_date', [
        'class' => 'sr-only',
    ]) ?>
    <?= form_input([
        'id' => 'publication_date',
        'name' => 'publication_date',
        'class' => 'form-input',
        'value' => old(
            'publication_date',
            $episode->published_at
                ? $episode->published_at->format('Y-m-d')
                : ''
        ),
        'type' => 'date',
    ]) ?>
</div>

<div class="flex flex-col flex-1">
    <?= form_label(lang('Episode.form.publication_time'), 'publication_time', [
        'class' => 'sr-only',
    ]) ?>
    <?= form_input([
        'id' => 'publication_time',
        'name' => 'publication_time',
        'class' => 'form-input',
        'value' => old(
            'publication_time',
            $episode->published_at ? $episode->published_at->format('H:i') : ''
        ),
        'placeholder' => '--:--',
        'type' => 'time',
    ]) ?>
</div>
<?= form_fieldset_close() ?>


<?= form_fieldset('', ['class' => 'flex mb-6 gap-1']) ?>
    <legend>
    <?= lang('Episode.form.parental_advisory.label') .
        hint_tooltip(lang('Episode.form.type.hint'), 'ml-1') ?>
    </legend>
    <?= form_radio(
        [
            'id' => 'undefined',
            'name' => 'parental_advisory',
            'class' => 'form-radio-btn',
        ],
        'undefined',
        old('parental_advisory')
            ? old('parental_advisory') === 'undefined'
            : $episode->parental_advisory === null
    ) ?>
    <label for="undefined"><?= lang(
        'Episode.form.parental_advisory.undefined'
    ) ?></label>
    <?= form_radio(
        [
            'id' => 'clean',
            'name' => 'parental_advisory',
            'class' => 'form-radio-btn',
        ],
        'clean',
        old('parental_advisory')
            ? old('parental_advisory') === 'clean'
            : $episode->parental_advisory === 'clean'
    ) ?>
    <label for="clean"><?= lang(
        'Episode.form.parental_advisory.clean'
    ) ?></label>
    <?= form_radio(
        [
            'id' => 'explicit',
            'name' => 'parental_advisory',
            'class' => 'form-radio-btn',
        ],
        'explicit',
        old('parental_advisory')
            ? old('parental_advisory') === 'explicit'
            : $episode->parental_advisory === 'explicit'
    ) ?>
    <label for="explicit"><?= lang(
        'Episode.form.parental_advisory.explicit'
    ) ?></label>
<?= form_fieldset_close() ?>

<?= form_switch(
    lang('Episode.form.block') .
        hint_tooltip(lang('Episode.form.block_hint'), 'ml-1'),
    ['id' => 'block', 'name' => 'block'],
    'yes',
    old(
        'block',

        $episode->block
    )
) ?>

<?= form_section_close() ?>

<?= button(
    lang('Episode.form.submit_edit'),
    null,
    ['variant' => 'primary'],
    ['type' => 'submit', 'class' => 'self-end']
) ?>

<?= form_close() ?>


<?= $this->endSection() ?>