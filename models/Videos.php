<?php
/**
 * CMS Vidothek
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

namespace cms_videothek\models;

use lithium\g11n\Message;

class Videos extends \base_core\models\Base {

	use \base_core\models\SlugTrait;

	public $belongsTo = [
		'VideoMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'video_media_id'
		]
	];

	protected static $_actsAs = [
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				],
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
		$model = static::_object();

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