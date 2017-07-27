test:
  post:
    - git submodule sync
    - git submodule update --init
    - rm -rf plugins
    - rm -rf bin
    - rm -rf artifacts
    - mkdir plugins
    - mkdir artifacts
    - wget -O PHP7.tar.gz https://jenkins.pmmp.io/job/PHP-PocketMine-Linux-x86_64/lastSuccessfulBuild/artifact/PHP_Linux-x86_64.tar.gz --no-check-certificate
    - tar -xf PHP7.tar.gz
    - wget -O plugins/DevTools.phar https://github.com/pmmp/PocketMine-DevTools/releases/download/v1.11.3/DevTools_v1.11.3.phar
    - bin/php7/bin/php ci.php
    - cp -R plugins/DevTools/* $CIRCLE_ARTIFACTS
