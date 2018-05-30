<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 * Copyright 2018 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_videothek\models;

use lithium\g11n\Message;

class Videos extends \base_core\models\Base {

	public $belongsTo = [
		'VideoMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'video_media_id'
		]
	];

	protected $_actsAs = [
		'base_core\extensions\data\behavior\Sluggable',
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'video' => [
					'type' => 'direct',
					'to' => 'video_media_id'
				]
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		],
		'base_core\extensions\data\behavior\Serializable' => [
			'fields' => [
				'directors' => ','
			]
		],
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'title',
				'director',
				'published'
			]
		]
	];

	public static function init() {
		extract(Message::aliases());
		$model = static::object();

		$model->validates['video_media_id'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('You must select a medium.', ['scope' => 'cms_videothek'])
			]
		];
	}
}

Videos::init();

?>