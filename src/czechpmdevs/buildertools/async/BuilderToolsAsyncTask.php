<?php

/**
 * Copyright (C) 2018-2021  CzechPMDevs
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace czechpmdevs\buildertools\async;

use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

abstract class BuilderToolsAsyncTask extends AsyncTask {

    /**
     * This function is called on main thread before calling
     * callback function
     */
    public function complete(): void {}

    final public function onCompletion(Server $server) {
        $this->complete();
        AsyncQueue::callCallback($this);
    }
}