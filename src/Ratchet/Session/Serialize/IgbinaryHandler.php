<?php

namespace Ratchet\Session\Serialize;

class IgbinaryHandler implements HandlerInterface {

       function serialize(array $data) {
               throw new \Exception("Not used");
       }
       function unserialize($raw) {
               return \igbinary_unserialize($raw);
       }
}
