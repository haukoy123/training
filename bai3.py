import json
import requests
import csv

def getdata():
    acc_url = "https://365af0d3e2b44e001041a8d760f872a0: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@tranhautest.myshopify.com/admin/api/2021-04/customers.json"
    acc_info = json.loads(requests.get(acc_url).text)

    name = []
    for i in acc_info['customers'][0]:
        name.append(i)

    all = []
    all.append(name)

    for n in range(len(acc_info['customers'])):
        values = []
        for m in acc_info['customers'][n].values():
            values.append(m)

        all.append(values)
    return all


def csv_writer(data):
    with open("data.csv", "w") as csv_file:
        writer = csv.writer(csv_file,)
        for line in data:
            writer.writerow(line)

all = getdata()
csv_writer(all)

