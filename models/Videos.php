<?php
/**
 * CMS Vidothek
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see https://atelierdisko.de/licenses.
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