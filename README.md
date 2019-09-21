
# Address Report Helper

### Requirements
- [ ] OAuth implementation, Check roles
- [ ] Upload CSV to the System (PersonID, GroupID)
- [ ] Optional: Find rows by title name
- [ ] System queries every Group for an E-Mail-Address (Abteilungsleitung)
- [ ] Optional: Find Adressverwalter for each Person and use for sorting
- [ ] Show summary with number of mails and number of people per receiver, not found items
- [ ] E-Mail content
- [ ] Send mails per Mailgun API

## Development

### Prerequisites
- php
- php-curl

### Simple PHP server
PHP now has a simple web server integrated:
`$ cd ~/path/to/app`
`$ php -S localhost:8000`
