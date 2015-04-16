<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_videothek', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->title,
		'empty' => $t('untitled'),
		'object' => $t('video')
	],
	'meta' => [
		'is_published' => $item->is_published ? $t('published') : $t('unpublished')
	]
]);

?>
<article>
	<?=$this->form->create($item) ?>
		<?= $this->form->field('id', ['type' => 'hidden']) ?>

		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('title', [
					'type' => 'text',
					'label' => $t('Title'),
					'class' => 'use-for-title'
				]) ?>
			</div>
			<div class="grid-column-right">
			</div>
		</div>

		<div class="grid-row">
			<div class="grid-column-left">
				<div class="media-attachment use-media-attachment-direct">
					<?= $this->form->label('VideoVideoMediaId', $t('Video')) ?>
					<?= $this->form->hidden('video_media_id') ?>
					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
			</div>
			<div class="grid-column-right">
				<div class="media-attachment use-media-attachment-direct">
					<?= $this->form->label('VideoCoverMediaId', $t('Cover')) ?>
					<?= $this->form->hidden('cover_media_id') ?>
					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
			</div>
		</div>

		<div class="grid-row">
			<div class="grid-column-left">
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('year', [
					'type' => 'text',
					'label' => $t('Year'),
					'value'
				]) ?>
				<?= $this->form->field('directors', [
					'type' => 'text',
					'label' => $t('Director/s'),
					'value' => $item->directors(['serialized' => true])
				]) ?>
				<div class="help"><?= $t('Separate multiple formats with commas.') ?></div>
			</div>
		</div>
		<div class="bottom-actions">
			<?php if ($item->exists()): ?>
				<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_videothek'], ['class' => 'button large']) ?>
			<?php endif ?>
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>