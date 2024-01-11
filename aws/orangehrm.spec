Name:           orangehrm-aws-cli
Version:        0.0.3
Release:        3%{?dist}
Distribution:   Amazon Linux 2023
Summary:        Easily install and manage OrangeHRM Starter on AWS!

License:        GPLv3
URL:            https://github.com/orangehrm/os-cloud
Source0:        orangehrm-aws-cli-%{version}.tar.gz

Requires:       bash
Requires:       docker
Requires:       pwgen
Requires:       bc

BuildArch:      noarch

%description
OrangeHRM AWS CLI allows for easy installation of OrangeHRM Starter on AWS
Features include guided installation, easy upgrading, backup and restore
Certbot is integrated for industry standard SSL certificate generation

%prep
%setup -q

%install
mkdir -p %{buildroot}/%{_bindir}
install -m 0755 orangehrm %{buildroot}/%{_bindir}/orangehrm

mkdir -p %{buildroot}/%{_datadir}/orangehrm
cp -r assets %{buildroot}/%{_datadir}/orangehrm
cp -r scripts %{buildroot}/%{_datadir}/orangehrm
cp -r compose.yml %{buildroot}/%{_datadir}/orangehrm

mkdir -p %{buildroot}/etc/profile.d/
mv %{buildroot}/%{_datadir}/orangehrm/scripts/login_orangehrm %{buildroot}/%{_sysconfdir}/profile.d/login_orangehrm.sh

chown -R ec2-user:ec2-user %{buildroot}/%{_datadir}/orangehrm

%files
%attr (755, -, -) %{_bindir}/orangehrm

%defattr(444, -, -, 444)

/%{_datadir}/orangehrm/assets/maintenance.php
/%{_datadir}/orangehrm/assets/ssl.conf
/%{_datadir}/orangehrm/assets/license.txt
/%{_datadir}/orangehrm/assets/license-old.txt

/%{_datadir}/orangehrm/scripts/backup
/%{_datadir}/orangehrm/scripts/ssl
/%{_datadir}/orangehrm/scripts/check_update
/%{_datadir}/orangehrm/scripts/clean
/%{_datadir}/orangehrm/scripts/get_logs
/%{_datadir}/orangehrm/scripts/help
/%{_datadir}/orangehrm/scripts/install
/%{_datadir}/orangehrm/scripts/status
/%{_datadir}/orangehrm/scripts/update
/%{_datadir}/orangehrm/scripts/backup_scripts/backup_help
/%{_datadir}/orangehrm/scripts/backup_scripts/clean
/%{_datadir}/orangehrm/scripts/backup_scripts/create
/%{_datadir}/orangehrm/scripts/backup_scripts/list
/%{_datadir}/orangehrm/scripts/backup_scripts/restore
/%{_datadir}/orangehrm/scripts/helper_scripts/logo
/%{_datadir}/orangehrm/scripts/ssl_scripts/ssl_help
/%{_datadir}/orangehrm/scripts/ssl_scripts/enable
/%{_datadir}/orangehrm/scripts/ssl_scripts/restore
/%{_datadir}/orangehrm/scripts/ssl_scripts/renew
/%{_datadir}/orangehrm/scripts/ssl_scripts/auto_renew

/%{_datadir}/orangehrm/compose.yml

/%{_sysconfdir}/profile.d/login_orangehrm.sh

%changelog
* Wed Jan 10 2024 devishke-orange <devishke@orangehrm.com> - 0.0.3-3.amzn2023
- Added new license txt
- Added bc dependency
- Moved scripts and assets to /usr/share
- Removed shebang from all sourced scripts
- Updated summary and description
* Mon Jan 08 2024 devishke-orange <devishke@orangehrm.com> - 0.0.2-2.amzn2023
- Addition of SSL commands.
- Changed MIT License to GPLv3 License.
* Mon Nov 20 2023 devishke-orange <devishke@orangehrm.com> - 0.0.1-1.amzn2023
- OrangeHRM AWS CLI Initial Release.
- Install, update, backup, restore, clean commands included.
