<?php

namespace App\Utils;

use Spatie\ResponseCache\Replacers\Replacer;
use Symfony\Component\HttpFoundation\Response;


class ReplacerCache implements Replacer
{

   public function prepareResponseToCache(Response $response): void
   {
      if (!$response->getContent()) {
         return;
      }


      $response->setContent(str_replace(
         ' if (true) {',
         ' if (false) {',
         $response->getContent()
      ));
   }

   public function replaceInCachedResponse(Response $response): void
   {
      if (!$response->getContent()) {
         return;
      }

     

     
   }

}
