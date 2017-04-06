# Genesis Simple Hook Guide
Contributors: srikat
Tags: genesis, actions, hooks, genesiswp, studiopress, guide
Requires at least: 3.4
Tested up to: 4.7.3
License: GPLv2 or later

Find Genesis action hooks quick and easily by seeing their actual locations inside your theme.

## Description
This is a simplified version of [Genesis Visual Hook Guide](https://wordpress.org/plugins/genesis-visual-hook-guide/) by Christopher Cochran with the following changes:

- Hooks are dynamically generated vs being hardcoded
- Clicking anywhere on a hook selects the hook name ready to be easily copied
- Does not show filters and markup

Once installed, this plugin adds a dropdown menu to the admin bar to see the available hooks on the page being viewed in the front end.

Credits:

- @GaryJones for [the idea](https://genesiswp.slack.com/archives/C02N5FU9J/p1491314376613898)
- @salcode for [the code](https://genesiswp.slack.com/archives/C02N5FU9J/p1491326278438438)

**Genesis Theme Framework required.**

## Installation
1. Upload the entire `genesis-simple-hook-guide` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## Frequently Asked Questions
### I have my admin bar disabled, can I still view the hooks without it?

Sure! The views are triggered by a query string. Simply add `?g_hooks=show` to the end of the URL.

## Screenshots
![Screenshot](http://d.pr/i/zOAX+ "Screenshot")

## Changelog
= 0.0.1 =

* Initial Release
