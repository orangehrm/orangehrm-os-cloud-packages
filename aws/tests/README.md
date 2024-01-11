# Guide to Running Performance Tests

## Setup the Instance for Testing

1. Setup an AWS EC2 instance using the OrangeHRM AMI
2. Follow the regular process and install OrangeHRM
```
orangehrm install
```
3. Login and change the password
4. Install git in the AMI
```
sudo dnf install git
```
5. Run script to setup tests
```
curl -o- https://raw.githubusercontent.com/orangehrm/os-cloud/main/aws/tests/setup_tests.sh | bash
```

## Running the tests

1. Install [Blazemeter Taurus](https://gettaurus.org/install/Installation/#Linux) to your local machine
2. Clone this repo to your local machine
```
git clone https://github.com/orangehrm/os-cloud
```
3. cd to tests folder
```
cd aws/tests
```
4. Create orangehrm_config.yml from orangehrm.config.yml.dist and change the required values
```
cp orangehrm_config.yml.dist orangehrm_config.yml
```
5. Run the test by using the script
```
chmod +x run_tests.sh
./run_tests.sh
```
