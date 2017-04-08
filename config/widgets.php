<?php
/**
 * CMS Vidothek
 *
 * Copyright (c) 2013 Atelier Disko - All rights reserved.
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

namespace cms_videothek\config;

use lithium\g11n\Message;
use base_core\extensions\cms\Widgets;
use cms_videothek\models\Videos;

extract(Message::aliases());

Widgets::register('authoring',  function() use ($t) {
	return [
		'data' => [
			$t('Videos', ['scope' => 'cms_videothek']) => Videos::find('count')
		]
	];
}, [
	'type' => Widgets::TYPE_TABLE,
	'group' => Widgets::GROUP_DASHBOARD,
	'weight' => Widgets::WEIGHT_HIGH
]);

?>