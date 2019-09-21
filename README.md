
# Address Report Helper

### Requirements
- [ ] OAuth implementation, Check roles [Tschet]
- [ ] Upload CSV to the System (PersonID, GroupID) [Safari]
- [ ] Optional: Find rows by title name 
- [ ] System queries every Group for an E-Mail-Address (Abteilungsleitung) [Safari]
- [ ] Optional: Find Adressverwalter for each Person and use for sorting
- [ ] Show summary with number of mails and number of people per receiver, not found items [Vento]
- [ ] E-Mail content [Vento]
- [ ] Send mails per Mailgun API [Vento]
- [ ] Optional: Template for mail or tel number

## Development

### Prerequisites
- php
- php-curl

### Simple PHP server
PHP now has a simple web server integrated:
`$ cd ~/path/to/app`
`$ php -S localhost:8000`
