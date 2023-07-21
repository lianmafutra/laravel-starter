<?php

namespace App\Config;

enum KanbanStatus:string {
   /**
    *@desc proses task = 1 , default saat insert pertama 
    */
    const TO_DO     = 1;
    /**
    *@desc proses task = 3
    */
    const PROGRESS = 2;
    /**
    *@desc proses task = 3
    */
    const CHECKING = 3;

    /**
    *@desc proses task = 4
    */
    const DONE     = 4;
}
