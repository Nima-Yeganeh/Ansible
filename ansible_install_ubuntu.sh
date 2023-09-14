
sudo hostnamectl set-hostname ansible

sudo apt update -y
sudo apt install ansible -y
ansible --version
ssh-keygen

sudo mkdir /etc/ansible
ls -ltr /etc/ansible/
sudo cat /etc/ansible/hosts
sudo vi /etc/ansible/hosts
[webservers]
web.example.local

sudo cat /etc/ansible/hosts
ansible --list-host all

sudo vi /etc/hosts
5.161.58.208 web.example.local

sudo cat /etc/hosts
ping web.example.local
ssh-keygen
ssh-copy-id web.example.local
ssh web.example.local
ansible webservers -m ping

vi ansible_hosts
[servers]
192.168.244.170

ssh-keygen
ssh-copy-id 192.168.244.170
ansible -i ansible_hosts -m ping all
