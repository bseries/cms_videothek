<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 * Copyright 2018 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
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