# Assignment 3 - DB for OCAdopt

For this assignment, I've chosen to generate a csv file using a fake-data generation library in Python called 'faker'. You have to install this library on the command line using 'pip install faker'. I have created two csv files for this assignment - pets.csv and shelters.csv. Note - I purposefully made 30 shelters, so when creating pets, I made the shelterID a random ID between 1 and 30. If you want to change this, be sure to change the random bounds for shelterID in makePets.py ([Documentation on Faker here](https://faker.readthedocs.io/en/stable/providers.html))

In my java implementation to load in the csv's, I used apache commons for a csv reader. I first load in the shelters to make sure they exist before inserting them. Then, I add in the animal's info to the PetInfo talbe, followed by inserting the pet into the Pet table. The breed and animaltypes table are pre-loaded with some options, but the same idea could be applied to them as well.
