<?php

  $boolDebugLogging = TRUE;

  $arrConfig['development'] = array(
    'repository' => 'weistreet_web',
    'branch' => 'dev',
    'execute' => array(
      'cd /webserver/web_root/www.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; mv index-development.php index.php; mkdir -p protected/runtime'
    )
  );

  $arrConfig['product'] = array(
    'repository' => 'weistreet_web',
    'branch' => 'master',
    'execute' => array(
      'cd /webserver/web_root/www.test.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; mv index-product.php index.php; mkdir -p protected/runtime'
    )
  );
