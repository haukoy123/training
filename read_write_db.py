import csv
from datetime import datetime
import pymysql as MySQLdb



def connectsql():
    db = MySQLdb.connect(host="localhost", user="root", password="hau1999", db="bai2")
    return db


def readfile():
    with open('customer.csv') as file:
        customer = csv.reader(file, delimiter=',')
        all_values = []
        for row in customer:
            all_values.append(row)

    return all_values


def name():
    all_values = readfile()
    name = ''
    for i in all_values[0]:
        name = name + i + ", "

    return name[:-2]

def values():
    all_values = readfile()
    values1 =''
    for n in all_values[1::]:
        values1 +='('
        for m in range(len(n)):
            values1 = values1 + '"' + n[m] + '", '
        values1 = values1[:-2]
        values1 +='),'

    return values1[:-1]


def insertdata(list):
    db = connectsql()
    cursor = db.cursor()
    cursor.execute("show tables;")
    data = cursor.fetchall()
    for i in data:
        if "customer" == i[0]:
            cursor.execute("drop table customer;")
    chuoi = ''
    for i in list:
        chuoi = chuoi + i + " varchar(100), "
    chuoi = chuoi[:-2]
    cursor.execute("create table customer("+chuoi+");")
    cursor.execute("insert into customer("+name()+") values "+values()+";")
    db.commit()
    cursor.close()
    db.close()


all_values = readfile()
insertdata(all_values[0])
