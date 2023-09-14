sudo systemctl restart consul
sudo hostnamectl set-hostname host1
sudo systemctl status consul
consul members
consul info

ssh-copy-id 192.168.244.170
ssh-copy-id 192.168.244.172
ssh-copy-id 192.168.244.173

bash ansible_ping_check.sh

