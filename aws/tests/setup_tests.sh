#!/bin/bash

set -x

# shellcheck disable=SC1091
source "$HOME/.orangehrm/.env"
db_pw_decrypt="$(echo "$MARIADB_ROOT_PW" | base64 -d)"

# Add Permanent OAuth Token to MariaDB Database

docker exec mariadb mariadb -uroot -p"$db_pw_decrypt" -e "INSERT INTO orangehrm.ohrm_oauth2_access_token (access_token, client_id, user_id, expiry_date_time_utc, revoked) VALUES ('0e5f3284f2df8fdcc81f601080710e1013afe010ad674e7f4898d6a1ffdd519bd42f1165e501079b', 1, 1, '2099-12-31 11:59:59', 0);"
docker exec mariadb mariadb -uroot -p"$db_pw_decrypt" -e "UPDATE orangehrm.hs_hr_config SET value = 'aJmvC3dsidQB6xhfJN7GzAY+Gj/Ofl27RPardtqK+gs=' WHERE orangehrm.hs_hr_config.name = 'oauth.encryption_key';"
docker exec mariadb mariadb -uroot -p"$db_pw_decrypt" -e "UPDATE orangehrm.hs_hr_config SET value = 'AAs8cg3JauC6nUqfF8kDnLZ6Uun2q5dHQ9zkLtS7MAM=' WHERE orangehrm.hs_hr_config.name = 'oauth.token_encryption_key';"

# Change PRODUCT_MODE to DEV

docker exec orangehrm sed -i 's/PRODUCT_MODE = self::MODE_PROD/PRODUCT_MODE = self::MODE_DEV/' /var/www/html/src/lib/config/Config.php

# Add functionalTestingPlugin

git clone https://github.com/orangehrm/orangehrm "$HOME/orangehrm"
docker cp "$HOME/orangehrm/src/test/functional/tools/plugins/orangehrmFunctionalTestingPlugin/" orangehrm:/var/www/html/src/plugins
rm -rf "$HOME/orangehrm"