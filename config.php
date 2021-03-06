<?php

  $boolDebugLogging = TRUE;

  $arrConfig['web_prod'] = array(
    'repository' => 'weistreet_web',
    'branch' => 'master',
    'execute' => array(
      'cd /webserver/web_root/www.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; mv index-product.php index.php; mkdir -p protected/runtime'
    )
  );

  $arrConfig['web_dev'] = array(
    'repository' => 'weistreet_web',
    'branch' => 'dev',
    'execute' => array(
      'cd /webserver/web_root/www.dev.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; mv index-development.php index.php; mkdir -p protected/runtime'
    )
  );

  $arrConfig['api_dev'] = array(
    'repository' => 'weistreet_api',
    'branch' => 'dev',
    'execute' => array(
      'cd /webserver/web_root/wxapi.dev.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; /webserver/apps/nodejs/bin/forever restart weistreet_dev 2>&1'
    )
  );

  $arrConfig['api_prod'] = array(
    'repository' => 'weistreet_api',
    'branch' => 'master',
    'execute' => array(
      'cd /webserver/web_root/wxapi.weistreet.com/; git reset --hard HEAD 2>&1; git clean -f -d 2>&1; git pull 2>&1; /webserver/apps/nodejs/bin/forever restart weistreet 2>&1'
    )
  );
