<?php
/**
 * HitCounterRepository 
*/

namespace coderius\hitCounter\repositories;

use coderius\hitCounter\entities\HitCounter;

class HitCounterRepository{

    public function save(HitCounter $hit): void
    {
        if (!$hit->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

}