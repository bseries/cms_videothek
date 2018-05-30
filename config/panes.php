<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 * Copyright 2018 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_videothek\config;

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('cms.videos', [
	'title' => $t('Videos', ['scope' => 'cms_videothek']),
	'url' => ['controller' => 'videos', 'action' => 'index', 'library' => 'cms_videothek', 'admin' => true],
	'weight' => 50
]);

?>