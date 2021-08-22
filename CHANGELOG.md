# Changelog
All notable changes to this project will be documented in this file.

## [0.3.0] - 2021-08-22
### Added
- Add support for new Bill Items update to the API.

## [0.2.8] - 2021-02-06
### Added
- fix for incorrect namespace on Company OAUTH class.

## [0.2.7] - 2019-08-08
### Added
- support for currencies on Bills.

## [0.2.3-6] - 2019-05-09
### Changed
- uses our automatic paging iterator for retrieval of many entities.

## [0.2.2] - 2019-03-19
### Added
- ability to set contact email.

## [0.2.1] - 2019-03-06
### Updated
- Fix broken FreeAgent API for "Slovak Republic", aka "Slovakia" (automatically corrects contact country).

## [0.2.0] - 2019-03-05
### Updated
- Ensure alignment with base API wrapper changes.

## [0.1.10] - 2018-06-27
### Fixed
- CategoryVO Retrieval bug.

## [0.1.9] - 2018-06-27
### Added
- add helpful filtering options on Contact and Category to the Search/Retrieval Base class.

## [0.1.8] - 2018-06-12
### Fixed
- Try to prevent the sending of empty arrays in the request as it was suddenly breaking
certain requests that needed no data parameters.

## [0.1.7] - 2018-06-08
### Added
- Add some helper functions to InvoiceVO so we don't have to remember the status strings.

## [0.1.6] - 2018-05-23
### FIXED
- Fix broken FreeAgent API for "Czechia", aka "Czech Republic" (automatically corrects contact country).

## [0.1.5] - 2018-01-08
### Added
- Added some extra Bank Transaction VO accessor methods.

## [0.1.4] - 2017-12-02
### Added
- Added pre-send verification checks on first and last names for contacts since the Freeagent
API insists upon having them to the point of throwing 422 errors.  Obviously.

## [0.1.3] - 2017-11-29
### Added
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