---
title: Middleman and Cloud Foundry
date: 2015-01-11
tags: middleman, cloud foundry
public: true
---

[Middleman](https://middlemanapp.com/) is a static site generator; [Cloud Foundry](http://cloudfoundry.org/) is a Platform as a Service.

Deploying a Middleman static site to Cloud Foundry can be achieved in two ways:

 - building the site and pushing the resultant static files
 - configuring Middleman to integrate with a Rack-enabled webserver and pushing everything.

Serving static files is more efficient than running a Rack-enabled webserver, and additionally will not require any extra files or configuration. It is therefore the preferred option.

###Static-file buildpack

Static files can be pushed to Cloud Foundry via the [static-file buildpack](https://github.com/cloudfoundry/staticfile-buildpack).

1. Build the site:

    ~~~
    $ bundle exec middleman build
    ~~~

1. Push the site:

    ~~~
    $ cf push middleman-site \
        -m 32M \
        -p build/ \
        -b https://github.com/cloudfoundry/staticfile-buildpack.git
    ~~~
    The syntax is as follows:

    ~~~
    $ cf push <app-name> \
        -m <memory-limit> \
        -p <app-directory> \
        -b <custom-buildpack-url>
    ~~~

###Rack-enabled webserver

The [ruby buildpack](https://github.com/cloudfoundry/ruby-buildpack) will automatically detect and execute Rack-enabled webservers if a `config.ru` file is present.

1. Add a basic `config.ru` file with the following contents:

    ~~~ ruby
    require 'rubygems'
    require 'middleman/rack'

    run Middleman.server
    ~~~

1. Push the application to Cloud Foundry

    ~~~
    $ cf push middleman-site -m 64M
    ~~~
