# Readme
## ファイルツリー
│  .editorconfig
│  .gitignore
│  composer.json
│  contributing.md
│  filelist.txt
│  index.php
│  license.txt
│  readme.md
│  
├─application
│  │  .htaccess
│  │  index.html
│  │  
│  ├─cache
│  │      index.html
│  │      
│  ├─config
│  │      autoload.php
│  │      config.php
│  │      constants.php
│  │      database.php
│  │      doctypes.php
│  │      foreign_chars.php
│  │      hooks.php
│  │      index.html
│  │      memcached.php
│  │      migration.php
│  │      mimes.php
│  │      profiler.php
│  │      routes.php
│  │      smileys.php
│  │      user_agents.php
│  │      
│  ├─controllers
│  │      index.html
│  │      Welcome.php
│  │      
│  ├─core
│  │      index.html
│  │      
│  ├─helpers
│  │      index.html
│  │      
│  ├─hooks
│  │      index.html
│  │      
│  ├─language
│  │  │  index.html
│  │  │  
│  │  └─english
│  │          index.html
│  │          
│  ├─libraries
│  │      index.html
│  │      
│  ├─logs
│  │      index.html
│  │      
│  ├─models
│  │      index.html
│  │      
│  ├─third_party
│  │      index.html
│  │      
│  └─views
│      │  index.html
│      │  upload.php
│      │  view_js.php 
│      │  welcome_message.php
│      │  
│      └─errors
│          │  index.html
│          │  
│          ├─cli
│          │      error_404.php
│          │      error_db.php
│          │      error_exception.php
│          │      error_general.php
│          │      error_php.php
│          │      index.html
│          │      
│          └─html
│                  error_404.php
│                  error_db.php
│                  error_exception.php
│                  error_general.php
│                  error_php.php
│                  index.html
│                  
├─system
│  │  .htaccess
│  │  index.html
│  │  
│  ├─core
│  │  │  Benchmark.php
│  │  │  CodeIgniter.php
│  │  │  Common.php
│  │  │  Config.php
│  │  │  Controller.php
│  │  │  Exceptions.php
│  │  │  Hooks.php
│  │  │  index.html
│  │  │  Input.php
│  │  │  Lang.php
│  │  │  Loader.php
│  │  │  Log.php
│  │  │  Model.php
│  │  │  Output.php
│  │  │  Router.php
│  │  │  Security.php
│  │  │  URI.php
│  │  │  Utf8.php
│  │  │  
│  │  └─compat
│  │          hash.php
│  │          index.html
│  │          mbstring.php
│  │          password.php
│  │          standard.php
│  │          
│  ├─database
│  │  │  DB.php
│  │  │  DB_cache.php
│  │  │  DB_driver.php
│  │  │  DB_forge.php
│  │  │  DB_query_builder.php
│  │  │  DB_result.php
│  │  │  DB_utility.php
│  │  │  index.html
│  │  │  
│  │  └─drivers
│  │      │  index.html
│  │      │  
│  │      ├─cubrid
│  │      │      cubrid_driver.php
│  │      │      cubrid_forge.php
│  │      │      cubrid_result.php
│  │      │      cubrid_utility.php
│  │      │      index.html
│  │      │      
│  │      ├─ibase
│  │      │      ibase_driver.php
│  │      │      ibase_forge.php
│  │      │      ibase_result.php
│  │      │      ibase_utility.php
│  │      │      index.html
│  │      │      
│  │      ├─mssql
│  │      │      index.html
│  │      │      mssql_driver.php
│  │      │      mssql_forge.php
│  │      │      mssql_result.php
│  │      │      mssql_utility.php
│  │      │      
│  │      ├─mysql
│  │      │      index.html
│  │      │      mysql_driver.php
│  │      │      mysql_forge.php
│  │      │      mysql_result.php
│  │      │      mysql_utility.php
│  │      │      
│  │      ├─mysqli
│  │      │      index.html
│  │      │      mysqli_driver.php
│  │      │      mysqli_forge.php
│  │      │      mysqli_result.php
│  │      │      mysqli_utility.php
│  │      │      
│  │      ├─oci8
│  │      │      index.html
│  │      │      oci8_driver.php
│  │      │      oci8_forge.php
│  │      │      oci8_result.php
│  │      │      oci8_utility.php
│  │      │      
│  │      ├─odbc
│  │      │      index.html
│  │      │      odbc_driver.php
│  │      │      odbc_forge.php
│  │      │      odbc_result.php
│  │      │      odbc_utility.php
│  │      │      
│  │      ├─pdo
│  │      │  │  index.html
│  │      │  │  pdo_driver.php
│  │      │  │  pdo_forge.php
│  │      │  │  pdo_result.php
│  │      │  │  pdo_utility.php
│  │      │  │  
│  │      │  └─subdrivers
│  │      │          index.html
│  │      │          pdo_4d_driver.php
│  │      │          pdo_4d_forge.php
│  │      │          pdo_cubrid_driver.php
│  │      │          pdo_cubrid_forge.php
│  │      │          pdo_dblib_driver.php
│  │      │          pdo_dblib_forge.php
│  │      │          pdo_firebird_driver.php
│  │      │          pdo_firebird_forge.php
│  │      │          pdo_ibm_driver.php
│  │      │          pdo_ibm_forge.php
│  │      │          pdo_informix_driver.php
│  │      │          pdo_informix_forge.php
│  │      │          pdo_mysql_driver.php
│  │      │          pdo_mysql_forge.php
│  │      │          pdo_oci_driver.php
│  │      │          pdo_oci_forge.php
│  │      │          pdo_odbc_driver.php
│  │      │          pdo_odbc_forge.php
│  │      │          pdo_pgsql_driver.php
│  │      │          pdo_pgsql_forge.php
│  │      │          pdo_sqlite_driver.php
│  │      │          pdo_sqlite_forge.php
│  │      │          pdo_sqlsrv_driver.php
│  │      │          pdo_sqlsrv_forge.php
│  │      │          
│  │      ├─postgre
│  │      │      index.html
│  │      │      postgre_driver.php
│  │      │      postgre_forge.php
│  │      │      postgre_result.php
│  │      │      postgre_utility.php
│  │      │      
│  │      ├─sqlite
│  │      │      index.html
│  │      │      sqlite_driver.php
│  │      │      sqlite_forge.php
│  │      │      sqlite_result.php
│  │      │      sqlite_utility.php
│  │      │      
│  │      ├─sqlite3
│  │      │      index.html
│  │      │      sqlite3_driver.php
│  │      │      sqlite3_forge.php
│  │      │      sqlite3_result.php
│  │      │      sqlite3_utility.php
│  │      │      
│  │      └─sqlsrv
│  │              index.html
│  │              sqlsrv_driver.php
│  │              sqlsrv_forge.php
│  │              sqlsrv_result.php
│  │              sqlsrv_utility.php
│  │              
│  ├─fonts
│  │      index.html
│  │      texb.ttf
│  │      
│  ├─helpers
│  │      array_helper.php
│  │      captcha_helper.php
│  │      cookie_helper.php
│  │      date_helper.php
│  │      directory_helper.php
│  │      download_helper.php
│  │      email_helper.php
│  │      file_helper.php
│  │      form_helper.php
│  │      html_helper.php
│  │      index.html
│  │      inflector_helper.php
│  │      language_helper.php
│  │      number_helper.php
│  │      path_helper.php
│  │      security_helper.php
│  │      smiley_helper.php
│  │      string_helper.php
│  │      text_helper.php
│  │      typography_helper.php
│  │      url_helper.php
│  │      xml_helper.php
│  │      
│  ├─language
│  │  │  index.html
│  │  │  
│  │  └─english
│  │          calendar_lang.php
│  │          date_lang.php
│  │          db_lang.php
│  │          email_lang.php
│  │          form_validation_lang.php
│  │          ftp_lang.php
│  │          imglib_lang.php
│  │          index.html
│  │          migration_lang.php
│  │          number_lang.php
│  │          pagination_lang.php
│  │          profiler_lang.php
│  │          unit_test_lang.php
│  │          upload_lang.php
│  │          
│  └─libraries
│      │  Calendar.php
│      │  Cart.php
│      │  Driver.php
│      │  Email.php
│      │  Encrypt.php
│      │  Encryption.php
│      │  Form_validation.php
│      │  Ftp.php
│      │  Image_lib.php
│      │  index.html
│      │  Javascript.php
│      │  Migration.php
│      │  Pagination.php
│      │  Parser.php
│      │  Profiler.php
│      │  Table.php
│      │  Trackback.php
│      │  Typography.php
│      │  Unit_test.php
│      │  Upload.php
│      │  User_agent.php
│      │  Xmlrpc.php
│      │  Xmlrpcs.php
│      │  Zip.php
│      │  
│      ├─Cache
│      │  │  Cache.php
│      │  │  index.html
│      │  │  
│      │  └─drivers
│      │          Cache_apc.php
│      │          Cache_dummy.php
│      │          Cache_file.php
│      │          Cache_memcached.php
│      │          Cache_redis.php
│      │          Cache_wincache.php
│      │          index.html
│      │          
│      ├─Javascript
│      │      index.html
│      │      Jquery.php
│      │      
│      └─Session
│          │  index.html
│          │  Session.php
│          │  SessionHandlerInterface.php
│          │  Session_driver.php
│          │  
│          └─drivers
│                  index.html
│                  Session_database_driver.php
│                  Session_files_driver.php
│                  Session_memcached_driver.php
│                  Session_redis_driver.php
│                  
├─tmp
│  │  071.jpg
│  │  0711.jpg
│  │  0712.jpg
│  │  0713.jpg
│  │  0714.jpg
│  │  0715.jpg
│  │  0716.jpg
│  │  0717.jpg
│  │  0718.jpg
│  │  0719.jpg
│  │  
│  └─thumbs
│          071.jpg
│          0711.jpg
│          0712.jpg
│          0713.jpg
│          0714.jpg
│          0715.jpg
│          0716.jpg
│          0717.jpg
│          0718.jpg
│          0719.jpg
│          
└─user_guide
    │  .buildinfo
    │  changelog.html
    │  DCO.html
    │  genindex.html
    │  index.html
    │  license.html
    │  objects.inv
    │  search.html
    │  searchindex.js
    │  
    ├─contributing
    │      index.html
    │      
    ├─database
    │      caching.html
    │      call_function.html
    │      configuration.html
    │      connecting.html
    │      db_driver_reference.html
    │      examples.html
    │      forge.html
    │      helpers.html
    │      index.html
    │      metadata.html
    │      queries.html
    │      query_builder.html
    │      results.html
    │      transactions.html
    │      utilities.html
    │      
    ├─documentation
    │      index.html
    │      
    ├─general
    │      alternative_php.html
    │      ancillary_classes.html
    │      autoloader.html
    │      caching.html
    │      cli.html
    │      common_functions.html
    │      compatibility_functions.html
    │      controllers.html
    │      core_classes.html
    │      creating_drivers.html
    │      creating_libraries.html
    │      credits.html
    │      drivers.html
    │      environments.html
    │      errors.html
    │      helpers.html
    │      hooks.html
    │      index.html
    │      libraries.html
    │      managing_apps.html
    │      models.html
    │      profiling.html
    │      requirements.html
    │      reserved_names.html
    │      routing.html
    │      security.html
    │      styleguide.html
    │      urls.html
    │      views.html
    │      welcome.html
    │      
    ├─helpers
    │      array_helper.html
    │      captcha_helper.html
    │      cookie_helper.html
    │      date_helper.html
    │      directory_helper.html
    │      download_helper.html
    │      email_helper.html
    │      file_helper.html
    │      form_helper.html
    │      html_helper.html
    │      index.html
    │      inflector_helper.html
    │      language_helper.html
    │      number_helper.html
    │      path_helper.html
    │      security_helper.html
    │      smiley_helper.html
    │      string_helper.html
    │      text_helper.html
    │      typography_helper.html
    │      url_helper.html
    │      xml_helper.html
    │      
    ├─installation
    │      downloads.html
    │      index.html
    │      troubleshooting.html
    │      upgrade_120.html
    │      upgrade_130.html
    │      upgrade_131.html
    │      upgrade_132.html
    │      upgrade_133.html
    │      upgrade_140.html
    │      upgrade_141.html
    │      upgrade_150.html
    │      upgrade_152.html
    │      upgrade_153.html
    │      upgrade_154.html
    │      upgrade_160.html
    │      upgrade_161.html
    │      upgrade_162.html
    │      upgrade_163.html
    │      upgrade_170.html
    │      upgrade_171.html
    │      upgrade_172.html
    │      upgrade_200.html
    │      upgrade_201.html
    │      upgrade_202.html
    │      upgrade_203.html
    │      upgrade_210.html
    │      upgrade_211.html
    │      upgrade_212.html
    │      upgrade_213.html
    │      upgrade_214.html
    │      upgrade_220.html
    │      upgrade_221.html
    │      upgrade_222.html
    │      upgrade_223.html
    │      upgrade_300.html
    │      upgrade_301.html
    │      upgrade_302.html
    │      upgrade_303.html
    │      upgrade_304.html
    │      upgrade_305.html
    │      upgrade_306.html
    │      upgrade_310.html
    │      upgrade_311.html
    │      upgrade_3110.html
    │      upgrade_312.html
    │      upgrade_313.html
    │      upgrade_314.html
    │      upgrade_315.html
    │      upgrade_316.html
    │      upgrade_317.html
    │      upgrade_318.html
    │      upgrade_319.html
    │      upgrade_b11.html
    │      upgrading.html
    │      
    ├─libraries
    │      benchmark.html
    │      caching.html
    │      calendar.html
    │      cart.html
    │      config.html
    │      email.html
    │      encrypt.html
    │      encryption.html
    │      file_uploading.html
    │      form_validation.html
    │      ftp.html
    │      image_lib.html
    │      index.html
    │      input.html
    │      javascript.html
    │      language.html
    │      loader.html
    │      migration.html
    │      output.html
    │      pagination.html
    │      parser.html
    │      security.html
    │      sessions.html
    │      table.html
    │      trackback.html
    │      typography.html
    │      unit_testing.html
    │      uri.html
    │      user_agent.html
    │      xmlrpc.html
    │      zip.html
    │      
    ├─overview
    │      appflow.html
    │      at_a_glance.html
    │      features.html
    │      getting_started.html
    │      goals.html
    │      index.html
    │      mvc.html
    │      
    ├─tutorial
    │      conclusion.html
    │      create_news_items.html
    │      index.html
    │      news_section.html
    │      static_pages.html
    │      
    ├─_downloads
    │      ELDocs.tmbundle.zip
    │      
    ├─_images
    │      appflowchart.gif
    │      smile.gif
    │      
    └─_static
        │  ajax-loader.gif
        │  basic.css
        │  ci-icon.ico
        │  comment-bright.png
        │  comment-close.png
        │  comment.png
        │  doctools.js
        │  down-pressed.png
        │  down.png
        │  file.png
        │  jquery-3.1.0.js
        │  jquery.js
        │  minus.png
        │  plus.png
        │  pygments.css
        │  searchtools.js
        │  underscore-1.3.1.js
        │  underscore.js
        │  up-pressed.png
        │  up.png
        │  websupport.js
        │  
        ├─css
        │      badge_only.css
        │      citheme.css
        │      theme.css
        │      
        ├─fonts
        │      fontawesome-webfont.eot
        │      fontawesome-webfont.svg
        │      fontawesome-webfont.ttf
        │      fontawesome-webfont.woff
        │      FontAwesome.otf
        │      
        ├─images
        │      ci-icon.ico
        │      
        └─js
                oldtheme.js
                theme.js

# 課題作成場所
applicationフォルダにあるcotntrollersフォルダの中の
welcome.phpの各メソッドを読み込めば結果が出力されます。

