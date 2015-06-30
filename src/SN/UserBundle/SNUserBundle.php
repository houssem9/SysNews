<?php


namespace SN\UserBundle;


use Symfony\Component\HttpKernel\Bundle\Bundle;


class SNUserBundle extends Bundle

{

public function getParent()

  {

    return 'FOSUserBundle';

  }
}
