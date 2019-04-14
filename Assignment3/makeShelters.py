from faker import Faker
import random
import csv

fake = Faker()

i = 0

fileName = input('What do you want to name your csv file? ')

size = input('How many entries do you want? ')
valSize = int(size)

while valSize < 1:
	size = input('Invalid input. How many entries do you want? ')
	valSize = int(size)

while i < valSize: 
	i += 1

	name = fake.company()

	city = fake.city()

	street = fake.street_address()

	phoneNumber = fake.phone_number()

	while(len(phoneNumber) > 14): #max size of phone number
		phoneNumber = fake.phone_number()

	website = 'www.' + name + '.com'

	with open(fileName + '.csv', 'a', newline = '') as myFile:
	    myWriter = csv.writer(myFile, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    myWriter.writerow([name, city, street, phoneNumber, website])