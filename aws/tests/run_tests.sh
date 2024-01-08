#!/bin/bash

# Check if the script was executed from within the directory
if ! find "$(pwd)/run_tests.sh" &>/dev/null; then
    printf "Please run this script from the directory it is located in!\n\n"
    exit 0
fi

printf "Choose a test suite to run: \n\n"
printf "ID\tExecutor\tName\n"
printf "1\tJMeter\t\tLogin Visit Test\n"
printf "2\tJMeter\t\tEmployee API Test\n"
printf "3\tSelenium\tLogin Test\n"
printf "4\tSelenium\tLogin and Create Employee\n"
printf "\n"

answer=""
read -rp "Enter ID: " answer

upload=""
read -rp "Upload reports to Blazemeter? [y/n]: " upload

run_taurus() {
    if [[ $upload = "y" ]] && ! [[ $2 = "100" ]]; then
        python3 -m bzt orangehrm_config.yml "$1" "execution/execution_$2.yml" -report
    else
        python3 -m bzt orangehrm_config.yml "$1" "execution/execution_$2.yml"
    fi
}

run_taurus_with_savepoint() {
    if [[ $upload = "y" ]] && ! [[ $2 = "100" ]]; then
        python3 -m bzt orangehrm_config.yml savepoint_config.yml "$1" "execution/execution_$2.yml" -report
    else
        python3 -m bzt orangehrm_config.yml savepoint_config.yml "$1" "execution/execution_$2.yml"
    fi
}

run_test_suite() {
    if [[ $2 = "savepoint" ]]; then
        run_taurus_with_savepoint "$1" 1 
        run_taurus_with_savepoint "$1" 2 
        run_taurus_with_savepoint "$1" 5 
        run_taurus_with_savepoint "$1" 10 
        run_taurus_with_savepoint "$1" 25 
        run_taurus_with_savepoint "$1" 50 
    else
        run_taurus "$1" 1
        run_taurus "$1" 2 
        run_taurus "$1" 5 
        run_taurus "$1" 10 
        run_taurus "$1" 25 
        run_taurus "$1" 50 
    fi
}

# Run tests using Taurus Docker image
case $answer in
    1)
        run_test_suite jmeter/login_visit.yml
        ;;
    2)
        run_test_suite jmeter/api_employee_create.yml savepoint
        ;;
    3)
        run_test_suite selenium/login.yml
        ;;
    4)
        run_test_suite selenium/login_create.yml savepoint
        ;;
esac
