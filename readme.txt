=== NerdTools Bad Bots Spam Reporter ===
Contributors: ko159
Donate link: http://www.nerdkey.co.uk/contact/
Tags: bad, bot, spam, comment, database, reporter
Requires at least: 3.3
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically report spam comments to the NerdTools Bad Bots database. The authors IP address is sent anonymously to help understand and fight spam.

== Description ==

Powered by NerdTools.co.uk, this plugin will automatically and anonymously report the authors IP address for any comment that is classed as spam to the NerdTools Bad Bots Intrusion & Spam Detection database.

The Bad Bots database keeps track of hundreds of thousands of bots that try and exploit and spam servers and websites world wide which is then used in applications such as NerdTools Bad Bot Spam Defender which checks every comment authors IP address against the database to detect and prevent known offenders from causing further spam.

This plugin is simple to use, follow the installation instructions and you will be contributing in no time.

More information along with stats and the NerdTools Bad Bots Spam Defender plugin can be found at http://www.nerdtools.co.uk/badbots/.

== Installation ==

1. Upload `nerdtools_badbot_spam_reporter.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Head to 'Settings' then 'NT BB Spam Reporter' and check the box to enable the plugin then hit 'Save Changes'
4. The next time a comment is classed as spam it will be automatically reported to the database

== Frequently asked questions ==
= How does it work? =

When a comment is classed as spam the authors IP address is sent anonymously to a secure server which gets processed and gains more information about the geographic location allowing us to build patterns and stay one step ahead of spammers.

= How do I benefit from this? =

Apart from feeling good knowing you're doing your bit for fighting spam? The information collected can be used with a further plugin called NerdTools Bad Bots Spam Defender which automatically checks each comment to see if it has been posted by a known spammer. This is a plugin which needs to be installed seperatley, for more information please see http://www.nerdtools.co.uk/badbots/.

= Are there any stats I can view? =

Yes, on the plugins settings page you will find the IP address and time of the last report, along with the total amount of reports submitted and an overview about the database. More detailed information can be found at http://www.nerdtools.co.uk/badbots/.

= I made a comment spam without realising, will it be reported? =

Yes it will, however the Bad Bots system has been designed to detect patterns in usage and more specifically mistakes like this. In simple terms if its a one off report then you have nothing to worry about. Our system will only pick up on genuine spam bots when certain patterns are matched.


== Screenshots ==

1. Not available as there is no user interface

== Changelog ==

= 1.0 =
* Initial release.

= 1.1 =
* Additional features added including a settings page with enable checkbox and stats

= 1.2 =
* Message added to prompt activation if plugin is installed but not enabled
* Minor grammar updates to readme.txt changelog and upgrade notice section

= 1.3 =
* Minor updates to core code, settings page and readme.txt
* Added detailed stats on settings page

== Upgrade notice ==

= 1.0 =
Initial release.

= 1.1 =
Additional features added including a settings page with enable checkbox and stats

= 1.2 =
Message added to prompt activation if plugin is installed but not enabled

= 1.3 =
Minor updates to core code, settings page and readme.txt
Added detailed stats on settings page