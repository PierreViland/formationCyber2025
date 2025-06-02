#!/bin/bash

# Variables
INTERFACE="wlan0"  #Interface wifi
NEW_IP="192.168.1.71" #Ip du device hacker
NETMASK="255.255.255.0"  # Masque 
GATEWAY="192.168.1.1"    # Passerelle 

#Down interface
sudo ip link set $INTERFACE down

#nouvelle IP
sudo ip addr add $NEW_IP/24 dev $INTERFACE

# Passerelle defaut
sudo ip route add default via $GATEWAY dev $INTERFACE

# Reactiver l'interface
sudo ip link set $INTERFACE up

# Verification
echo "Nouvelle configuration IP :"
ip addr show $INTERFACE