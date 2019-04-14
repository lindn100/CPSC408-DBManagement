from faker import Faker
import random
import csv

fake = Faker()

animals = ["dog", "cat", "bird", "fish", "hamster", "guinea pig", "snake", "lizard"]
colors = ["white", "brown", "black", "grey", "red", "yellow", "mix"]

gender = ["m", "f"]
i = 0
while i < 500:
	i += 1

	s = ""

	animalGender = random.choice(gender)
	if(animalGender == "m"):
		name = fake.first_name_male()
	else:
		name = fake.first_name_female()

	animalType = random.choice(animals)
	color = random.choice(colors)
	age = random.randint(1, 5)

	weight = random.uniform(5.0, 50.0)

	shelter = random.randint(1, 20)

	price = random.uniform(50.0, 1000.0)

	if animalType == "dog":
		breed = random.randint(1, 10)
	elif animalType == "cat":
		breed = random.randint(11, 20)
	else:
		breed = 0

	with open('pets.csv', 'a', newline = '') as myFile:
	    myWriter = csv.writer(myFile, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    myWriter.writerow([animalType, name, color, age, animalGender, weight, shelter, price, breed])