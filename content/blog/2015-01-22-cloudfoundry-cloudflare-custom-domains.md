---
title: Cloud Foundry, CloudFlare and custom domains
date: 2015-01-22
tags: cloud foundry, cloudflare
public: true
---

[CloudFlare](https://www.cloudflare.com) is a Content Deliery Network and distributed DNS system; [Cloud Foundry](http://cloudfoundry.org/) is a Platform as a Service.

Routing custom top-level domains (e.g. `my-custom-domain.com`) and custom subdomains (e.g. `blog.my-custom-domain.com`) to an app running on a Cloud Foundry instance can be achieved using CloudFlare as a DNS provider as follows:

### Hosting an application on a Cloud Foundry instance

Sign up for an account with a Cloud Foundry provider (e.g. [Pivotal Web Services](https://run.pivotal.io)) and the [install the Cloud Foundry CLI](http://docs.cloudfoundry.org/devguide/installcf/).

Using the CLI, login and target your org and space:

~~~
$ cf api <e.g. https://api.run.pivotal.io>
$ cf login
$ cf target -o my-org -s my-space
~~~

From the working directory of your application, push it to Cloud Foundry:

~~~
$ cd my-app-dir/
$ cf push my-app
~~~

### Mapping custom domains to your application

Create the domain and map the route to your application (see [Cloud Foundry documentation](http://docs.cloudfoundry.org/devguide/deploy-apps/domains-routes.html) for additional information):

~~~
$ cf create-domain my-org my-custom-domain.com
$ cf map-route my-app my-custom-domain.com
~~~

### Configuring DNS in CloudFlare

[Sign up for a CloudFlare account](https://www.cloudflare.com/sign-up).

Sign in to your account, and go to the DNS page for your domain (e.g [https://www.cloudflare.com/dns-settings?z=my-custom-domain.com](https://www.cloudflare.com/dns-settings?z=my-custom-domain.com).

Add a `CNAME` entry for the domain to point to the default application route provided by Cloud Foundry. For example, on Pivotal Web Services, this url would look like `my-app.cfapps.io`.

CloudFlare uses [CNAME Flattening](https://support.cloudflare.com/hc/en-us/articles/200169056-CNAME-Flattening-RFC-compliant-support-for-CNAME-at-the-root) to be able to utilize a `CNAME` entry for both custom top-level domains (e.g. `my-custom-domain.com`) and custom subdomains (e.g. `blog.my-custom-domain.com`).

Once this DNS record has propagated (anywhere from a few minutes to 24 hours) you should be able to access your application at both the Cloud Foundry provided url (e.g. `my-app.cfapps.io`) and your custom domain `my-custom-domain.com`.
