import os
import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


class TestRequests(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.implicitly_wait(10.00)

    def test_method(self):
        wait = WebDriverWait(self.driver, 10)

        aws_ip = os.getenv('BASE_URL')
        username = os.getenv('OHRM_USERNAME')
        password = os.getenv('OHRM_PASSWORD')
        self.driver.get(aws_ip)
        
        self.driver.find_element(By.NAME, "username").send_keys(username)
        self.driver.find_element(By.NAME, "password").send_keys(password)
        self.driver.find_element(By.CLASS_NAME, "oxd-form").submit()
        
        wait.until(EC.url_to_be(aws_ip +  "/dashboard/index"))

    def tearDown(self):
        self.driver.quit()