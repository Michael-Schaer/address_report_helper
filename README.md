
# Address Report Helper

### Required information from the user (import)
PersonID, GroupID as CSV

### Information from MiData (JSON API)
Abteilungsleitung E-Mail over Service API

### Requirements
- [x] Upload CSV to the System (PersonID, GroupID)
- [x] System queries every Group for an E-Mail-Address (Abteilungsleitung)
- [ ] System outputs a file with GroupID, E-Mail-Address, all persons as links
- [ ] Confirmation shows number of groups (found and not found)
- [ ] Output format is compatible with MailChimp and Word Mass Mailing


## Development

### Prerequisites
- php
- php-curl

### Simple PHP server
PHP now has a simple web server integrated:
`$ cd ~/path/to/app`
`$ php -S localhost:8000`
