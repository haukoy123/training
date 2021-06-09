from selenium import webdriver
import requests
from bs4 import BeautifulSoup

url = 'http://45.79.43.178/source_carts/wordpress/wp-login.php?loggedout=true&wp_lang=en_US'


username = "admin"
password = "123456aA"

def cach1():
    payload = {'log': username, 'pwd': password}
    with requests.Session() as s:
        p = requests.post(url, data=payload, verify=False)
        soup = BeautifulSoup(p.text, 'html.parser')
        # print(soup.prettify())
        print(soup.find(id="wp-admin-bar-my-account").a.text)


def cach2():
    driver = webdriver.Chrome()
    driver.get(url)
    driver.find_element_by_id("user_login").send_keys(username)
    driver.find_element_by_id("user_pass").send_keys(password)
    driver.find_element_by_name("wp-submit").click()
    # print(driver)
    print(driver.find_element_by_id('wp-admin-bar-my-account').text)
    driver.close()


cach1()
cach2()
