## INSTALL

1. $ cd ansible
2. change connection in ansible/roles/sphinx/defaults/main.yml in sphinx_sources block.
2. $ searchd --stop (if running)
2. $ ansible-playbook install.yml

## Run

1. change $search var in script.php
2. run php script.php
