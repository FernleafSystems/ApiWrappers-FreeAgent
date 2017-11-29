# Changelog
All notable changes to this project will be documented in this file.

## [0.1.3] - 2017-11-29
### Fixed
- Adds support for filtering Invoice searching by EC Status. This is a post-request filter
i.e. we must filter the response items since we can't systematically do this through the
API itself.
- Adds support for Deleting Contacts.
- Adds a method alias in the AddNote class for send().
- Ensures that the currency code sent with Invoices is always uppercase.

## [0.1.2] - 2017-11-28
### Fixed
- Now pads out the category IDs since the Freeagent API is incapable of handling
something so trivial without vomiting all over itself.

## [0.1.1] - 2017-11-23
### Fixed
- Retrieval of non-existent Category results in a warning.

## [0.1.0] - 2017-11-17
First Main Stable Release, but still beta.