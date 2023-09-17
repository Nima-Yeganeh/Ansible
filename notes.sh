# some notes!!!

sudo apt install vim -y

cat /etc/netplan/00-installer-config.yaml

sudo vi /etc/netplan/00-installer-config.yaml

network:
  version: 2
  renderer: networkd
  ethernets:
    ens33:
      dhcp4: no
      addresses:
        - 192.168.244.103/24
      nameservers:
        addresses:
          - 8.8.8.8
          - 1.1.1.1
      routes:
        - to: 0.0.0.0/0
          via: 192.168.244.2

sudo netplan apply

ip addr

sudo service networking restart
sudo systemctl restart networking

sudo ip addr del 192.168.1.100/24 dev eth0
sudo ip addr add 192.168.1.200/24 dev eth0

sudo ip link set eth0 down
sudo ip link set eth0 up

sudo apt install open-vm-tools

sudo dhclient -r
sudo dhclient

sudo ifdown ens33
sudo ifup ens33

sudo ip link set ens33 down
sudo ip link set ens33 up

sudo ifconfig ens33 down
sudo ifconfig ens33 up

