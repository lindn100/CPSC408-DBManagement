from faker import Faker
import random
import csv

fake = Faker()

colors = ["white", "brown", "black", "grey", "red", "yellow", "mix"]
gender = ["m", "f"]

i = 0

fileName = input('What do you want to name your csv file? ')

size = input('How many entries do you want? ')
valSize = int(size)

while valSize < 1:
	size = input('Invalid input. How many entries do you want? ')
	valSize = int(size)


while i < valSize:

	i += 1

	animalGender = random.choice(gender)
	if(animalGender == "m"):
		name = fake.first_name_male()
	else:
		name = fake.first_name_female()

	animalType = random.randint(1, 10)
	color = random.choice(colors)
	age = random.randint(1, 5)

	weight = random.uniform(5.0, 50.0)

	shelter = random.randint(1, 20)

	price = random.uniform(50.0, 1000.0)

	if animalType == 1: #dog
		breed = random.randint(1, 10)
	elif animalType == 2: #cat
		breed = random.randint(11, 20)
	else: #if not dog or cat, no breed type
		breed = 0

	with open(fileName + '.csv', 'a', newline = '') as myFile:
	    myWriter = csv.writer(myFile, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    myWriter.writerow([animalType, name, color, age, animalGender, weight, shelter, price, breed])