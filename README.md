# Genesis Simple Hook Guide
Find Genesis action hooks quick and easily by seeing their actual locations inside your theme.

## Description
This is a simplified version of [Genesis Visual Hook Guide](https://wordpress.org/plugins/genesis-visual-hook-guide/) by [Christopher Cochran](https://github.com/christophercochran/) with the following changes:

- Hooks are dynamically generated vs being hardcoded
- Clicking anywhere on a hook selects the hook name ready to be easily copied
- Does not show filters and markup

Once installed, this plugin adds a dropdown menu to the admin bar to see the available hooks on the page being viewed in the front end.

Credits:

- [Gary Jones](https://github.com/GaryJones/) for [the idea](http://d.pr/i/qSKK)
- [Sal Ferrarello](https://github.com/salcode) for [the code](http://d.pr/i/h2DA)

**Genesis Theme Framework required.**

## Installation
1. Click on `Clone or download` button, then `Download ZIP`.
2. Extract the zip file and upload the entire `genesis-simple-hook-guide` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

## Frequently Asked Questions
### I have my admin bar disabled, can I still view the hooks without it?

Sure! The views are triggered by a query string. Simply add `?g_hooks=show` to the end of the URL.

## Screenshots
- !["Action Hooks" admin bar menu item under "Genesis Hooks"](http://d.pr/i/EfdE+ "Action Hooks admin bar menu item under Genesis Hooks")

- ![Sample screenshot showing Genesis hooks on the Posts page in Genesis sample child theme](http://d.pr/i/zOAX+ "Sample screenshot showing Genesis hooks on the Posts page in Genesis sample child theme")

- !["Clear" menu item under "Genesis Hooks"](http://d.pr/i/Z3rQ+ "Clear menu item under Genesis Hooks")

## Changelog
= 0.0.1 =

* Initial Release
