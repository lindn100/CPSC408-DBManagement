from faker import Faker
import random
import csv

fake = Faker()

i = 0

while i < 28: #only doing 28 to make 30 total in DB
	i += 1

	name = fake.company()

	city = fake.city()

	street = fake.street_address()

	phoneNumber = fake.phone_number()

	while(len(phoneNumber) > 14): #max size of phone number
		phoneNumber = fake.phone_number()

	website = 'www.' + name + '.com'

	with open('shelters.csv', 'a', newline = '') as myFile:
	    myWriter = csv.writer(myFile, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    myWriter.writerow([name, city, street, phoneNumber, website])