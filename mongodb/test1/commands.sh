
bash mongodb_deploy.sh

bash mongodb_rs_status_check.sh
ansible-playbook -i ansible_hosts.ini mongodb_rs_status_check.yml

bash mongodb_backup_on_secondary.sh
