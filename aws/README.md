# OrangeHRM AWS CLI

This tool assists AWS Marketplace Subscribers with managing their installation of OrangeHRM 5.x

The commands have been grouped into three main categories:
- OrangeHRM Commands: General commands for managing your OrangeHRM instance
- OrangeHRM Backup Commands: Commands for  managing backups of your OrangeHRM instance
- OrangeHRM SSL Commands: Commands for generating SSL certificates for your OrangeHRM instance

## User Guide

Our user guide for setting up your EC2 instance with the OrangeHRM AMI can be found [here](https://docs.google.com/document/d/1E4mSuN21M54IHjWaXx9DNE1SEtm9EEvj9QWffeVHbm4/edit?usp=sharing). This README will only provide list the available commands.

## Developer Guide
To install this RPM on a fresh EC2 instance of Amazon Linux 2023, do the following:

1. Install dependencies
```bash
sudo dnf install docker pwgen
sudo usermod -aG docker $USER
sudo systemctl start docker
sudo systemctl enable docker
```

2. Manually install docker compose by following the instructions [here](https://docs.docker.com/compose/install/linux/#install-the-plugin-manually)

3. Download the latest RPM build artifact from GitHub workflows and SCP to the EC2 instance
```bash
scp -i <identity-file> orangehrm-aws-cli-<version>-<release>.rpm ec2-user@<ec2-ip>:/home/ec2-user
```

4. Install the RPM in your EC2 instance
```bash
sudo dnf install ./orangehrm-aws-cli-<version>-<release>.rpm
```

## OrangeHRM Command
### Usage
```bash
orangehrm COMMAND
```
### Commands
- `help`: Display information on how to use the command
- `install`: Install a dockerized version of OrangeHRM
- `update`: Update to a newer version of OrangeHRM
- `check-update`: Check for a newer version of OrangeHRM
- `status`: Displays whether OrangeHRM is installed or not
- `clean`: Completely wipe all data and backups related to OrangeHRM

## OrangeHRM Backup Command
### Usage
```bash
orangehrm backup COMMAND
```
### Commands
- `help`: Display information on how to use the command
- `create`: Create a backup
- `restore`: Restore an existing backup
- `list`: List your existing backups
- `clean`: Wipe all your existing backups

## OrangeHRM SSL Command
### Usage
```bash
orangehrm ssl COMMAND
```
### Commands
- `help`: Display information on how  to use the command
- `enable`: Generate SSL certificates
- `renew`: Renew expired SSL certificates
- `auto-renew`: Generate systemd timers that run the renew command every 24 hours
- `restore`: Restore server configurations for existing SSL certificates
