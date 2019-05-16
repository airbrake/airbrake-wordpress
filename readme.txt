=== Airbrake ===
Contributors: airbrake, benarent, vmihailenco
Tags: errors, exceptions, warning, crash
Requires at least: 3.0.1
Tested up to: 5.2
Requires PHP: 5.4
Stable tag: trunk

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Airbrake is collects all errors created by Wordpress and it's plugins.

== Description ==

This plugin collects and aggregates all errors created by Wordpress and it's plugins. It de-dupes and lets developers know how to fix issues fast.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Install Airbrake either via the WordPress.org plugin directory, or by uploading the files to your server
2. After activating Airbrake, you need to sign up at [http://airbrake.io](http://airbrake.io) for an API Key.
3. If you don't yet have a Airbrake.io account, you can quickly create one at [Airbrake](http://airbrake.io).
4. You're setup. Exceptions will get e-mailed straight after they hit our system.

== Frequently Asked Questions ==

= What is an Exception? =

An exceptions happens when part of your Wordpress site crashes and it's not setup to deal with the error message gracefully. This results in an ugly message

= Why should I install this? =

Plugins can often cause parts of your Wordpress install to crash and stall. This plugin lets you identify other plugins fast, and you can send on information to other developers so they can errors FAST.

== Screenshots ==

![Wordpress Dashboard](/assets/ab-wp.png)

== Changelog ==

= 0.2 =
* Plugin is updated to use [phpbrake](https://github.com/airbrake/phpbrake) notifier. It is incompatible with previous releases.

= 0.1 =
* First Release. Woot Woot. Please leave feedback on the [Airbrake-Wordpress Github Repo](https://github.com/airbrake/airbrake-wordpress/issues).
